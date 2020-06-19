@extends('layouts.public')

@section('contenido')


	<!-- Shopping Cart -->
    <div class="container mb-5">
        <div class="row">
            <div class="col-12">
                <div class="section-title mb-0">
                    <h2 class="float-left m-0 p-0">Detalle de pedido</h2>
                </div>
            </div>
            <div class="col-12">
                <hr class="subrayado_productos mt-1">
            </div>
            <div class="col-12 col-lg-8 mb-0" id="contenido_detalle_pedido">
                <div class="row pl-4 pt-4 pr-4 pb-2" id="cuerpoTablaCarritoCompras">

                </div>
            </div>
            <div class="col-12 col-lg-4 content_cupon_total_pedido">
                <div class="row sticky_top_detalle_pedido">
                    <div class="col-12 col-md-6 col-lg-12 p-0 mb-4">
                        <form action="#">
                            <div class="input-group input_group_cupon">
                                <input type="text" class="input_cupon mt-0" placeholder="Ingrese su cupón de descuento">
                                <div class="input-group-append btn_aplicar_cupon_append">
                                    <a href="#" class="btn btn_aplicar_cupon mt-0">Aplicar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 col-md-6 col-lg-12 comtent_monto_total_detalle">
                        <div class="row px-2 py-4 monto_total_detalle">
                            <div class="col-12 text-center">
                                <h5><b>Resumen del pedido</b></h5>
                                <hr>
                            </div>
                            <div class="col-12">
                                <div class="row px-4">
                                    <div class="col-4"><p>Subtotal</p></div>
                                    <div class="col-8">
                                        <p class="text-right">
                                            <b>S/ <span class="sumaTotal">0.00</span></b>
                                        </p>
                                    </div>
                                    <div class="col-4"><p>Delivery</p></div>
                                    <div class="col-8">
                                        <p class="text-right">
                                            <b>S/ <span class="deliveryTotal">2.00</span></b>
                                        </p>
                                    </div>
                                    <div class="col-4"><p>Descuento</p></div>
                                    <div class="col-8">
                                        <p class="text-right">
                                            <b>S/ <span class="descuentoTotal">5.00</span></b>
                                        </p>
                                    </div>
                                </div>
                                <hr class="mt-0 mb-2">
                                <div class="row px-4">
                                    <div class="col-4"><h4>Total</h4></div>
                                    <div class="col-8">
                                        <h4 class="text-right">
                                            <b>S/ <span class="pedidoTotal">0.00</span></b>
                                        </h4>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="col-12">
                                <button class="btn_realizar_pedido">Realizar Pedido</button>
                                <a class="btn_seguir_comprando" href="#">Seguir Comprando</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
			

@endsection


@section('scripts')
    @include('publico.cart.indexjs')
@endsection