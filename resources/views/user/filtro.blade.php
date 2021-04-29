@extends('layouts.app')

@section('title', 'Resultados')

@section('content')

    <!-------------------------------------------------------- START HEADER BANNER SECTION --------------------------------------------->
    <section id="aa-catg-head-banner">
        <img src="/storage/categoria.jpg" alt="Infornet Resultados Filtro">
        <div class="aa-catg-head-banner-area">
            <div class="container">
                <div class="aa-catg-head-banner-content">
                    <h2>Resultados de Búsqueda</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{ route('inicio') }}">Inicio</a></li>
                        <li class="active"><a href="javascript:void(0)">Resultados búsqueda</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!---------------------------------------------------------- / END HEADER BANNER SECTION ------------------------------------------->

    <!-------------------------------------------------- START FILTER RESULTS SECTION -------------------------------------------------->
    <section id="aa-product">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="aa-product-area">
                            <div class="aa-product-inner">
                                <!-- start prduct navigation -->
                                <ul class="nav nav-tabs aa-products-tab">
                                    <li class="active"><a href="#men" data-toggle="tab">Resultados</a></li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="men">
                                        <ul class="aa-product-catg">
                                            @foreach($articulos as $articulo)
                                                <!-- start single product item -->
                                                <li style="width:18vw !important;">
                                                    <figure>
                                                        @forelse($articulo->imagenes as $imagen)
                                                            @if($articulo->codigo == $imagen->codigo_articulo)
                                                                <a id="{{ $articulo->codigo }}" class="aa-product-img" href="{{ route('mostrar', $articulo->codigo) }}">
                                                                    <img id="img_name" src="{{ $imagen->ruta_imagen }}" alt="{{ $articulo->nombre }}">
                                                                </a>
                                                            @endif
                                                            @empty
                                                                <a id="{{ $articulo->codigo }}" class="aa-product-img" href="{{ route('mostrar', $articulo->codigo) }}">
                                                                    <img src="/storage/no_product.png" alt="{{ $articulo->nombre }}">
                                                                </a>
                                                          @endforelse
                                                            <a class="add_cart aa-add-card-btn" href="javascript:void(0)">
                                                                <span class="fa fa-shopping-cart"></span>
                                                                <input type="hidden" value="{{ $articulo->id }}">
                                                                Añadir al carrito
                                                            </a>
                                                            <figcaption>
                                                                <h4 class="aa-product-title">
                                                                    <a href="{{ route('mostrar', $articulo->codigo) }}">{{ $articulo->nombre }}</a>
                                                                    <input id="family" type="hidden" value="{{ $articulo->familias->familia }}">
                                                                    <input id="family_id" type="hidden" value="{{ $articulo->familias->id }}">
                                                                </h4>
                                                                <span class="aa-product-price">{{ $articulo->cost_ult1 }}€</span>
                                                                <input id="description" type="hidden" value="{{ $articulo->caracteristicas }}">
                                                                <input id="dispon" type="hidden" value="{{ $articulo->stocks->descripcion }}">
                                                                <input id="marca" type="hidden" value="{{ $articulo->marcas->marca }}">
                                                                <input id="marca_id" type="hidden" value="{{ $articulo->marcas->id }}">
                                                                <input id="product_id" type="hidden" value="{{ $articulo->id }}">
                                                            </figcaption>
                                                      </figure>                         
                                                      <div class="aa-product-hvr-content">
                                                        <a class="add_wish" href="javascript:void(0)" title="Añadir a Deseos">
                                                            <span class="fa fa-heart-o"></span>
                                                            <input type="hidden" value="{{ $articulo->id }}">
                                                        </a>
                                                        <a class="vistazo_modal" title="Vistazo rápido" data-id="{{ $articulo->codigo }}" data-toggle="modal" data-target="#quick-view-modal">
                                                            <span class="fa fa-search"></span>
                                                        </a>
                                                      </div>
                                                    <!-- product badge -->
                                                    @switch($articulo->condicion)
                                                        @case(1)
                                                            <span class="aa-badge aa-sale" href="javascript:void(0)">OFERTA</span>
                                                            @break

                                                        @case(2)
                                                            <span class="aa-badge aa-hot" href="javascript:void(0)">NOVEDAD</span>
                                                            @break

                                                        @case(3)
                                                            <span class="aa-badge aa-sold-out" href="javascript:void(0)">OUTLET</span>
                                                            @break

                                                        @default
                                                            <span class="invisible" href="javascript:void(0)"></span>
                                                    @endswitch
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                
                                <!---------------------------------------- / START QUICK VIEW MODAL --------------------------------->
                                <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <div class="row">
                                                    <!-- Modal view slider -->
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="aa-product-view-slider">
                                                            <div class="simpleLens-gallery-container" id="demo-1">
                                                                <div class="simpleLens-container">
                                                                    <div class="simpleLens-big-image-container">
                                                                        <a class="simpleLens-lens-image" data-lens-image="">
                                                                            <img class="simpleLens-big-image" src="">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div id="images_quick" class="simpleLens-thumbnails-container">
                                                                    <a id="data_img_quick" href="javascript:void(0)" class="simpleLens-thumbnail-wrapper" data-lens-image="" data-big-image="">
                                                                        <img id="img_quick" src="">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Modal view content -->
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="aa-product-view-content">
                                                            <h3 id="name_quick">NOMBRE</h3>
                                                            <div class="aa-price-block">
                                                                <span id="price_quick" class="aa-product-view-price">PRECIO</span>
                                                                <p class="aa-product-avilability">Disponibilidad: <span id="stock_quick">STOCK</span></p>
                                                            </div>
                                                            <p id="description_quick">DESCRIPCIÓN</p>
                                                            <div class="aa-prod-quantity">
                                                                <select id="cantidad" class="selectpicker" data-width="auto" title="Elige cantidad">
                                                                    <option value="1" selected="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                </select>
                                                                <p class="aa-prod-category">
                                                                    Categoría: <a id="category_quick" href="">CATEGORÍA</a>
                                                                </p>
                                                                <p class="aa-prod-category">
                                                                    Marca: <a id="marca_quick" href="">MARCA</a>
                                                                </p>
                                                            </div>
                                                            <div class="aa-prod-view-bottom">
                                                                <a id="carro" class="aa-add-to-cart-btn" href="javascript:void(0)">
                                                                    <span class="fa fa-shopping-cart"></span>
                                                                    Añadir al carrito
                                                                </a>
                                                                <a id="detalles_quick" href="" class="aa-add-to-cart-btn">Ver Detalles</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--------------------------------------- / END QUICK VIEW MODAL ------------------------------------>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a style="margin-left: 50%; margin-bottom: 10px;" class="aa-browse-btn" href="{{ route('inicio') }}">Volver <span class="fa fa-long-arrow-right"></span></a>
    </section>
    <!--------------------------------------------------------- / END CATEGORY ------------------------------------------------------>

