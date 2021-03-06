@extends('layouts.public')

@section('contenido')


<div class="container-fluid page_section px-2">
    <div class="row">
        <div class="col-12 section_title mb-2">
            <h2 class="my-1">Restaurantes</h2>
        </div>
    </div>        
    <div class="row">
        <div class="col-6 mb-3">
            <h6><b><span class="nro_locales_buscados">0</span></b> Restaurantes encontrados</h6>
        </div>
        {{-- BOTON FILTRAR PRODUCTOS --}}
        <div class="col-6 mb-3 content_filtrar_locales">
            <button type="button" class="btn_filtrar_locales">
                <i class="fas fa-filter"></i> <span class="span_filtrar_prod">Filtrar Restaurantes</span>
            </button>
        </div>
    </div>
    <div class="row m-0">
        <div class="col-12 m-0 p-0">
            <div class="row text-center" id="cuerpoLocalesResultados">



            </div>
        </div>
    </div>
</div>


{{-- FILTRAR LOCALES --}}
<div class="content_modal_filtrar_locales"></div>
<div class="sideban_modal_filtrar_locales_right">
    <button class="p-0" id="close_sidebar_filtrar_locales">
        <i class="fas fa-times"></i>
    </button>

    <div class="cart_content_filtrar_locales">
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
                            <input class="form-check-input" name="fitroorden" type="radio" class="fitroorden" value="defecto" id="filtro_orden_defecto" checked>
                            <label class="form-check-label" for="filtro_orden_defecto">
                                Por Defecto
                            </label>
                        </div>
                        <div class="form-check mt-1">
                            <input class="form-check-input" name="fitroorden" type="radio" class="fitroorden" value="alfabetico" id="filtro_orden_alfabetico">
                            <label class="form-check-label" for="filtro_orden_alfabetico">
                                Por Orden Alfabético
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
    @include('publico.resultadoslocales.indexjs')
@endsection
