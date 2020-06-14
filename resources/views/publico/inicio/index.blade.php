@extends('layouts.public')

@section('contenido')


    {{-- RESTAURANTES RECOMENDADOS --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-5 m-0 p-0 slickCustomEmpresas">
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


    <div class="container-fluid page-section px-4 mb-5" id="preductRecomendado">
        <div class="row text-center">
            <div class="col-12 section_title mb-2">
                <h2 class="float-left py-1 m-0">Recomendados</h2>
                <a class="float-right py-1 m-0" href="{{route('recomendados.index')}}">Ver más <i class="fas fa-chevron-right"></i></a>
            </div>
            <div class="col-12 slickArrowsRecomendadosInicio">
                <div class="responsiveSlickRecomendadosInicio" id="cuerpoProductosRecomendadosInicio">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid page-section px-4 mb-5" id="productosEnOferta">
        <div class="row text-center">
            <div class="col-12 section_title mb-2">
                <h2 class="float-left py-1 m-0">Ofertas</h2>
                <a class="float-right py-1 m-0" href="{{route('ofertas.index')}}">Ver más <i class="fas fa-chevron-right"></i></a>
            </div>
            <div class="col-12 slickArrowsEnOfertasInicio">
                <div class="responsiveSlickEnOfertasInicio" id="cuerpoProductosEnOfertaInicio">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid page-section px-4 mb-5" id="productosNuevos">
        <div class="row text-center">
            <div class="col-12 section_title mb-2">
                <h2 class="float-left py-1 m-0">Nuevos</h2>
                <a class="float-right py-1 m-0" href="{{route('nuevos.index')}}">Ver más <i class="fas fa-chevron-right"></i></a>
            </div>
            <div class="col-12 slickArrowsNuevosInicio">
                <div class="responsiveSlickNuevosInicio" id="cuerpoProductosNuevosInicio">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid page-section px-4 mb-5" id="productosMasPedidos">
        <div class="row text-center">
            <div class="col-12 section_title mb-2">
                <h2 class="float-left py-1 m-0">Mas Pedidos</h2>
                <a class="float-right py-1 m-0" href="{{route('maspedidos.index')}}">Ver más <i class="fas fa-chevron-right"></i></a>
            </div>
            <div class="col-12 slickArrowsMasPedidosInicio">
                <div class="responsiveSlickMasPedidosInicio" id="cuerpoProductosMasPedidosInicio">
                    
                </div>
            </div>
        </div>
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
                                {{-- <img  src="pedidos/img/product/product-1.jpg" alt=""> --}}
                            </div>
                        </div>
                        <div class="col-12 col-lg-7">
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
    <!-- END MODAL PRODUCTOS -->


@endsection


@section('scripts')
    @include('publico.inicio.ofertasjs')
    @include('publico.inicio.nuevosjs')
    @include('publico.inicio.maspedidosjs')
    @include('publico.inicio.recomendadosjs')

@endsection