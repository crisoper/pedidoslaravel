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

                                        @if ( env("APP_ENV") == "production")
                                            <img 
                                            src="{{ Storage::url("img_productos/".$foto->nombre)}}" 
                                            alt="{{ $productorecomendado->nombre }}"
                                            @if ( $loop->iteration == 2 )
                                                class="hover-img"
                                            @endif
                                            > 
                                        @else
                                            <img 
                                            src="{{ asset( Storage::disk('img_productos')->url('img_productos/').$foto->nombre ) }}"
                                            alt="{{ $productorecomendado->nombre }}"
                                            @if ( $loop->iteration == 2 )
                                                class="hover-img"
                                            @endif
                                            >
                                        @endif
                                        
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
                                            <button class="abrir_modal_producto" data-toggle="modal" data-target="#exampleModal">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                        <div class="col-2 p-0">
                                            <button class="agregar_favoritos">
                                                <i class="fa fa-heart"></i>
                                            </button>
                                        </div>
                                        <div class="col-8 p-0">
                                            <button class="agregar_cart" idproducto="{{$productorecomendado->id}}">
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

                                        @if ( env("APP_ENV") == "production")
                                            <img 
                                            src="{{ Storage::url("img_productos/".$foto->nombre)}}" 
                                            alt="{{ $productooferta->nombre }}"
                                            @if ( $loop->iteration == 2 )
                                            class="hover-img"
                                            @endif
                                            >    
                                        @else
                                            <img 
                                            src="{{ asset( Storage::disk('img_productos')->url('img_productos/').$foto->nombre ) }}" 
                                            alt="{{ $productooferta->nombre }}"
                                            @if ( $loop->iteration == 2 )
                                                class="hover-img"
                                            @endif
                                            >
                                        @endif
                                        
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
                                            <button class="abrir_modal_producto" data-toggle="modal" data-target="#exampleModal">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                        <div class="col-2 p-0">
                                            <button class="agregar_favoritos">
                                                <i class="fa fa-heart"></i>
                                            </button>
                                        </div>
                                        <div class="col-8 p-0">
                                            <button class="agregar_cart" idproducto="{{$productorecomendado->id}}">
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

                                        @if ( env("APP_ENV") == "production")
                                            <img 
                                            src="{{ Storage::url("img_productos/".$foto->nombre)}}" 
                                            alt="{{ $producto->nombre }}"
                                            @if ( $loop->iteration == 2 )
                                                class="hover-img"
                                            @endif
                                            >    
                                        @else
                                            <img 
                                            src="{{ asset( Storage::disk('img_productos')->url('img_productos/').$foto->nombre ) }}"
                                            alt="{{ $producto->nombre }}"
                                            @if ( $loop->iteration == 2 )
                                                class="hover-img"
                                            @endif
                                            >
                                        @endif
                                        
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
                                                <a class="link_producto_detalle" href="#"><b>{{$productorecomendado->nombre}}</b></a>
                                            </p>
                                            <p class="text-truncate small my-0">{{$productorecomendado->descripcion}}</p>
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
                                            <button class="abrir_modal_producto" data-toggle="modal" data-target="#exampleModal">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                        <div class="col-2 p-0">
                                            <button class="agregar_favoritos">
                                                <i class="fa fa-heart"></i>
                                            </button>
                                        </div>
                                        <div class="col-8 p-0">
                                            <button class="agregar_cart" idproducto="{{$productorecomendado->id}}">
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

                                        @if ( env("APP_ENV") == "production")
                                            <img 
                                            src="{{ Storage::url("img_productos/".$foto->nombre)}}" 
                                            alt="{{ $productomaspedido->nombre }}"
                                            @if ( $loop->iteration == 2 )
                                                class="hover-img"
                                            @endif
                                            >    
                                        @else
                                            <img 
                                            src="{{ asset( Storage::disk('img_productos')->url('img_productos/').$foto->nombre ) }}" 
                                            alt="{{ $productomaspedido->nombre }}"
                                            @if ( $loop->iteration == 2 )
                                                class="hover-img"
                                            @endif
                                            >
                                        @endif
                                        
                                    @endforeach
                                    
                                </div>
                                <!-- Product Description -->
                                <div class="featured__item__text container_product_cart px-3">
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
                                        <div class="col-6 pt-1 pb-2 px-0 m-0 text-center" id="price_product_border">
                                            {{-- <p class="price_product_prev text-muted py-0 my-0">
                                                S/ <span>20.90</span>
                                            </p> --}}
                                            <p class="small"></p>
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
                                            <button class="abrir_modal_producto" data-toggle="modal" data-target="#exampleModal">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                        <div class="col-2 p-0">
                                            <button class="agregar_favoritos">
                                                <i class="fa fa-heart"></i>
                                            </button>
                                        </div>
                                        <div class="col-8 p-0">
                                            <button class="agregar_cart" idproducto="{{$productorecomendado->id}}">
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body m-0 py-0">
                    <div class="row mt-3 mb-3">
                        <div class="col-12 col-lg-6 ">
                            <div class="card card-raised card-carousel">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
                                  <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
                                  </ol>
                                  <div class="carousel-inner">
                                    <div class="carousel-item active">
                                      <img class="d-block w-100" src="https://rawgit.com/creativetimofficial/material-kit/master/assets/img/bg.jpg"
                                      alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                      <img class="d-block w-100" src="https://rawgit.com/creativetimofficial/material-kit/master/assets/img/bg2.jpg"  alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                      <img class="d-block w-100" src="https://rawgit.com/creativetimofficial/material-kit/master/assets/img/bg3.jpg" alt="Third slide">
                                    </div>
                                  </div>
                                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <i class="fas fa-chevron-left"></i>
                                  </a>
                                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <i class="fas fa-chevron-right"></i>
                                  </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 px-2" id="product_description">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <h4>Flared Shift Dress</h4>
                                    </div>
                                    <div class="col-8 col-sm-9 col-lg-8">
                                        <div class="row">
                                            <div class="col-12 col-sm-4 col-lg-5 small">
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="col-12 col-sm-7 col-lg-7 small">
                                                <a href="#">(1 customer review)</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 col-sm-3 col-lg-4">
                                        <span><i class="fa fa-check-circle-o text-success"></i> in stock</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12"><h3 class="my-3">$29.00</h3></div>
                                    <div class="col-12">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-5 col-sm-5 col-lg-5">
                                                <div class="shoping__cart__quantity">
                                                    <div class="quantity">
                                                        <div class="pro-qty border">
                                                            <input type="text" value="1">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 col-sm-4 col-lg-5 px-0 ">
                                                <a href="#" class="btn btn-dark form-control my-0">
                                                    <span id="cart_name">Add to cart</span>
                                                    <span id="cart_logo"><i class="fas fa-cart-plus"></i></span>
                                                </a>
                                            </div>
                                            <div class="col-3 col-sm-3 col-lg-2 text-center">
                                                <a href="#" class="btn btn-dark"><i class="far fa-heart"></i></a>
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
    </div>
    <!-- END MODAL PRODUCTOS -->


@endsection


@section('scripts')

    @include('publico.inicio.carjs')
    {{-- @include('publico.inicio.recomendadosjs') --}}
    {{-- @include('publico.inicio.ofertasjs') --}}
    {{-- @include('publico.inicio.nuevosjs') --}}
    {{-- @include('publico.inicio.maspedidosjs') --}}

@endsection