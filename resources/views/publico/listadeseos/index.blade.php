@extends('layouts.public')

@section('contenido')


	<!-- Shopping Cart -->
    <div class="container mb-5">
        <div class="row">
            <div class="col-12">
                <div class="section-title mb-0">
                    <h2 class="float-left m-0 p-0">Detalle de lista de deseos</h2>
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
                            <th class="text-center">STOCK</th>
                            <th class="text-center">PRECIO POR UNIDAD</th>
                            <th class="text-center">AGREGAR A PEDIDO</th> 
                            <th class="text-center"><b><i class="fas fa-trash-alt"></i></b></th>
                        </tr>
                    </thead>
                    <tbody id="cuerpoTablaListaDeseos">
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
        </div>
    </div>

    
    <!-- ****** Quick View Modal Area Start ****** -->
    <div class="modal fade" id="productoTablaListaDeseos" tabindex="-1" role="dialog" aria-labelledby="productoTablaListaDeseos" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content p-0">
                <div class="modal-body">
                    <button type="button" class="close_modal_list_2" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    
                    <div class="quickview_body row p-0">
                        <div class="col-12 col-lg-5">
                            <div class="quickview_pro_img">
                                <img src="pedidos/img/product/product-1.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-12 col-lg-7">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="titulo_producto_modal_listadeseos">Nombre del producto</h4>
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
                                        Stock: <span class="stock_modal_span">10</span>
                                    </p>
                                </div>
                                <div class="col-12">
                                    <h3 class="precio_modal_lista_deseos my-0">
                                        S/ <span class="precio_modal_lista_deseos_span">20.99</span>
                                    </h3>
                                    <p class="precio_prev_modal_lista_deseos">
                                        S/ <span class="precio_prev_modal_lista_deseos_span">30.99</span>
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="descripcion_preducto_modal_listadeseos">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi corporis dignissimos pariatur nihil officia alias magni quod doloribus sit nesciunt labore perspiciatis veritatis eveniet recusandae blanditiis, perferendis quaerat, facere repellendus voluptates exercitationem! Minima, odio voluptate hic esse possimus rerum voluptas qui, dolorum accusantium fugit repellendus sequi non libero ex doloremque.
                                    </p>
                                </div>
                                <div class="col-6 col-sm-5 col-md-4">
                                    <div class="input_producto_modal_lista_deseos border m-0">
                                        <input type="text" class="text-center input_value_cartcart" value="1">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-5 col-md-4">
                                    <button class="agregar_cart_modal_lista_deseos hint--top" data-hint="Agregar producto a cesta" idproducto="">
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
			

@endsection


@section('scripts')
    @include('publico.listadeseos.indexjs')
@endsection