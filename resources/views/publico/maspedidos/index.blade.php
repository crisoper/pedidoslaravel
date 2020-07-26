@extends('layouts.public')

@section('contenido')


<div class="container-fluid page_section px-2">
    <div class="row">
        <div class="col-12 section_title p-0 mb-2">
            <h2 class="my-1">Más Pedidos</h2>
        </div>
    </div>        
    <div class="row">
        <div class="col-9 col-md-6 mb-3">
            <h6><b><span class="nro_productos_buscados">0</span></b> Productos encontrados</h6>
        </div>
        {{-- BOTON FILTRAR PRODUCTOS --}}
        <div class="col-3 col-md-6 mb-3 content_filtrar_productos">
            <button type="button" class="btn_filtrar_productos float-right">
                <i class="fas fa-filter"></i> <span class="span_filtrar_prod">Filtrar Productos</span>
            </button>
        </div>
    </div>
    <div class="row m-0">
        <div class="col-12 m-0 p-0">
            <div class="row text-center" id="cuerpoProductosMasPedidos">

            </div>
        </div>
    </div>
</div>


{{-- FILTRAR PRODUCTOS --}}
<div class="content_modal_filtrar"></div>
<div class="sideban_modal_filtrar_right">
    <div class="row m-0 content_info_filtrar_productos">
        <div class="col-2 p-0">
            <button class="p-0" id="close_sidebar_filtrar">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="col-10 p-0">
            <p class="text-center mt-2 mb-0">Ordenar o filtrar productos</p>
        </div>
    </div>
    <div class="cart_content_filtrar">
        <div class="accordion" id="accordionExample">

            <div class="card">
                <div class="card-header" id="headingOrdenar">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOrdenar" aria-expanded="false" aria-controls="collapseOrdenar">
                        Ordenar por:
                    </button>
                </div>
                <div id="collapseOrdenar" class="collapse show" aria-labelledby="headingOrdenar" data-parent="#accordionExample">
                    <div class="card-body pl-0">
                        <div class="form-check mt-1">
                            <input class="form-check-input" name="fitroorden" type="radio" class="fitroorden" value="ofertas" id="filtro_orden_ofertas" checked>
                            <label class="form-check-label" for="filtro_orden_ofertas">
                                Por Defecto
                            </label>
                        </div>
                        <div class="form-check mt-1">
                            <input class="form-check-input" name="fitroorden" type="radio" class="fitroorden" value="menor" id="filtro_orden_menor">
                            <label class="form-check-label" for="filtro_orden_menor">
                                Menor a Mayor Precio
                            </label>
                        </div>
                        <div class="form-check mt-1">
                            <input class="form-check-input" name="fitroorden" type="radio" class="fitroorden" value="mayor" id="filtro_orden_mayor">
                            <label class="form-check-label" for="filtro_orden_mayor">
                                Mayor a Menor Precio
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingFiltrar">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFiltrar" aria-expanded="true" aria-controls="collapseFiltrar">
                        Filtrar por:
                    </button>
                </div>
                <div id="collapseFiltrar" class="collapse show" aria-labelledby="headingFiltrar" data-parent="#accordionExample">
                    <div class="card-body pl-0">
                        <div class="form-check mt-1">
                            <input class="form-check-input" type="checkbox" value="filtro_ofertas" id="filtro_ofertas">
                            <label class="form-check-label" for="filtro_ofertas">
                                Ofertas
                            </label>
                        </div>
                        <div class="form-check mt-1">
                            <input class="form-check-input" type="checkbox" value="filtro_nuevos" id="filtro_nuevos">
                            <label class="form-check-label" for="filtro_nuevos">
                                Nuevos
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    @include('publico.maspedidos.indexjs')
@endsection