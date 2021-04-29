<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>{{ config('app.name', 'Infornet') }} - @yield('title')</title>
    
    <!-- ### Fonts ### -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    
    <!-- ### Styles ### -->
    <!-- Font awesome -->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <!-- Bootstrap Select -->
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet">
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="{{ asset('css/jquery.smartmenus.bootstrap.css') }}" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.simpleLens.css') }}">
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/nouislider.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <!-- Theme color -->
    <link id="switcher" href="{{ asset('css/theme-color/azul-infornet.css') }}" rel="stylesheet">
    <!-- Top Slider CSS -->
    <link href="{{ asset('css/sequence-theme.modern-slide-in.css') }}" rel="stylesheet" media="all">
    <!-- Main style sheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
</head>
<body>
    
    <!-- wpf loader Two -->
    <div id="wpf-loader-two">
        <div class="wpf-loader-two-inner">
            <span>Cargando</span>
        </div>
    </div> 
    <!-- / wpf loader Two -->  
    
    <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
    <!-- END SCROLL TOP BUTTON -->
    
    <!-- Start header section -->
    <header id="aa-header">
        <!-- start header top  -->
        <div class="aa-header-top">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="aa-header-top-area">
                  <!-- start header top left -->
                  <div class="aa-header-top-left">
                    <!-- start language -->
                    <div class="aa-language">
                      <div class="dropdown">
                        <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                          <img src="/img/flag/es.png" alt="english flag">Español
                          <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                          <li><a href="#"><img src="/img/flag/english.jpg" alt="">English</a></li>
                        </ul>
                      </div>
                    </div>
                    <!-- / language -->

                    <!-- start currency -->
                    <div class="aa-currency">
                      <div class="dropdown">
                        <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                          <i class="fa fa-euro"></i>EURO
                        </a>
                      </div>
                    </div>
                    <!-- / currency -->
                    <!-- start cellphone -->
                    <div class="cellphone hidden-xs">
                      <p><span class="fa fa-phone"></span>928-80-69-85</p>
                    </div>
                    <!-- / cellphone -->
                  </div>
                  <!-- / header top left -->
                  <div class="aa-header-top-right">
                    <ul class="aa-head-top-nav-right">
                      <li class="hidden-xs"><a href="{{ url('deseos') }}">Lista deseos</a></li>
                      <li class="hidden-xs"><a href="{{ url('carrito') }}">Carrito</a></li>
                        @guest
                            <li><a href="" data-toggle="modal" data-target="#login-modal">Login</a></li>
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div style="min-width: 140px;" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a style="padding-right: 22%;padding-bottom: 1px;" class="dropdown-item" href="{{ url('') }}">Mi cuenta</a>
                                        <a style="border:none;" href="{{ url('') }}"><i class="fa fa-user fa-lg" aria-hidden="true"></i></a>
                                        <a style="padding-right: 13%;padding-bottom: 1px;" class="dropdown-item" href="{{ url('') }}">Mis pedidos</a>
                                        <a style="border:none;" href="{{ url('') }}"><i class="fa fa-truck fa-lg" aria-hidden="true"></i></a>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Cerrar Sesión') }} </a>
                                        <a style="border:none;" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-in fa-lg" aria-hidden="true"></i></a>
                                        
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                        @endguest
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- / header top  -->

        <!-- start header bottom  -->
        <div class="aa-header-bottom">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="aa-header-bottom-area">
                  <!-- logo  -->
                  <div class="aa-logo">
                    <!-- Text based logo -->
                    <!-- <a href="index.html">
                      <span class="fa fa-shopping-cart"></span>
                      <p>daily<strong>Shop</strong> <span>Your Shopping Partner</span></p>
                    </a> -->
                    <!-- img based logo -->
                    <a href="{{ route('inicio') }}"><img width="200vw" src="/img/infornet_logo.jpg" alt="infornet"></a>
                  </div>
                  <!-- / logo  -->
                   <!-- cart box -->
                  <div class="aa-cartbox">
                    <a class="aa-cart-link" href="{{ url('carrito') }}">
                      <span class="fa fa-shopping-basket"></span>
                      <span class="aa-cart-title">Carrito de compra</span>
                      <span class="aa-cart-notify">0</span>
                    </a>
                    <div class="aa-cartbox-summary">
                      <ul>
                          @isset($carritos)
                            @forelse($carritos as $carrito)
                                @foreach($carrito->articulo as $articulo)
                                    @isset($articulo->imagen)
                                        <li>
                                            <a class="aa-cartbox-img" href="{{ route('mostrar', $articulo->codigo) }}">
                                                <img src="{{ $articulo->imagenes[0]->ruta_imagen }}" alt="{{ $articulo->nombre }}">
                                            </a>
                                            <div class="aa-cartbox-info">
                                                <h4><a href="{{ route('mostrar', $articulo->codigo) }}">{{ $articulo->nombre }}</a></h4>
                                                <p>{{ $carrito->unidades }} x {{ $articulo->cost_ult1 }} €</p>
                                            </div>
                                            <a class="aa-remove-product remove_" href="javascript:void(0)">
                                                <span class="fa fa-times"></span>
                                            </a>
                                            <input value="{{ $carrito->id }}" type="hidden"/>
                                        </li>
                                    @endisset
                                    @empty($articulo->imagen)
                                        <li>
                                            <a class="aa-cartbox-img" href="{{ route('mostrar', $articulo->codigo) }}">
                                                <img src="/storage/no_product.png" alt="{{ $articulo->nombre }}">
                                            </a>
                                            <div class="aa-cartbox-info">
                                                <h4><a href="{{ route('mostrar', $articulo->codigo) }}">{{ $articulo->nombre }}</a></h4>
                                                <p>{{ $carrito->unidades }} x {{ $articulo->cost_ult1 }} €</p>
                                            </div>
                                            <a class="aa-remove-product remove_" href="javascript:void(0)">
                                                <span class="fa fa-times"></span>
                                            </a>
                                            <input value="{{ $carrito->id }}" type="hidden"/>
                                        </li>
                                    @endempty
                                @endforeach
                                <li>
                                  <span class="aa-cartbox-total-title">Total</span>
                                  <span class="aa-cartbox-total-price">{{ $carrito->precio_total }}€</span>
                                </li>
                                @empty
                                    <li>
                                        <div class="carrito_info_invitado">
                                            <h5>NO HAY PRODUCTOS EN EL CARRITO</h5>
                                        </div>
                                    </li>
                                    <li class="carrito_invitado">
                                        <span>
                                            <a class="registro_carrito" href="{{ route('register') }}">Regístrate</a>
                                        </span>
                                        <span style="grid-column: 2/3; grid-row: 1;">o</span>
                                        <span style="grid-column: 3/3; grid-row: 1;" class="login_carrito">
                                            <a class="sesion_carrito" href="{{ route('login') }}">Inicia sesión</a>
                                        </span>
                                        <span style="grid-row: 3/4; grid-column: 1/4;">para añadir productos al carrito</span>
                                    </li>
                            @endforelse
                          @endisset
                      </ul>
                    </div>
                  </div>
                  <!-- / cart box -->
                  <!-- search box -->
                  <div class="aa-search-box">
                    <form action="">
                      <input type="text" name="buscar" id="buscar" placeholder="Buscar... ">
                      <button type="submit"><span class="fa fa-search"></span></button>
                    </form>
                  </div>
                  <!-- / search box -->             
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- / header bottom  -->
  </header>
  <!-- / header section -->
    
  <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              <li><a class="individual" href="{{ route('inicio') }}">Inicio</a></li>
              <li><a href="#">Categorías <span class="caret"></span></a>
                <ul class="dropdown-menu">                
                  <li><a href="{{ route('mostrar_familia', 3) }}">Altavoces</a></li>
                  <li><a href="{{ route('mostrar_familia', 4) }}">Backup</a></li>
                  <li><a href="{{ route('mostrar_familia', 5) }}">Cable</a></li>
                  <li><a href="{{ route('mostrar_familia', 6) }}">Cámaras digitales</a></li>
                  <li><a href="{{ route('mostrar_familia', 7) }}">Carcasas</a></li>
                  <li><a href="{{ route('mostrar_familia', 12) }}">Controladoras</a></li>
                  <li><a href="{{ route('mostrar_familia', 14) }}">CPU</a></li>
                  <li><a href="{{ route('mostrar_familia', 18) }}">Escaner</a></li>
                  <li><a href="{{ route('mostrar_familia', 20) }}">HDD</a></li>
                  <li><a href="{{ route('mostrar_familia', 22) }}">Impresoras</a></li>
                  <li><a href="{{ route('mostrar_familia', 23) }}">Memorias</a></li>
                  <li><a href="{{ route('mostrar_familia', 25) }}">Micrófonos</a></li>
                  <li><a href="{{ route('mostrar_familia', 30) }}">Portátiles</a></li>
                  <li><a href="{{ route('mostrar_familia', 27) }}">Monitores</a></li>
                  <li><a href="{{ route('mostrar_familia', 29) }}">Placas Base</a></li>
                  <li><a href="{{ route('mostrar_familia', 31) }}">Ratones</a></li>
                  <li><a href="{{ route('mostrar_familia', 32) }}">Servidores</a></li>
                  <li><a href="{{ route('mostrar_familia', 36) }}">Tarjetas Sonido</a></li>
                  <li><a href="{{ route('mostrar_familia', 37) }}">Tarjetas Red</a></li>
                  <li><a href="{{ route('mostrar_familia', 38) }}">Teclados</a></li>
                  <li><a href="{{ route('mostrar_familia', 41) }}">TPV</a></li>
                  <li><a href="{{ route('mostrar_familia', 43) }}">Ventiladores</a></li>
                  <li><a href="{{ route('mostrar_familia', 46) }}">Capturadoras</a></li>
                  <li><a href="{{ route('mostrar_familia', 48) }}">Webcam</a></li>
                  <li><a href="{{ route('mostrar_familia', 56) }}">Router</a></li>
                  <li><a href="{{ route('mostrar_familia', 59) }}">Fuentes Alimentación</a></li>
                  <li><a href="{{ route('mostrar_familia', 62) }}">Pendrives</a></li>
                  <li><a href="{{ route('mostrar_familia', 63) }}">Tablets</a></li>
                  <li><a href="{{ route('mostrar_familia', 64) }}">Vigilancia</a></li>
                  <li><a href="{{ route('mostrar_familia', 66) }}">Proyectores</a></li>
                  <li><a href="{{ route('mostrar_familia', 93) }}">Consolas</a></li>
                  <li><a href="{{ route('mostrar_familia', 95) }}">e-Books</a></li>
                  <li><a href="#">Y más... <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="{{ route('mostrar_familia', 16) }}">Disqueteras</a></li>
                      <li><a href="{{ route('mostrar_familia', 17) }}">DVD</a></li>                                  
                      <li><a href="{{ route('mostrar_familia', 19) }}">FAX</a></li>                                  
                      <li><a href="{{ route('mostrar_familia', 21) }}">HUB</a></li>                                  
                      <li><a href="{{ route('mostrar_familia', 26) }}">Módem</a></li>                                  
                      <li><a href="{{ route('mostrar_familia', 33) }}">Software</a></li>                                  
                      <li><a href="{{ route('mostrar_familia', 34) }}">Switch</a></li>                                  
                      <li><a href="{{ route('mostrar_familia', 35) }}">Tabletas digitales</a></li>                                  
                      <li><a href="{{ route('mostrar_familia', 40) }}">Toner</a></li>                                  
                      <li><a href="{{ route('mostrar_familia', 44) }}">VGA</a></li>                                  
                      <li><a href="{{ route('mostrar_familia', 47) }}">MP3</a></li>                                  
                      <li><a href="{{ route('mostrar_familia', 49) }}">Joystick</a></li>                                  
                      <li><a href="{{ route('mostrar_familia', 51) }}">Sillas</a></li>                                  
                      <li><a href="{{ route('mostrar_familia', 58) }}">Jetdirect</a></li>                                  
                      <li><a href="{{ route('mostrar_familia', 85) }}">VoIP</a></li>                                  
                      <li><a href="{{ route('mostrar_familia', 68) }}">Plastificadora</a></li>                                  
                      <li><a href="{{ route('mostrar_familia', 70) }}">Walkie-Talkie</a></li>                                  
                      <li><a href="{{ route('mostrar_familia', 71) }}">Cámara IP</a></li>                                  
                      <li><a href="{{ route('mostrar_familia', 82) }}">Antenas</a></li>                                  
                      <li><a href="{{ route('mostrar_familia', 83) }}">Televisores</a></li>                                  
                      <li><a href="{{ route('mostrar_familia', 84) }}">Teléfonos</a></li>                                  
                      <li><a href="{{ route('mostrar_familia', 86) }}">Mando Distancia</a></li>                                  
                      <li><a href="{{ route('mostrar_familia', 88) }}">GPS</a></li>                                  
                      <li><a href="{{ route('mostrar_familia', 96) }}">Cargadores</a></li>                                  
                      <li><a href="{{ route('mostrar_familia', 99) }}">Destructoras</a></li>                                  
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a href="#">Marcas <span class="caret"></span></a>
                <ul class="dropdown-menu">  
                  <li><a href="{{ route('mostrar_marca', 39) }}">3M</a></li>                                                                
                  <li><a href="{{ route('mostrar_marca', 4) }}">Acer</a></li>              
                  <li><a href="{{ route('mostrar_marca', 82) }}">Apple</a></li>
                  <li><a href="{{ route('mostrar_marca', 5) }}">Asus</a></li>
                  <li><a href="{{ route('mostrar_marca', 51) }}">Huawei</a></li>
                  <li><a href="{{ route('mostrar_marca', 11) }}">HP</a></li>
                  <li><a href="{{ route('mostrar_marca', 62) }}">Kingston</a></li>                
                  <li><a href="{{ route('mostrar_marca', 66) }}">Lenovo</a></li>                
                  <li><a href="{{ route('mostrar_marca', 15) }}">Logitech</a></li>
                  <li><a href="{{ route('mostrar_marca', 18) }}">Microsoft</a></li>
                  <li><a href="{{ route('mostrar_marca', 24) }}">Samsung</a></li>
                  <li><a href="{{ route('mostrar_marca', 74) }}">Sandisk</a></li>
                  <li><a href="{{ route('mostrar_marca', 26) }}">Sony</a></li>
                  <li><a href="{{ route('mostrar_marca', 60) }}">Wacom</a></li>
                  <li><a href="{{ route('mostrar_marca', 49) }}">Xiaomi</a></li>
                  <li><a href="#">Y más... <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="{{ route('mostrar_marca', 40) }}">Asrock</a></li>
                      <li><a href="{{ route('mostrar_marca', 19) }}">BQ</a></li>
                      <li><a href="{{ route('mostrar_marca', 33) }}">Canon</a></li>
                      <li><a href="{{ route('mostrar_marca', 6) }}">Brother</a></li>
                      <li><a href="{{ route('mostrar_marca', 61) }}">D-Link</a></li>
                      <li><a href="{{ route('mostrar_marca', 64) }}">Gigabyte</a></li>
                      <li><a href="{{ route('mostrar_marca', 12) }}">Intel</a></li>
                      <li><a href="{{ route('mostrar_marca', 112) }}">JBL</a></li>
                      <li><a href="{{ route('mostrar_marca', 14) }}">LG</a></li>
                      <li><a href="{{ route('mostrar_marca', 42) }}">Lexar</a></li>
                      <li><a href="{{ route('mostrar_marca', 20) }}">Nikon</a></li>
                      <li><a href="{{ route('mostrar_marca', 29) }}">Toshiba</a></li>
                      <li><a href="{{ route('mostrar_marca', 57) }}">Trust</a></li>
                      <li><a href="{{ route('mostrar_marca', 98) }}">Woxter</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a class="individual" href="#">Servicio Técnico</a></li>
              <li><a class="individual" href="#">Sobre Nosotros</a></li>
              <li><a class="individual" href="{{ route('contacto') }}">Contacto</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>
  <!-- / menu -->
    
    @yield('content')

    <!-- footer -->
    <footer id="aa-footer">
        <!-- footer bottom -->
        <div class="aa-footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aa-footer-top-area">
                            <div class="row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="aa-footer-widget">
                                        <h3>Información</h3>
                                        <ul class="aa-footer-nav">
                                            <li><span class="fa fa-chevron-circle-right "></span><a href="{{ route('inicio') }}"> Inicio</a></li>
                                            <li><span class="fa fa-chevron-circle-right "></span><a href="#"> Nuestros Servicios</a></li>
                                            <li><span class="fa fa-chevron-circle-right "></span><a href="#"> Nuestros Productos</a></li>
                                            <li><span class="fa fa-chevron-circle-right "></span><a href="#"> Sobre nosotros</a></li>
                                            <li><span class="fa fa-chevron-circle-right "></span><a href="#"> Contacto</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="aa-footer-widget">
                                        <div class="aa-footer-widget">
                                            <h3>Soporte</h3>
                                            <ul class="aa-footer-nav">
                                                <li><span class="fa fa-chevron-circle-right "></span><a href="#"> Online</a></li>
                                                <li><span class="fa fa-chevron-circle-right "></span><a href="#"> Solicitud</a></li>
                                                <li><span class="fa fa-chevron-circle-right "></span><a href="#"> Educación</a></li>
                                                <li><span class="fa fa-chevron-circle-right "></span><a href="#"> Descuentos</a></li>
                                                <li><span class="fa fa-chevron-circle-right "></span><a href="#"> Ofertas</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="aa-footer-widget">
                                        <div class="aa-footer-widget">
                                            <h3>Links Útiles</h3>
                                            <ul class="aa-footer-nav">
                                                <li><span class="fa fa-chevron-circle-right "></span><a href="#"> Site Map</a></li>
                                                <li><span class="fa fa-chevron-circle-right "></span><a href="#"> FAQ</a></li>
                                                <li><span class="fa fa-chevron-circle-right "></span><a href="#"> Cookies</a></li>
                                                <li><span class="fa fa-chevron-circle-right "></span><a href="#"> Distribuidores</a></li>
                                                <li><span class="fa fa-chevron-circle-right "></span><a href="#"> ToS</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="aa-footer-widget">
                                        <div class="aa-footer-widget">
                                            <h3>Contáctanos</h3>
                                            <address>
                                                <p><span class="fa fa-map-marker"></span>C/ Alonso Cano, 15, Arrecife 35500</p>
                                                <p><span class="fa fa-globe"></span>Lanzarote, Islas Canarias, ESPAÑA</p>
                                                <p><span class="fa fa-phone"></span>+34 928 80 69 85</p>
                                                <p><span class="fa fa-envelope"></span>info@infornetonline.com</p>
                                            </address>
                                            <div class="aa-footer-social">
                                                <a href="http://fb.com/infornetcanary"><span class="fa fa-facebook"></span></a>
                                                <a href="http://twitter.com/infornetcanary"><span class="fa fa-twitter"></span></a>
                                                <a href="https://www.linkedin.com/company/infornet/"><span class="fa fa-linkedin"></span></a>
                                                <a href="https://www.youtube.com/channel/UCidqfPESg_IyGNaOmYmNfFw"><span class="fa fa-youtube"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom -->
        <div class="aa-footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aa-footer-bottom-area">
                            <p>Copyright &copy; {{ date('Y') }} <a href="{{ route('inicio') }}">{{ config('app.name') }}</a> Todos los derechos reservados.</p>
                            <div class="aa-footer-payment">
                                <span class="fa fa-cc-mastercard"></span>
                                <span class="fa fa-cc-visa"></span>
                                <span class="fa fa-paypal"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- / footer -->

    <!-- Login Modal -->
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="text-center">Inicia sesión o Regístrate</h4>
                    <form class="aa-login-form" method="POST" action="{{ route('login') }}">
                        @csrf

                            <label for="email">{{ __('E-Mail') }}<span>*</span></label>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="email" required>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif

                            <label for="password">{{ __('Contraseña') }}<span>*</span></label>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="contraseña" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif

                        <div class="form-group row mb-0">
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            <div class="form-check">
                                <label style="margin-top:10px;" class="btn btn-warning" for="remember">
                                    {{ __('Recordarme') }}<input class="badgebox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}><span class="badge">&check;</span>
                                </label>
                            </div>
                        </div>
                        
                        @if (Route::has('password.request'))
                            <a class="aa-lost-password" href="{{ route('password.request') }}">
                                {{ __('¿Olvidaste tu contraseña?') }}
                            </a>
                        @endif
                        
                        <div class="aa-register-now">
                            ¿No tienes cuenta?<a href="{{ route('register') }}">¡Regístrate ahora!</a>
                        </div>
                        
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    
    <!-- ### Scripts ### -->
    <!-- jQuery library and Jquery Mobile (Selector) -->
    <script src="{{ asset('js/jquery-1.11.min.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- SmartMenus jQuery plugin -->
    <script type="text/javascript" src="{{ asset('js/jquery.smartmenus.js') }}"></script>
    <!-- SmartMenus jQuery Bootstrap Addon -->
    <script type="text/javascript" src="{{ asset('js/jquery.smartmenus.bootstrap.js') }}"></script>
    <!-- Bootstrap Select -->
    <script type="text/javascript" src="{{ asset('js/bootstrap-select.min.js') }}"></script>
     <!-- Product view slider -->
    <script type="text/javascript" src="{{ asset('js/jquery.simpleGallery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.simpleLens.js') }}"></script>
    <!-- slick slider -->
    <script type="text/javascript" src="{{ asset('js/slick.js') }}"></script>
    <!-- Price picker slider -->
    <script type="text/javascript" src="{{ asset('js/nouislider.js') }}"></script>
    <!-- Custom js -->
    <script src="{{ asset('js/custom.js') }}"></script>
    
    @stack('scripts')
    
    @include('sweetalert::alert')
    
    <script>
        $(function() {
            var user = '{{ Auth::guest() }}';
            
            //Mostrar cantidad de artículos carrito
            if(!user){
                var cantidad_cart = '{{ count($carritos) }}';
                $('.aa-cart-notify').html(cantidad_cart);
            }
            
            //Borrar producto de carrito
            $('.remove_').on('click', function(){
                var id_carrito = $(this).next().val();
                console.log(id_carrito);
                var parent = $(this).parent();
                $.get("/carrito/delete_carrito?code="+id_carrito).done(function(){
                    toastr.info('Producto borrado del carrito');
                    parent.fadeOut('slow', function(){
                        parent.remove();
                    });
                    $('.aa-cart-notify').html(cantidad_cart-1);
                }).fail(function(){
                    toastr.warning('Ha sucedido un error');
                });
            });
            
            if ($('.filtro').length) {
                var el = $('.filtro');
                var stickyTop = $('.filtro').offset().top;
                var stickyHeight = $('.filtro').height();

                $(window).scroll(function(){
                    var limit = $('.stop_filter').lenght;
                    if(limit){
                        var limit = $('.stop_filter').offset().top - stickyHeight - 150;
                    }
                    var windowTop = $(window).scrollTop();
                    if (limit < windowTop) {
                        var diff = limit - windowTop;
                        el.css({
                            top: diff
                        });
                    }
                });
            }
        });
    </script>
    
</body>
    
</html>
