@extends('layouts.app')

@section('title', 'Inicio')

@section('content')

    <!-------------------------------------------------------------- START SLIDER ------------------------------------------------------->
    <section id="aa-slider">
        <div class="aa-slider-area">
            <div id="sequence" class="seq">
                <div class="seq-screen">
                    <ul class="seq-canvas">
                        <!-- single slide item -->
                        <li>
                            <div class="seq-model">
                                <img data-seq src="img/slider/1.jpg" alt="Men slide img" />
                            </div>
                            <div class="seq-title">
                                <span data-seq>Save Up to 75% Off</span>
                                <h2 data-seq>Men Collection</h2>
                                <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
                                <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">Comprar ahora</a>
                            </div>
                        </li>
                        <!-- single slide item -->
                        <li>
                            <div class="seq-model">
                                <img data-seq src="img/slider/2.jpg" alt="Wristwatch slide img" />
                            </div>
                            <div class="seq-title">
                                <span data-seq>Save Up to 40% Off</span>
                                <h2 data-seq>Wristwatch Collection</h2>
                                <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
                                <a data-seq href="" class="aa-shop-now-btn aa-secondary-btn">Comprar ahora</a>
                            </div>
                        </li>
                        <!-- single slide item -->
                        <li>
                            <div class="seq-model">
                                <img data-seq src="img/slider/3.jpg" alt="Women Jeans slide img" />
                            </div>
                            <div class="seq-title">
                                <span data-seq>Save Up to 75% Off</span>
                                <h2 data-seq>Jeans Collection</h2>
                                <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
                                <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">Comprar ahora</a>
                            </div>
                        </li>
                        <!-- single slide item -->
                        <li>
                            <div class="seq-model">
                                <img data-seq src="img/slider/4.jpg" alt="Shoes slide img" />
                            </div>
                            <div class="seq-title">
                                <span data-seq>Save Up to 75% Off</span>
                                <h2 data-seq>Exclusive Shoes</h2>
                                <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
                                <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">Comprar ahora</a>
                            </div>
                        </li>
                        <!-- single slide item -->
                        <li>
                            <div class="seq-model">
                                <img data-seq src="img/slider/5.jpg" alt="Male Female slide img" />
                            </div>
                            <div class="seq-title">
                                <span data-seq>Save Up to 50% Off</span>
                                <h2 data-seq>Best Collection</h2>
                                <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
                                <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">Comprar ahora</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- slider navigation btn -->
                <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
                    <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
                    <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
                </fieldset>
            </div>
        </div>
    </section>
    <!---------------------------------------------------------------- / END SLIDER --------------------------------------------------------->
    
