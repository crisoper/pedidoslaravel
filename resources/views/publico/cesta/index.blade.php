@extends('layouts.public')

@section('contenido')


	<!-- Shopping Cart -->
    <div class="container">
        <div class="row">
            <div class="col-12 section_title p-0 mb-4">
                <h2 class="my-1">Detalle de pedido</h2>
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
                    <div class="row m-0 content_resumen_realizar_pedido sticky-top-2">
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
                                    
                                    <input type="hidden" class="input_total_pedido_cesta" name="input_total_pedido_cesta" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 px-0 py-2 text-center content_btn_realizar_pedido_cart">
                            <button class="btn_realizar_pedido_cart py-1">Realizar Pedido</button>
                            <br>
                        </div>
                        <div class="col-12 mb-2 text-center">
                            <a class="btn btn_seguir_comprando_cart py-1" href="{{route('productos.busqueda.index')}}">Seguir Comprando</a>
                        </div>
                    </div>                      
                </div>
            </div>
        </form>
    </div>



@endsection


@section('scripts')
    @include('publico.cesta.indexjs')
    @include('publico.cesta.realizarpedidojs')
@endsection
