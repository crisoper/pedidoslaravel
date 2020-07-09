@extends('layouts.public')

@section('contenido')


	<!-- Shopping Cart -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title mb-0">
                    <h2 class="float-left m-0 p-0">Detalle de pedido</h2>
                </div>
            </div>
            <div class="col-12">
                <hr class="subrayado_productos mt-1">
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <form id="formNavDetallePedidoCesta" action="{{ route("ajax.locales.pedidosstore") }}" method="POST">
            <div class="row m-0">
                <div class="col-12 col-lg-8 p-0">
                    <div class="row m-0" id="cuerpoRealizarPedidoCart">
    
                        
                <div class="col-12 p-0 mb-3 card_empresa_cart">
                    <div class="row m-0">
                        <div class="col-12 card_header_cart">
                            <h6 class="text-truncate text-center my-0">
                                <a href="#">${ cesta.empresa.nombre }</a>
                            </h6>
                            <p class="text-center small my-0">Como mínimo debes comprar S/ 30.00</p>
                        </div>

                        <div class="col-12 pt-4 pb-3 px-3">
                            <div class="row m-0 p-1 border_producto_cart">
                                <div class="col-12 p-0">
                                    <div class="row m-0">
                                        <div class="col-2 col-md-1 col-lg-1 col-xl-1 p-0 imagen_producto_cart">
                                            ${ fotos }
                                        </div>
                                        <div class="col-10 col-md-5 col-lg-5 col-xl-6 pl-3">
                                            <h6 class="my-0 text-truncate nombre_producto_cart">${ cesta.producto.nombre }</h6>
                                            <p class="my-0 text-truncate descripcion_producto_cart"><small>${ cesta.producto.descripcion }</small></p>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-6 col-xl-5 border_productos_cart">
                                            <div class="row m-0 text-center">
                                                <div class="col-3 col-sm-4 col-md-3 p-0 precio_producto_Cart">
                                                    <h6 class="my-0">Precio</h6>
                                                    <p class="my-0">S/ ${ cesta.producto.precio }</p>
                                                </div>
                                                <div class="col-5 col-sm-4 col-md-5 p-0 px-2 cantidad_producto_cart">
                                                    <h6 class="my-0">Cantidad</h6>
                                                    <div class="input-group input_cantidad_producto_cart">
                                        
                                                        <input type="hidden" name="cesta_id[]" value="${ cesta.id }">
                                                        <input type="hidden" name="cantidad[]" value="${ cesta.cantidad }">
                                                        <input type="hidden" name="precio[]" value="${ cesta.producto.precio }">
                                                        <input type="hidden" name="subtotal[]" value="${ (cesta.cantidad * cesta.producto.precio).toFixed(2) }">
    
                                                        <div class="input-group-prepend restar sumar_restar_cantidad_producto d-flex justify-content-around" idempresa="${cesta.empresa.id}" idproducto="${ cesta.producto.id }" id="restar">-</div>
                                                        <input type="text" class="form-control input_value_producto_cart" value="${ cesta.cantidad }">
                                                        <div class="input-group-append sumar sumar_restar_cantidad_producto d-flex justify-content-around" idempresa="${cesta.empresa.id}" idproducto="${ cesta.producto.id }" id="sumar">+</div>
                                                    </div>
                                                </div>
                                                <div class="col-4 col-sm-4 col-md-4 p-0 subtotal_producto_cart">
                                                    <h6 class="my-0">Subtotal</h6>
                                                    <p class="my-0">
                                                        S/ <span class="span_subtotal_producto_cart">${ (cesta.cantidad * cesta.producto.precio).toFixed(2) }</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn_eliminar_producto_cart hint--top-left hint--error" data-hint="Eliminar" producto_id="${ cesta.producto.id }">
                                        <i class="fas fa-trash-alt text-light"></i>
                                    </div>
                                </div>
                            </div>                                
                        </div>
                        <div class="col-12 mb-2">
                            <a class="btn btn_seguir_comprando_cart py-1 mb-1" href="#">Seguir Comprando</a>
                        </div>
                    </div>
                </div>

                    </div>
                </div>
    
                <div class="col-12 col-lg-4 p-0 margin_realizar_pedido_cart">
                    <div class="row m-0 p-3 card_realizar_pedido_cart">
                        <div class="col-12 col-md-6 col-lg-12 mb-4 px-4">
                            <form action="#">
                                <div class="input-group input_group_cupon">
                                    <input type="text" class="input_cupon mt-0 pl-3" placeholder="Ingrese su cupón de descuento">
                                    <div class="input-group-append btn_aplicar_cupon_append">
                                        <a href="#" class="btn btn_aplicar_cupon mt-0">Aplicar</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-12 col-md-6 col-lg-12 content_realizar_pedido_cart">
                            <div class="row">
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
                                    <hr class="mt-0 mb-2">
                                    <div class="row m-0 content_tota_pedido_cart">
                                        <div class="col-4">
                                            <h5>Total</h5>
                                        </div>
                                        <div class="col-8">
                                            <h4 class="text-right">
                                                S/ <span class="total_pedido_cart">0.00</span>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 px-0 pt-2 pb-2 text-center content_btn_realizar_pedido_cart">
                                    <button class="btn_realizar_pedido_cart py-1 mb-2">Realizar Pedido</button>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>                        
                </div>
            </div>
        </form>
    </div>



@endsection


{{-- @section('scripts')
    @include('publico.cart.indexjs')
    @include('publico.cart.realizarpedidojs')
@endsection --}}