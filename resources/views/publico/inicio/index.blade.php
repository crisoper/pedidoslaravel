@extends('layouts.public')

@section('contenido')


    {{-- RESTAURANTES RECOMENDADOS --}}
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-12 mb-5 m-0 p-0 slickCustomEmpresas">
                <div class="m-0 p-0 slickempresas" id="empresasRecomendadas">
                    <img src="{{asset('pedidos/image/banners/bannerempresa1.jpg')}}" alt="">
                    <img src="{{asset('pedidos/image/banners/bannerempresa2.jpg')}}" alt="">
                    <img src="{{asset('pedidos/image/banners/bannerempresa3.jpg')}}" alt="">
                    <img src="{{asset('pedidos/image/banners/bannerempresa4.jpg')}}" alt="">
                </div>
            </div>
            {{-- <div class="col-12 mb-3">
                <div class="row text-center">
                    <div class="col-12 col-sm-6">
                        <p class="mt-0">
                            <i class="fas fa-motorcycle"></i> Seguimiento de delivery en todo moment0
                        </p>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>

    {{-- PRODUCTOS INICIO --}}
    <div class="container-fluid page_section px-2 mb-5" id="preductRecomendado">
        <div class="row text-center">
            <div class="col-12 section_title p-0 mb-2">
                <h2 class="float-left py-1 m-0">Recomendados</h2>
                <a class="float-right py-1 m-0" href="{{route('recomendados.index')}}">Ver más <i class="fas fa-chevron-right"></i></a>
            </div>
            <div class="col-12 slick_arrows slickArrowsRecomendadosInicio">
                <div class="responsiveSlickRecomendadosInicio" id="cuerpoProductosRecomendadosInicio">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid page_section px-2 mb-5" id="productosEnOferta">
        <div class="row text-center">
            <div class="col-12 section_title p-0 mb-2">
                <h2 class="float-left py-1 m-0">Ofertas</h2>
                <a class="float-right py-1 m-0" href="{{route('ofertas.index')}}">Ver más <i class="fas fa-chevron-right"></i></a>
            </div>
            <div class="col-12 slick_arrows slickArrowsEnOfertasInicio">
                <div class="responsiveSlickEnOfertasInicio" id="cuerpoProductosEnOfertaInicio">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid page_section px-2 mb-5" id="productosNuevos">
        <div class="row text-center">
            <div class="col-12 section_title p-0 mb-2">
                <h2 class="float-left py-1 m-0">Nuevos</h2>
                <a class="float-right py-1 m-0" href="{{route('nuevos.index')}}">Ver más <i class="fas fa-chevron-right"></i></a>
            </div>
            <div class="col-12 slick_arrows slickArrowsNuevosInicio">
                <div class="responsiveSlickNuevosInicio" id="cuerpoProductosNuevosInicio">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid page_section px-2 mb-5" id="productosMasPedidos">
        <div class="row text-center">
            <div class="col-12 section_title p-0 mb-2">
                <h2 class="float-left py-1 m-0">Mas Pedidos</h2>
                <a class="float-right py-1 m-0" href="{{route('maspedidos.index')}}">Ver más <i class="fas fa-chevron-right"></i></a>
            </div>
            <div class="col-12 slick_arrows slickArrowsMasPedidosInicio">
                <div class="responsiveSlickMasPedidosInicio" id="cuerpoProductosMasPedidosInicio">
                    
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

    @include('layouts.publico.movil.modalappmovil')
@endsection
