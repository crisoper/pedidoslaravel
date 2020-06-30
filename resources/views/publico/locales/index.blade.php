@extends('layouts.public')

@section('contenido')


{{-- CONTENIDO EMPRESA Y PRODUCTOS --}}
<div class="container-fluid page_section px-2">
    <div class="row m-0 mb-4 content_empresa">
        <div class="col-12 p-0 content_banner_empresa">
            <img src="{{asset('pedidos/image/banners/bannerlocal.jpg')}}" alt="">
        </div>
        <div class="col-12 p-0 pb-3 content_info_empresa">
            <div class="row m-0">
                <div class="col-4 col-sm-3 col-md-2 p-2 content_logo_empresa">
                    <img src="{{ Storage::url("empresaslogos/".$empresa->logo)}}" alt="">
                </div>
                <div class="col-12 p-0 pr-3 content_nombre_empresa">
                    <div class="row m-0">
                        <div class="col-12">
                            <h4 class="mb-0 pb-1"><b>{{ $empresa->nombrecomercial }}</b></h4>
                        </div>
                        <div class="col-12 col-md-4">
                            <p class="my-0">Carnes y Parrillas</p>
                        </div>
                        <div class="col-12 col-md-4 text-right direccion_empresa">
                            <p class="my-0">{{ $empresa->direccion }}</p>
                        </div>
                        {{-- <div class="col-12 col-md-4 text-right">
                            <div class="top_seller_product_rating">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 p-0">
            <nav class="nav_productos_empresa">
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
        </div>
    </div>

    <div class="row m-0 content_productos_info_empresa">
        <div class="col-12 pt-4 pb-1 px-2">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-productos" role="tabpanel" aria-labelledby="nav-productos-tab">
                    <div class="row m-0">
                        <div class="col-10 col-md-8 col-lg-7 mb-4">
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
                        <div class="col-2 col-md-4 col-lg-5 mb-3 content_filtrar_productos">
                            <button type="button" class="btn_filtrar_productos">
                                <i class="fas fa-filter"></i> <span class="span_filtrar_prod">Filtrar Productos</span>
                            </button>
                        </div>

                        <div class="col-12">
                            <div class="row text-center" id="cuerpoProductosEmpresas">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-detalles" role="tabpanel" aria-labelledby="nav-detalles-tab">
                    <div class="row m-0">
                        <div class="col-12 col-lg-7 mb-4 mx-auto">
                            <div class="row m-0 py-4 content_info_detalle_empresa">
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
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 mb-4 mx-auto text-center">
                            <img src="{{asset('pedidos/image/banners/mapagoogle.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav_acercade" role="tabpanel" aria-labelledby="nav_acercade-tab">
                    <div class="row m-0">
                        <div class="col-12 col-md-5 col-lg-5 mb-4 mx-auto text-center">
                            <img src="{{ Storage::url("empresaslogos/".$empresa->logo)}}" alt="">
                        </div>
                        <div class="col-11 col-md-6 col-lg-6 py-4 mb-4 mx-auto text-center info_acercade_empresa">
                            <h4 id="idlocal" idlocal="{{ $empresa->id }}">{{ $empresa->nombrecomercial }}</h4>
                            <hr class="mt-3 mb-2">

                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Exercitationem, odit? Consequatur dolor sequi repellat non necessitatibus aspernatur, at dolores illo hic tempora deleniti, blanditiis asperiores nostrum! Aut commodi et earum.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- MODAL PRODUCTOS --}}
<div class="modal fade" id="modal_productos_x_empresa" tabindex="-1" role="dialog" aria-labelledby="modal_productos_x_empresa" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light row m-0 py-2">
                <div class="col-12 mx-auto">
                    <p class="text-center mb-0" id="nombre_empresa_modal"> </p>
                </div>
                <button type="button" class="close_modal_inicio" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body row m-0">
                <div class="col-12 col-lg-6 p-0">
                    <div class="content_imagenes_modal pb-2">
                        <div class="mb-2" id="imagenes_principal_producto_modal">
                            {{-- <img  src="pedidos/img/product/product-1.jpg" alt=""> --}}
                        </div>
                        <div class="text-center" id="imagenes_producto_modal">
                            {{-- <img  src="pedidos/img/product/product-1.jpg" alt=""> --}}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 p-0">
                    <div class="row content_producto_modal">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- BOTON CESTA --}}
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
{{-- CESTA --}}
<div class="content_modal_cesta"></div>
<div class="sidebar_modal_cesta_right">
    <button class="p-0" id="close_sidebar_cesta">
        <i class="fas fa-times"></i>
    </button>

    <div class="cart_content_cesta">
        <nav class="content_nav_tab">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link px-0 active" id="detalle_pedido_cesta" data-toggle="tab" href="#navDetallePedidoCesta" role="tab" aria-controls="navDetallePedidoCesta" aria-selected="true">
                    Detalle pedido
                </a>
                <a class="nav-item nav-link px-0" id="realizar_pedido_cesta" data-toggle="tab" href="#navRealizarPedidoCesta" role="tab" aria-controls="navRealizarPedidoCesta" aria-selected="false">
                    Realizar Pedido
                </a>
            </div>
        </nav>
        <hr class="hr_box_shadow_cesta m-0 pb-2">
        <form id="formNavDetallePedidoCesta" action="{{ route("ajax.locales.pedidosstore") }}" method="POST">
            <div class="tab-content" id="nav_tabContent">
                <div class="tab-pane fade show active" id="navDetallePedidoCesta" role="tabpanel" aria-labelledby="detalle_pedido_cesta">
                    
                    <div class="row m-0 cart_tittle_cesta">
                        <div class="col-12 p-0">
                            <p class="minimo_compra m-0">Mínimo de compra para delivery: S/ 30.00</p>
                            <p class="icon_actualizar_producto m-0">
                                <i class="fas fa-check"></i> Actualizar cantidad de producto
                            </p>
                        </div>
                        <div class="col-12"><hr class="my-1"></div>
                        <div class="col-6 p-0 content_cantidad">
                            <p class="info_cantidad my-0">Estas comprando:</p>
                            <h6><span class="suma_productos_Cesta">0</span> Productos</h6>
                        </div>
                        <div class="col-6 p-0 content_subtotal">
                            <p class="info_total my-0">Subtotal:</p>
                            <h6>S/ <span class="suma_total_prev">0.00</span></h6>
                        </div>
                    </div>

                    <hr class="hr_info_scroll_cesta my-0">

                    <div class="" id="scroll_cesta">
                        <div class="row m-0 px-3 pt-3 pb-1 cuerpoCestaPedido" id="cuerpoCestaPedido">

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
                <div class="card-header" id="headingOrdenar">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOrdenar" aria-expanded="false" aria-controls="collapseOrdenar">
                        Ordenar por:
                    </button>
                </div>
                <div id="collapseOrdenar" class="collapse show" aria-labelledby="headingOrdenar" data-parent="#accordionExample">
                    <div class="card-body pl-0">
                        <div class="form-check mt-1">
                            <input class="form-check-input" name="fitroorden" type="radio" class="fitroorden" value="ofertas" id="filtro_orden_ofertas" checked>
                            <label class="form-check-label" for="filtro_orden_ofertas">
                                Por Defecto
                            </label>
                        </div>
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
                    </div>
                </div>
            </div>

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

        </div>
    </div>
</div>



@endsection

@section('scripts')
    @include('publico.locales.indexjs')
@endsection