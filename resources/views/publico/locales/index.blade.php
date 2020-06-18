@extends('layouts.public')

@section('contenido')


<div class="btn_modal_cesta">
    <button type="button" class="row" id="abrirCestaProductosid" data-toggle="modal" data-target="#abrirCestaProductos">
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



<div class="container-fluid page-section px-3">
    <div class="row"> 
        <div class="col-12 col-lg-3 mb-5 informacion_empresas">
            <div class="row mb-4 p-3 informacion_empresas_row">
                <div class="col-12 col-md-6 col-lg-12 text-center">
                    <img src="{{asset( $empresa->logo )}}" alt="">
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
                    <div class="row" id="">
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                            <div class="single_product_wrapper mb-5">
                                <div class="product-img">
                                    <img src="{{asset('pedidos/img/product/discount/pd-1.jpg')}}" alt="">
                                    <img class="hover-img" src="{{asset('pedidos/img/product/discount/pd-2.jpg')}}" alt="">
    
                                    <div class="product-badge offer-badge">
                                        <span>Oferta</span>
                                    </div>
                                </div>
                                
                                <div class="featured__item__text container_product_cart px-2 pt-2 mb-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="text-truncate my-0">
                                                <a class="link_producto_detalle" href="#"><b>Nombre producto</b></a>
                                            </p>
                                            <p class="text-truncate small my-0">Descripción producto</p>
                                        </div>
                                    </div>
                                    <hr class="mt-1 mb-0">
                                    <div class="row px-2">
                                        <div class="col-6 pt-1 pb-2 px-0 m-0 text-center" id="price_product_border">
                                            <p class="small"></p>
                                            <h4 class="price_product_unit my-0">
                                                S/ <span>20.99</span>
                                            </h4>
                                        </div>
                                        <div class="col-6 pt-1 pb-2 px-2 m-0">
                                            <p class="import_price text-muted py-0 my-0">
                                                Importe: <b>S/ <span>15.90</span></b>
                                            </p>
                                            <div class="input_group_unit_product border m-0">
                                                <button class="minus MoreMinProd"><b>-</b></button>
                                                <input type="text" class="text-center input_value_cart" value="1">
                                                <button class="more MoreMinProd"><b>+</b></button>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mt-0 mb-2">
                                    <div class="row mx-1 mb-2 modal_lista_cart">
                                        <div class="col-2 p-0">
                                            <button class="abrir_modal_producto_inicio hint--top-right" data-hint="Detalle de producto" data-toggle="modal" data-target="#abrir_modal_producto_inicio" idproducto="${ recomendados.id }">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                        <div class="col-2 p-0">
                                            <button class="agregar_lista_deseos hint--top-right" data-hint="Agregar a mi lista de deseos" idproducto="#">
                                                <i class="fa fa-heart"></i>
                                            </button>
                                        </div>
                                        <div class="col-8 p-0">
                                            <button class="agregar_cart hint--top" data-hint="Agregar producto a cesta" idproducto="#">
                                                <span>Agregar</span>
                                                <i class="fas fa-shopping-basket"></i>
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
</div>


