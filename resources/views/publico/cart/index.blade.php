@extends('layouts.public')

@section('contenido')


	<!-- Shopping Cart -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title mb-0">
                    <h2 class="float-left m-0 p-0">Detalle de pedido</h2>
                </div>
            </div>
            <div class="col-12">
                <hr class="subrayado_productos mt-1">
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row m-0" id="card_empresa_cart">

            {{-- <div class="col-12 p-0 border_empresa_cart">
                <div class="row m-0">
                    <div class="col-12 px-0 py-1 card_header_cart">
                        <h6 class="text-truncate text-center my-0">
                            <a href="#">Nombre de Empresa</a>
                        </h6>
                        <p class="text-center small my-0">Como mínimo debes comprar S/ 30.00</p>
                    </div>

                    <div class="col-12 pt-4 px-4 pb-3 card_body_cart">
                        <div class="row m-0">
                            <div class="col-12 p-2 mb-3 border_producto_cart">
                                <div class="row m-0">
                                    <div class="col-2 col-md-2 col-lg-1 p-0 imagen_producto_cart">
                                        <img src="{{asset('pedidos/image/productos/comida2.jpg')}}" alt="">
                                    </div>
                                    <div class="col-10 col-md-6 col-lg-7 p-0 pl-3">
                                        <h6 class="my-0 nombre_producto_cart">Nombre de producto</h6>
                                        <p class="my-0 descripcion_producto_cart"><small>Descripción de producto</small></p>
                                    </div>
                                    <div class="col-12 col-md-5 col-lg-4 p-0">
                                        <div class="row m-0 text-center">
                                            <div class="col-3 p-0 precio_producto_Cart">
                                                <h6 class="my-0">Precio</h6>
                                                <p class="my-0">S/ 0.00</p>
                                            </div>
                                            <div class="col-6 p-0 px-2 cantidad_producto_cart">
                                                <h6 class="my-0">Cantidad</h6>
                                                <div class="input-group input_cantidad_producto_cart">
                                                    <button class="input-group-prepend restar sumar_restar_cantidad_producto d-flex justify-content-around">-</button>
                                                    <input type="text" class="form-control input_value_producto_cart" value="1">
                                                    <button class="input-group-append sumar sumar_restar_cantidad_producto d-flex justify-content-around">+</button>
                                                    <button class="actualizar_producto_cart py-0 px-1 ml-2 hint--top-left hint--success" data-hint="Actualizar cantidad" producto_id="">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-3 p-0 subtotal_producto_cart">
                                                <h6 class="my-0">Subtotal</h6>
                                                <p class="my-0">
                                                    S/ <span class="span_subtotal_producto_cart">0.00</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="btn_eliminar_producto_cart hint--top-left hint--error" data-hint="Eliminar" producto_id="">
                                    <i class="fas fa-trash-alt text-light"></i>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-12 p-3 card_footer_cart">
                        <div class="row m-0">
                            <div class="col-12 col-md-6 col-lg-4 mb-4 px-4">
                                <form action="#">
                                    <div class="input-group input_group_cupon">
                                        <input type="text" class="input_cupon mt-0 pl-3" placeholder="Ingrese su cupón de descuento">
                                        <div class="input-group-append btn_aplicar_cupon_append">
                                            <a href="#" class="btn btn_aplicar_cupon mt-0">Aplicar</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 content_realizar_pedido_cart">
                                <div class="row">
                                    <div class="col-12 px-0 pt-2 pb-1 text-center content_resumen_pedido_cart">
                                        <h5><b>Resumen del pedido</b></h5>
                                    </div>
                                    <div class="col-12 mt-3 mb-2">
                                        <div class="row m-0 content_subtotal_pedido_cart">
                                            <div class="col-4"><p>Subtotal</p></div>
                                            <div class="col-8">
                                                <h6 class="text-right">
                                                    <b>S/ <span class="subtotal_pedido_cart">0.00</span></b>
                                                </h6>
                                            </div>
                                        </div>
                                        <hr class="mt-0 mb-2">
                                        <div class="row m-0 content_tota_pedido_cart">
                                            <div class="col-4">
                                                <h5>Total</h5>
                                            </div>
                                            <div class="col-8">
                                                <h4 class="text-right">
                                                    S/ <span class="total_pedido_cart">0.00</span>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 px-0 pt-2 pb-2 text-center content_btn_realizar_pedido_cart">
                                        <button class="btn_realizar_pedido_cart py-1 mb-2">Realizar Pedido</button>
                                        <br>
                                        <a class="btn btn_seguir_comprando_cart py-1 mb-1" href="#">Seguir Comprando</a>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div> --}}

        </div>
    </div>



@endsection


@section('scripts')
    @include('publico.cart.indexjs')
@endsection