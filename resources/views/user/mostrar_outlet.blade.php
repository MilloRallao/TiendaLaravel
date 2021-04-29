@extends('layouts.app')

@section('title', 'Outlet')

@section('content')

  <!-------------------------------------------------------- START HEADER BANNER SECTION --------------------------------------------->
  <section id="aa-catg-head-banner">
        <img src="{{ $condicion[0]->ruta_imagen }}" alt="{{ $condicion[0]->condicion }}">
        <div class="aa-catg-head-banner-area">
            <div class="container">
                <div class="aa-catg-head-banner-content">
                    <h2>Outlet</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{ route('inicio') }}">Inicio</a></li>
                        <li class="active"><a href="{{ route('mostrar_condicion', 3) }}">Outlet</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
  <!---------------------------------------------------------- / END HEADER BANNER SECTION ------------------------------------------->

  <!--------------------------------------------------------- START CATEGORY --------------------------------------------------------->
  <section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-head">
              <div class="aa-product-catg-head-left">
                <form action="" class="aa-sort-form">
                  <label for="">Ordenar por</label>
                  <select name="">
                    <option value="1" selected="Default">Defecto</option>
                    <option value="2">Nombre</option>
                    <option value="3">Precio</option>
                    <option value="4">Fecha</option>
                  </select>
                </form>
                <form action="" class="aa-show-form">
                  <label for="">Mostrar</label>
                  <select name="">
                    <option value="1" selected="12">12</option>
                    <option value="2">24</option>
                    <option value="3">36</option>
                  </select>
                </form>
              </div>
              <div class="aa-product-catg-head-right">
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
              </div>
            </div>
            <div class="aa-product-catg-body">
              <ul class="aa-product-catg">
                  
                @foreach($outlet as $out)
                    <!-- start single product item -->
                    <li>
                      <figure>
                          @forelse($out->imagenes as $imagen)
                            @if($out->codigo == $imagen->codigo_articulo)
                                <a id="{{ $out->codigo }}" class="aa-product-img" href="{{ route('mostrar', $out->codigo) }}">
                                    <img id="img_name" src="{{ $imagen->ruta_imagen }}" alt="{{ $articulo->nombre }}">
                                </a>
                            @endif
                            @empty
                                <a id="{{ $out->codigo }}" class="aa-product-img" href="{{ route('mostrar', $out->codigo) }}">
                                    <img src="/storage/no_product.png" alt="{{ $out->nombre }}">
                                </a>
                          @endforelse
                            <a class="add_cart aa-add-card-btn" href="javascript:void(0)">
                                <span class="fa fa-shopping-cart"></span>
                                <input type="hidden" value="{{ $out->id }}">
                                Añadir al carrito
                            </a>
                            <figcaption>
                                <h4 class="aa-product-title">
                                    <a href="{{ route('mostrar', $out->codigo) }}">{{ $out->nombre }}</a>
                                    <input id="family" type="hidden" value="{{ $out->familias->familia }}">
                                    <input id="family_id" type="hidden" value="{{ $out->familias->id }}">
                                </h4>
                                <span class="aa-product-price">{{ $out->cost_ult1 }}€</span>
                                <input id="description" type="hidden" value="{{ $out->caracteristicas }}">
                                <input id="dispon" type="hidden" value="{{ $out->stocks->descripcion }}">
                                <input id="marca" type="hidden" value="{{ $out->marcas->marca }}">
                                <input id="marca_id" type="hidden" value="{{ $out->marcas->id }}">
                                <input id="product_id" type="hidden" value="{{ $out->id }}">
                            </figcaption>
                      </figure>                         
                      <div class="aa-product-hvr-content">
                        <a class="add_wish" href="javascript:void(0)" title="Añadir a Deseos">
                            <span class="fa fa-heart-o"></span>
                            <input type="hidden" value="{{ $out->id }}">
                        </a>
                        <a class="vistazo_modal" title="Vistazo rápido" data-id="{{ $out->codigo }}" data-toggle="modal" data-target="#quick-view-modal">
                            <span class="fa fa-search"></span>
                        </a>
                      </div>
                      <!-- product badge -->
                      <span class="aa-badge aa-sale" href="javascript:void(0)">OUTLET</span>
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
                <!-- / quick view modal -->
                
            </div>
              
            <div class="aa-product-catg-pagination">
              <nav>
                {{ $outlet->links() }}
              </nav>
            </div>
              
          </div>
        </div>
          
        <div class="filter jumbotron col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="filtro aa-sidebar">
            <!-- single sidebar -->
            <div style="margin-top: -30px;" class="aa-sidebar-widget">
                <h3>Marca</h3>
                <select class="selectpicker" data-live-search="true" title="Elige una marca">
                    @foreach($marcas as $marca)
                        <option>{{ $marca->marca}}</option>
                    @endforeach
                </select>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
                <h3>Categoría</h3>
                <select class="selectpicker" data-live-search="true" title="Elige una categoría">
                    @foreach($familias as $familia)
                        <option>{{ $familia->familia}}</option>
                    @endforeach
                </select>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
                <h3>Filtrar Por Precio</h3>              
                <!-- price range -->
                    <div slider id="slider-distance">
                        <div>
                            <div inverse-left style="width:70%;"></div>
                            <div inverse-right style="width:70%;"></div>
                            <div range style="left:50%;right:0%;"></div>
                            <span thumb style="left:50%;"></span>
                            <span thumb style="left:100%;"></span>
                            <div sign style="left:50%;">
                              <span id="value">50</span>
                            </div>
                            <div sign style="left:100%;">
                              <span id="value">100</span>
                            </div>
                        </div>
                        <input type="range" tabindex="0" value="50" max="100" min="0" step="1" oninput="
                        this.value=Math.min(this.value,this.parentNode.childNodes[5].value-1);
                        var value=(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.value)-(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.min);
                        var children = this.parentNode.childNodes[1].childNodes;
                        children[1].style.width=value+'%';
                        children[5].style.left=value+'%';
                        children[7].style.left=value+'%';children[11].style.left=value+'%';
                        children[11].childNodes[1].innerHTML=this.value;" />
                        <input type="range" tabindex="0" value="100" max="100" min="0" step="1" oninput="
                        this.value=Math.max(this.value,this.parentNode.childNodes[3].value-(-1));
                        var value=(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.value)-(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.min);
                        var children = this.parentNode.childNodes[1].childNodes;
                        children[3].style.width=(100-value)+'%';
                        children[5].style.right=(100-value)+'%';
                        children[9].style.left=value+'%';children[13].style.left=value+'%';
                        children[13].childNodes[1].innerHTML=this.value;" />
                    </div>
            </div>
          </aside>
        </div>
       
      </div>
    </div>
  </section>
  <!----------------------------------------------------------- / END CATEGORY ------------------------------------------------------>

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