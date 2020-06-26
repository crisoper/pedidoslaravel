@extends('layouts.public')

@section('contenido')




{{-- CONTENIDO EMPRESA Y PRODUCTOS --}}
<div class="container-fluid page_section px-2">
    <div class="row m-0 mb-5">
        <div class="col-12 p-0 content_banner_empresa">
            <img src="{{asset('pedidos/image/banners/bannerlocal.jpg')}}" alt="">
        </div>
        <div class="col-12 text-center">
            <div class="top_seller_product_rating">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
            </div>
        </div>
    </div>

    <div class="row m-0">
        <div class="col-12 p-0">
            <nav class="nav_productos_empresa mb-3">
                <div class="nav nav_tabs d-flex justify-content-center" id="nav_tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-productos-tab" data-toggle="tab" href="#nav-productos" role="tab" aria-controls="nav-productos" aria-selected="true">
                        PRODUCTOS
                    </a>
                    <a class="nav-item nav-link" id="nav-detalles-tab" data-toggle="tab" href="#nav-detalles" role="tab" aria-controls="nav-detalles" aria-selected="false">
                        DETALLES
                    </a>
                    <a class="nav-item nav-link" id="nav_acercade-tab" data-toggle="tab" href="#nav_acercade" role="tab" aria-controls="nav_acercade" aria-selected="false">
                        ACERCA DE
                    </a>
                </div>
            </nav>
            <div class="tab-content px-2" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-productos" role="tabpanel" aria-labelledby="nav-productos-tab">
                    <div class="row">
                        <div class="col-12 col-md-9 col-lg-6 mb-3">
                            <form id="form_buscar_productos_x_empresa" action="">
                                <div class="input-group">
                                    <input id="txtBuscarProductosXempresa" type="text" class="form-control input_buscar" placeholder="Buscar productos en: {{ $empresa->nombrecomercial }}" aria-label="Buscar" autofocus name="buscar" value="{{request()->query('buscar')}}">

                                    <div class="input-group-append">
                                        <a href="#" class="btn btn_buscar_productos_x_empresa py-0">
                                            <i class="fas fa-search"></i>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>

                        {{-- BOTON FILTRAR PRODUCTOS --}}
                        <div class="col-12 col-md-3 col-lg-6 mb-3 content_filtrar_productos">
                            <button type="button" class="btn_filtrar_productos">
                                Filtrar Productos
                            </button>
                        </div>

                        <div class="col-12">
                            <div class="row text-center" id="cuerpoProductosEmpresas">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-detalles" role="tabpanel" aria-labelledby="nav-detalles-tab">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-7 mx-auto">
                            <div class="row">
                                <div class="col-12 col-sm-6"><b>Dirección:</b></div>
                                <div class="col-12 col-sm-6">{{ $empresa->direccion }}</div>
                                <div class="col-12"><hr class="my-4"></div>

                                <div class="col-12 col-sm-6"><b>Horario de atención:</b></div>
                                <div class="col-12 col-sm-6">
                                    @foreach ($empresa->horarios as $horario)
                                        <p class="my-0">{{ $horario->dia }} {{ $horario->horainicio }} - {{ $horario->horafin }} </p>
                                    @endforeach
                                </div>
                                <div class="col-12"><hr class="my-4"></div>

                                <div class="col-12 col-sm-6"><b>Tipo de cocina:</b></div>
                                <div class="col-12 col-sm-6">Carnes y Parrillas</div>
                                <div class="col-12"><hr class="my-4"></div>

                                <div class="col-12 col-sm-6"><b>Teléfono:</b></div>
                                <div class="col-12 col-sm-6">964 268236</div>
                                <div class="col-12"><hr class="my-4"></div>

                                <div class="col-12 col-sm-6"><b>Página web:</b></div>
                                <div class="col-12 col-sm-6">http://pedidoslaravel.test/locales/1</div>
                                <div class="col-12"><hr class="my-4"></div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mx-auto text-center">
                            <img src="{{asset('pedidos/image/banners/mapagoogle.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav_acercade" role="tabpanel" aria-labelledby="nav_acercade-tab">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-5 text-center">
                            <img src="{{ Storage::url("empresaslogos/".$empresa->logo)}}" alt="">
                        </div>
                        <div class="col-12 col-md-6 col-lg-7 text-center">
                            <h4 id="idlocal" idlocal="{{ $empresa->id }}" class="mt-3">{{ $empresa->nombrecomercial }}</h4>
                            <hr class="mt-3 mb-2">

                            <p class="my-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Exercitationem, odit? Consequatur dolor sequi repellat non necessitatibus aspernatur, at dolores illo hic tempora deleniti, blanditiis asperiores nostrum! Aut commodi et earum.</p>
                            <hr class="mt-2 mb-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- MODAL DETALLE PRODUCTOS --}}