@push('scripts')
    <!-- Toastr notifications -->
    <script src="{{ asset('js/toastr.min.js') }}"></script>

    <script>
        $(function(){
            var user = '{{ Auth::guest() }}';
            
            //Añadir producto a carrito
            $('.add_cart').on('click', function(){
                if($(this).find('span').is('#remove_carrito')){
                    var id_articulo = $(this).find('input').val();
                    $(this).find('.fa-shopping-cart').removeAttr('class');
                    $(this).find('span').removeAttr('style');
                    $(this).removeAttr('style');
                    $(this).find('span').removeAttr('id');
                    $(this).find('span').prop('class', 'fa fa-shopping-cart');
                    $.get("/carrito/delete_carrito?code="+id_articulo).done(function(){
                        toastr.info('Producto borrado del carrito');
                    }).fail(function(){
                        toastr.warning('Ha sucedido un error');
                    });
                }else{
                    if(!user){
                        var id_articulo = $(this).find('input').val();
                        $(this).find('.fa-shopping-cart').attr('id', 'remove_carrito');
                        $(this).find('.fa-shopping-cart').removeAttr('class');
                        $(this).find('span').prop('class', 'fa fa-shopping-cart');
                        $(this).prop('style', 'color:red');
                        $(this).find('span').prop('style', 'color: red');
                        $.get("/carrito/add_carrito?code="+id_articulo+"&units="+1).done(function(){
                            toastr.success('Producto añadido al carrito');
                        }).fail(function(){
                            toastr.warning('Ha sucedido un error');
                        });
                    }else{
                        toastr.warning('Regístrate para poder añadir productos al carrito');
                    }
                }
            });
            
            //Añadir producto a lista de deseos
            $('.add_wish').on('click', function(){
                if($(this).find('span').is('#remove_wish')){
                    var id_articulo = $(this).find('input').val();
                    $(this).find('.fa-heart').removeAttr('class');
                    $(this).find('span').removeAttr('style');
                    $(this).find('span').removeAttr('id');
                    $(this).find('span').prop('class', 'fa fa-heart-o');
                    $.get("/deseos/delete_wish?code="+id_articulo).done(function(){
                        toastr.info('Producto borrado de tu lista de deseos');
                    }).fail(function(){
                        toastr.warning('Ha sucedido un error');
                    });
                }else{
                    if(!user){
                        var id_articulo = $(this).find('input').val();
                        $(this).find('.fa-heart-o').attr('id', 'remove_wish');
                        $(this).find('.fa-heart-o').removeAttr('class');
                        $(this).find('span').prop('class', 'fa fa-heart');
                        $(this).find('span').prop('style', 'color: red');
                        $.get("/deseos/add_wish?code="+id_articulo).done(function(){
                            toastr.success('Producto añadido a tu lista de deseos');
                        }).fail(function(){
                            toastr.warning('Ha sucedido un error');
                        });
                    }else{
                        toastr.warning('Regístrate para poder crearte tu propia lista de deseos');
                    }
                }
            });
            
            //Reiniciar modal quickview (vista rápida)
            $('#quick-view-modal').on('hidden.bs.modal', function(){
                $('#carro').removeAttr('style');
                $('#carro').find('span').removeAttr('style');
                $('#carro').find('span').removeAttr('id');
            });
            
            //Mostrar modal quickview (vista rápida)
            $('.vistazo_modal').on('click', function(){
                var codigo_actual = $(this).data('id');
                var nombre_actual = $(this).parents("div").first().siblings().find("h4").find("a").html();
                var precio_actual = $(this).parents("div").first().siblings().find("figcaption").find("span").html();
                var disponibilidad_actual = $(this).parents("div").first().siblings().find("figcaption").find("#dispon").val();
                var descripcion_actual = $(this).parents("div").first().siblings().find("figcaption").find("#description").val();
                var categoria_actual = $(this).parents("div").first().siblings().find("h4").find("#family").val();
                var id_categoria = $(this).parents("div").first().siblings().find("h4").find("#family_id").val();
                var marca_actual = $(this).parents("div").first().siblings().find("figcaption").find("#marca").val();
                var id_marca = $(this).parents("div").first().siblings().find("figcaption").find("#marca_id").val();
                var ruta_imagen = $(this).parents("div").first().siblings().find("#img_name").attr('src');
                
                var id_actual = $(this).parents("div").first("a").find("input").val();
                var cantidad_actual = 1;
                
                $('#cantidad').change(function() {
                    cantidad_actual = this.value;
                });
                
                //Añadir producto a carrito
                $('#carro').on('click', function(){
                    if($(this).find('span').is('#remove_carro')){
                        $(this).removeAttr('style');
                        $(this).find('span').removeAttr('id');
                        $(this).find('span').removeAttr('style');
                        $.get("/carrito/delete_carrito?code="+id_actual).done(function(){
                            toastr.info('Producto borrado del carrito');
                        }).fail(function(){
                            toastr.warning('Ha sucedido un error');
                        });
                    }else{
                        if(!user){
                            $(this).find('span').attr('id', 'remove_carro');
                            $(this).prop('style', 'color:red');
                            $(this).find('span').prop('style', 'color: red');
                            $.get('/carrito/add_carrito?code='+id_actual+'&units='+cantidad_actual).done(function(){
                                toastr.success('Producto añadido al carrito');
                                $('#carro').off('click');
                                $('#quick-view-modal').modal('hide');
                                $('#cantidad').val('1');
                                $('#cantidad').selectpicker('refresh');
                            }).fail(function(){
                                toastr.warning('Ha sucedido un error');
                            });
                        }else{
                            toastr.warning('Regístrate para poder añadir productos al carrito');
                        }
                    }
                });
                
                $('#detalles_quick').attr('href', '/producto/'+codigo_actual);
                $('#name_quick').html(nombre_actual);
                $('#price_quick').html(precio_actual);
                $('#stock_quick').html(disponibilidad_actual);
                $('#description_quick').html(descripcion_actual);
                $('#category_quick').html(categoria_actual);
                $('#category_quick').attr('href', '/familia/'+id_categoria);
                $('#marca_quick').html(marca_actual);
                $('#marca_quick').attr('href', '/marca/'+id_marca);
                
                var product_image_exist = $(this).parents("div").first().siblings().find("#img_name").attr('id');
                
                if(product_image_exist){
                    var inicio_nombre_imagen = ruta_imagen.indexOf("_") + 1;
                    var nombre_imagen = ruta_imagen.substring(inicio_nombre_imagen);
                    var ruta_imagen = codigo_actual + "_" + nombre_imagen;
                    var ruta_imagen_large = codigo_actual + "_large_" + nombre_imagen;
                    var ruta_imagen_thumbnail = codigo_actual + "_thumbnail_" + nombre_imagen;

                    $('.simpleLens-lens-image').attr('data-lens-image', '/storage/'+ruta_imagen_large);
                    $('.simpleLens-big-image').attr('src', '/storage/'+ruta_imagen);
                    $('#data_img_quick').attr('data-lens-image', '/storage/'+ruta_imagen_large);
                    $('#data_img_quick').attr('data-big-image', '/storage/'+ruta_imagen);
                    $('#img_quick').attr('src', '/storage/'+ruta_imagen_thumbnail);
                }else{
                    $('.simpleLens-lens-image').attr('data-lens-image', '/storage/no_product_large.png');
                    $('.simpleLens-big-image').attr('src', '/storage/no_product.png');
                    $('#data_img_quick').attr('data-lens-image', '/storage/no_product_large.png');
                    $('#data_img_quick').attr('data-big-image', '/storage/no_product.png');
                    $('#img_quick').attr('src', '/storage/no_product_thumbnail.png');
                }
            });
        });
    </script>
@endpush

@endsection