@extends('layouts.public')

@section('contenido')


<div class="container-fluid mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4 text-center">
                <img src="{{asset('pedidos/img/product/discount/pd-6.jpg')}}" alt="">
                <h4 class="mt-3">Nombre de empresa</h4>
                <p>Rubro de empresa</p>
                <p>Dirección de empresa</p>
                <div class="top_seller_product_rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                </div>
            </div>
            <div class="col-12 col-lg-8 pr-4">
                <div class="row">
                    <div class="col-12 m-0 p-0">
                        <img src="{{asset('pedidos/img/banner/banner-1.jpg')}}" alt="" style="width: 100%;">
                    </div>
                    <div class="col-4 m-0 p-0">
                        <img src="{{asset('pedidos/img/product/discount/pd-1.jpg')}}" alt="" style="width: 100%; height: 200px">
                    </div>
                    <div class="col-4 m-0 p-0">
                        <img src="{{asset('pedidos/img/product/discount/pd-2.jpg')}}" alt="" style="width: 100%; height: 200px">
                    </div>
                    <div class="col-4 m-0 p-0">
                        <img src="{{asset('pedidos/img/product/discount/pd-2.jpg')}}" alt="" style="width: 100%; height: 200px">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 m-0 p-0">
                <div class="section-title mb-0">
                    <h2 class="float-left m-0 p-0">Detalle</h2>
                </div>
            </div>
            <div class="col-12 m-0 p-0">
                <hr class="subrayado_productos mt-1 mb-4">
            </div>
            <div class="col-12 col-lg-6">
                <div class="row">
                    <div class="col-4"><p>Dirección:</p></div>
                    <div class="col-8"><p>Dirección de la empresa</p></div>
                    <div class="col-12"><hr class="mt-1"></div>
                    <div class="col-4">Horario de atención:</div>
                    <div class="col-8">
                        <p class="my-0">Lun - Dom: 12:00 - 17:00</p>
                        <p class="my-0">Jue: 12:00 - 23:00</p>
                        <p class="my-0">Vie - Sáb: 12:00 - 00:00</p>
                    </div>
                    <div class="col-12"><hr class="mt-3"></div>
                    <div class="col-4"><p>Tipo de cocina:</p></div>
                    <div class="col-8"><p>Carnes y Parrillas</p></div>
                    <div class="col-12"><hr class="mt-1"></div>
                    <div class="col-4"><p>Teléfono:</p></div>
                    <div class="col-8"><p>964 268236</p></div>
                    <div class="col-12"><hr class="mt-1"></div>
                    <div class="col-4"><p>Página web:</p></div>
                    <div class="col-8"><a href="#">https://www.google.com/?hl=es_419</a></div>
                    <div class="col-12"><hr class="mt-1"></div>
                    <div class="col-12">
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Exercitationem, odit? Consequatur dolor sequi repellat non necessitatibus aspernatur, at dolores illo hic tempora deleniti, blanditiis asperiores nostrum! Aut commodi et earum.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <img src="{{asset('pedidos/img/banner/mapa-google.jpg')}}" alt="">
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 m-0 p-0">
                <div class="section-title mb-0">
                    <h2 class="float-left m-0 p-0">Productos</h2>
                </div>
            </div>
            <div class="col-12 m-0 p-0">
                <hr class="subrayado_productos mt-1 mb-4">
            </div>
            <div class="col-12 m-0 p-0">
                <div class="row" id="">
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="single_product_wrapper mb-5">
                            <div class="product-img">
                                <img src="{{asset('pedidos/img/product/discount/pd-1.jpg')}}" alt="">
                                <img class="hover-img" src="{{asset('pedidos/img/product/discount/pd-2.jpg')}}" alt="">

                                <div class="product-badge offer-badge">
                                    <span>Oferta</span>
                                </div>
                            </div>
                            
                            
                            <div class="featured__item__text container_product_cart px-3">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="text-truncate my-0">
                                            <a class="link_producto_detalle" href="#"><b>Nombre producto</b></a>
                                        </p>
                                        <p class="text-truncate small my-0">Descripción producto</p>
                                    </div>
                                </div>
                                <hr class="mt-1 mb-0">
                                <div class="row px-2">
                                    <div class="col-6 pt-1 pb-2 px-0 m-0 text-center" id="price_product_border">
                                        {{-- <p class="price_product_prev text-muted py-0 my-0">
                                            S/ <span>20.90</span>
                                        </p> --}}
                                        <p class="small"></p>
                                        <h4 class="price_product_unit my-0">
                                            S/ <span>20.99</span>
                                        </h4>
                                    </div>
                                    <div class="col-6 pt-1 pb-2 px-2 m-0">
                                        <p class="import_price text-muted py-0 my-0">
                                            Importe: <b>S/ <span>15.90</span></b>
                                        </p>
                                        <div class="input_group_unit_product border m-0">
                                            <input type="text" class="text-center input_value_cart" value="1">
                                        </div>
                                    </div>
                                </div>
                                <hr class="mt-0 mb-2">
                                <div class="row mb-2 px-3">
                                    <div class="col-2 p-0">
                                        <button class="abrir_modal_producto hint--top-right" data-hint="Detalle de producto" data-toggle="modal" data-target="#exampleModal">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </div>
                                    <div class="col-2 p-0">
                                        <button class="agregar_lista_deseos hint--top-right" data-hint="Agregar a mi lista de deseos" idproducto="#">
                                            <i class="fa fa-heart"></i>
                                        </button>
                                    </div>
                                    <div class="col-8 p-0">
                                        <button class="agregar_cart hint--top" data-hint="Agregar producto a cesta" idproducto="#">
                                            <span>Agregar</span>
                                            <i class="fas fa-shopping-basket"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                   
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

{{-- @section('scripts')
    @include('publico.recomendados.indexjs')
@endsection --}}