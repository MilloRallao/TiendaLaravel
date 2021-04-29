@extends('layouts.app')

@section('title', 'Wishlist')

@section('content')

<!-- wishlist view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table aa-wishlist-table">
             <form action="">
               <div class="table-responsive">
                  <table class="table tabla_deseos">
                    <thead>
                      <tr>
                          @if(count($deseos) > 0)
                            <th></th>
                            <th></th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th></th>
                          @else
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Stock</th>
                          @endif
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($deseos as $deseo)
                            @foreach($deseo->articulo as $articulo)
                                <tr>
                                    <td><a class="remove" href="javascript:void(0)"><fa class="fa fa-times-circle fa-lg"></fa></a></td>
                                    <input class="remove_wish" type="hidden" value="{{ $deseo->id }}">
                                    @isset($articulo->imagen)
                                        <td><a href="{{ route('mostrar', $articulo->codigo) }}"><img src="{{ $articulo->imagenes[0]->ruta_imagen }}" alt="{{ $articulo->nombre }}"></a></td>
                                    @endisset
                                    @empty($articulo->imagen)
                                        <td><a href="{{ route('mostrar', $articulo->codigo) }}"><img src="/storage/no_product.png" alt="{{ $articulo->nombre }}"></a></td>
                                    @endempty
                                    <td><a class="aa-cart-title" href="{{ route('mostrar', $articulo->codigo) }}">{{ $articulo->nombre }}</a></td>
                                    <td>{{ $articulo->cost_ult1 }}€</td>
                                    <td>{{ $articulo->stocks->descripcion }}</td>
                                    <td><a class="add_cart aa-add-to-cart-btn" href="javascript:void(0)"><span class="fa fa-shopping-cart"></span><input type="hidden" value="{{ $articulo->id }}">Añadir al carrito</a></td>
                                </tr>
                                </tbody>
                            @endforeach
                      @endforeach
                  </table>
                </div>
             </form>             
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / wishlist view section -->

@push('scripts')
    <!-- Toastr notifications -->
    <script src="{{ asset('js/toastr.min.js') }}"></script>

    <script>
        $(function(){
            //Añadir producto a carrito
            $('.add_cart').on('click', function(){
                if($(this).find('span').is('#remove_carrito')){
                    var id_articulo = $(this).find('input').val();
                    $(this).find('.fa-shopping-cart').removeAttr('class');
                    $(this).find('span').removeAttr('style');
                    $(this).removeAttr('style');
                    $(this).find('span').removeAttr('id');
                    $(this).find('span').prop('class', 'fa fa-shopping-cart');
                    $.get("carrito/delete_carrito?code="+id_articulo).done(function(){
                        toastr.info('Producto borrado del carrito');
                    }).fail(function(){
                        toastr.warning('Ha sucedido un error');
                    });
                }else{
                    var id_articulo = $(this).find('input').val();
                    $(this).find('.fa-shopping-cart').attr('id', 'remove_carrito');
                    $(this).find('.fa-shopping-cart').removeAttr('class');
                    $(this).find('span').prop('class', 'fa fa-shopping-cart');
                    $(this).prop('style', 'color:red');
                    $(this).find('span').prop('style', 'color: red');
                    $.get("carrito/add_carrito?code="+id_articulo+"&units="+1).done(function(){
                        toastr.success('Producto añadido al carrito');
                    }).fail(function(){
                        toastr.warning('Ha sucedido un error');
                    });
                }
            });
            
            //Borrar producto de lista de deseos
            $('.remove').on('click', function(){
                var id_deseo = $(this).parent().next().val();
                var parent = $(this).parent().parent();
                $.get("deseos/delete_wish?code="+id_deseo).done(function(){
                    toastr.info('Producto borrado de tu lista de deseos');
                    parent.fadeOut('slow', function(){
                        parent.remove();
                    });
                }).fail(function(){
                    toastr.warning('Ha sucedido un error');
                });
            });
        });
    </script>
@endpush

@endsection