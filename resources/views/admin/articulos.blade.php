@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    
    <section class="content-header">
        <h1>
            Artículos
            <small>Gestionar artículos</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Artículos</li>
        </ol>
    </section>
    
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="box-header">
                            <h3 class="box-title">Importar o Exportar Listado de Artículos</h3>
                        </div>
                        <form method="POST" action="{{ route('import') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="file-loading">
                                <input id="input-42" name="input42[]" type="file" data-browse-on-zone-click="true" multiple>
                            </div>
                            <div style="margin:10px 0px 10px 0px;" class="row">
                                <div class="col-sm-4">
                                    <button class="btn btn-success">Importar</button>
                                    <a class="btn btn-warning" href="{{ route('export') }}">Exportar Datos</a>
                                </div>
                                <div class="col-sm-8"></div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Listado de Artículos</h3>
                    </div>
                    <div class="box-body" style="overflow-x: scroll;">
                        <table id="articulos_table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Seleccionar</th>
                                    <th>Detalles</th>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Familia</th>
                                    <th>Condición</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Stock</th>
                                    <th>Fecha_alta</th>
                                    <th>Fecha_baja</th>
                                    <th>Imagen</th>
                                    <th>Características</th>
                                    <th>Tipo_IVA</th>
                                    <th>Garantía</th>
<!--                                    <th>Abreviatura</th>-->
<!--                                    <th>Mínimo</th>-->
<!--                                    <th>Máximo</th>-->
<!--                                    <th>Aviso</th>-->
<!--                                    <th>Baja</th>-->
<!--                                    <th>Retención</th>-->
<!--                                    <th>IVA_inc</th>-->
<!--                                    <th>Cost_ult1</th>-->
<!--                                    <th>Fecha_ult</th>-->
<!--                                    <th>Ult_fecha</th>-->
<!--                                    <th>PM_COM1</th>-->
<!--                                    <th>Ubicación</th>-->
<!--                                    <th>Medidas</th>-->
<!--                                    <th>Peso</th>-->
<!--                                    <th>Litros</th>-->
<!--                                    <th>Observación</th>-->
<!--                                    <th>Unicaja</th>-->
<!--                                    <th>Desglose</th>-->
<!--                                    <th>Aranceles</th>-->
<!--                                    <th>Definición2</th>-->
<!--                                    <th>Internet</th>-->
<!--                                    <th>Vista</th>-->
<!--                                    <th>F_pag</th>-->
<!--                                    <th>P_verde</th>-->
<!--                                    <th>P_importe</th>-->
<!--                                    <th>P_tan</th>-->
<!--                                    <th>L_color</th>-->
<!--                                    <th>Margen</th>-->
<!--                                    <th>TCP</th>-->
<!--                                    <th>Ven_serie</th>-->
<!--                                    <th>Puntos</th>-->
<!--                                    <th>Des_esc</th>-->
<!--                                    <th>Tipo_art</th>-->
<!--                                    <th>Cocina</th>-->
<!--                                    <th>Art_impuesto</th>-->
<!--                                    <th>Nombre2</th>-->
<!--                                    <th>Color_art</th>-->
<!--                                    <th>Tipo_pvp</th>-->
<!--                                    <th>Cost_escan</th>-->
<!--                                    <th>Tipo_escan</th>-->
<!--                                    <th>Art_canon</th>-->
<!--                                    <th>Actua_solo</th>-->
<!--                                    <th>Fact_arepe</th>-->
<!--                                    <th>Alquiler</th>-->
<!--                                    <th>Orden</th>-->
<!--                                    <th>C_ent</th>-->
<!--                                    <th>CN8</th>-->
<!--                                    <th>IVA_lot</th>-->
<!--                                    <th>Artant</th>-->
<!--                                    <th>Reportetiq</th>-->
<!--                                    <th>GUID</th>-->
<!--                                    <th>Importar</th>-->
<!--                                    <th>DTO1</th>-->
<!--                                    <th>DTO2</th>-->
<!--                                    <th>DTO3</th>-->
<!--                                    <th>ISP</th>-->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($articulos as $articulo)
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>{{ $articulo->codigo }}</td>
                                            <td id="{{ $articulo->codigo }}" class="edit_name">{{ $articulo->nombre }}</td>
                                            <td id="{{ $articulo->codigo }}" class="edit_family">{{ $articulo->familia }}</td>
                                            <td id="{{ $articulo->codigo }}" class="edit_condicion">{{ $articulo->condicion }}</td>
                                            <td id="{{ $articulo->codigo }}" class="edit_marca">{{ $articulo->marca }}</td>
                                            <td id="{{ $articulo->codigo }}" class="edit_model">{{ $articulo->modelo }}</td>
                                            <td id="{{ $articulo->codigo }}" class="edit_stock">{{ $articulo->stock }}</td>
                                            <td id="{{ $articulo->codigo }}" class="edit_f_alta" data-type="combodate">{{ $articulo->fecha_alta }}</td>
                                            <td id="{{ $articulo->codigo }}" class="edit_f_baja" data-type="combodate">{{ $articulo->fecha_baja }}</td>
                                            <td id="{{ $articulo->codigo }}" class="">
                                                <a data-id="{{ $articulo->codigo }}" data-toggle="modal" data-target="#img-modal" class="fa fa-cloud-upload fa-2x imagen_codigo"></a>
                                            </td>
                                            @forelse($articulo->imagenes as $imagen)
                                                @if($articulo->codigo == $imagen->codigo_articulo)
                                                    <input id="{{ $articulo->codigo }}" class="show_img" type="hidden" value="{{ $imagen->ruta_imagen }}">
                                                @else
                                                    <input id="{{ $articulo->codigo }}" class="show_img" type="hidden" value="/storage/no_product.png">
                                                @endif
                                                @empty
                                                <input id="{{ $articulo->codigo }}" class="show_img" type="hidden" value="/storage/no_product.png">
                                            @endforelse
                                            <td id="{{ $articulo->codigo }}" class="edit_caract">{{ $articulo->caracteristicas }}</td>
                                            <td id="{{ $articulo->codigo }}" class="edit_iva">{{ $articulo->tipo_iva }}</td>
                                            <td id="{{ $articulo->codigo }}" class="edit_garantia">{{ $articulo->garantia }}</td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Edit Images Modal -->
    <div class="modal fade" style="padding-left: 17px;" id="img-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="box">
            <div class="box-body">
                <div class="box-header">
                    <h3 class="box-title">Editar Imágenes del artículo</h3>
                </div>
                <form method="POST" action="{{ route('imgs') }}" enctype="multipart/form-data">
                    @csrf
                    <input id="code_img" name="code_img" type="hidden" value="">
                    <div class="file-loading">
                        <input id="input-img" name="inputimg[]" type="file" data-browse-on-zone-click="true" multiple>
                    </div>
                    <div style="margin:10px 0px 10px 0px;" class="row">
                        <div class="col-sm-4">
                            <button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>
                            <button type="submit" class="btn btn-success">Subir</button>
                        </div>
                        <div class="col-sm-8"></div>
                    </div>
                </form>
                <div class="box-footer container-fluid">
                    <div id="row_img" class="row">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

