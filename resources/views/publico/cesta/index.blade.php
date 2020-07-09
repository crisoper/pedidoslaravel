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
        <form id="formNavDetallePedidoCesta" action="{{ route("ajax.locales.pedidosstore") }}" method="POST">
            <div class="row m-0">
                <div class="col-12 col-lg-8 pt-4 pl-3 pr-4 card_productos_cart">
                    <div class="row m-0" id="cuerpoRealizarPedidoCart">
    

                    </div>
                </div>
    
                <div class="col-12 col-lg-4 p-0 margin_realizar_pedido_cart">
                    <div class="row m-0 p-3 card_realizar_pedido_cart">
                        <div class="col-12 col-md-6 col-lg-12 mb-4 px-4">
                            <form action="#">
                                <div class="input-group input_group_cupon">
                                    <input type="text" class="input_cupon mt-0 pl-3" placeholder="Ingrese su cupón de descuento">
                                    <div class="input-group-append btn_aplicar_cupon_append">
                                        <a href="#" class="btn btn_aplicar_cupon mt-0">Aplicar</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-12 col-md-6 col-lg-12 content_realizar_pedido_cart">
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
                                    <div class="row m-0 content_delivery_pedido_cart">
                                        <div class="col-4"><p>Delivery</p></div>
                                        <div class="col-8">
                                            <h6 class="text-right">
                                                <b>S/ <span class="delivery_pedido_cart">5.00</span></b>
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
                                <div class="col-12 px-0 py-2 text-center content_btn_realizar_pedido_cart">
                                    <button class="btn_realizar_pedido_cart py-1">Realizar Pedido</button>
                                    <br>
                                </div>
                                <div class="col-12 mb-2 text-center">
                                    <a class="btn btn_seguir_comprando_cart py-1" href="#">Seguir Comprando</a>
                                </div>
                            </div>
                        </div>
                    </div>                        
                </div>
            </div>
        </form>
    </div>



@endsection


@section('scripts')
    @include('publico.cart.indexjs')
    @include('publico.cart.realizarpedidojs')
@endsection