<div class="modal fade" id="modal_productos_x_empresa" tabindex="-1" role="dialog" aria-labelledby="modal_productos_x_empresa" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content p-0">
            <div class="modal-body">
                <button type="button" class="close_modal_inicio" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                
                <div class="quickview_body row p-0">
                    <div class="col-12 col-lg-6">
                        <div id="imagenes_producto_modal">
                            {{-- <img  src="pedidos/img/product/product-1.jpg" alt=""> --}}
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="row">
                            <div class="col-12">
                                <h4 id="titulo_producto_modal"> </h4>
                            </div>
                            <div class="col-6 col-sm-5 col-md-4">
                                <div class="top_seller_product_rating">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-6 col-sm-5 col-md-8">
                                <p class="stock_modal">
                                    Stock: <span id="stock_modal_span"> </span>
                                </p>
                            </div>
                            <div class="col-12">
                                <h3 class="precio_modal_lista_deseos my-0">
                                    S/ <span id="precio_modal_lista_deseos_span"> </span>
                                </h3>
                                {{-- <p class="precio_prev_modal_lista_deseos">
                                    S/ <span class="precio_prev_modal_lista_deseos_span">30.99</span>
                                </p> --}}
                            </div>
                            <div class="col-12">
                                <p id="descripcion_producto_modal">
                                    
                                </p>
                            </div>
                            <div class="col-12"><hr></div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="input-group input_group_unit_product">
                                            <button class="input-group-prepend minus MoreMinProd d-flex justify-content-around">-</button>
                                            <input type="text" class="form-control input_value_cart" value="1">
                                            <button class="input-group-append more MoreMinProd d-flex justify-content-around">+</button>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <button class="agregar_cart hint--top" data-hint="Agregar producto a cesta" idproducto="${ prodxempresa.id }" idempresa="${ prodxempresa.empresa_id }">
                                            <span>Agregar</span>
                                            <i class="fas fa-shopping-basket"></i>
                                        </button>
                                    </div>
                                    <div class="col-3">
                                        <button class="agregar_lista_deseos  hint--top-right" data-hint="Agregar a lista de deseos" idproducto="${ prodxempresa.id }">
                                            <i class="fa fa-heart"></i>
                                        </button>
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


{{-- BOTON CESTA --}}
{{-- <div class="btn_modal_cesta"> --}}
<button type="button" class="row btn_modal_cesta" id="mostrarProductosCestaMenuFlotante">
    <div id="icon_pedido">
        <h3><i class="fas fa-shopping-basket"></i></h3>
        <h6 class="cantidad_menu_pedido">0</h6>
    </div>
    <div id="content_mi_pedido">
        <p class="small m-0 p-0">Mi pedido</p>
        <h5 class="small m-0 p-0" id="amount_menu_pedido">S/ <span class="precio_menu_pedido">0.00</span></h5>
    </div>