<section id="aa-product-category">
    <div class="container">
        
        <div class="row">
            
            <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-1">  
                <!--------------------------------------------------- START Novedades SECTION ----------------------------------------------->
                <section id="aa-popular-category">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="aa-popular-category-area">
                                    <!-- start product navigation -->
                                    <ul class="nav nav-tabs aa-products-tab">
                                        <li class="active"><a href="javascript:void(0)">Novedades</a></li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <!-- Start Novedades category -->
                                        <div class="tab-pane fade in active" id="popular">
                                            <ul class="aa-product-catg aa-popular-slider">

                                                @foreach($novedades as $novedad)
                                                    <!-- start single product item -->
                                                    <li>
                                                        <figure>
                                                            @forelse($novedad->imagenes as $imagen)
                                                                @if($novedad->codigo == $imagen->codigo_articulo)
                                                                    <a id="{{ $novedad->codigo }}" class="aa-product-img" href="{{ route('mostrar', $novedad->codigo) }}">
                                                                        <img id="img_name" src="{{ $imagen->ruta_imagen }}" alt="{{ $novedad->nombre }}">
                                                                    </a>
                                                                @endif
                                                                @empty
                                                                    <a id="{{ $novedad->codigo }}" class="aa-product-img" href="{{ route('mostrar', $novedad->codigo) }}">
                                                                        <img src="/storage/no_product.png" alt="{{ $novedad->nombre }}">
                                                                    </a>
                                                            @endforelse
                                                            <a class="add_cart aa-add-card-btn" href="javascript:void(0)">
                                                                <span class="fa fa-shopping-cart"></span>
                                                                <input type="hidden" value="{{ $novedad->id }}">
                                                                Añadir al carrito
                                                            </a>
                                                            <figcaption>
                                                                <h4 class="aa-product-title">
                                                                    <a href="{{ route('mostrar', $novedad->codigo) }}">{{ $novedad->nombre }}</a>
                                                                    <input id="family" type="hidden" value="{{ $novedad->familias->familia }}">
                                                                    <input id="family_id" type="hidden" value="{{ $novedad->familias->id }}">
                                                                </h4>
                                                                <span class="aa-product-price">{{ $novedad->cost_ult1 }}€</span>
                                                                    <input id="description" type="hidden" value="{{ $novedad->caracteristicas }}">
                                                                    <input id="dispon" type="hidden" value="{{ $novedad->stocks->descripcion }}">
                                                                    <input id="marca" type="hidden" value="{{ $novedad->marcas->marca }}">
                                                                    <input id="marca_id" type="hidden" value="{{ $novedad->marcas->id }}">
                                                            </figcaption>
                                                        </figure>
                                                        <div class="aa-product-hvr-content">
                                                            <a class="add_wish" href="javascript:void(0)" title="Añadir a Deseos">
                                                                <span class="fa fa-heart-o"></span>
                                                                <input type="hidden" value="{{ $novedad->id }}">
                                                            </a>
                                                            <a class="vistazo_modal" title="Vistazo rápido" data-id="{{ $novedad->codigo }}" data-toggle="modal" data-target="#quick-view-modal">
                                                                <span class="fa fa-search"></span>
                                                            </a>
                                                        </div>
                                                        <!-- product badge -->
                                                        <span class="aa-badge aa-hot" href="javascript:void(0)">NOVEDAD</span>
                                                    </li>
                                                @endforeach

                                            </ul>
                                            <a class="aa-browse-btn" href="{{ route('mostrar_condicion', 2) }}">Ver todas las novedades <span class="fa fa-long-arrow-right"></span></a>
                                        </div>
                                        <!-- / Novedades category -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!---------------------------------------------------- / END Novedades SECTION ---------------------------------------------->
                
                <!------------------------------------------------------ START Ofertas SECTION ---------------------------------------------->
                <section id="aa-popular-category">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="aa-popular-category-area">
                                        <!-- start prduct navigation -->
                                        <ul class="nav nav-tabs aa-products-tab">
                                            <li class="active"><a href="javascript:void(0)">Ofertas</a></li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <!-- start Ofertas category -->
                                            <div class="tab-pane fade in active" id="featured">
                                                <ul class="aa-product-catg aa-featured-slider">

                                                    @foreach($ofertas as $oferta)
                                                        <!-- start single product item -->
                                                        <li>
                                                            <figure>
                                                                @forelse($oferta->imagenes as $imagen)
                                                                    @if($oferta->codigo == $imagen->codigo_articulo)
                                                                        <a id="{{ $oferta->codigo }}" class="aa-product-img" href="{{ route('mostrar', $oferta->codigo) }}">
                                                                            <img id="img_name" src="{{ $imagen->ruta_imagen }}" alt="{{ $oferta->nombre }}">
                                                                        </a>
                                                                    @endif
                                                                    @empty
                                                                        <a id="{{ $oferta->codigo }}" class="aa-product-img" href="{{ route('mostrar', $oferta->codigo) }}">
                                                                            <img src="/storage/no_product.png" alt="{{ $oferta->nombre }}">
                                                                        </a>
                                                                 @endforelse
                                                                    <a class="add_cart aa-add-card-btn" href="javascript:void(0)">
                                                                        <span class="fa fa-shopping-cart"></span>
                                                                        <input type="hidden" value="{{ $oferta->id }}">
                                                                        Añadir al carrito
                                                                    </a>
                                                                    <figcaption>
                                                                        <h4 class="aa-product-title">
                                                                            <a href="{{ route('mostrar', $oferta->codigo) }}">{{ $oferta->nombre }}</a>
                                                                            <input id="family" type="hidden" value="{{ $oferta->familias->familia }}">
                                                                            <input id="family_id" type="hidden" value="{{ $oferta->familias->id }}">
                                                                        </h4>
                                                                        <span class="aa-product-price">{{ $oferta->cost_ult1 }}€</span>
                                                                        <input id="description" type="hidden" value="{{ $oferta->caracteristicas }}">
                                                                        <input id="dispon" type="hidden" value="{{ $oferta->stocks->descripcion }}">
                                                                        <input id="marca" type="hidden" value="{{ $oferta->marcas->marca }}">
                                                                        <input id="marca_id" type="hidden" value="{{ $oferta->marcas->id }}">
                                                                        <span class="aa-product-price">
                                                                            <del>$65.50</del>
                                                                        </span>
                                                                    </figcaption>
                                                            </figure>
                                                            <div class="aa-product-hvr-content">
                                                                <a class="add_wish" href="javascript:void(0)" title="Añadir a Deseos">
                                                                    <span class="fa fa-heart-o"></span>
                                                                    <input type="hidden" value="{{ $oferta->id }}">
                                                                </a>
                                                                <a class="vistazo_modal" title="Vistazo rápido" data-id="{{ $oferta->codigo }}" data-toggle="modal" data-target="#quick-view-modal">
                                                                    <span class="fa fa-search"></span>
                                                                </a>
                                                            </div>
                                                            <!-- product badge -->
                                                            <span class="aa-badge aa-sale" href="javascript:void(0)">OFERTA</span>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                                <a class="aa-browse-btn" href="{{ route('mostrar_condicion', 1) }}">Ver todas las ofertas <span class="fa fa-long-arrow-right"></span></a>
                                            </div>
                                            <!-- / Ofertas category -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!----------------------------------------------------- / END Ofertas SECTION ----------------------------------------------->
                
                <!------------------------------------------------------ START Outlet SECTION ----------------------------------------------->
                <section id="aa-popular-category">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="aa-popular-category-area">
                                        <!-- start prduct navigation -->
                                        <ul class="nav nav-tabs aa-products-tab">
                                            <li class="active"><a href="javascript:void(0)">Outlet</a></li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <!-- start Outlet category -->
                                            <div class="tab-pane fade in active" id="latest">
                                                <ul class="aa-product-catg aa-latest-slider">

                                                    @foreach($outlets as $outlet)
                                                        <!-- start single product item -->
                                                        <li>
                                                            <figure>
                                                                @forelse($outlet->imagenes as $imagen)
                                                                    @if($outlet->codigo == $imagen->codigo_articulo)
                                                                        <a id="{{ $outlet->codigo }}" class="aa-product-img" href="{{ route('mostrar', $outlet->codigo) }}">
                                                                            <img id="img_name" src="{{ $outlet->ruta_imagen }}" alt="{{ $outlet->nombre }}">
                                                                        </a>
                                                                    @endif
                                                                    @empty
                                                                        <a id="{{ $outlet->codigo }}" class="aa-product-img" href="{{ route('mostrar', $outlet->codigo) }}">
                                                                            <img src="/storage/no_product.png" alt="{{ $outlet->nombre }}">
                                                                        </a>
                                                                @endforelse
                                                                <a class="add_cart aa-add-card-btn" href="javascript:void(0)">
                                                                    <span class="fa fa-shopping-cart"></span>
                                                                    <input type="hidden" value="{{ $outlet->id }}">
                                                                    Añadir al carrito
                                                                </a>
                                                                <figcaption>
                                                                    <h4 class="aa-product-title">
                                                                        <a href="{{ route('mostrar', $outlet->codigo) }}">{{ $outlet->nombre }}</a>
                                                                        <input id="family" type="hidden" value="{{ $outlet->familias->familia }}">
                                                                        <input id="family_id" type="hidden" value="{{ $outlet->familias->id }}">
                                                                    </h4>
                                                                    <span class="aa-product-price">{{ $outlet->cost_ult1 }}€</span>
                                                                    <input id="description" type="hidden" value="{{ $outlet->caracteristicas }}">
                                                                    <input id="dispon" type="hidden" value="{{ $outlet->stocks->descripcion }}">
                                                                    <input id="marca" type="hidden" value="{{ $outlet->marcas->marca }}">
                                                                    <input id="marca_id" type="hidden" value="{{ $outlet->marcas->id }}">
                                                                </figcaption>
                                                            </figure>
                                                            <div class="aa-product-hvr-content">
                                                                <a class="add_wish" href="javascript:void(0)" title="Añadir a Deseos">
                                                                    <span class="fa fa-heart-o"></span>
                                                                    <input type="hidden" value="{{ $outlet->id }}">
                                                                </a>
                                                                <a class="vistazo_modal" title="Vistazo rápido" data-id="{{ $outlet->codigo }}" data-toggle="modal" data-target="#quick-view-modal">
                                                                    <span class="fa fa-search"></span>
                                                                </a>
                                                            </div>
                                                            <!-- product badge -->
                                                            <span class="aa-badge aa-sold-out" href="javascript:void(0)">OUTLET</span>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                                <a class="aa-browse-btn" href="{{ route('mostrar_condicion', 3) }}">Ver todos los productos outlet <span class="fa fa-long-arrow-right"></span></a>
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
                </section>
                <!------------------------------------------------------ / END Outlet SECTION ----------------------------------------------->
            </div>
            
            <!---------------------------------------------------------- START FILTER SIDEBAR ----------------------------------------------->
            <div class="filter jumbotron col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
                <aside class="filtro aa-sidebar">
                    <form id="form_filter" method="POST" action="">
                        <!-- single sidebar -->
                        <div style="margin-top: -30px;" class="aa-sidebar-widget">
                            <h3>Marca</h3>
                            <select id="select_marca" class="selectpicker" data-live-search="true" title="Elige una marca">
                                @foreach($marcas as $marca)
                                    <option>{{ $marca->marca}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- single sidebar -->
                        <div class="aa-sidebar-widget">
                            <h3>Categoría</h3>
                            <select id="select_familia" class="selectpicker" data-live-search="true" title="Elige una categoría">
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
                                <input id="price_min" type="range" tabindex="0" value="50" max="100" min="0" step="1" oninput="
                                this.value=Math.min(this.value,this.parentNode.childNodes[5].value-1);
                                var value=(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.value)-(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.min);
                                var children = this.parentNode.childNodes[1].childNodes;
                                children[1].style.width=value+'%';
                                children[5].style.left=value+'%';
                                children[7].style.left=value+'%';children[11].style.left=value+'%';
                                children[11].childNodes[1].innerHTML=this.value;" />
                                <input id="price_max" type="range" tabindex="0" value="100" max="100" min="0" step="1" oninput="
                                this.value=Math.max(this.value,this.parentNode.childNodes[3].value-(-1));
                                var value=(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.value)-(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.min);
                                var children = this.parentNode.childNodes[1].childNodes;
                                children[3].style.width=(100-value)+'%';
                                children[5].style.right=(100-value)+'%';
                                children[9].style.left=value+'%';children[13].style.left=value+'%';
                                children[13].childNodes[1].innerHTML=this.value;" />
                            </div>
                        </div>
                        <!-- single sidebar -->
                        <div class="aa-sidebar-widget">
                            <a style="border-radius:5px; margin:20px 0 0 40px;" class="aa-browse-btn filtro_buscar" href="javascript:void(0)">Buscar</a>
                        </div>
                    </form>
                </aside>
            </div>
            <!-------------------------------------------------------- / END FILTER SIDEBAR ------------------------------------------------->
        </div>
        
    </div>
</section>

    <!------------------------------------------------------------- START Support SECTION --------------------------------------------------->
    <section class="stop_filter" id="aa-support">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-support-area">
                        <!-- single support -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="aa-support-single">
                                <span class="fa fa-truck"></span>
                                <h4>Envíos a toda Canarias</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</p>
                            </div>
                        </div>
                        <!-- single support -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="aa-support-single">
                                <span class="fa fa-check-square-o"></span>
                                <h4>Garantía</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</p>
                            </div>
                        </div>
                        <!-- single support -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="aa-support-single">
                                <span class="fa fa-wrench"></span>
                                <h4>Soporte Profesional</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!----------------------------------------------------------- / END Support SECTION ------------------------------------------------->

    <!------------------------------------------------------ START Brands SECTION ------------------------------------------------------->
    <section id="aa-client-brand">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-client-brand-area">
                        <ul class="aa-client-brand-slider">
                            <li><a href="{{ route('mostrar_marca', 4) }}"><img src="img/marcas/acer2.jpg" alt="Acer"></a></li>
                            <li><a href="{{ route('mostrar_marca', 82) }}"><img src="img/marcas/apple.jpg" alt="Apple"></a></li>
                            <li><a href="{{ route('mostrar_marca', 5) }}"><img src="img/marcas/asus.jpg" alt="Asus"></a></li>
                            <li><a href=""><img src="img/marcas/audio.jpg" alt="Audio"></a></li>
                            <li><a href=""><img src="img/marcas/autodesk.jpg" alt="Autodesk"></a></li>
                            <li><a href="{{ route('mostrar_marca', 6) }}"><img src="img/marcas/brother.jpg" alt="Brother"></a></li>
                            <li><a href="{{ route('mostrar_marca', 77) }}"><img src="img/marcas/devolo.jpg" alt="Devolo"></a></li>
                            <li><a href="{{ route('mostrar_marca', 61) }}"><img src="img/marcas/dlink.jpg" alt="D-link"></a></li>
                            <li><a href="{{ route('mostrar_marca', 75) }}"><img src="img/marcas/energy.jpg" alt="Energy"></a></li>
                            <li><a href=""><img src="img/marcas/ESET.jpg" alt="Eset"></a></li>
                            <li><a href="{{ route('mostrar_marca', 11) }}"><img src="img/marcas/hp.jpg" alt="HP"></a></li>
                            <li><a href="{{ route('mostrar_marca', 112) }}"><img src="img/marcas/jbl.jpg" alt="JBL"></a></li>
                            <li><a href="{{ route('mostrar_marca', 71) }}"><img src="img/marcas/kaspersky.jpg" alt="Kaspersky"></a></li>
                            <li><a href="{{ route('mostrar_marca', 41) }}"><img src="img/marcas/kyocera.jpg" alt="Kyocera"></a></li>
                            <li><a href="{{ route('mostrar_marca', 66) }}"><img src="img/marcas/lenovo.jpg" alt="Lenovo"></a></li>
                            <li><a href="{{ route('mostrar_marca', 15) }}"><img src="img/marcas/logitech.jpg" alt="Logitech"></a></li>
                            <li><a href="{{ route('mostrar_marca', 16) }}"><img src="img/marcas/MCAFEE.jpg" alt="McAfee"></a></li>
                            <li><a href="{{ route('mostrar_marca', 18) }}"><img src="img/marcas/microsoft.jpg" alt="Microsoft"></a></li>
                            <li><a href="{{ route('mostrar_marca', 58) }}"><img src="img/marcas/norton.jpg" alt="Norton"></a></li>
                            <li><a href="{{ route('mostrar_marca', 31) }}"><img src="img/marcas/PANDA.jpg" alt="Panda"></a></li>
                            <li><a href="{{ route('mostrar_marca', 36) }}"><img src="img/marcas/plantronics.jpg" alt="Plantronics"></a></li>
                            <li><a href="{{ route('mostrar_marca', 27) }}"><img src="img/marcas/SAGE.jpg" alt="SAGE"></a></li>
                            <li><a href="{{ route('mostrar_marca', 63) }}"><img src="img/marcas/targus.jpg" alt="Targus"></a></li>
                            <li><a href="{{ route('mostrar_marca', 92) }}"><img src="img/marcas/tplink.jpg" alt="TP-Link"></a></li>
                            <li><a href="{{ route('mostrar_marca', 60) }}"><img src="img/marcas/wacom.jpg" alt="Wacom"></a></li>
                            <li><a href="{{ route('mostrar_marca', 106) }}"><img src="img/marcas/wolder.jpg" alt="Wolder"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-------------------------------------------------------- / END Brands SECTION ----------------------------------------------------->

    <!-------------------------------------------------------- START Subscribe SECTION -------------------------------------------------->
    <section id="aa-subscribe">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-subscribe-area">
                        <h3>Suscríbete a nuestro boletín </h3>
                        <p>¡Recibe las nuevas ofertas, descuentos y promociones especiales antes que nadie!</p>
                        <form action="" class="aa-subscribe-form">
                            <input type="email" name="email_news" id="email_news" placeholder="Ingresa tu Email">
                            <input type="submit" value="Suscribir">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!----------------------------------------------------- / END Subscribe SECTION ----------------------------------------------------->

@push('scripts')
    <!-- To Slider JS -->
    <script src="{{ asset('js/sequence.js') }}"></script>
    <script src="{{ asset('js/sequence-theme.modern-slide-in.js') }}"></script>
    <!-- Toastr notifications -->
    <script src="{{ asset('js/toastr.min.js') }}"></script>

    <script>
        $(function(){
            var user = '{{ Auth::guest() }}';
            var cantidad_cart = '{{ count($carritos) }}';
            
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
            
            //Buscar filtro
            $('.filtro_buscar').on('click', function(){
                var marca = $('#select_marca').val();
                var familia = $('#select_familia').val();
                var precio_min = $('#price_min').val();
                var precio_max = $('#price_max').val();
                if(marca == '' && familia == ''){
                   toastr.warning('Selecciona al menos una marca o categoría');
                }else{
                    if(marca == ''){
                       $('.filtro_buscar').attr('href', '/articulos/'+familia+'/'+precio_min+'/'+precio_max);
                        alert('1');
                    }else{
                        if(familia == ''){
                            $('.filtro_buscar').attr('href', '/articulos/'+marca+'/'+precio_min+'/'+precio_max);
                            alert('2');
                        }else{
                            $('.filtro_buscar').attr('href', '/articulos/'+marca+'/'+familia+'/'+precio_min+'/'+precio_max);
                            alert('3');
                        }
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
                $('#carro').on('click', function(e){
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