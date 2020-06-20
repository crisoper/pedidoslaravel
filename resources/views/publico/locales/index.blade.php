@extends('layouts.public')

@section('contenido')



{{-- CONTENIDO EMPRESA Y PRODUCTOS --}}
<div class="container-fluid page-section px-3">
    <div class="row"> 
        <div class="col-12 col-lg-3 mb-5 informacion_empresas">
            <div class="row mb-4 p-3 informacion_empresas_row">
                <div class="col-12 col-md-6 col-lg-12 text-center">
                    <img src="{{ Storage::url("empresaslogos/".$empresa->logo)}}" alt="">
                    <div class="top_seller_product_rating">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                    <h4 id="idlocal" idlocal="{{ $empresa->id }}" class="mt-3">{{ $empresa->nombrecomercial }}</h4>
                    <hr class="mt-3 mb-2">
                </div>
                <div class="col-12 col-md-6 col-lg-12 text-center">
                    <p class="my-0"><b>Dirección:</b></p>
                    <p class="my-0">{{ $empresa->direccion }}</p>
                    <hr class="mt-2 mb-2">

                    <p class="my-0"><b>Horario de atención:</b></p>
                    @foreach ($empresa->horarios as $horario)
                        <p class="my-0">{{ $horario->dia }} {{ $horario->horainicio }} - {{ $horario->horafin }} </p>
                    @endforeach
                    <hr class="mt-2 mb-2">

                    <p class="my-0"><b>Tipo de cocina:</b></p>
                    <p class="my-0">Carnes y Parrillas</p>
                    <hr class="mt-2 mb-2">

                    <p class="my-0"><b>Teléfono:</b></p>
                    <p class="my-0">964 268236</p>
                    <hr class="mt-2 mb-2">

                    <p class="my-0"><b>Página web:</b></p>
                    <a href="#">http://pedidoslaravel.test/locales/1</a>
                    <hr class="mt-2 mb-2">
                </div>
                <div class="col-12 col-md-6 col-lg-12 text-center">
                    <p class="my-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Exercitationem, odit? Consequatur dolor sequi repellat non necessitatibus aspernatur, at dolores illo hic tempora deleniti, blanditiis asperiores nostrum! Aut commodi et earum.</p>
                    <hr class="mt-2 mb-3">
                </div>
                <div class="col-12 col-md-6 col-lg-12 text-center">
                    <img src="{{asset('pedidos/img/banner/mapa-google.jpg')}}" alt="">
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-9 productos_empresas">
            <div class="row">
                <div class="col-12 section_title mb-2">
                    <h2 class=" mt-1 mb-1">Productos</h2>
                </div>
                
                <div class="col-12">
                    <div class="row text-center" id="cuerpoProductosEmpresas">
                        
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- BOTON CESTA --}}
<div class="btn_modal_cesta">
    <button type="button" class="row" id="mostrarProductosCestaMenuFlotante" data-toggle="modal" data-target="#abrirCestaProductos">
        <div id="icon_pedido">
            <h3><i class="fas fa-shopping-basket"></i></h3>
            <h6>3</h6>
        </div>
        <div id="content_mi_pedido">
            <p class="small m-0 p-0">Mi pedido</p>
            <h5 class="small m-0 p-0" id="amount_menu_pedido">S/ 100.00</h5>
        </div>
    </button>
