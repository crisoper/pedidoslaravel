@extends('layouts.public')

@section('contenido')


    {{-- RESTAURANTES RECOMENDADOS --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-4 m-0 p-0 slickCustomEmpresas">
                <div class="m-0 p-0 slickempresas" id="empresasRecomendadas">
                    <img src="{{asset('img/banners/banner1.jpg')}}" alt="">
                    <img src="{{asset('img/banners/banner2.jpg')}}" alt="">
                    <img src="{{asset('img/banners/banner3.jpg')}}" alt="">
                    <img src="{{asset('img/banners/banner4.jpg')}}" alt="">
                </div>
            </div>
            <div class="col-12 mb-5">
                <div class="row text-center">
                    <div class="col-12 col-sm-6">
                        <p class="mt-0">
                            <i class="fas fa-check-circle"></i> Pedidos directos a restaurante
                        </p>
                    </div>
                    <div class="col-12 col-sm-6">
                        <p class="mt-0">
                            <i class="fas fa-motorcycle"></i> Seguimiento de delivery
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- MENU WEB 3 -->
    <div class="container-fluid sticky-top-2 py-0">
        <div class="container">
            <div class="row">
                <div class="col-12 py-0 my-0 navbar navbar-expand-sm" id="mainNav">
                    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        Seleccionar<i class="fas fa-bars ml-1"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar_nav mx-auto">
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#preductRecomendado">Recomendados</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#productosEnOferta">Ofertas</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#productosNuevos">Nuevos</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#productosMasPedidos">Mas Pedidos</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid page-section px-3" id="preductRecomendado">
        {{-- <div class="container"> --}}
            <div class="row">
                <div class="col-12">
                    <div class="section-title mb-0">
                        <h2 class="float-left m-0 p-0">Recomendados</h2>
                        <a class="float-right m-0 p-0" href="{{route('recomendados.index')}}">Ver más <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="col-12">
                    <hr class="subrayado_productos mt-1">
                </div>
                <div class="col-12 slickArrowsRecomendadosInicio">
                    <div class="responsiveSlickRecomendadosInicio" id="cuerpoProductosRecomendadosInicio">
                        
                    </div>
                </div>
            </div>
        {{-- </div> --}}
    </div>
    <div class="container-fluid page-section px-3" id="productosEnOferta">
        {{-- <div class="container"> --}}
            <div class="row">
                <div class="col-12">
                    <div class="section-title mb-0">
                        <h2 class="float-left m-0 p-0">Ofertas</h2>
                        <a class="float-right m-0 p-0" href="{{route('ofertas.index')}}">Ver más <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="col-12">
                    <hr class="subrayado_productos mt-1">
                </div>
                <div class="col-12 slickArrowsEnOfertasInicio">
                    <div class="responsiveSlickEnOfertasInicio" id="cuerpoProductosEnOfertaInicio">
                        
                    </div>
                </div>
            </div>
        {{-- </div> --}}
    </div>
    <div class="container-fluid page-section px-3" id="productosNuevos">
        {{-- <div class="container"> --}}
            <div class="row">
                <div class="col-12">
                    <div class="section-title mb-0">
                        <h2 class="float-left m-0 p-0">Nuevos</h2>
                        <a class="float-right m-0 p-0" href="{{route('nuevos.index')}}">Ver más <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="col-12">
                    <hr class="subrayado_productos mt-1">
                </div>
                <div class="col-12 slickArrowsNuevosInicio">
                    <div class="responsiveSlickNuevosInicio" id="cuerpoProductosNuevosInicio">
                        
                    </div>
                </div>
            </div>
        {{-- </div> --}}
    </div>
    <div class="container-fluid page-section px-3" id="productosMasPedidos">
        {{-- <div class="container"> --}}
            <div class="row">
                <div class="col-12">
                    <div class="section-title mb-0">
                        <h2 class="float-left m-0 p-0">Mas Pedidos</h2>
                        <a class="float-right m-0 p-0" href="{{route('maspedidos.index')}}">Ver más <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="col-12">
                    <hr class="subrayado_productos mt-1">
                </div>
                <div class="col-12 slickArrowsMasPedidosInicio">
                    <div class="responsiveSlickMasPedidosInicio" id="cuerpoProductosMasPedidosInicio">
                        
                    </div>
                </div>
            </div>
        {{-- </div> --}}
    </div>
	<!-- END RECOMENDADOS  -->

	<!-- MODAL PRODUCTOS -->
    <div class="modal fade" id="abrir_modal_producto_inicio" tabindex="-1" role="dialog" aria-labelledby="abrir_modal_producto_inicio" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content p-0">
                <div class="modal-body">
                    <button type="button" class="close_modal_inicio" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    
                    <div class="quickview_body row p-0">
                        <div class="col-12 col-lg-5">
                            <div id="imagenes_producto_modal">
                                <img  src="pedidos/img/product/product-1.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-12 col-lg-7">
                            <div class="row">
                                <div class="col-12">
                                    <h4 id="titulo_producto_modal">Nombre del producto</h4>
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
                                    <p id="descripcion_producto_modal">
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
    @include('publico.inicio.listadeseosjs')
    @include('publico.inicio.recomendadosjs')
    @include('publico.inicio.ofertasjs')
    @include('publico.inicio.nuevosjs')
    @include('publico.inicio.maspedidosjs')

@endsection