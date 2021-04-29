@extends('layouts.app')

@section('title', @( $producto->nombre ))

@section('content')

    <!-------------------------------------------------------- START HEADER BANNER SECTION --------------------------------------------->
    <section id="aa-catg-head-banner">
        <img src="{{ $producto->familias->ruta_imagen }}" alt="{{ $producto->familias->familia }}">
        <div class="aa-catg-head-banner-area">
            <div class="container">
                <div class="aa-catg-head-banner-content">
                    <h2>{{ $producto->familias->familia }}</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{ route('inicio') }}">Inicio</a></li>         
                        <li><a href="{{ route('mostrar_familia', $producto->familias->id) }}">{{ $producto->familias->familia }}</a></li>
                        <li class="active"><a href="{{ route('mostrar_marca', $producto->marcas->id) }}">{{ $producto->marcas->marca }}</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!---------------------------------------------------------- / END HEADER BANNER SECTION ------------------------------------------->

    <!------------------------------------------------------------ START PRODUCT INFO ------------------------------------------------->
    <section id="aa-product-details">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="aa-product-details-area">
                <div class="aa-product-details-content">
                  <div class="row">

                    <!-- Product Images -->
                    <div class="col-md-5 col-sm-5 col-xs-12">                              
                      <div class="aa-product-view-slider">                                
                        <div id="demo-1" class="simpleLens-gallery-container">
                            @forelse($producto->imagenes as $imagen)
                                <div class="simpleLens-container">
                                    <div class="simpleLens-big-image-container">
                                        <a data-lens-image="{{ $imagen->ruta_imagen_large }}" class="simpleLens-lens-image">
                                            <img src="{{ $imagen->ruta_imagen }}" class="simpleLens-big-image">
                                        </a>
                                    </div>
                                </div>
                                <div class="simpleLens-thumbnails-container">
                                    <a data-big-image="{{ $imagen->ruta_imagen }}" data-lens-image="{{ $imagen->ruta_imagen_large }}" class="simpleLens-thumbnail-wrapper" href="javascript:void(0)">
                                        <img src="{{ $imagen->ruta_imagen_thumbnail }}">
                                    </a>
                                </div>
                                @empty
                                    <div class="simpleLens-container">
                                    <div class="simpleLens-big-image-container">
                                        <a data-lens-image="/storage/no_product_large.png" class="simpleLens-lens-image">
                                            <img src="/storage/no_product.png" class="simpleLens-big-image">
                                        </a>
                                    </div>
                                </div>
                                <div class="simpleLens-thumbnails-container">
                                    <a data-big-image="/storage/no_product.png" data-lens-image="/storage/no_product_large.png" class="simpleLens-thumbnail-wrapper" href="javascript:void(0)">
                                        <img src="/storage/no_product_thumbnail.png">
                                    </a>
                                </div>
                            @endforelse
                        </div>
                      </div>
                    </div>

                    <!-- Product details -->
                    <div class="col-md-7 col-sm-7 col-xs-12">
                      <div class="aa-product-view-content">
                        <h3>{{ $producto->nombre }}</h3>
                        <div class="aa-price-block">
                          <span class="aa-product-view-price">{{ $producto->cost_ult1 }}€</span>
                          <p class="aa-product-avilability">Disponibilidad: <span>{{ $producto->stocks->descripcion }}</span></p>
                        </div>
                        <p>{{ $producto->caracteristicas }}</p>
                        <div class="aa-prod-quantity">
                            <select id="cantidad_producto" class="selectpicker" data-width="auto" title="Elige cantidad">
                                <option value="1" selected="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                          <p class="aa-prod-category">
                            Categoría: <a href="{{ route('mostrar_familia', $producto->familias->id) }}">{{ $producto->familias->familia }}</a>
                          </p>
                          <p class="aa-prod-category">
                            Marca: <a href="{{ route('mostrar_marca', $producto->marcas->id) }}">{{ $producto->marcas->marca }}</a>
                          </p>
                        </div>
                        <div class="aa-prod-view-bottom">
                            <a id="carro_producto" class="aa-add-to-cart-btn" href="javascript:void(0)">
                                <span class="fa fa-shopping-cart"></span>
                                <input type="hidden" value="{{ $producto->id }}">
                                Añadir al carrito
                            </a>
                            <a href="#description" class="aa-add-to-cart-btn">Ver Detalles</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="aa-product-details-bottom">
                  <ul class="nav nav-tabs" id="myTab2">
                    <li><a href="#description" data-toggle="tab">Detalles</a></li>
                    <li><a href="#review" data-toggle="tab">Comentarios</a></li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div class="tab-pane fade in active" id="description">
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                      <ul>
                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, culpa!</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor qui eius esse!</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, modi!</li>
                      </ul>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum, iusto earum voluptates autem esse molestiae ipsam, atque quam amet similique ducimus aliquid voluptate perferendis, distinctio!</p>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis ea, voluptas! Aliquam facere quas cumque rerum dolore impedit, dicta ducimus repellat dignissimos, fugiat, minima quaerat necessitatibus? Optio adipisci ab, obcaecati, porro unde accusantium facilis repudiandae.</p>
                    </div>
                    <div class="tab-pane fade " id="review">
                     <div class="aa-product-review-area">
                       <h4>2 Comentarios para NOMBRE_PRODUCTO</h4> 
                       <ul class="aa-review-nav">
                         <li>
                            <div class="media">
                              <div class="media-left">
                                <a href="#">
                                  <img class="media-object" src="/img/testimonial-img-3.jpg" alt="girl image">
                                </a>
                              </div>
                              <div class="media-body">
                                <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
                                <div class="aa-product-rating">
                                  <span class="fa fa-star"></span>
                                  <span class="fa fa-star"></span>
                                  <span class="fa fa-star"></span>
                                  <span class="fa fa-star"></span>
                                  <span class="fa fa-star-o"></span>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="media">
                              <div class="media-left">
                                <a href="#">
                                  <img class="media-object" src="/img/testimonial-img-3.jpg" alt="girl image">
                                </a>
                              </div>
                              <div class="media-body">
                                <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
                                <div class="aa-product-rating">
                                  <span class="fa fa-star"></span>
                                  <span class="fa fa-star"></span>
                                  <span class="fa fa-star"></span>
                                  <span class="fa fa-star"></span>
                                  <span class="fa fa-star-o"></span>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                              </div>
                            </div>
                          </li>
                       </ul>
                       <h4>Escribir un comentario</h4>
                       <div class="aa-your-rating">
                         <p>Tu valoración</p>
                         <a href="#"><span class="fa fa-star-o"></span></a>
                         <a href="#"><span class="fa fa-star-o"></span></a>
                         <a href="#"><span class="fa fa-star-o"></span></a>
                         <a href="#"><span class="fa fa-star-o"></span></a>
                         <a href="#"><span class="fa fa-star-o"></span></a>
                       </div>

                       <!-- review form -->
                       <form method="" action="" class="aa-review-form">
                          <div class="form-group">
                            <label for="message">Tu comentario</label>
                            <textarea class="form-control" rows="3" id="message"></textarea>
                          </div>
                          <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name_review" placeholder="Nombre">
                          </div>  
                          <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email_review" placeholder="example@gmail.com">
                          </div>
                          <button type="submit" class="btn btn-default aa-review-submit">Enviar</button>
                       </form>
                     </div>
                    </div>            
                  </div>
                </div>

                <!-- Related products -->
                <div class="aa-product-related-item">
                  <h3>Productos relacionados</h3>
                  <ul class="aa-product-catg aa-related-item-slider">
                      
                    @foreach($relacionados as $relacionado)
                        <!-- start single product item -->
                        <li>
                            <figure>
                                @forelse($relacionado->imagenes as $imagen)
                                    @if($relacionado->codigo == $imagen->codigo_articulo)
                                        <a id="{{ $relacionado->codigo }}" class="aa-product-img" href="{{ route('mostrar', $relacionado->codigo) }}">
                                            <img id="img_name" src="{{ $imagen->ruta_imagen }}" alt="{{ $relacionado->nombre }}">
                                        </a>
                                    @endif
                                    @empty
                                        <a id="{{ $relacionado->codigo }}" class="aa-product-img" href="{{ route('mostrar', $relacionado->codigo) }}">
                                            <img src="/storage/no_product.png" alt="{{ $relacionado->nombre }}">
                                        </a>
                                @endforelse
                                <a class="add_cart aa-add-card-btn" href="javascript:void(0)">
                                    <span class="fa fa-shopping-cart"></span>
                                    <input type="hidden" value="{{ $relacionado->id }}">
                                    Añadir al carrito
                                </a>
                                <figcaption>
                                    <h4 class="aa-product-title">
                                        <a href="{{ route('mostrar', $relacionado->codigo) }}">{{ $relacionado->nombre }}</a>
                                        <input id="family" type="hidden" value="{{ $relacionado->familias->familia }}">
                                        <input id="family_id" type="hidden" value="{{ $relacionado->familias->id }}">
                                    </h4>
                                    <span class="aa-product-price">{{ $relacionado->cost_ult1 }}€</span>
                                    <input id="description" type="hidden" value="{{ $relacionado->caracteristicas }}">
                                    <input id="dispon" type="hidden" value="{{ $relacionado->stocks->descripcion }}">
                                    <input id="marca" type="hidden" value="{{ $relacionado->marcas->marca }}">
                                    <input id="marca_id" type="hidden" value="{{ $relacionado->marcas->id }}">
                                </figcaption>
                            </figure>
                            <div class="aa-product-hvr-content">
                                <a class="add_wish" href="javascript:void(0)" title="Añadir a Deseos">
                                    <span class="fa fa-heart-o"></span>
                                    <input type="hidden" value="{{ $relacionado->id }}">
                                </a>
                                <a class="vistazo_modal" title="Vistazo rápido" data-id="{{ $relacionado->codigo }}" data-toggle="modal" data-target="#quick-view-modal">
                                    <span class="fa fa-search"></span>
                                </a>
                            </div>
                            <!-- product badge -->
                            @switch($relacionado->condicion)
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

                <!-- quick view modal -->
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
                                                        <a class="simpleLens-lens-image normal_quick" data-lens-image="">
                                                            <img class="simpleLens-big-image big_quick" src="">
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
                <!-- / quick view modal -->

                </div>  
              </div>
            </div>
          </div>
        </div>
    </section>
    <!----------------------------------------------------- / END PRODUCT INFO ----------------------------------------------------->