<div class="modal right fade" id="abrirCestaProductos" tabindex="-1" role="dialog" aria-labelledby="abrirCestaProductos">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header p-0 bg-dark">
                <button type="button" class="btn_close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
                <div class="modal-title mx-auto">
                    <p class="minimo_compra my-1">Como mínimo debes comprar s/ 30.00 <br> en este Restaurante</p>
                </div>
            </div>
            <div class="modal-body modal_body_cesta">
                <div id="scroll_cesta">
                    <div class="row px-3 pt-4 pb-0" id="cuerpoCestaPedido">
                        <div class="col-12 mb-3" id="contenido_producto_cesta">
                            <div class="row p-1">
                                <div class="col-md-12 column_detalle_cesta_1">
                                    <div class="row">
                                        <div class="col-3 col-md-2 col-lg-3 p-0 imagen_producto_cesta">
                                            <img src="{{asset('pedidos/img/product/product-3.jpg')}}" alt="" class="">
                                        </div>
                                        <div class="col-9 col-md 10 col-lg-9">
                                            <p class="my-0 nombre_produc_cesta">Nombre de producto</p>
                                            <p class="my-0 descripcion_produc_cesta"><small>Descripción de producto</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 column_detalle_cesta_2">
                                    <div class="row text-center">
                                        <div class="col-4 px-0 py-2 padding_column_cesta">
                                            <p class="my-0"><b>Precio</b></p>
                                            <p class="my-0">S/ 14.90</p>
                                        </div>
                                        <div class="col-4 px-0 py-2 px-2 padding_column_cesta_1">
                                            <p class="my-0"><b>Cantidad</b></p>
                                            <div class="input_group_unit_product border m-0">
                                                <button class="minus MoreMinProd" idcesta=""><b>-</b></button>
                                                <input type="text" class="text-center input_value_cartcart" value="1">
                                                <button class="more MoreMinProd" idcesta=""><b>+</b></button>
                                            </div>
                                        </div>
                                        <div class="col-4 px-0 py-2 padding_column_cesta">
                                            <p class="my-0"><b>Subtotal</b></p>
                                            <p class="my-0">
                                                S/ <span class="precioTotalProductos">20.90</span>
                                            </p>
                                        </div>
                                        <div class="col-12 p-0 content_btn_eliminar">
                                            <button class="eliminar_producto_cesta hint--top-left hint--error" data-hint="Eliminar" producto_id="">
                                                <i class="fas fa-trash-alt text-danger"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3" id="contenido_producto_cesta">
                            <div class="row p-1">
                                <div class="col-md-12 column_detalle_cesta_1">
                                    <div class="row">
                                        <div class="col-3 col-md-2 col-lg-3 p-0 imagen_producto_cesta">
                                            <img src="{{asset('pedidos/img/product/product-3.jpg')}}" alt="" class="">
                                        </div>
                                        <div class="col-9 col-md 10 col-lg-9">
                                            <p class="my-0 nombre_produc_cesta">Nombre de producto</p>
                                            <p class="my-0 descripcion_produc_cesta"><small>Descripción de producto</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 column_detalle_cesta_2">
                                    <div class="row text-center">
                                        <div class="col-4 px-0 py-2 padding_column_cesta">
                                            <p class="my-0"><b>Precio</b></p>
                                            <p class="my-0">S/ 14.90</p>
                                        </div>
                                        <div class="col-4 px-0 py-2 px-2 padding_column_cesta_1">
                                            <p class="my-0"><b>Cantidad</b></p>
                                            <div class="input_group_unit_product border m-0">
                                                <button class="minus MoreMinProd" idcesta=""><b>-</b></button>
                                                <input type="text" class="text-center input_value_cartcart" value="1">
                                                <button class="more MoreMinProd" idcesta=""><b>+</b></button>
                                            </div>
                                        </div>
                                        <div class="col-4 px-0 py-2 padding_column_cesta">
                                            <p class="my-0"><b>Subtotal</b></p>
                                            <p class="my-0">
                                                S/ <span class="precioTotalProductos">20.90</span>
                                            </p>
                                        </div>
                                        <div class="col-12 p-0 content_btn_eliminar">
                                            <button class="eliminar_producto_cesta hint--top-left hint--error" data-hint="Eliminar" producto_id="">
                                                <i class="fas fa-trash-alt text-danger"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3" id="contenido_producto_cesta">
                            <div class="row p-1">
                                <div class="col-md-12 column_detalle_cesta_1">
                                    <div class="row">
                                        <div class="col-3 col-md-2 col-lg-3 p-0 imagen_producto_cesta">
                                            <img src="{{asset('pedidos/img/product/product-3.jpg')}}" alt="" class="">
                                        </div>
                                        <div class="col-9 col-md 10 col-lg-9">
                                            <p class="my-0 nombre_produc_cesta">Nombre de producto 222</p>
                                            <p class="my-0 descripcion_produc_cesta"><small>Descripción de producto</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 column_detalle_cesta_2">
                                    <div class="row text-center">
                                        <div class="col-4 px-0 py-2 padding_column_cesta">
                                            <p class="my-0"><b>Precio</b></p>
                                            <p class="my-0">S/ 14.90</p>
                                        </div>
                                        <div class="col-4 px-0 py-2 px-2 padding_column_cesta_1">
                                            <p class="my-0"><b>Cantidad</b></p>
                                            <div class="input_group_unit_product border m-0">
                                                <button class="minus MoreMinProd" idcesta=""><b>-</b></button>
                                                <input type="text" class="text-center input_value_cartcart" value="1">
                                                <button class="more MoreMinProd" idcesta=""><b>+</b></button>
                                            </div>
                                        </div>
                                        <div class="col-4 px-0 py-2 padding_column_cesta">
                                            <p class="my-0"><b>Subtotal</b></p>
                                            <p class="my-0">
                                                S/ <span class="precioTotalProductos">20.90</span>
                                            </p>
                                        </div>
                                        <div class="col-12 p-0 content_btn_eliminar">
                                            <button class="eliminar_producto_cesta hint--top-left hint--error" data-hint="Eliminar" producto_id="">
                                                <i class="fas fa-trash-alt text-danger"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3" id="contenido_producto_cesta">
                            <div class="row p-1">
                                <div class="col-md-12 column_detalle_cesta_1">
                                    <div class="row">
                                        <div class="col-3 col-md-2 col-lg-3 p-0 imagen_producto_cesta">
                                            <img src="{{asset('pedidos/img/product/product-3.jpg')}}" alt="" class="">
                                        </div>
                                        <div class="col-9 col-md 10 col-lg-9">
                                            <p class="my-0 nombre_produc_cesta">Nombre de producto 222</p>
                                            <p class="my-0 descripcion_produc_cesta"><small>Descripción de producto</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 column_detalle_cesta_2">
                                    <div class="row text-center">
                                        <div class="col-4 px-0 py-2 padding_column_cesta">
                                            <p class="my-0"><b>Precio</b></p>
                                            <p class="my-0">S/ 14.90</p>
                                        </div>
                                        <div class="col-4 px-0 py-2 px-2 padding_column_cesta_1">
                                            <p class="my-0"><b>Cantidad</b></p>
                                            <div class="input_group_unit_product border m-0">
                                                <button class="minus MoreMinProd" idcesta=""><b>-</b></button>
                                                <input type="text" class="text-center input_value_cartcart" value="1">
                                                <button class="more MoreMinProd" idcesta=""><b>+</b></button>
                                            </div>
                                        </div>
                                        <div class="col-4 px-0 py-2 padding_column_cesta">
                                            <p class="my-0"><b>Subtotal</b></p>
                                            <p class="my-0">
                                                S/ <span class="precioTotalProductos">20.90</span>
                                            </p>
                                        </div>
                                        <div class="col-12 p-0 content_btn_eliminar">
                                            <button class="eliminar_producto_cesta hint--top-left hint--error" data-hint="Eliminar" producto_id="">
                                                <i class="fas fa-trash-alt text-danger"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                <b><span class="sumaTotal">3</span> Productos</b>
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
@endsection

@section('scripts')
    @include('publico.locales.indexjs')
@endsection