@extends('layouts.public')

@section('contenido')



{{-- CONTENIDO EMPRESA Y PRODUCTOS --}}
<div class="container-fluid page_section px-2">
    <div class="row m-0 mb-4 content_empresa_pagina">
        <div class="col-12 p-0">

            <div class="row m-0 logos_banners_empresa_pagina">
                <div class="col-12 p-0 mx-auto content_logo_empresa_pagina">
                    <img class="logo_empresa_pagina" src="{{ Storage::url("empresaslogos/".$empresa->logo)}}" alt="">
                </div>
                <div class="col-12 p-0 banner_empresa_pagina">
                    <img src="{{asset('pedidos/image/banners/bannerlocal.jpg')}}" alt="">
                </div>
            </div>
            
            <div class="row m-0 content_nombre_empresa_pagina">
                <div class="col-12 p-0">
                    <h5 class="m-0 text-truncate">{{ $empresa->nombrecomercial }}</h5>
                </div>
                <div class="col-12 pl-0">
                    <hr class="mx-0 my-2 margin_nombre_empresa_pagina">
                </div>
            </div>
            
            <div class="row m-0 content_informacion_empresa_pagina">
                <div class="col-12 col-md-2 col-lg-3 p-0 border__empresa_pagina">
                    <p class="m-0 rubro_empresa_pagina">{{ $empresa->rubro->nombre }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-6 p-0 border__empresa_pagina">
                    <p class="m-0 text_transform">{{ $empresa->departamentoid->nombre }} | {{ $empresa->provincia->nombre }} | {{ $empresa->distrito->nombre }}</p>
                </div>
                <div class="col-12 col-md-4 col-lg-3 p-0">
                    <p class="m-0">Reservaciones - Delivery</p>
                </div>
            </div>
        </div>
        
        <div class="col-12 p-0">
            <hr class="m-0">
        </div>

        <div class="col-12 p-0">
            <nav class="nav_productos_empresa">
                <div class="nav nav_tabs d-flex justify-content-center" id="nav_tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-productos-tab" data-toggle="tab" href="#nav-productos" role="tab" aria-controls="nav-productos" aria-selected="true">
                        DELIVERY
                    </a>
                    <a class="nav-item nav-link" id="nav_reservar-tab" data-toggle="tab" href="#nav_reservar" role="tab" aria-controls="nav_reservar" aria-selected="false">
                        RESERVAR
                    </a>
                    <a class="nav-item nav-link" id="nav-detalles-tab" data-toggle="tab" href="#nav-detalles" role="tab" aria-controls="nav-detalles" aria-selected="false">
                        DETALLES
                    </a>
                </div>
            </nav>
        </div>
    </div>

    <div class="row m-0 content_productos_info_empresa">
        <div class="col-12 pt-4 pb-1 px-2">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-productos" role="tabpanel" aria-labelledby="nav-productos-tab">
                    <div class="row m-0">
                        <div class="col-10 col-md-8 col-lg-7 mb-4">
                            <form id="form_buscar_productos_x_empresa" action="">
                                <div class="input-group">
                                    <input id="txtBuscarProductosXempresa" type="text" class="form-control input_buscar" placeholder="Buscar productos en: {{ $empresa->nombrecomercial }}" aria-label="Buscar" autofocus name="buscar" value="{{request()->query('buscar')}}">

                                    <div class="input-group-append">
                                        <a href="#" class="btn btn_buscar_productos_x_empresa py-0">
                                            <i class="fas fa-search"></i>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>

                        {{-- BOTON FILTRAR PRODUCTOS --}}
                        <div class="col-2 col-md-4 col-lg-5 mb-3 content_filtrar_productos">
                            <button type="button" class="btn_filtrar_productos">
                                <i class="fas fa-filter"></i> <span class="span_filtrar_prod">Filtrar Productos</span>
                            </button>
                        </div>

                        <div class="col-12">
                            <div class="row text-center" id="cuerpoProductosEmpresas">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav_reservar" role="tabpanel" aria-labelledby="nav_reservar-tab">
                    <div class="row m-0">
                        <div class="col-12 col-md-5 col-lg-5 mb-4 mx-auto text-center">
                            <img src="{{ Storage::url("empresaslogos/".$empresa->logo)}}" alt="">
                        </div>
                        <div class="col-11 col-md-6 col-lg-6 py-4 mb-4 mx-auto text-center info_reservar_empresa">
                            <h4 id="idlocal" idlocal="{{ $empresa->id }}">{{ $empresa->nombrecomercial }}</h4>
                            <hr class="mt-3 mb-2">

                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Exercitationem, odit? Consequatur dolor sequi repellat non necessitatibus aspernatur, at dolores illo hic tempora deleniti, blanditiis asperiores nostrum! Aut commodi et earum.</p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-detalles" role="tabpanel" aria-labelledby="nav-detalles-tab">
                    <div class="row m-0">
                        <div class="col-12 col-lg-7 mb-4 mx-auto">
                            <div class="row m-0 py-4 content_info_detalle_empresa">
                                <div class="col-12 col-sm-6"><b>Dirección:</b></div>
                                <div class="col-12 col-sm-6">
                                    <p class="my-0">{{ $empresa->direccion }}</p>
                                    <p class="my-0 text_transform">{{ $empresa->departamentoid->nombre }} | {{ $empresa->provincia->nombre }} | {{ $empresa->distrito->nombre }}</p>
                                </div>
                                <div class="col-12"><hr class="my-4"></div>

                                <div class="col-12 col-sm-6"><b>Horario de atención:</b></div>
                                <div class="col-12 col-sm-6">
                                    @foreach ($empresa->horarios as $horario)
                                        <p class="my-0">{{ $horario->dia }} {{ $horario->horainicio }} - {{ $horario->horafin }} </p>
                                    @endforeach
                                </div>
                                <div class="col-12"><hr class="my-4"></div>

                                <div class="col-12 col-sm-6"><b>Tipo de cocina:</b></div>
                                <div class="col-12 col-sm-6">Carnes y Parrillas</div>
                                <div class="col-12"><hr class="my-4"></div>

                                <div class="col-12 col-sm-6"><b>Teléfono:</b></div>
                                <div class="col-12 col-sm-6">964 268236</div>
                                <div class="col-12"><hr class="my-4"></div>

                                <div class="col-12 col-sm-6"><b>Página web:</b></div>
                                <div class="col-12 col-sm-6">http://pedidoslaravel.test/locales/1</div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 mb-4 mx-auto text-center">
                            <img src="{{asset('pedidos/image/banners/mapagoogle.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- MODAL PRODUCTOS --}}
<div class="modal fade" id="modal_productos_x_empresa" tabindex="-1" role="dialog" aria-labelledby="modal_productos_x_empresa" aria-hidden="true">
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
    @include('publico.locales.indexjs')
@endsection