</div>
{{-- CESTA --}}
<div class="modal right fade" id="abrirCestaProductos" tabindex="-1" role="dialog" aria-labelledby="abrirCestaProductos">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header modal_header_cesta p-0 bg-dark">
                <button type="button" class="btn_close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
                <div class="modal-title mx-auto">
                    <p class="minimo_compra my-1">Como mínimo debes comprar s/ 30.00 <br> en este Restaurante</p>
                </div>
            </div>
            <div class="modal-body modal_body_cesta">
                <div id="scroll_cesta">
                    <div class="row px-3 pt-4 pb-0 dropdown_cart_header" id="cuerpoCestaPedido">
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer modal_footer_cesta">
                <form class="container_cupon mt-0" form action="#">
                    <div class="input-group input_group_cupon_cesta">
                        <input type="text" class="input_cupon_cesta mt-0" placeholder="Ingrese su cupón de descuento">
                        <div class="input-group-append append_cupon">
                            <a href="#" class="btn btn_aplicar_cupon_cesta mt-0 pl-1">Aplicar</a>
                        </div>
                    </div>
                </form>
                <div class="content_total_cesta px-3">
                    <div class="row p-2 monto_total_cesta">
                        <div class="col-12 px-1 titulo_resumen mb-2 pb-2">
                            <p class="my-0">Estas Comprando</p>
                            <h6 class="my-0 text-right">
                                <b><span class="sumaTotalProductos"></span> Productos</b>
                            </h6>
                        </div>
                        <div class="col-12 px-1 content_detalle_monto_total">
                            <p class="my-0">Subtotal</p>
                            <h6 class="my-0 text-right">
                                <b>S/ <span class="sumaTotal">0.00</span></b>
                            </h6>
                        </div>
                        <div class="col-12 px-1 content_detalle_monto_total">
                            <p class="my-0">Delivery</p>
                            <h6 class="my-0 text-right">
                                <b>S/ <span class="deliveryTotal">2.00</span></b>
                            </h6>
                        </div>
                        <div class="col-12 px-1 content_detalle_monto_total">
                            <p class="my-0">Descuento</p>
                            <h6 class="my-0 text-right">
                                <b>S/ <span class="descuentoTotal">5.00</span></b>
                            </h6>
                        </div>
                            
                        <div class="col-12 px-1 content_detalle_total my-2 py-2">
                            <h5>Total</h5>
                            <h4 class="my-0 text-right">
                                <b>S/ <span class="pedidoTotal">0.00</span></b>
                            </h4>
                        </div>
                        <div class="col-12 content_botones_pedido">
                            <button class="btn_realizar_pedido_cesta">Realizar Pedido</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



{{-- BOTON FILTRAR PRODUCTOS --}}
<div class="btn_filtrar_productos">
    <button type="button" id="" data-toggle="modal" data-target="#abrirFiltrarProductos">
        Filtrar <br> Productos
    </button>
</div>
{{-- FILTRAR PRODUCTOS --}}
<div class="modal right fade" id="abrirFiltrarProductos" tabindex="-1" role="dialog" aria-labelledby="abrirFiltrarProductos">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header modal_header_filtrar_prod p-0 pb-1 bg-dark">
                <button type="button" class="btn_close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body modal_body_filtrar_prod">
                <div id="scroll_filtrar_prod">
                    <div class="content_filtrar_prod p-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="empresasProductosOfertas">
                            <label class="form-check-label" for="empresasProductosOfertas">
                                Ofertas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="empresasProductosNuevos">
                            <label class="form-check-label" for="empresasProductosNuevos">
                                Nuevos
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="empresasProductosMenorMayorPrecio">
                            <label class="form-check-label" for="empresasProductosMenorMayorPrecio">
                                Menor a Mayor Precio
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="empresasProductosMayorMenorPrecio">
                            <label class="form-check-label" for="empresasProductosMayorMenorPrecio">
                                Mayor a Menor Precio
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="empresasProductosOrdenAlfabetico">
                            <label class="form-check-label" for="empresasProductosOrdenAlfabetico">
                                Orden Alfabético
                            </label>
                        </div>
                        <hr>
                        
                        {{-- <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                            <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                            </div>
                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                        </div>
                        <hr> --}}

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="empresasProductosEntradas">
                            <label class="form-check-label" for="empresasProductosEntradas">
                                Entradas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="empresasProductosBebidas">
                            <label class="form-check-label" for="empresasProductosBebidas">
                                Bebidas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="empresasProductosPostres">
                            <label class="form-check-label" for="empresasProductosPostres">
                                Postres
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