@extends('layouts.public')

@section('contenido')


<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-12 section_title mb-2">
                <h2 class="my-1">Ofertas</h2>
            </div>
            <div class="col-12 m-0 p-0 mb-3 pl-3">
                <h6 class="float-left"><b><span class="nro_productos_buscados">0</span></b> Productos encontrados</h6>
            </div>
            <div class="col-12 m-0 p-0">
                <div class="row" id="cuerpoProductosOfertados">

                </div>
            </div>
        </div>
    </div>
</div>



{{-- BOTON FILTRAR PRODUCTOS --}}
<div class="btn_filtrar_productos">
    <button type="button">
        Filtrar <br> Productos
    </button>
</div>
{{-- FILTRAR PRODUCTOS --}}
<div class="content_modal_filtrar"></div>
<div class="sideban_modal_filtrar_right">
    <button class="p-0" id="close_sidebar_filtrar">
        <i class="fas fa-times"></i>
    </button>

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
                        <div class="form-check mt-1">
                            <input class="form-check-input" name="fitroorden" type="radio" class="fitroorden" value="ofertas" id="filtro_orden_ofertas" checked>
                            <label class="form-check-label" for="filtro_orden_ofertas">
                                Por Defecto
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
    @include('publico.ofertas.indexjs')
@endsection