@push('scripts')
    <!-- Toastr notifications -->
    <script src="{{ asset('js/toastr.min.js') }}"></script>

    <script>
        $(function(){
            var user = '{{ Auth::guest() }}';
            
            var cantidad_actual = 1;
            
            $('#cantidad_producto').change(function() {
                cantidad_actual = this.value;
            });
            
            //Añadir producto principal a carrito
            $('#carro_producto').on('click', function(){
                if($(this).find('span').is('#remove_carrito_producto')){
                    var id_articulo = $(this).find('input').val();
                    $(this).find('span').removeAttr('class');
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
                        $(this).find('span').attr('id', 'remove_carrito_producto');
                        $(this).find('span').removeAttr('class');
                        $(this).find('span').prop('class', 'fa fa-shopping-cart');
                        $(this).prop('style', 'color:red');
                        $(this).find('span').prop('style', 'color: red');
                        $.get("/carrito/add_carrito?code="+id_articulo+"&units="+cantidad_actual).done(function(){
                            toastr.success('Producto añadido al carrito');
                        }).fail(function(){
                            toastr.warning('Ha sucedido un error');
                        });
                    }else{
                        toastr.warning('Regístrate para poder añadir productos al carrito');
                    }
                }
            });
            
            //Añadir producto relacionado a carrito
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
                        $.get("/carrito/add_carrito?code="+id_articulo+"&units="+cantidad_actual).done(function(){
                            toastr.success('Producto añadido al carrito');
                        }).fail(function(){
                            toastr.warning('Ha sucedido un error');
                        });
                    }else{
                        toastr.warning('Regístrate para poder añadir productos al carrito');
                    }
                }
            });
            
            //Añadir producto relacionado a lista de deseos
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