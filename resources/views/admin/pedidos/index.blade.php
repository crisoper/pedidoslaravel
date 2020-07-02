
@extends('layouts.admin.admin')
@section('contenido')


<div class="container">
    <div class="row">
        <div class="col-12">
            <h4 class="text-center">PEDIDOS POR CONFIRMAR</h4>
        </div>
        <div class="col-12">
            <div class="row m-0" id="cuerpoPedidosPorConfirmar">

            </div>
        </div>

        {{-- <div class="col-12 col-md-6 col-xl-3">
            <div class="card bg-info">
                <div class="card-header pt-1 pb-0">
                    <h5 class="text-center">PEDIDOS POR ENTREGAR</h5>
                </div>
                <div class="card-body p-0 scroll_pedidosPorEntregar">
                    <div class="p-3" id="contentPedidosPorEntregar">
                        <div id="cuerpoPedidosPorEntregar">
    
                            <div class="accordion" id="accordionPedidosXentregar">
                                <div class="card p-0">
                                    <div class="card-header p-0" id="headingOne">
                                        <button class="btn btn-link p-0" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <div class="row p-1">
                                                <div class="col-12 small text-left"><b>Nro. Pedido:</b> <span>1</span></div>
                                                <div class="col-12 small text-left"><b>Cliente:</b> <span>Nombre del cliente</span></div>
                                                <div class="col-12 small text-left"><b>Confirmado:</b> <span>02:20:30</span></div>
                                                <div class="col-12 small mas_detalles text-right">
                                                    Más detalles <i class="fas fa-angle-double-down"></i>
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                
                                    <div id="collapseOne" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordionPedidosXentregar">
                                        <div class="card-body row productos_x_entregar px-3 py-1">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-12 mb-2">
                                                        <p class="my-0 small"><b>Producto:</b> Producto 1</p>
                                                        <p class="my-0 small"><b>Precio:</b> S/ 14.90</p>
                                                        <p class="my-0 small"><b>Cantidad:</b> 5</p>
                                                        <p class="my-0 small"><b>Subtotal:</b> S/ 74.50</p>
                                                        <hr class="my-1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <p class="total_pedido_x_entregar"><b>Total: S/ 74.50</b></p>
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

        <div class="col-12 col-md-6 col-xl-3">
            <div class="card card_pedido_entregados">
                <div class="card-header pt-1 pb-0">
                    <h5 class="text-center">PEDIDOS ENTREGADOS</h5>
                </div>
                <div class="card-body p-0 scroll_pedidosEntregados">
                    <div class="p-3" id="contentPedidosEntregados">
                        <div id="cuerpoPedidosEntregados">
                            
                            <div class="accordion content_pedidos_entregados mb-3" id="accordionPedidosEntregado">
                                <div class="card p-0 m-0">
                                    <div class="card-header p-0" id="headingTwo">
                                        <button class="btn btn-link p-0" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                            <div class="row p-1">
                                                <div class="col-12 small text-left"><b>Nro. Pedido:</b> <span>1</span></div>
                                                <div class="col-12 small text-left"><b>Cliente:</b> <span>Nombre del cliente</span></div>
                                                <div class="col-12 small text-left"><b>Entregado:</b> <span>02:20:30</span></div>
                                                <div class="col-12 small mas_detalles text-right">
                                                    Más detalles <i class="fas fa-angle-double-down"></i>
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                
                                    <div id="collapseTwo" class="collapse hide" aria-labelledby="headingTwo" data-parent="#accordionPedidosEntregado">
                                        <div class="card-body row productos_entregados px-3 py-1">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-12 mb-2">
                                                        <p class="my-0 small"><b>Producto:</b> Producto 1</p>
                                                        <p class="my-0 small"><b>Precio:</b> S/ 14.90</p>
                                                        <p class="my-0 small"><b>Cantidad:</b> 5</p>
                                                        <p class="my-0 small"><b>Subtotal:</b> S/ 74.50</p>
                                                        <hr class="my-1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <p class="total_pedido_entregado">Total: S/ 74.50</p>
                                            </div>
                                        </div>
                                    </div>
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
    @include('admin.pedidos.indexjs')
@endsection