@push('scripts')
    <!-- Datatables -->
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/responsive.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.altEditor.free.js') }}"></script>
    <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('js/fileinput.min.js') }}"></script>
    <script src="{{ asset('js/locales/es.js') }}"></script>
    <script src="{{ asset('js/bootstrap-editable.js') }}"></script>
    <!-- MomentJS -->
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/es.js') }}"></script>
    <!-- Toastr notifications -->
    <script src="{{ asset('js/toastr.min.js') }}"></script>

    <!-- page script -->
    <script>
        
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error('{{ $error }}');
            @endforeach
        @endif
        
      $(function(){
          //moment.js options
          moment.locale('es');

          //Ajax options
          $.ajaxSetup({
              headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
          });
          
          //Mostrar imágenes al abrir modal
          $(document).on('click', '.imagen_codigo', function(){
              var codigo_actual = $(this).data('id');
              $('#code_img').val(codigo_actual);
              var count_img = $(this).parent().siblings('.show_img').length;
              if(count_img > 1){
                 for(var i = 0; i < count_img; i++ ){
                    var imagen_actual = $(this).parent().siblings('.show_img:eq(' + i + ')').val();
                    $('#row_img').append("<img class='delete_img' src='"+ imagen_actual +"'>");
                    $('#row_img').append("<a href='javascript:void(0)' type='button' class='del_img btn btn-danger'><i class='fa fa-trash-o fa-lg'></i> Delete</a>");
                 }
              }else{
                  var imagen_actual = $(this).parent().siblings('.show_img:eq(0)').val();
                  $('#row_img').append("<img class='delete_img' src='"+ imagen_actual +"'>");
              }
              
          });
          
          //Borrar 1 imagen al vuelo
          $(document).on ("click", ".del_img", function () {
              var src_actual = $(this).prev().attr('src');
              $.get("articulos/img_del?src="+src_actual).done(function(){
                $("img[src$='"+ src_actual +"']").remove();
                toastr.success('Imagen borrada correctamente');
              }).fail(function(){
                toastr.warning('Ha sucedido un error');
              });
          });
          
          //Ocultar imágenes al cerrar modal
          $('#img-modal').on('hide.bs.modal', function (e) {
              $('#row_img').empty();
              $('#code_img').prop('value', '');
          });
          
          //Cuando una imagen se descarta, reiniciar campo value
          $('#input-img').on('filecleared', function(event) {
              $('#code_img').prop('value', '');
          });
          
        //Selector hover td
        $("td").hover(function(){
            $(this).css('cursor', 'pointer');
        });
          
        //Control y opciones de Datatable
        $('#articulos_table').DataTable({
            paging      : true, //Permitir paginación
            orderCellsTop: true, //El orden se aplica en los campos de cabecera
            fixedHeader : true, //Cabecera de campos autoscroll
            lengthChange: false, //Permitir cambiar ancho columnas
            searching   : true, //Permitir búsqueda
            ordering    : true, //Permitir ordenar columnas
            info        : true, //Información de pie de página
            autoWidth   : false, //Autoajustar ancho columnas
            dom         : 'Bfrtip',        // Needs button container
            altEditor   : true,     // Permitir altEditor
            order: [
                [ 1, 'ASC' ]
            ],
            select      : { //Opciones del selector (Seleccionar 1 o varias filas, cuáles filas y deseleccionar al pinchar fuera de la tabla)
              style     : 'multiple',
              selector  : 'td:first-child',
              blurable  : false
            },
            language: {
                'url': 'js/Spanish.json',
                buttons: {
                    selectAll: "Seleccionar Todo",
                    selectNone: "Seleccionar Nada"
                }
            },
            responsive: { //Permite adaptar tabla a pantalla y las columnas que no quepan, mostrando las filas sobrantes en subfilas
                details: {
                    type: 'column',
                    target: 'td:nth-child(2)'
                }
            },
            lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10 filas', '25 filas', '50 filas', 'Mostrar Todo']
            ],
            buttons: ['selectAll', 'selectNone',{
                text: 'Añadir',
                name: 'add'        // do not change name
            },
            {
                extend: 'selected', // Bind to Selected row
                text: 'Editar',
                name: 'edit'        // do not change name
            },
            {
                extend: 'selected', // Bind to Selected row
                text: 'Borrar',
                name: 'delete'      // do not change name
            },
            'pageLength'],
            "columnDefs": [
                { orderable: false, searchable: false, className: 'select-checkbox', targets: 0 },
                { orderable: false, searchable: false, className: 'control', targets: 1 },
                { orderable: false, searchable: false, targets: 11 }
              ],
        });
          
      });
        
    //Input File Export & Import opciones
    $("#input-42").fileinput({
        maxFileCount: 1,
        allowedFileExtensions: ["csv", "xls", "xlsx"],
        language: 'es',
    });
        
    //Input File Image opciones
    $("#input-img").fileinput({
        maxFileCount: 1,
        allowedFileExtensions: ["jpeg", "jpg", "png", "gif"],
        language: 'es',
    });
    
    //Editar nombre de 1 artículo al vuelo
    $('#articulos_table').editable({
      container: 'body',
      selector: 'td.edit_name',
      url: function(params) {
          var codigo_actual = $(this).attr('id');
          $.get("articulos/update_name?name="+params.value+'&code='+codigo_actual).done(function(){
            toastr.success('Edición correcta');
          }).fail(function(){
            toastr.warning('Ha sucedido un error');
          });
      },
      title: 'Editar Nombre',
      validate: function(value){
          if($.trim(value) == ''){
            return 'Este campo es requerido';
          }
      },
    });
    //Editar familia de 1 artículo al vuelo
    $('#articulos_table').editable({
      container: 'body',
      selector: 'td.edit_family',
      url: function(params) {
          var codigo_actual = $(this).attr('id');
          $.get("articulos/update_family?family="+params.value+'&code='+codigo_actual).done(function(){
            toastr.success('Edición correcta');
          }).fail(function(){
            toastr.warning('Ha sucedido un error');
          });
      },
      title: 'Editar Familia',
      validate: function(value){
          if($.trim(value) == ''){
            return 'Este campo es requerido';
          }
          var regex = /^[0-9]+$/;
           if(!regex.test(value))
           {
            return 'Sólo números por favor';
           }
      },
    });
    //Editar condicion de 1 artículo al vuelo
    $('#articulos_table').editable({
      container: 'body',
      selector: 'td.edit_condicion',
      url: function(params) {
          var codigo_actual = $(this).attr('id');
          $.get("articulos/update_condicion?condicion="+params.value+'&code='+codigo_actual).done(function(){
            toastr.success('Edición correcta');
          }).fail(function(){
            toastr.warning('Ha sucedido un error');
          });
      },
      title: 'Editar Condición',
      validate: function(value){
          if($.trim(value) == ''){
            return 'Este campo es requerido';
          }
          var regex = /^[0-9]+$/;
           if(!regex.test(value))
           {
            return 'Sólo números por favor';
           }
      },
    });
    //Editar marca de 1 artículo al vuelo
    $('#articulos_table').editable({
      container: 'body',
      selector: 'td.edit_marca',
      url: function(params) {
          var codigo_actual = $(this).attr('id');
          $.get("articulos/update_marca?marca="+params.value+'&code='+codigo_actual).done(function(){
            toastr.success('Edición correcta');
          }).fail(function(){
            toastr.warning('Ha sucedido un error');
          });
      },
      title: 'Editar Marca',
      validate: function(value){
          if($.trim(value) == ''){
            return 'Este campo es requerido';
          }
          var regex = /^[0-9]+$/;
           if(!regex.test(value))
           {
            return 'Sólo números por favor';
           }
      },
    });
    //Editar características de 1 artículo al vuelo
    $('#articulos_table').editable({
      container: 'body',
      selector: 'td.edit_caract',
      url: function(params) {
          var codigo_actual = $(this).attr('id');
          $.get("articulos/update_caract?caracteristicas="+params.value+'&code='+codigo_actual).done(function(){
            toastr.success('Edición correcta');
          }).fail(function(){
            toastr.warning('Ha sucedido un error');
          });
      },
      title: 'Editar Características',
      validate: function(value){
          if($.trim(value) == ''){
            return 'Este campo es requerido';
          }
      },
    });
    //Editar modelo de 1 artículo al vuelo
    $('#articulos_table').editable({
      container: 'body',
      selector: 'td.edit_model',
      url: function(params) {
          var codigo_actual = $(this).attr('id');
          $.get("articulos/update_model?model="+params.value+'&code='+codigo_actual).done(function(){
            toastr.success('Edición correcta');
          }).fail(function(){
            toastr.warning('Ha sucedido un error');
          });
      },
      title: 'Editar Modelo',
      validate: function(value){
          if($.trim(value) == ''){
            return 'Este campo es requerido';
          }
          var regex = /^[0-9]+$/;
           if(!regex.test(value))
           {
            return 'Sólo números por favor';
           }
      },
    });
    //Editar stock de 1 artículo al vuelo
    $('#articulos_table').editable({
      container: 'body',
      selector: 'td.edit_stock',
      url: function(params) {
          var codigo_actual = $(this).attr('id');
          $.get("articulos/update_stock?stock="+params.value+'&code='+codigo_actual).done(function(){
            toastr.success('Edición correcta');
          }).fail(function(){
            toastr.warning('Ha sucedido un error');
          });
      },
      title: 'Editar Stock',
      validate: function(value){
          if($.trim(value) == ''){
            return 'Este campo es requerido';
          }
          var regex = /^[0-9]+$/;
           if(!regex.test(value))
           {
            return 'Sólo números por favor';
           }
      },
    });
    //Editar fecha_alta de 1 artículo al vuelo
    $('#articulos_table').editable({
      format: 'YYYY-MM-DD',
      template: 'D / MMMM / YYYY',
      combodate: {
          minYear: 2000,
          maxYear: 2050,
          firstItem: 'none',
          smartDays: true,
       },
      container: 'body',
      selector: 'td.edit_f_alta',
      url: function(params) {
          var codigo_actual = $(this).attr('id');
          $.get("articulos/update_f_alta?f_alta="+params.value+'&code='+codigo_actual).done(function(){
            toastr.success('Edición correcta');
          }).fail(function(){
            toastr.warning('Ha sucedido un error');
          });
      },
      title: 'Editar Fecha de alta',
      validate: function(value){
          if($.trim(value) == ''){
            return 'Este campo es requerido';
          }
      },
    });
    //Editar fecha_baja de 1 artículo al vuelo
    $('#articulos_table').editable({
      format: 'YYYY-MM-DD',
      template: 'D / MMMM / YYYY',
      combodate: {
          minYear: 2000,
          maxYear: 2050,
          firstItem: 'none',
          smartDays: true,
       },
      container: 'body',
      selector: 'td.edit_f_baja',
      url: function(params) {
          var codigo_actual = $(this).attr('id');
          $.get("articulos/update_f_baja?f_baja="+params.value+'&code='+codigo_actual).done(function(){
            toastr.success('Edición correcta');
          }).fail(function(){
            toastr.warning('Ha sucedido un error');
          });
      },
      title: 'Editar Fecha de baja',
      validate: function(value){
          if($.trim(value) == ''){
            return 'Este campo es requerido';
          }
      },
    });
        
    </script>
@endpush

@endsection