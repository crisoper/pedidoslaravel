
    {{-- CESTA --}}
    <div class="content_modal_cesta"></div>
    <div class="sidebar_modal_cesta_right">
        <button class="p-0" id="close_sidebar_cesta">
            <i class="fas fa-times"></i>
        </button>

        <div class="cart_content_cesta">
            <div class="content_detalle_pedido_cesta_menu text-center">
                <div class="row m-0">
                    <div class="col-12 content_ir_a_pedido">
                        @php
                            
                        @endphp
                        <a class="btn btn_ir_a_pedido" href="{{route('cart.index')}}" class="py-1">Realizar Pedido</a>
                    </div>
                    <div class="col-7">
                        <h6 class="mt-2 mb-0">Estas comprando</h6>
                        <p class="mt-0 mb-2"><span class="cantidad_pedido_cesta_menu">0</span> Productos</p>
                    </div>
                    <div class="col-5">
                        <h6 class="mt-2 mb-0">Subtotal</h6>
                        <p class="mt-0 mb-2">S/ <span class="subtotal_pedido_cesta_menu">0.00</span></p>
                    </div>
                    <div class="col-12 p-0"><hr class="m-0"></div>
                </div>
            </div>

            <div class="content_scroll_cesta_menu">
                <div class="scroll_cesta_menu">
                    <div class="row m-0 py-3 px-0" id="cuerpo_productos_cesta_menu">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


