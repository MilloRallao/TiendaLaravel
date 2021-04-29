/*! Datatables altEditor 1.0
 */

/**
 * @summary     altEditor
 * @description Lightweight editor for DataTables
 * @version     1.0
 * @file        dataTables.editor.lite.js
 * @author      kingkode (www.kingkode.com)
 * @contact     www.kingkode.com/contact
 * @copyright   Copyright 2016 Kingkode
 *
 * This source file is free software, available under the following license:
 *   MIT license - http://datatables.net/license/mit
 *
 * This source file is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
 * or FITNESS FOR A PARTICULAR PURPOSE. See the license files for details.
 *
 * For details please refer to: http://www.kingkode.com
 */

(function( factory ){
    if ( typeof define === 'function' && define.amd ) {
        // AMD
        define( ['jquery', 'datatables.net'], function ( $ ) {
            return factory( $, window, document );
        } );
    }
    else if ( typeof exports === 'object' ) {
        // CommonJS
        module.exports = function (root, $) {
            if ( ! root ) {
                root = window;
            }

            if ( ! $ || ! $.fn.dataTable ) {
                $ = require('datatables.net')(root, $).$;
            }

            return factory( $, root, root.document );
        };
    }
    else {
        // Browser
        factory( jQuery, window, document );
    }
}(function( $, window, document, undefined ) {
   'use strict';
   var DataTable = $.fn.dataTable;


   var _instance = 0;

   /** 
    * altEditor provides modal editing of records for Datatables
    *
    * @class altEditor
    * @constructor
    * @param {object} oTD DataTables settings object
    * @param {object} oConfig Configuration object for altEditor
    */
   var altEditor = function( dt, opts )
   {
       if ( ! DataTable.versionCheck || ! DataTable.versionCheck( '1.10.8' ) ) {
           throw( "Warning: altEditor requires DataTables 1.10.8 or greater");
       }

       // User and defaults configuration object
       this.c = $.extend( true, {},
           DataTable.defaults.altEditor,
           altEditor.defaults,
           opts
       );

       /**
        * @namespace Settings object which contains customisable information for altEditor instance
        */
       this.s = {
           /** @type {DataTable.Api} DataTables' API instance */
           dt: new DataTable.Api( dt ),

           /** @type {String} Unique namespace for events attached to the document */
           namespace: '.altEditor'+(_instance++)
       };


       /**
        * @namespace Common and useful DOM elements for the class instance
        */
       this.dom = {
           /** @type {jQuery} altEditor handle */
           modal: $('<div class="dt-altEditor-handle"/>'),
       };


       /* Constructor logic */
       this._constructor();
   }



   $.extend( altEditor.prototype, {
       /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
        * Constructor
        * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

       /**
        * Initialise the RowReorder instance
        *
        * @private
        */
       _constructor: function ()
       {
           // console.log('altEditor Enabled')
           var that = this;
           var dt = this.s.dt;
           
           this._setup();

           dt.on( 'destroy.altEditor', function () {
               dt.off( '.altEditor' );
               $(dt.table().body()).off( that.s.namespace );
               $(document.body).off( that.s.namespace );
           } );
       },

       /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
        * Private methods
        * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

       /**
        * Setup dom and bind button actions
        *
        * @private
        */
       _setup: function()
       {
         // console.log('Setup');

         var that = this;
         var dt = this.s.dt;

         // add modal
         $('body').append('\
            <div class="modal fade" id="altEditor-modal" tabindex="-1" role="dialog">\
              <div class="modal-dialog">\
                <div class="modal-content">\
                  <div class="modal-header">\
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>\
                    <h4 class="modal-title"></h4>\
                  </div>\
                  <div class="modal-body">\
                    <p></p>\
                  </div>\
                  <div class="modal-footer">\
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>\
                    <button type="button" class="btn btn-primary">Save changes</button>\
                  </div>\
                </div>\
              </div>\
            </div>'
         );


         // add Edit Button
         if( this.s.dt.button('edit:name') )
         {
            this.s.dt.button('edit:name').action( function(e, dt, node, config) {
              var rows = dt.rows({
                selected: true
              }).count();

              that._openEditModal();
            });

            $(document).on('click', '#editRowBtn', function(e)
            {
              e.preventDefault();
              e.stopPropagation();
              that._editRowData();
            });

          }

         // add Delete Button
         if( this.s.dt.button('delete:name') )
         {
            this.s.dt.button('delete:name').action( function(e, dt, node, config) {
              var rows = dt.rows({
                selected: true
              }).count();

              that._openDeleteModal();
            });

            $(document).on('click', '#deleteRowBtn', function(e)
            {
              e.preventDefault();
              e.stopPropagation();
              that._deleteRow();
            });
         }

         // add Add Button
         if( this.s.dt.button('add:name') )
         {
            this.s.dt.button('add:name').action( function(e, dt, node, config) {
              var rows = dt.rows({
                selected: true
              }).count();

              that._openAddModal();
            });

            $(document).on('click', '#addRowBtn', function(e)
            {
              e.preventDefault();
              e.stopPropagation();
              that._addRowData();
            });
         }

       },

       /**
        * Emit an event on the DataTable for listeners
        *
        * @param  {string} name Event name
        * @param  {array} args Event arguments
        * @private
        */
       _emitEvent: function ( name, args )
       {
           this.s.dt.iterator( 'table', function ( ctx, i ) {
               $(ctx.nTable).triggerHandler( name+'.dt', args );
           } );
       },

       /**
        * Open Edit Modal for selected row
        * 
        * @private
        */
       _openEditModal: function ( )
       {
         var that = this;
         var dt = this.s.dt;

         var columnDefs = [];

         for( var i = 0; i < dt.context[0].aoColumns.length; i++ )
         {
            columnDefs.push({ title: dt.context[0].aoColumns[i].sTitle })
         }

          var adata = dt.rows({
            selected: true
          });

          var data = "";

          data += "<form name='altEditor-form' role='form'>";
           
          data += "<div class='invisible'><div class='invisible'><input type='hidden' id='" + columnDefs[2].title + "'  value='" + adata.data()[0][2] + "'></div></div>";
           
          for (var j = 3; j < columnDefs.length; j++) {
              if(j == 4 || j == 5 || j == 6 || j == 7 || j == 8 || j == 14){
                 data += "<div class='form-group'><div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'><label for='" + columnDefs[j].title + "'>" + columnDefs[j].title + ":</label></div><div class='col-sm-9 col-md-9 col-lg-9'><input type='number'  id='" + columnDefs[j].title + "' name='" + columnDefs[j].title + "' placeholder='" + columnDefs[j].title + "' style='overflow:hidden' min='0'  class='form-control  form-control-sm' value='" + adata.data()[0][j] + "'></div><div style='clear:both;'></div></div>";
              }else if(j == 9 || j == 10){
                 data += "<div class='form-group'><div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'><label for='" + columnDefs[j].title + "'>" + columnDefs[j].title + ":</label></div><div class='col-sm-9 col-md-9 col-lg-9'><input type='date'  id='" + columnDefs[j].title + "' name='" + columnDefs[j].title + "' placeholder='" + columnDefs[j].title + "' style='overflow:hidden'  class='form-control  form-control-sm' value='" + adata.data()[0][j] + "'></div><div style='clear:both;'></div></div>";
              }else if(j == 11){
                  //No mostrar el campo Imagen en el modal
              }else{
                  data += "<div class='form-group'><div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'><label for='" + columnDefs[j].title + "'>" + columnDefs[j].title + ":</label></div><div class='col-sm-9 col-md-9 col-lg-9'><input type='text'  id='" + columnDefs[j].title + "' name='" + columnDefs[j].title + "' placeholder='" + columnDefs[j].title + "' style='overflow:hidden'  class='form-control  form-control-sm' value='" + adata.data()[0][j] + "'></div><div style='clear:both;'></div></div>";
              }
          }
           
          data += "</form>";
           
          $('#altEditor-modal').on('show.bs.modal', function() {
            $('#altEditor-modal').find('.modal-title').html('Editar Registro');
            $('#altEditor-modal').find('.modal-body').html('<pre>' + data + '</pre>');
            $('#altEditor-modal').find('.modal-footer').html("<button type='button' data-content='remove' class='btn btn-default' data-dismiss='modal'>Cerrar</button>\
               <button type='button' data-content='remove' class='btn btn-primary' id='editRowBtn'>Guardar Cambios</button>");
          });

          $('#altEditor-modal').modal('show');
          $('#altEditor-modal input[0]').focus();

       },

       _editRowData: function()
       {
         var that = this;
         var dt = this.s.dt;

         var data = [];

         $('form[name="altEditor-form"] input').each(function( i )
         {
            data.push( $(this).val() );
         });
           
         data.unshift("");
         data.unshift("");
         var codigo = $("#Código").val();
         var nombre = $("#Nombre").val();
         var family = $("#Familia").val();
         var condicion = $("#Condición").val();
         var marca = $("#Marca").val();
         var model = $("#Modelo").val();
         var stock = $("#Stock").val();
         var f_alta = $("#Fecha_alta").val();
         var f_baja = $("#Fecha_baja").val();
         var caract = $("#Características").val();
         var iva = $("#Tipo_IVA").val();
         var garantia = $("#Garantía").val();
         data[11] = "<a data-id="+ codigo +" data-toggle='modal' data-target='#img-modal' class='fa fa-cloud-upload fa-2x imagen_codigo'></a>";
         data[12] = caract;
         data[13] = iva;
         data[14] = garantia;
           
         $.get("articulos/update_general?code="+codigo+"&name="+nombre+"&family="+family+"&condicion="+condicion+"&marca="+marca+"&caract="+caract+"&model="+model+"&f_alta="+f_alta+"&f_baja="+f_baja+"&stock="+stock+"&iva="+iva+"&garantia="+garantia).done(function(){
            toastr.success('Registro editado con éxito');
          }).fail(function(){
            toastr.warning('Ha sucedido un error');
          });
           
         dt.row({ selected:true }).data(data);
           
         $('#altEditor-modal').modal('hide');
       },


       /**
        * Open Delete Modal for selected row
        *
        * @private
        */
       _openDeleteModal: function ()
       {
         var that = this;
         var dt = this.s.dt;

         var columnDefs = [];

         for( var i = 0; i < dt.context[0].aoColumns.length; i++ )
         {
            columnDefs.push({ title: dt.context[0].aoColumns[i].sTitle })
         }

          var adata = dt.rows({
            selected: true
          });
           
          var count_selected = adata.data().length;
           
          if(columnDefs[3].title == 'Imagen'){
              if(count_selected <= 1){
                  var data = "";
                  data += "<form name='altEditor-form' role='form'>";
                  for (var i in columnDefs) {
                      if(i == 0 || i == 3){
                          //No mostrar el campo Imagen en el modal
                      }else{
                          data += "<div class='form-group'><label for='" + columnDefs[i].title + "'>" + columnDefs[i].title + " : </label><input  type='hidden'  id='" + columnDefs[i].title + "' name='" + columnDefs[i].title + "' placeholder='" + columnDefs[i].title + "' style='overflow:hidden'  class='form-control' value='" + adata.data()[0][i] + "' >" + adata.data()[0][i] + "</input></div>";
                      }
                  }
                  data += "</form>";
                  $('#altEditor-modal').on('show.bs.modal', function() {
                    $('#altEditor-modal').find('.modal-title').html('Borrar Registro');
                    $('#altEditor-modal').find('.modal-body').html('<pre>' + data + '</pre>');
                    $('#altEditor-modal').find('.modal-footer').html("<button type='button' data-content='remove' class='btn btn-default' data-dismiss='modal'>Cerrar</button>\
                       <button type='button' data-content='remove' class='btn btn-danger' id='deleteRowBtn'>Borrar</button>");
                  });
                  $('#altEditor-modal').modal('show');
                  $('#altEditor-modal input[0]').focus();
              }else{
                  var data = "";
                  data += "<form name='altEditor-form' role='form'>";
                  data += "<div class='form-group'>¿Está seguro de que desea borrar estos " + count_selected + " registros</div>";
                  data += "</form>";
                  $('#altEditor-modal').on('show.bs.modal', function() {
                    $('#altEditor-modal').find('.modal-title').html('Borrar Registro');
                    $('#altEditor-modal').find('.modal-body').html('<pre>' + data + '</pre>');
                    $('#altEditor-modal').find('.modal-footer').html("<button type='button' data-content='remove' class='btn btn-default' data-dismiss='modal'>Cerrar</button>\
                       <button type='button' data-content='remove' class='btn btn-danger' id='deleteRowBtn'>Borrar</button>");
                  });
                  $('#altEditor-modal').modal('show');
                  $('#altEditor-modal input[0]').focus();
              }
          }else{
              if(count_selected <= 1){
                  var data = "";
                  data += "<form name='altEditor-form' role='form'>";
                  for (var i in columnDefs) {
                      if(i == 0 || i == 1 || i == 11){
                          //No mostrar el campo Imagen en el modal
                      }else{
                          data += "<div class='form-group'><label for='" + columnDefs[i].title + "'>" + columnDefs[i].title + " : </label><input  type='hidden'  id='" + columnDefs[i].title + "' name='" + columnDefs[i].title + "' placeholder='" + columnDefs[i].title + "' style='overflow:hidden'  class='form-control' value='" + adata.data()[0][i] + "' >" + adata.data()[0][i] + "</input></div>";
                      }
                  }
                  data += "</form>";
                  $('#altEditor-modal').on('show.bs.modal', function() {
                    $('#altEditor-modal').find('.modal-title').html('Borrar Registro');
                    $('#altEditor-modal').find('.modal-body').html('<pre>' + data + '</pre>');
                    $('#altEditor-modal').find('.modal-footer').html("<button type='button' data-content='remove' class='btn btn-default' data-dismiss='modal'>Cerrar</button>\
                       <button type='button' data-content='remove' class='btn btn-danger' id='deleteRowBtn'>Borrar</button>");
                  });
                  $('#altEditor-modal').modal('show');
                  $('#altEditor-modal input[0]').focus();
              }else{
                  var data = "";
                  data += "<form name='altEditor-form' role='form'>";
                  data += "<div class='form-group'>¿Está seguro de que desea borrar estos " + count_selected + " registros</div>";
                  data += "</form>";
                  $('#altEditor-modal').on('show.bs.modal', function() {
                    $('#altEditor-modal').find('.modal-title').html('Borrar Registro');
                    $('#altEditor-modal').find('.modal-body').html('<pre>' + data + '</pre>');
                    $('#altEditor-modal').find('.modal-footer').html("<button type='button' data-content='remove' class='btn btn-default' data-dismiss='modal'>Cerrar</button>\
                       <button type='button' data-content='remove' class='btn btn-danger' id='deleteRowBtn'>Borrar</button>");
                  });
                  $('#altEditor-modal').modal('show');
                  $('#altEditor-modal input[0]').focus();
              }
          }
        },

       _deleteRow: function( )
       {
         var that = this;
         var dt = this.s.dt;
           
         var adata = dt.rows({
            selected: true
         });
           
           var count_selected = adata.data().length;
           
           if(adata.data()[0].length == 4){
              if(this.dom.modal[0].baseURI.includes('marcas')){
                 if(count_selected <= 1){
                    var codigo_actual = adata.data()[0][1];

                    $.get("marcas/delete_modal?code_1="+codigo_actual).done(function(){
                        toastr.success('Registro borrado con éxito');
                    }).fail(function(){
                        toastr.warning('Ha sucedido un error');
                    });

                    dt.row({ selected:true }).remove();

                    dt.draw();
                }else{
                    var ruta_codigos = "marcas/delete_modal?code_1="+adata.data()[0][1];

                    for (var i = 2; i <= count_selected ; ++i) {
                        ruta_codigos += "&code_" + i + "=" + adata.data()[i-1][1];
                    }

                    $.get(ruta_codigos).done(function(){
                        toastr.success('Registros borrados con éxito');
                    }).fail(function(){
                        toastr.warning('Ha sucedido un error');
                    });

                    dt.rows({ selected:true }).remove();

                    dt.draw();
                }
              }else{
                 if(count_selected <= 1){
                    var codigo_actual = adata.data()[0][1];

                    $.get("familias/delete_modal?code_1="+codigo_actual).done(function(){
                        toastr.success('Registro borrado con éxito');
                    }).fail(function(){
                        toastr.warning('Ha sucedido un error');
                    });

                    dt.row({ selected:true }).remove();

                    dt.draw();
                }else{
                    var ruta_codigos = "familias/delete_modal?code_1="+adata.data()[0][1];

                    for (var i = 2; i <= count_selected ; ++i) {
                        ruta_codigos += "&code_" + i + "=" + adata.data()[i-1][1];
                    }

                    $.get(ruta_codigos).done(function(){
                        toastr.success('Registros borrados con éxito');
                    }).fail(function(){
                        toastr.warning('Ha sucedido un error');
                    });

                    dt.rows({ selected:true }).remove();

                    dt.draw();
                }
              }
              
            }
           else{
               if(count_selected <= 1){
                    var codigo_actual = adata.data()[0][2];

                    $.get("articulos/delete_modal?code_1="+codigo_actual).done(function(){
                        toastr.success('Registro borrado con éxito');
                    }).fail(function(){
                        toastr.warning('Ha sucedido un error');
                    });

                    dt.row({ selected:true }).remove();

                    dt.draw();
                }else{
                    var ruta_codigos = "articulos/delete_modal?code_1="+adata.data()[0][2];

                    for (var i = 2; i <= count_selected ; ++i) {
                        ruta_codigos += "&code_" + i + "=" + adata.data()[i-1][2];
                    }

                    $.get(ruta_codigos).done(function(){
                        toastr.success('Registros borrados con éxito');
                    }).fail(function(){
                        toastr.warning('Ha sucedido un error');
                    });

                    dt.rows({ selected:true }).remove();

                    dt.draw();
                }
            }
           $('#altEditor-modal').modal('hide');
       },


       /**
        * Open Add Modal for selected row
        * 
        * @private
        */
       _openAddModal: function ( )
       {
         var that = this;
         var dt = this.s.dt;

         var columnDefs = [];

         for( var i = 0; i < dt.context[0].aoColumns.length; i++ )
         {
            columnDefs.push({ title: dt.context[0].aoColumns[i].sTitle })
         }

          var data = "";

          data += "<form name='altEditor-form' role='form'>";
          if(columnDefs[3].title == 'Imagen'){
              for(var j in columnDefs) {
                if(j == 1){
                     data += "<div class='form-group'><div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'><label for='" + columnDefs[j].title + "'>" + columnDefs[j].title + ":</label></div><div class='col-sm-9 col-md-9 col-lg-9'><input type='number'  id='" + columnDefs[j].title + "' name='" + columnDefs[j].title + "' placeholder='" + columnDefs[j].title + "' style='overflow:hidden' min='0' class='form-control form-control-sm' value=''></div><div style='clear:both;'></div></div>";
                  }else if(j == 0 || j == 3){
                      //No mostrar el campo Imagen en el modal
                  }else{
                      data += "<div class='form-group'><div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'><label for='" + columnDefs[j].title + "'>" + columnDefs[j].title + ":</label></div><div class='col-sm-9 col-md-9 col-lg-9'><input type='text'  id='" + columnDefs[j].title + "' name='" + columnDefs[j].title + "' placeholder='" + columnDefs[j].title + "' style='overflow:hidden' class='form-control form-control-sm' value=''></div><div style='clear:both;'></div></div>";
                  }
              }
          }else{
              for(var j in columnDefs) {
                  if(j == 2){
                     data += "<div class='form-group'><div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'><label for='" + columnDefs[j].title + "'>" + columnDefs[j].title + ":</label></div><div class='col-sm-9 col-md-9 col-lg-9'><input type='number'  id='" + columnDefs[j].title + "' name='" + columnDefs[j].title + "' placeholder='" + columnDefs[j].title + "' style='overflow:hidden' min='0' class='form-control form-control-sm' value=''></div><div style='clear:both;'></div></div>";
                  }else if(j == 4 || j == 5 || j == 6 || j == 7 || j == 8 || j == 14){
                     data += "<div class='form-group'><div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'><label for='" + columnDefs[j].title + "'>" + columnDefs[j].title + ":</label></div><div class='col-sm-9 col-md-9 col-lg-9'><input type='number'  id='" + columnDefs[j].title + "' name='" + columnDefs[j].title + "' placeholder='" + columnDefs[j].title + "' style='overflow:hidden' min='0' class='form-control form-control-sm' value=''></div><div style='clear:both;'></div></div>";
                  }else if(j == 9 || j == 10){
                     data += "<div class='form-group'><div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'><label for='" + columnDefs[j].title + "'>" + columnDefs[j].title + ":</label></div><div class='col-sm-9 col-md-9 col-lg-9'><input type='date'  id='" + columnDefs[j].title + "' name='" + columnDefs[j].title + "' placeholder='" + columnDefs[j].title + "' style='overflow:hidden' class='form-control form-control-sm' value=''></div><div style='clear:both;'></div></div>";
                  }else if(j == 0 || j == 1 || j == 11){
                      //No mostrar el campo Imagen en el modal
                  }else{
                      data += "<div class='form-group'><div class='col-sm-3 col-md-3 col-lg-3 text-right' style='padding-top:7px;'><label for='" + columnDefs[j].title + "'>" + columnDefs[j].title + ":</label></div><div class='col-sm-9 col-md-9 col-lg-9'><input type='text'  id='" + columnDefs[j].title + "' name='" + columnDefs[j].title + "' placeholder='" + columnDefs[j].title + "' style='overflow:hidden' class='form-control form-control-sm' value=''></div><div style='clear:both;'></div></div>";
                  }
              }
          }
          
          data += "</form>";

          $('#altEditor-modal').on('show.bs.modal', function() {
            $('#altEditor-modal').find('.modal-title').html('Añadir Registro');
            $('#altEditor-modal').find('.modal-body').html('<pre>' + data + '</pre>');
            $('#altEditor-modal').find('.modal-footer').html("<button type='button' data-content='remove' class='btn btn-default' data-dismiss='modal'>Cerrar</button>\
               <button type='button' data-content='remove' class='btn btn-primary' id='addRowBtn'>Crear</button>");
          });

          $('#altEditor-modal').modal('show');
          $('#altEditor-modal input[0]').focus();
       },

       _addRowData: function()
       {
         var that = this;
         var dt = this.s.dt;

         var data = [];

         $('form[name="altEditor-form"] input').each(function( i )
         {
            data.push( $(this).val() );
         });
           
         if(data.length == 2){
             var codigo = $("#Código").val();
             var marca = $("#Marca").val();
             var familia = $("#Familia").val();
             if(marca){
                 data.push("<a data-id="+ codigo +" data-toggle='modal' data-target='#img-modal' class='fa fa-cloud-upload fa-2x imagen_codigo'></a>");
                 data.unshift("");
                 $.get("marcas/add?code="+codigo+"&marca="+marca).done(function(){
                    toastr.success('Registro añadido con éxito');
                     $("[data-id="+codigo+"]").parents("tr").append("<input id="+ codigo +" class='show_img' type='hidden' value='/storage/no_product.png'>");
                 }).fail(function(){
                    toastr.warning('Ha sucedido un error');
                 });
            }else{
                 data.push("<a data-id="+ codigo +" data-toggle='modal' data-target='#img-modal' class='fa fa-cloud-upload fa-2x imagen_codigo'></a>");
                 data.unshift("");
                 $.get("familias/add?code="+codigo+"&family="+familia).done(function(){
                    toastr.success('Registro añadido con éxito');
                     $("[data-id="+codigo+"]").parents("tr").append("<input id="+ codigo +" class='show_img' type='hidden' value='/storage/no_product.png'>");
                 }).fail(function(){
                    toastr.warning('Ha sucedido un error');
                 });
            }
             
          }else{
             data.unshift("");
             data.unshift("");
             var codigo = $("#Código").val();
             var nombre = $("#Nombre").val();
             var family = $("#Familia").val();
             var condicion = $("#Condición").val();
             var marca = $("#Marca").val();
             var model = $("#Modelo").val();
             var stock = $("#Stock").val();
             var f_alta = $("#Fecha_alta").val();
             var f_baja = $("#Fecha_baja").val();
             var caract = $("#Características").val();
             var iva = $("#Tipo_IVA").val();
             var garantia = $("#Garantía").val();
             data[11] = "<a data-id="+ codigo +" data-toggle='modal' data-target='#img-modal' class='fa fa-cloud-upload fa-2x imagen_codigo'></a>";
             data[12] = caract;
             data[13] = iva;
             data[14] = garantia;
              $.get("articulos/add?code="+codigo+"&name="+nombre+"&family="+family+"&condicion="+condicion+"&marca="+marca+"&caract="+caract+"&model="+model+"&f_alta="+f_alta+"&f_baja="+f_baja+"&stock="+stock+"&iva="+iva+"&garantia="+garantia).fail(function(jqXHR, textStatus, data){
                  if(jqXHR.status){
                     toastr.warning('Error. Registro duplicado');
                     }else{
                        toastr.warning('Error al crear registro');
                     }
              });
          }
         
         dt.row.add(data).draw(false);
           
         $('#altEditor-modal').modal('hide');

       },

       _getExecutionLocationFolder: function() {
             var fileName = "dataTables.altEditor.js";
             var scriptList = $("script[src]");
             var jsFileObject = $.grep(scriptList, function(el) {

                  if(el.src.indexOf(fileName) !== -1 )
                  {
                     return el;
                  }
             });
             var jsFilePath = jsFileObject[0].src;
             var jsFileDirectory = jsFilePath.substring(0, jsFilePath.lastIndexOf("/") + 1);
             return jsFileDirectory;
         }
   } );



   /**
    * altEditor version
    * 
    * @static
    * @type      String
    */
   altEditor.version = '1.0';


   /**
    * altEditor defaults
    * 
    * @namespace
    */
   altEditor.defaults = {
       /** @type {Boolean} Ask user what they want to do, even for a single option */
       alwaysAsk: false,

       /** @type {string|null} What will trigger a focus */
       focus: null, // focus, click, hover

       /** @type {column-selector} Columns to provide auto fill for */
       columns: '', // all

       /** @type {boolean|null} Update the cells after a drag */
       update: null, // false is editor given, true otherwise

       /** @type {DataTable.Editor} Editor instance for automatic submission */
       editor: null
   };


   /**
    * Classes used by altEditor that are configurable
    * 
    * @namespace
    */
   altEditor.classes = {
       /** @type {String} Class used by the selection button */
       btn: 'btn'
   };


   // Attach a listener to the document which listens for DataTables initialisation
   // events so we can automatically initialise
   $(document).on( 'preInit.dt.altEditor', function (e, settings, json) {
       if ( e.namespace !== 'dt' ) {
           return;
       }

       var init = settings.oInit.altEditor;
       var defaults = DataTable.defaults.altEditor;

       if ( init || defaults ) {
           var opts = $.extend( {}, init, defaults );

           if ( init !== false ) {
               new altEditor( settings, opts  );
           }
       }
   } );


   // Alias for access
   DataTable.altEditor = altEditor;

   return altEditor;
}));