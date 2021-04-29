@extends('layouts.app')

@section('title', 'Carrito')

@section('content')

 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form>
               <div class="table-responsive">
                  <table class="table tabla_carrito">
                    <thead>
                      <tr>
                          @if(count($carritos) > 0)
                            <th></th>
                            <th></th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                            <th>Actualizar</th>
                          @else
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                          @endif
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($carritos as $carrito)
                            @foreach($carrito->articulo as $articulo)
                                <tr>
                                    <td><a class="remove" href="javascript:void(0)"><fa class="fa fa-times-circle fa-lg"></fa></a></td>
                                    <input class="remove_carrito" type="hidden" value="{{ $carrito->id }}">
                                    @isset($articulo->imagen)
                                        <td><a href="{{ route('mostrar', $articulo->codigo) }}"><img src="{{ $articulo->imagenes[0]->ruta_imagen }}" alt="{{ $articulo->nombre }}"></a></td>
                                    @endisset
                                    @empty($articulo->imagen)
                                        <td><a href="{{ route('mostrar', $articulo->codigo) }}"><img src="/storage/no_product.png" alt="{{ $articulo->nombre }}"></a></td>
                                    @endempty
                                    <td><a class="aa-cart-title" href="{{ route('mostrar', $articulo->codigo) }}">{{ $articulo->nombre }}</a></td>
                                    <td>{{ $articulo->cost_ult1 }}€</td>
                                    <input class="precio" type="hidden" value="{{ $articulo->cost_ult1 }}">
                                    <td><input class="aa-cart-quantity" type="number" value="{{ $carrito->unidades }}" min="1" max="5"></td>
                                    <td class="precio_total">{{ $carrito->precio_total }}€</td>
                                    <input class="precio_final" type="hidden" value="{{ $carrito->precio_total }}">
                                    <td><a style="color:#605555;" class="fa fa-refresh update_carrito" href="javascript:void(0)"></a></td>
                                </tr>
                            @endforeach
                        @endforeach
                        <tr>
                            <td colspan="7" class="aa-cart-view-bottom">
                                <hr>
                                <div class="aa-cart-coupon">
                                    <input class="aa-coupon-code" type="text" placeholder="Cupón">
                                    <input class="aa-cart-view-btn" type="submit" value="Aplicar Cupón">
                                </div>
                            </td>
                        </tr>
                      </tbody>
                  </table>
                </div>
             </form>
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4 style="text-align:center;">TOTAL</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th style="border-right:none;border-bottom:groove 2px;">Subtotal</th>
                     <td class="subtotal" style="border-bottom:groove 2px;">{{ $precio_total }}€</td>
                     <input class="subtotal_precio" type="hidden" value="{{ $precio_total }}">
                   </tr>
                   <tr>
                     <th style="border-right:none;">Total</th>
                     <td class="precio_total_final">{{ $precio_total }}€ - DESCUENTOS</td>
                   </tr>
                 </tbody>
               </table>
               <a href="#" class="aa-cart-view-btn">Proceder al Pago</a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->

@push('scripts')
    <!-- Toastr notifications -->
    <script src="{{ asset('js/toastr.min.js') }}"></script>

    <script>
        $(function(){
            //Borrar producto de carrito
            $('.remove').on('click', function(){
                var id_carrito = $(this).parent().next().val();
                var parent = $(this).parent().parent();
                $.get("/carrito/delete_carrito?code="+id_carrito).done(function(){
                    toastr.info('Producto borrado del carrito');
                    parent.fadeOut('slow', function(){
                        parent.remove();
                    });
                }).fail(function(){
                    toastr.warning('Ha sucedido un error');
                });
            });
            
            //Actualizar producto de carrito
            $('.update_carrito').on('click', function(){
                var subtotal = $('.subtotal_precio').val();
                var id_articulo = $(this).parent().parent().find('.remove_carrito').val();
                var id_unidades = $(this).parent().parent().find('.aa-cart-quantity').val();
                var precio = $(this).parent().parent().find('.precio').val();
                var total = $(this).parent().parent().find('.precio_final').val();
                var total_padre = $(this).parent().parent().find('.precio_final');
                var total_actual = $(this).parent().parent().find('.precio_total');
                var subtotal_nuevo = subtotal - total;
                $.get("/carrito/update_carrito?code="+id_articulo+"&units="+id_unidades+"&precio="+precio).done(function(){
                    toastr.info('Carrito actualizado');
                    total_actual.html(id_unidades*precio + "€");
                    total_padre.val(id_unidades*precio);
                    var total_subtotal = id_unidades*precio;
                    $('.subtotal').html(subtotal_nuevo + total_subtotal + '€');
                    $('.subtotal_precio').val(subtotal_nuevo + total_subtotal);
                    $('.precio_total_final').html(subtotal_nuevo + total_subtotal + '€ - DESCUENTOS');
                }).fail(function(){
                    toastr.warning('Ha sucedido un error');
                });
            });
        });
    </script>
@endpush

@endsection