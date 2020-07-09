
    {{-- CESTA --}}
    <div class="content_modal_cesta"></div>
    <div class="sidebar_modal_cesta_right">
        <button class="p-0" id="close_sidebar_cesta">
            <i class="fas fa-times"></i>
        </button>

        <div class="cart_content_cesta">

            <nav class="realizar_pedido_menu">
                <div class="nav nav-tabs" id="menu_realizar_pedido" role="tablist">
                  <a class="nav-item nav-link active" id="detalle_pedido_tab" data-toggle="tab" href="#detalle_pedido" role="tab" aria-controls="detalle_pedido" aria-selected="true">DETALLE PEDIDO</a>
                  <a class="nav-item nav-link" id="realizar_pedido_tab" data-toggle="tab" href="#realizar_pedido" role="tab" aria-controls="realizar_pedido" aria-selected="false">REALIZAR PEDIDO</a>
                </div>
            </nav>
            <form id="formNavDetallePedidoCestaMenu" action="{{ route("ajax.locales.pedidosstore") }}" method="POST">
                <div class="tab-content" id="content_realizar_pedido">
                    <div class="tab-pane fade show active" id="detalle_pedido" role="tabpanel" aria-labelledby="detalle_pedido_tab">
                        
                        <div class="scroll_cesta_menu">
                            <div class="row m-0 py-3 px-0" id="cuerpo_productos_cesta_menu">
                                
                            </div>
                        </div>
                        
                    </div>
                    <div class="tab-pane fade" id="realizar_pedido" role="tabpanel" aria-labelledby="realizar_pedido_tab">
                        
                        <div class="croll_realizar_pedido_cesta_menu">
                            <div class="row m-0 px-3 py-4">
                                <div class="col-12 mb-4 px-2">
                                    <form action="#">
                                        <div class="input-group input_group_cupon">
                                            <input type="text" class="input_cupon mt-0 pl-3" placeholder="Ingrese su cupón de descuento">
                                            <div class="input-group-append btn_aplicar_cupon_append">
                                                <a href="#" class="btn btn_aplicar_cupon mt-0">Aplicar</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-12 content_realizar_pedido_cesta_menu">
                                    <div class="row">
                                        <div class="col-12 px-0 pt-2 pb-1 text-center content_resumen_pedido_cesta_menu">
                                            <h5><b>Resumen del pedido</b></h5>
                                        </div>
                                        <div class="col-12 mt-3 mb-2">
                                            <div class="row m-0 content_subtotal_pedido_cesta_menu">
                                                <div class="col-4"><p>Subtotal</p></div>
                                                <div class="col-8">
                                                    <h6 class="text-right">
                                                        <b>S/ <span class="subtotal_pedido_cesta_menu">0.00</span></b>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="row m-0 content_delivery_pedido_cesta_menu">
                                                <div class="col-4"><p>Delivery</p></div>
                                                <div class="col-8">
                                                    <h6 class="text-right">
                                                        <b>S/ <span class="delivery_pedido_cesta_menu">5.00</span></b>
                                                    </h6>
                                                </div>
                                            </div>
                                            <hr class="mt-0 mb-2">
                                            <div class="row m-0 content_tota_pedido_cesta_menu">
                                                <div class="col-4">
                                                    <h5>Total</h5>
                                                </div>
                                                <div class="col-8">
                                                    <h4 class="text-right">
                                                        S/ <span class="total_pedido_cesta_menu">0.00</span>
                                                        <input type="hidden" class="input_total_pedido_cesta_menu" name="input_total_pedido_cesta_menu" value="">
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 py-2 text-center content_btn_realizar_pedido_cesta_menu">
                                            <button class="btn_realizar_pedido_cesta_menu py-1">Realizar Pedido</button>
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
                </div>
            </form>

        </div>
    </div>

    