</button>
{{-- </div> --}}
{{-- CESTA --}}
<div class="content_modal_cesta"></div>
<div class="sidebar_modal_cesta_right">
    <button class="p-0" id="close_sidebar_cesta">
        <i class="fas fa-times"></i>
    </button>

    <div class="cart_content_cesta">
        <div class="row m-0 p-0 cart_tittle_cesta">
            <div class="col-12 pt-1 minimo_compra">
                <p>Como mínimo debes comprar s/ 30.00 <br> en este Restaurante</p>
            </div>
        </div>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="detalle_pedido_cesta" data-toggle="tab" href="#navDetallePedidoCesta" role="tab" aria-controls="navDetallePedidoCesta" aria-selected="true">Detalle pedido</a>
                <a class="nav-item nav-link" id="realizar_pedido_cesta" data-toggle="tab" href="#navRealizarPedidoCesta" role="tab" aria-controls="navRealizarPedidoCesta" aria-selected="false">
                    Realizar Pedido
                </a>
            </div>
        </nav>
        <form id="formNavDetallePedidoCesta" action="{{ route("ajax.locales.pedidosstore") }}" method="POST">
            <div class="tab-content" id="nav_tabContent">
                <div class="tab-pane fade show active" id="navDetallePedidoCesta" role="tabpanel" aria-labelledby="detalle_pedido_cesta">
                    <div class="info_cantidad_total">
                        <div class="info_cantidad">
                            <p class="my-0">Estas comprando:</p>
                            <h6><span class="suma_productos_Cesta">0</span> Productos</h6>
                        </div>
                        <div class="info_total">
                            <p class="my-0">Subtotal:</p>
                            <h5>S/ <span class="suma_total_prev">0.00</span></h5>
                        </div>
                    </div>

                    <div class="" id="scroll_cesta">
                        <div class="row m-0 px-3 pt-4 pb-2 cuerpoCestaPedido" id="cuerpoCestaPedido">

                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="navRealizarPedidoCesta" role="tabpanel" aria-labelledby="realizar_pedido_cesta">
                    <form class="container_cupon mt-3" form action="#">
                        <div class="input-group input_group_cupon_cesta">
                            <input type="text" class="input_cupon_cesta mt-0" placeholder="Ingrese su cupón de descuento">
                            <div class="input-group-append append_cupon">
                                <a href="#" class="btn btn_aplicar_cupon_cesta mt-0 pl-1">Aplicar</a>
                            </div>
                        </div>
                    </form>
                    <div class="content_total_cesta mt-4 px-2">
                        <div class="row p-2 monto_total_cesta">
                            <div class="col-12 titulo_resumen text-center pb-2">
                                <p class="mb-0">Resumen del pedido</p>
                            </div>

                            <div class="col-12 content_detalle_total_prod py-2 px-1 mb-3">
                                <p class="my-0 text-muted">Estas comprando</p>
                                <h6 class="my-0 text-muted text-right">
                                    <b><span class="sumaTotalProductos">0.00</span> Productos</b>
                                </h6>
                            </div>

                            <div class="col-12 content_detalle_monto_total">
                                <p class="my-0">Subtotal</p>
                                <h6 class="my-0 text-right">
                                    <b>S/ <span class="sumaTotal">0.00</span></b>
                                </h6>
                            </div>
                            <div class="col-12 content_detalle_monto_total">
                                <p class="my-0">Delivery</p>
                                <h6 class="my-0 text-right">
                                    <b>S/ <span class="deliveryTotal">2.00</span></b>
                                </h6>
                            </div>
                            <div class="col-12 content_detalle_monto_total">
                                <p class="my-0">Descuento</p>
                                <h6 class="my-0 text-right">
                                    <b>S/ <span class="descuentoTotal">5.00</span></b>
                                </h6>
                            </div>
                                
                            <div class="col-12 content_detalle_total my-2 py-2">
                                <h5>Total</h5>
                                <h4 class="my-0 text-right">
                                    <b>S/ <span class="pedidoTotal">0.00</span></b>
                                </h4>
                            </div>
                            <div class="col-12 content_botones_pedido">
                                <button id="btn_realizar_pedido_cesta" class="btn_realizar_pedido_cesta">Realizar Pedido</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


{{-- FILTRAR PRODUCTOS --}}
<div class="content_modal_filtrar"></div>
<div class="sideban_modal_filtrar_right">
    <button class="p-0" id="close_sidebar_filtrar">
        <i class="fas fa-times"></i>
    </button>

    <div class="cart_content_filtrar">
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingFiltrar">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFiltrar" aria-expanded="true" aria-controls="collapseFiltrar">
                        Filtrar por:
                    </button>
                </div>
                <div id="collapseFiltrar" class="collapse show" aria-labelledby="headingFiltrar" data-parent="#accordionExample">
                    <div class="card-body pl-0">
                        <div class="form-check mt-1">
                            <input class="form-check-input" type="checkbox" value="filtro_ofertas" id="filtro_ofertas">
                            <label class="form-check-label" for="filtro_ofertas">
                                Ofertas
                            </label>
                        </div>
                        <div class="form-check mt-1">
                            <input class="form-check-input" type="checkbox" value="filtro_nuevos" id="filtro_nuevos">
                            <label class="form-check-label" for="filtro_nuevos">
                                Nuevos
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingOrdenar">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOrdenar" aria-expanded="false" aria-controls="collapseOrdenar">
                        Ordenar por:
                    </button>
                </div>
                <div id="collapseOrdenar" class="collapse show" aria-labelledby="headingOrdenar" data-parent="#accordionExample">
                    <div class="card-body pl-0">
                        <div class="form-check mt-1">
                            <input class="form-check-input" name="fitroorden" type="radio" class="fitroorden" value="menor" id="filtro_orden_menor">
                            <label class="form-check-label" for="filtro_orden_menor">
                                Menor a Mayor Precio
                            </label>
                        </div>
                        <div class="form-check mt-1">
                            <input class="form-check-input" name="fitroorden" type="radio" class="fitroorden" value="mayor" id="filtro_orden_mayor">
                            <label class="form-check-label" for="filtro_orden_mayor">
                                Mayor a Menor Precio
                            </label>
                        </div>
                        <div class="form-check mt-1">
                            <input class="form-check-input" name="fitroorden" type="radio" class="fitroorden" value="ofertas" id="filtro_orden_ofertas" checked>
                            <label class="form-check-label" for="filtro_orden_ofertas">
                                Por Defecto
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection

@section('scripts')
    @include('publico.locales.indexjs')
@endsection