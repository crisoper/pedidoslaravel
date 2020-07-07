@extends('layouts.public')

@section('contenido')



<div class="container-fluid page_section px-2">
    <div class="row">
        <div class="col-12 section_title mb-2">
            <h2 class="my-1">Nuevos</h2>
        </div>
    </div>        
    <div class="row">
        <div class="col-6 mb-3">
            <h6><b><span class="nro_productos_buscados">0</span></b> Productos encontrados</h6>
        </div>
        {{-- BOTON FILTRAR PRODUCTOS --}}
        <div class="col-6 mb-3 content_filtrar_productos">
            <button type="button" class="btn_filtrar_productos">
                Filtrar Productos
            </button>
        </div>
    </div>
    <div class="row m-0">
        <div class="col-12 m-0 p-0">
            <div class="row text-center" id="cuerpoProductosNuevos">

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
                <div class="col-12 col-lg-6 p-0">
                    <div class="content_imagenes_modal pb-2">
                        <div class="mb-2" id="imagenes_principal_producto_modal">
                            {{-- <img  src="pedidos/img/product/product-1.jpg" alt=""> --}}
                        </div>
                        <div class="text-center" id="imagenes_producto_modal">
                            {{-- <img  src="pedidos/img/product/product-1.jpg" alt=""> --}}
                        </div>
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
        </div>
    </div>
</div>

@endsection

@section('scripts')
    @include('publico.nuevos.indexjs')
@endsection