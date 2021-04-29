@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    
    <section class="content-header">
        <h1>
            Familias
            <small>Gestionar Familias de Artículos</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Familias</li>
        </ol>
    </section>
    
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="box-header">
                            <h3 class="box-title">Importar o Exportar Listado de Familias</h3>
                        </div>
                        <form method="POST" action="{{ route('import_f') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="file-loading">
                                <input id="input-42" name="input42[]" type="file" data-browse-on-zone-click="true" multiple>
                            </div>
                            <div style="margin:10px 0px 10px 0px;" class="row">
                                <div class="col-sm-4">
                                    <button class="btn btn-success">Importar</button>
                                    <a class="btn btn-warning" href="{{ route('export_f') }}">Exportar Datos</a>
                                </div>
                                <div class="col-sm-8"></div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Listado de Familias</h3>
                    </div>
                    <div class="box-body" style="overflow-x: scroll;">
                        <table id="articulos_table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Seleccionar</th>
                                    <th>Código</th>
                                    <th>Familia</th>
                                    <th>Imagen</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($familias as $familia)
                                        <tr>
                                            <td></td>
                                            <td>{{ $familia->codigo }}</td>
                                            <td id="{{ $familia->codigo }}" class="edit_family">{{ $familia->familia }}</td>
                                            <td id="{{ $familia->codigo }}" class="">
                                                <a data-id="{{ $familia->codigo }}" data-toggle="modal" data-target="#img-modal" class="fa fa-cloud-upload fa-2x imagen_codigo"></a>
                                            </td>
                                            @isset($familia->ruta_imagen)
                                                <input id="{{ $familia->codigo }}" class="show_img" type="hidden" value="{{ $familia->ruta_imagen }}">
                                            @endisset
                                            
                                            @empty($familia->ruta_imagen)
                                                <input id="{{ $familia->codigo }}" class="show_img" type="hidden" value="/storage/no_product.png">
                                            @endempty
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
                    <h3 class="box-title">Editar Imagen de la Familia</h3>
                </div>
                <form method="POST" action="{{ route('imgs_f') }}" enctype="multipart/form-data">
                    @csrf
                    {{method_field ('put')}}
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
    <script src="{{ asset('js/toastr.min.js') }}"></script>

    <!-- page script -->
    <script>
        @if (\Session::has('success'))
            toastr.success('{!! \Session::get('success') !!}');
        @elseif(\Session::has('error'))
            toastr.error('{!! \Session::get('error') !!}');
        @endif
        
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error('{{ $error }}');
            @endforeach
        @endif
        
      $(function(){

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
                    selectNone: "Deseleccionar Todo"
                }
            },
            responsive: false,  //Permite adaptar tabla a pantalla y las columnas que no quepan, mostrando las filas sobrantes en subfilas
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
                text: 'Borrar',
                name: 'delete'      // do not change name
            },
            'pageLength'],
            "columnDefs": [
                { orderable: false, searchable: false, className: 'select-checkbox', targets: 0 },
                { orderable: false, searchable: false, targets: 3 }
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
    
    //Editar familia al vuelo
    $('#articulos_table').editable({
      container: 'body',
      selector: 'td.edit_family',
      url: function(params) {
          var codigo_actual = $(this).attr('id');
          $.get("familias/update_family?family="+params.value+'&code='+codigo_actual).done(function(){
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
      },
    });
        
    </script>
@endpush

@endsection