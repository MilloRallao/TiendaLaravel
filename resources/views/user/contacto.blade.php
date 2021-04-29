@extends('layouts.app')

@section('title', 'Contacto')

@section('content')

  <!-------------------------------------------------------- START HEADER BANNER SECTION --------------------------------------------->
    <section id="aa-catg-head-banner">
        <img src="/storage/categoria.jpg" alt="Infornet_contacto">
        <div class="aa-catg-head-banner-area">
            <div class="container">
                <div class="aa-catg-head-banner-content">
                    <h2>Contacto</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{ route('inicio') }}">Inicio</a></li>
                        <li class="active"><a href="{{ route('contacto') }}">Contacto</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
  <!---------------------------------------------------------- / END HEADER BANNER SECTION ------------------------------------------->

  <!------------------------------------------------------- START CONTACT SECTION ---------------------------------------------------->
    <section id="aa-contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-contact-area">
                        <div class="aa-contact-top">
                            <h2>Estamos para ayudarte</h2><br>
                            <h5>Usa el mapa para encontrar nuestra ubicación y ponte en contacto con nosotros si tienes alguna duda.</h5>
                        </div>
                        <!-- contact map -->
                        <div class="aa-contact-map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3490.788242291597!2d-13.555552685432552!3d28.964004675753024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xc46277990c9cd6d%3A0x45757d871eb0fb1b!2sINFORNET!5e0!3m2!1ses!2ses!4v1559816752036!5m2!1ses!2ses" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                            <hr>
                        </div>
                        <!-- Contact address -->
                        <div class="aa-contact-address">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="aa-contact-address-left">
                                        <form class="comments-form contact-form" action="">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">                        
                                                        <input type="text" placeholder="Nombre" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">                        
                                                        <input type="email" placeholder="Email" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">                        
                                                        <input type="text" placeholder="Razón" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">                        
                                                        <input type="text" placeholder="Empresa" class="form-control">
                                                    </div>
                                                </div>
                                            </div>                  
                                            <div class="form-group">                        
                                                <textarea class="form-control" rows="3" placeholder="Mensaje"></textarea>
                                            </div>
                                            <button class="aa-secondary-btn">Enviar</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="aa-contact-address-right">
                                        <address>
                                             <h4>Infornet Online</h4>
                                             <p><span class="fa fa-map-marker"></span>C/ Alonso Cano, 15, Arrecife 35500</p>
                                             <p><span class="fa fa-globe"></span>Lanzarote, Islas Canarias, ESPAÑA</p>
                                             <p><span class="fa fa-phone"></span>+34 928 80 69 85</p>
                                             <p><span class="fa fa-envelope"></span>info@infornetonline.com</p>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  <!------------------------------------------------------- / END CONTACT SECTION ---------------------------------------------------->

@push('scripts')
    <!-- Toastr notifications -->
    <script src="{{ asset('js/toastr.min.js') }}"></script>

    <script>
        
    </script>
@endpush

@endsection