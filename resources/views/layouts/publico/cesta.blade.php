
    {{-- CESTA --}}
    <div class="content_modal_cesta"></div>
    <div class="sidebar_modal_cesta_right">
        <button class="p-0" id="close_sidebar_cesta">
            <i class="fas fa-times"></i>
        </button>

        <div class="cart_content_cesta">
            <div class="cart_tittle_cesta">
                <div class="row m-0">
                    <div class="col-8">
                        <p class="m-0 pt-1">Lista de productos seleccionados para Delivery</p>
                    </div>
                    <div class="col-4 p-0">
                        <a class="btn btn_realizar_pedidos_cesta_menu p-0 pt-1" href="{{ route('cart.index')}}">Realizar Pedidos</a>
                    </div>
                </div>
            </div>
            <div class="content_scroll_cesta">
                <div class="scroll_cesta">
                    <div class="row m-0 py-3 px-0" id="cuerpo_productos_cesta_menu">

                    </div>
                </div>
            </div>
        </div>
    </div>