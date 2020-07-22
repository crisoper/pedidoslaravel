
    {{-- BUSCAR PRODUCTOS MOVIL--}}
    <div class="content_modal_search_movil"></div>
    <div class="sidebar_modal_search_movil_right">

        <div class="cart_content_search_movil">
            <div class="row m-0 pt-3">
                <div class="col-10 px-0">
                    <form id="form_buscar_productos" action="{{route('productos.busqueda.index')}}">
                        <div class="input-group input_group_search">
                            <input id="txtBuscarTextoGeneral" type="text" class="form-control input_buscar" placeholder="Buscar Productos" aria-label="Buscar"
                                autofocus name="buscarproductos" value="{{request()->query('buscarproductos')}}">

                            <div class="input-group-append">
                                <button class="btn btn_buscar_productos">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-2">
                    <button class="p-0" id="close_sidebar_search_movil">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

