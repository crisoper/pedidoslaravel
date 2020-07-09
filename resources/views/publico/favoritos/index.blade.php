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
            <div class="col-12 mb-0" id="contenido_detalle_pedido">
                <div class="row pl-4 pt-4 pr-4 pb-2" id="cuerpoTablaListaDeseos">

                </div>
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