@extends('layouts.public')

@section('contenido')


	<!-- RECOMENDADOS -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title mb-0">
                    <h2>Recomendados</h2>
                </div>
            </div>
            <div class="col-12">
                <hr class="subrayado_productos mt-1">
            </div>
            <div class="col-12 px-1">
                <div class="wrap-slick2">
                    <div class="slick2 slickCustom" id="productosRecomendados">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- END RECOMENDADOS  -->



    <!-- PRODUCTOS (todos, ofertas, nuevos, mas pedidos, etc) -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="karl-projects-menu">
                    <div class="text-center portfolio-menu">
                        <button class="btn active" data-filter="*">TODOS</button>
                        <button class="btn" data-filter=".productosOfertas">EN OFERTA</button>
                        <button class="btn" data-filter=".productosNuevos">NUEVOS</button>
                        <button class="btn" data-filter=".productosMasPedidos">MAS PEDIDOS</button>
                        {{-- <button class="btn" data-filter=".shoes">shoes</button>
                        <button class="btn" data-filter=".kids">KIDS</button> --}}
                    </div>
                </div>
            </div>
            <div class="col-12">
                <hr class="subrayado_productos mt-1">
            </div>
            <div class="col-12">
                <div class="row karl-new-arrivals mb-5" id="cuerpoProductosEnOferta">
                   
                </div>
            </div>
        </div>
    </div>
    <!-- END PRODUCTOS -->

	<!-- MODAL PRODUCTOS -->
    <div class="modal fade" id="modalProductosInicio" tabindex="-1" role="dialog" aria-labelledby="modalProductosInicio" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content p-0">
                <div class="modal-body">
                    <button type="button" class="close_modal_inicio" data-dismiss="modal" aria-label="Close">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL PRODUCTOS -->


@endsection


@section('scripts')

    @include('publico.inicio.carjs')
    {{-- @include('publico.inicio.listadeseosjs') --}}
    @include('publico.inicio.recomendadosjs')
    @include('publico.inicio.ofertasjs')
    {{-- @include('publico.inicio.nuevosjs') --}}
    {{-- @include('publico.inicio.maspedidosjs') --}}

@endsection