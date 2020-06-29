@extends('layouts.public')

@section('contenido')


    {{-- RESTAURANTES RECOMENDADOS --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-5 m-0 p-0 slickCustomEmpresas">
                <div class="m-0 p-0 slickempresas" id="empresasRecomendadas">
                    <img src="{{asset('pedidos/image/banners/bannerempresa1.jpg')}}" alt="">
                    <img src="{{asset('pedidos/image/banners/bannerempresa2.jpg')}}" alt="">
                    <img src="{{asset('pedidos/image/banners/bannerempresa3.jpg')}}" alt="">
                    <img src="{{asset('pedidos/image/banners/bannerempresa4.jpg')}}" alt="">
                </div>
            </div>
            <div class="col-12 mb-3">
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

    {{-- PRODUCTOS INICIO --}}
    <div class="container-fluid page_section px-2 mb-5" id="preductRecomendado">
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
    <div class="container-fluid page_section px-2 mb-5" id="productosEnOferta">
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
    <div class="container-fluid page_section px-2 mb-5" id="productosNuevos">
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
    <div class="container-fluid page_section px-2 mb-5" id="productosMasPedidos">
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
    


	<!-- MODAL PRODUCTOS -->
    <div class="modal fade" id="abrir_modal_producto_inicio" tabindex="-1" role="dialog" aria-labelledby="abrir_modal_producto_inicio" aria-hidden="true">
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
                    <div class="col-12 col-lg-6 p-0 content_imagenes_modal">
                        <div class="mb-2" id="imagenes_principal_producto_modal">
                            {{-- <img  src="pedidos/img/product/product-1.jpg" alt=""> --}}
                        </div>
                        <div class="text-center" id="imagenes_producto_modal">
                            {{-- <img  src="pedidos/img/product/product-1.jpg" alt=""> --}}
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




@endsection


@section('scripts')
    @include('publico.inicio.ofertasjs')
    @include('publico.inicio.nuevosjs')
    @include('publico.inicio.maspedidosjs')
    @include('publico.inicio.recomendadosjs')

@endsection