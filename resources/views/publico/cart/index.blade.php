@extends('layouts.public')

@section('contenido')


	<!-- Shopping Cart -->
    <div class="container mb-5">
        <div class="row">
            <div class="col-12">
                <div class="section-title mb-0">
                    <h2>Detalle de pedido</h2>
                </div>
            </div>
            <div class="col-12">
                <hr class="subrayado_productos mt-1">
            </div>
            <div class="col-12">
                <!-- Shopping Summery -->
                <table class="table table-hover table-responsive-lg shopping_summery">
                    <thead>
                        <tr class="main-hading">
                            <th colspan="2">PRODUCTO</th>
                            <th class="text-center">PRECIO POR UNIDAD</th>
                            <th class="text-center">CANTIDAD</th>
                            <th class="text-center">TOTAL</th> 
                            <th class="text-center"><b><i class="fas fa-trash-alt"></i></b></th>
                        </tr>
                    </thead>
                    <tbody id="cuerpoTablaCarritoCompras">
                        {{-- <tr>
                            <td class="image" data-title="No"><img src="https://via.placeholder.com/100x100" alt="#"></td>
                            <td class="product-des" data-title="Description">
                                <p class="product-name"><a href="#">Women Dress</a></p>
                                <p class="product-des">Maboriosam in a tonto nesciung eget  distingy magndapibus.</p>
                            </td>
                            <td class="price" data-title="Price"><span>$110.00 </span></td>
                            <td class="qty" data-title="Qty">
                                <div class="input_group_unit_product border m-0">
                                    <input type="text" class="text-center" value="1">
                                </div>
                            </td>
                            <td class="total-amount" data-title="Total"><span>$220.88</span></td>
                            <td class="action"><a href="#"><i class="ti-trash remove-icon"></i></a></td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
            <div class="col-3">
                <button class="btn btn_altualizar_pedido">Actualizar Pedido</button>
            </div>
            <div class="col-4">
                <form action="#">
                    <div class="form-row">
                        <div class="form-group col-12 mb-1">
                            <div class="input-group">
                                <input type="text" class="input_cupon" placeholder="Ingrese su cupón de descuento">
                                <div class="input-group-append">
                                    <a href="#" class="btn btn_aplicar_cupon">Aplicar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-4 ml-auto p-4 monto_total">
                <div class="row">
                    <div class="col-12 text-center">
                        <h5><b>Resumen del pedido</b></h5>
                        <hr>
                    </div>
                    <div class="col-12">
                        <div class="row px-4">
                            <div class="col-6"><p>Subtotal</p></div>
                            <div class="col-6">
                                <p class="text-right">
                                    <b>S/ <span class="sumaTotal">00</span></b>
                                </p>
                            </div>
                            <div class="col-6"><p>Delivery</p></div>
                            <div class="col-6">
                                <p class="text-right">
                                    <b>S/ <span class="deliveryTotal">2.00</span></b>
                                </p>
                            </div>
                            <div class="col-6"><p>Descuento</p></div>
                            <div class="col-6">
                                <p class="text-right">
                                    <b>S/ <span class="descuentoTotal">5.00</span></b>
                                </p>
                            </div>
                        </div>
                        <hr class="mt-0 mb-2">
                        <div class="row px-4">
                            <div class="col-6"><h4>Total</h4></div>
                            <div class="col-6">
                                <h4 class="text-right">
                                    <b>S/ <span class="pedidoTotal">00</span></b>
                                </h4>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12">
                        <button class="btn_realizar_pedido">Realizar Pedido</button>
                        <a class="btn_seguir_comprando" href="#">Seguir Comprando</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
			

@endsection


@section('scripts')
    @include('publico.cart.indexjs')
@endsection