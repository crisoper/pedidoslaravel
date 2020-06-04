@extends('layouts.public')

@section('contenido')


	<!-- RECOMENDADOS -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title mb-0">
                    <h2>Recomendados</h2>
                </div>
            </div>
            <div class="col-12">
                <hr class="subrayado_productos mt-1">
            </div>
            <div class="col-12 px-1">
                <div class="wrap-slick2">
                    <div class="slick2">
                        @foreach ($productosrecomendados as $productorecomendado)
                            <div class="single_product_wrapper single_product_wrapper_rec mx-2 mb-5">
                                <div class="product-img">
                                    @foreach ($productorecomendado->fotos as $foto)

                                        {{-- @if ( env("APP_ENV") == "production") --}}
                                            <img 
                                            src="{{ Storage::url("img_productos/".$foto->nombre)}}" 
                                            alt="{{ $productorecomendado->nombre }}"
                                            @if ( $loop->iteration == 2 )
                                                class="hover-img"
                                            @endif
                                            > 
                                        {{-- @else
                                            <img 
                                            src="{{ asset( Storage::disk('img_productos')->url('img_productos/').$foto->nombre ) }}"
                                            alt="{{ $productorecomendado->nombre }}"
                                            @if ( $loop->iteration == 2 )
                                                class="hover-img"
                                            @endif
                                            >
                                        @endif --}}
                                        
                                    @endforeach

                                    <!-- Product Badge -->
                                    <div class="product-badge empresa_badge">
                                        <p class="text-truncate p-0">Nombre de empresa</p>
                                    </div>
                                    {{-- <div class="product-badge empresa_direccion_badge">
                                        <p class="text-truncate small p-0">Dirección de empresa</p>
                                    </div> --}}
                                </div>
                                <!-- Product Description -->
                                <div class="featured__item__text container_product_cart featured__item__text_recomendados px-2 pt-2">
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="text-truncate my-0">
                                                <a class="link_producto_detalle" href="#"><b>{{$productorecomendado->nombre}}</b></a>
                                            </p>
                                            <p class="text-truncate small my-0">{{$productorecomendado->descripcion}}</p>
                                        </div>
                                    </div>
                                    <hr class="mt-1 mb-0">
                                    <div class="row px-2">
                                        <div class="col-6 pt-1 pb-2 px-0 m-0" id="price_product_border">
                                            <p class="price_product_prev text-muted py-0 my-0">
                                                S/ <span>20.90</span>
                                            </p>
                                            <h4 class="price_product_unit my-0">
                                                S/ <span>{{$productorecomendado->precio}}</span>
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
                                            <button class="abrir_modal_producto_inicio hint--top-right" data-hint="Detalle de producto" data-toggle="modal" data-target="#modalProductosInicio">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                        <div class="col-2 p-0">
                                            <button class="agregar_lista_deseos hint--top-right" data-hint="Agregar a mi lista de deseos" idproducto="{{$productorecomendado->id}}">
                                                <i class="fa fa-heart"></i>
                                            </button>
                                        </div>
                                        <div class="col-8 p-0">
                                            <button class="agregar_cart hint--top" data-hint="Agregar producto a cesta" idproducto="{{$productorecomendado->id}}">
                                                <span>Agregar</span>
                                                <i class="fas fa-shopping-basket"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- END RECOMENDADOS  -->



    <!-- PRODUCTOS (todos, ofertas, nuevos, mas pedidos, etc) -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="karl-projects-menu">
                    <div class="text-center portfolio-menu">
                        <button class="btn active" data-filter="*">TODOS</button>
                        <button class="btn" data-filter=".productosOfertas">EN OFERTA</button>
                        <button class="btn" data-filter=".productosNuevos">NUEVOS</button>
                        <button class="btn" data-filter=".productosMasPedidos">MAS PEDIDOS</button>
                        {{-- <button class="btn" data-filter=".shoes">shoes</button>
                        <button class="btn" data-filter=".kids">KIDS</button> --}}
                    </div>
                </div>
            </div>
            <div class="col-12">
                <hr class="subrayado_productos mt-1">
            </div>
            <div class="col-12">
                <div class="row karl-new-arrivals mb-5">
                    
                    <!-- PRODUCTOS EN OFERTA -->
                    @foreach ($productosofertas as $productooferta)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 single_gallery_item productosOfertas wow fadeInUpBig mb-0" data-wow-delay="0.2s">
                            <div class="single_product_wrapper mb-5">
                                <div class="product-img">
                                    @foreach ($productooferta->fotos as $foto)

                                        {{-- @if ( env("APP_ENV") == "production") --}}
                                            <img 
                                            src="{{ Storage::url("img_productos/".$foto->nombre)}}" 
                                            alt="{{ $productooferta->nombre }}"
                                            @if ( $loop->iteration == 2 )
                                            class="hover-img"
                                            @endif
                                            >    
                                        {{-- @else
                                            <img 
                                            src="{{ asset( Storage::disk('img_productos')->url('img_productos/').$foto->nombre ) }}" 
                                            alt="{{ $productooferta->nombre }}"
                                            @if ( $loop->iteration == 2 )
                                                class="hover-img"
                                            @endif
                                            >
                                        @endif --}}
                                        
                                    @endforeach

                                    <!-- Product Badge -->
                                    <div class="product-badge offer-badge">
                                        <span>Oferta</span>
                                    </div>
                                </div>
                                <!-- Product Description -->
                                <div class="featured__item__text container_product_cart px-3">
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="text-truncate my-0">
                                                <a class="link_producto_detalle" href="#"><b>{{$productooferta->nombre}}</b></a>
                                            </p>
                                            <p class="text-truncate small my-0">{{$productooferta->descripcion}}</p>
                                        </div>
                                    </div>
                                    <hr class="mt-1 mb-0">
                                    <div class="row px-2">
                                        <div class="col-6 pt-1 pb-2 px-0 m-0" id="price_product_border">
                                            <p class="price_product_prev text-muted py-0 my-0">
                                                S/ <span>20.90</span>
                                            </p>
                                            <h4 class="price_product_unit my-0">
                                                S/ <span>{{$productooferta->precio}}</span>
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
                                            <button class="abrir_modal_producto_inicio hint--top-right" data-hint="Detalle de producto" data-toggle="modal" data-target="#modalProductosInicio">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                        <div class="col-2 p-0">
                                            <button class="agregar_lista_deseos hint--top-right" data-hint="Agregar a mi lista de deseos" idproducto="{{$productooferta->id}}">
                                                <i class="fa fa-heart"></i>
                                            </button>
                                        </div>
                                        <div class="col-8 p-0">
                                            <button class="agregar_cart hint--top" data-hint="Agregar producto a cesta" idproducto="{{$productooferta->id}}">
                                                <span>Agregar</span>
                                                <i class="fas fa-shopping-basket"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
    
                    <!-- PRODUCTOS NUEVOS -->
                    @foreach ($productosnuevos as $producto)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 single_gallery_item productosNuevos wow fadeInUpBig mb-0" data-wow-delay="0.3s">
                            <div class="single_product_wrapper mb-5">
                                <div class="product-img">
                                    @foreach ($producto->fotos as $foto)

                                        {{-- @if ( env("APP_ENV") == "production") --}}
                                            <img 
                                            src="{{ Storage::url("img_productos/".$foto->nombre)}}" 
                                            alt="{{ $producto->nombre }}"
                                            @if ( $loop->iteration == 2 )
                                                class="hover-img"
                                            @endif
                                            >    
                                        {{-- @else
                                            <img 
                                            src="{{ asset( Storage::disk('img_productos')->url('img_productos/').$foto->nombre ) }}"
                                            alt="{{ $producto->nombre }}"
                                            @if ( $loop->iteration == 2 )
                                                class="hover-img"
                                            @endif
                                            >
                                        @endif --}}
                                        
                                    @endforeach

                                    <!-- Product Badge -->
                                    <div class="product-badge new-badge">
                                        <span>Nuevo</span>
                                    </div>
                                </div>
                                <!-- Product Description -->
                                <div class="featured__item__text container_product_cart px-3">
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="text-truncate my-0">
                                                <a class="link_producto_detalle" href="#"><b>{{$producto->nombre}}</b></a>
                                            </p>
                                            <p class="text-truncate small my-0">{{$producto->descripcion}}</p>
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
                                                S/ <span>{{$producto->precio}}</span>
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
                                            <button class="abrir_modal_producto_inicio hint--top-right" data-hint="Detalle de producto" data-toggle="modal" data-target="#modalProductosInicio">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                        <div class="col-2 p-0">
                                            <button class="agregar_lista_deseos hint--top-right" data-hint="Agregar a mi lista de deseos" idproducto="{{$producto->id}}">
                                                <i class="fa fa-heart"></i>
                                            </button>
                                        </div>
                                        <div class="col-8 p-0">
                                            <button class="agregar_cart hint--top" data-hint="Agregar producto a cesta" idproducto="{{$producto->id}}">
                                                <span>Agregar</span>
                                                <i class="fas fa-shopping-basket"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
    
                    <!-- PRODUCTOS MAS  -->
                    @foreach ($productosmaspedidos as $productomaspedido)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 single_gallery_item productosMasPedidos wow fadeInUpBig mb-0" data-wow-delay="0.4s">
                            <div class="single_product_wrapper mb-5">
                                <div class="product-img">
                                    @foreach ($productomaspedido->fotos as $foto)

                                        {{-- @if ( env("APP_ENV") == "production") --}}
                                            <img 
                                            src="{{ Storage::url("img_productos/".$foto->nombre)}}" 
                                            alt="{{ $productomaspedido->nombre }}"
                                            @if ( $loop->iteration == 2 )
                                                class="hover-img"
                                            @endif
                                            >    
                                        {{-- @else
                                            <img 
                                            src="{{ asset( Storage::disk('img_productos')->url('img_productos/').$foto->nombre ) }}" 
                                            alt="{{ $productomaspedido->nombre }}"
                                            @if ( $loop->iteration == 2 )
                                                class="hover-img"
                                            @endif
                                            >
                                        @endif --}}
                                        
                                    @endforeach
                                    
                                </div>
                                <!-- Product Description -->
                                <div class="featured__item__text container_product_cart px-3">
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="text-truncate my-0">
                                                <a class="link_producto_detalle" href="#"><b>{{$productomaspedido->nombre}}</b></a>
                                            </p>
                                            <p class="text-truncate small my-0">{{$productomaspedido->descripcion}}</p>
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
                                                S/ <span>{{$productomaspedido->precio}}</span>
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
                                            <button class="abrir_modal_producto_inicio hint--top-right" data-hint="Detalle de producto" data-toggle="modal" data-target="#modalProductosInicio">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                        <div class="col-2 p-0">
                                            <button class="agregar_lista_deseos hint--top-right" data-hint="Agregar a mi lista de deseos" idproducto="{{$productomaspedido->id}}">
                                                <i class="fa fa-heart"></i>
                                            </button>
                                        </div>
                                        <div class="col-8 p-0">
                                            <button class="agregar_cart hint--top" data-hint="Agregar producto a cesta" idproducto="{{$productomaspedido->id}}">
                                                <span>Agregar</span>
                                                <i class="fas fa-shopping-basket"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
    
                    <!-- Single gallery Item Start -->
                    {{-- <div class="col-12 col-sm-6 col-md-4 col-lg-3 single_gallery_item shoes wow fadeInUpBig mb-0" data-wow-delay="0.5s">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img src="pedidos/img/featured/feature-4.jpg" alt="">
                            <div class="product-quicview">
                                <a href="#" data-toggle="modal" data-target="#quickview"><i class="ti-plus"></i></a>
                            </div>
                        </div>
                        <!-- Product Description -->
                        <div class="product-description">
                            <h4 class="product-price">$39.90 --- 2</h4>
                            <p>Jeans midi cocktail dress</p>
                            <!-- Add to Cart -->
                            <a href="#" class="add-to-cart-btn">ADD TO CART</a>
                        </div>
                    </div>
    
                    <!-- Single gallery Item Start -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 single_gallery_item kids wow fadeInUpBig mb-0" data-wow-delay="0.6s">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img src="pedidos/img/featured/feature-5.jpg" alt="">
                            <div class="product-quicview">
                                <a href="#" data-toggle="modal" data-target="#quickview"><i class="ti-plus"></i></a>
                            </div>
                        </div>
                        <!-- Product Description -->
                        <div class="product-description">
                            <h4 class="product-price">$39.90  ---- 3</h4>
                            <p>Jeans midi cocktail dress</p>
                            <!-- Add to Cart -->
                            <a href="#" class="add-to-cart-btn">ADD TO CART</a>
                        </div>
                    </div> --}}
    
                    <!-- Single gallery Item -->
                    {{-- <div class="col-12 col-sm-6 col-md-4 col-lg-3 single_gallery_item kids wow fadeInUpBig" data-wow-delay="0.7s">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img src="pedidos/img/featured/feature-6.jpg" alt="">
                            <div class="product-quicview">
                                <a href="#" data-toggle="modal" data-target="#quickview"><i class="ti-plus"></i></a>
                            </div>
                        </div>
                        <!-- Product Description -->
                        <div class="product-description">
                            <h4 class="product-price">$39.90</h4>
                            <p>Jeans midi cocktail dress</p>
                            <!-- Add to Cart -->
                            <a href="#" class="add-to-cart-btn">ADD TO CART</a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- END PRODUCTOS -->


	<!-- MODAL PRODUCTOS -->
    <div class="modal fade" id="modalProductosInicio" tabindex="-1" role="dialog" aria-labelledby="modalProductosInicio" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content p-0">
                <div class="modal-body">
                    <button type="button" class="close_modal_inicio" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    
                    <div class="quickview_body row p-0">
                        <div class="col-12 col-lg-5">
                            <div class="quickview_pro_img">
                                <img src="pedidos/img/product/product-1.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-12 col-lg-7">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="titulo_producto_modal_listadeseos">Nombre del producto</h4>
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
                                    <p class="descripcion_preducto_modal_listadeseos">
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
    {{-- @include('publico.inicio.recomendadosjs') --}}
    {{-- @include('publico.inicio.ofertasjs') --}}
    {{-- @include('publico.inicio.nuevosjs') --}}
    {{-- @include('publico.inicio.maspedidosjs') --}}

@endsection