@extends('layouts.public')

@section('contenido')



	<!-- Empresas recomendadas -->
	<div class="product-area most-popular section mb-5">
        <div class="container">
            <div class="row">
				<div class="col-12">
					<div class="section-title mb-0">
						<h2>Restaurantes recomendados</h2>
					</div>
				</div>
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
                        <div class="single_empresas_wrapper bg-light mx-2 mt-2 mb-3">
                            <div class="product-img">
                                <img src="pedidos/img/featured/feature-2.jpg" alt="">
                                <img class="hover-img" src="pedidos/img/featured/feature-4.jpg" alt="">
                                <div class="product-badge new-badge">
                                    <span>New</span>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="featured__item__text px-3">
                                <h6 class="mb-0"><b>Nombre del Restaurant</b></h6>
                                <p class="small my-0">Dirección del restaurant</p>
                                <hr class="mt-0 mb-1">
                                <div class="row mb-2">
                                    <div class="col-12 mx-auto">
                                        <a class="visitar_empresa" href="#">Visitar <i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_empresas_wrapper bg-light mx-2 mt-2 mb-3">
                            <div class="product-img">
                                <img src="pedidos/img/featured/feature-2.jpg" alt="">
                                <img class="hover-img" src="pedidos/img/featured/feature-4.jpg" alt="">
                                <div class="product-badge offer-badge">
                                    <span>-30%</span>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="featured__item__text px-3">
                                <h6 class="mb-0"><b>Nombre del Restaurant</b></h6>
                                <p class="small my-0">Dirección del restaurant</p>
                                <hr class="mt-0 mb-1">
                                <div class="row mb-2">
                                    <div class="col-12 mx-auto">
                                        <a class="visitar_empresa" href="#">Visitar <i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_empresas_wrapper bg-light mx-2 mt-2 mb-3">
                            <div class="product-img">
                                <img src="pedidos/img/featured/feature-2.jpg" alt="">
                                <img class="hover-img" src="pedidos/img/featured/feature-4.jpg" alt="">
                            </div>
                            <!-- Product Description -->
                            <div class="featured__item__text px-3">
                                <h6 class="mb-0"><b>Nombre del Restaurant</b></h6>
                                <p class="small my-0">Dirección del restaurant</p>
                                <hr class="mt-0 mb-1">
                                <div class="row mb-2">
                                    <div class="col-12 mx-auto">
                                        <a class="visitar_empresa" href="#">Visitar <i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_empresas_wrapper bg-light mx-2 mt-2 mb-3">
                            <div class="product-img">
                                <img src="pedidos/img/featured/feature-2.jpg" alt="">
                                <img class="hover-img" src="pedidos/img/featured/feature-4.jpg" alt="">
                            </div>
                            <!-- Product Description -->
                            <div class="featured__item__text px-3">
                                <h6 class="mb-0"><b>Nombre del Restaurant</b></h6>
                                <p class="small my-0">Dirección del restaurant</p>
                                <hr class="mt-0 mb-1">
                                <div class="row mb-2">
                                    <div class="col-12 mx-auto">
                                        <a class="visitar_empresa" href="#">Visitar <i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_empresas_wrapper bg-light mx-2 mt-2 mb-3">
                            <div class="product-img">
                                <img src="pedidos/img/featured/feature-2.jpg" alt="">
                                <img class="hover-img" src="pedidos/img/featured/feature-4.jpg" alt="">
                            </div>
                            <!-- Product Description -->
                            <div class="featured__item__text px-3">
                                <h6 class="mb-0"><b>Nombre del Restaurant</b></h6>
                                <p class="small my-0">Dirección del restaurant</p>
                                <hr class="mt-0 mb-1">
                                <div class="row mb-2">
                                    <div class="col-12 mx-auto">
                                        <a class="visitar_empresa" href="#">Visitar <i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_empresas_wrapper bg-light mx-2 mt-2 mb-3">
                            <div class="product-img">
                                <img src="pedidos/img/featured/feature-2.jpg" alt="">
                                <img class="hover-img" src="pedidos/img/featured/feature-4.jpg" alt="">
                            </div>
                            <!-- Product Description -->
                            <div class="featured__item__text px-3">
                                <h6 class="mb-0"><b>Nombre del Restaurant</b></h6>
                                <p class="small my-0">Dirección del restaurant</p>
                                <hr class="mt-0 mb-1">
                                <div class="row mb-2">
                                    <div class="col-12 mx-auto">
                                        <a class="visitar_empresa" href="#">Visitar <i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- End Empresas recomendadas  -->

	<!-- Productos en oferta -->
	{{-- <div class="product-area most-popular_section_mb-5">
        <div class="container">
            <div class="row">
				<div class="col-12">
					<div class="section-title mb-0">
						<h2>Productos en oferta</h2>
					</div>
				</div>
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
						<div class="single-product bg-light" id="single_product">
                            <div class="single-product-wrapper bg-light">
                                <div class="product-img">
                                    <img src="pedidos/img/featured/feature-2.jpg" alt="">
                                    <img class="hover-img" src="pedidos/img/featured/feature-4.jpg" alt="">
                                    <div class="product-favourite">
                                        <a href="#"><i class="fas fa-heart"></i></a>
                                    </div>
                                </div>
                                <!-- Product Description -->
                                <div class="featured__item__text px-3">
                                    <h5 class="mb-0">Nombre del producto</h5>
                                    <p class="small my-0">Breve descripción del producto</p>
                                    <hr class="my-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <s><small><small>P. Normal:</small><b> S/ 20.90</b></small></s>
                                            <h5 class="my-0"><small>Precio:</small> <span class="text-success"> S/ 15.90</span></h5>
                                        </div>
                                    </div>
                                    <hr class="my-1">
                                    <div class="row pl-2">
                                        <div class="col-8">
                                            <div class="shoping__cart__quantity">
                                                <div class="quantity">
                                                    <div class="pro-qty border">
                                                        <input type="text" value="1">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 text-center">
                                            <span class="small">Importe:</span>
                                            <h4 class="small"><b>S/ 15.90</b></h4>
                                        </div>
                                    </div>
                                    <hr class="mt-0 mb-1">
                                    <div class="row mb-2">
                                        <div class="col-6 mx-auto">
                                            <a class="agregar_cart" href="#">Agregar <i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                        <div class="col-3 mx-auto">
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                        </div>
                                        <div class="col-3 mx-auto">
                                            <a data-toggle="modal" data-target="#exampleModal" title="Quick View"><i class="fa fa-eye"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>
						
						<div class="single-product">
                            <div class="product-img">
                                <a href="#">
                                    <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                    <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                </a>
								<div class="button-head">
									<div class="product-action">
										<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
										<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
										<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
									</div>
									<div class="product-action-2">
										<a title="Add to cart" href="#">Add to cart</a>
									</div>
								</div>
                            </div>
                            <div class="product-content">
                                <h3><a href="#">productosOfertas Hot Collection</a></h3>
                                <div class="product-price">
                                    <span>$50.00</span>
                                </div>
                            </div>
						</div>
						
						<div class="single-product">
                            <div class="product-img">
                                <a href="#">
                                    <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                    <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
									<span class="new">New</span>
                                </a>
								<div class="button-head">
									<div class="product-action">
										<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
										<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
										<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
									</div>
									<div class="product-action-2">
										<a title="Add to cart" href="#">Add to cart</a>
									</div>
								</div>
                            </div>
                            <div class="product-content">
                                <h3><a href="#">Awesome Pink Show</a></h3>
                                <div class="product-price">
                                    <span>$50.00</span>
                                </div>
                            </div>
						</div>
						
						<div class="single-product">
                            <div class="product-img">
                                <a href="#">
                                    <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                    <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                </a>
								<div class="button-head">
									<div class="product-action">
										<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
										<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
										<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
									</div>
									<div class="product-action-2">
										<a title="Add to cart" href="#">Add to cart</a>
									</div>
								</div>
                            </div>
                            <div class="product-content">
                                <h3><a href="#">Awesome Bags Collection</a></h3>
                                <div class="product-price">
                                    <span>$50.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
	<!-- End Prodcutos en oferta -->
    

    <!-- Productos nuevo y productos mas pedidos -->
    {{-- <section class="latest_prod_ct spad_pt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 latest_product_border1">
                    <div class="latest_product__text mb-0 pb-0">
                        <h4 class="mb-3">Productos Nuevos</h4>
                        <div class="latest-product__slider owl-carousel" id="seccionProductosNuevo">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="pedidos/img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security 100</h6>
                                        <span>$30.00 1000</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="pedidos/img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security 200</h6>
                                        <span>$30.00 200</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="pedidos/img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="pedidos/img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="pedidos/img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="pedidos/img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6latest_product_border2">
                    <div class="latest_product__text mb-0 pb-0">
                        <h4 class="mb-3">Productos mas pedidos</h4>
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-raised card-carousel pt-2">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
                                      <ol class="carousel-indicators" id="carousel_indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
                                      </ol>
                                      <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="single-slider">
                                                <div class="row border mb-2 mx-2 px-0 py-1">
                                                    <div class="col-2 pr-0 pl-1">
                                                        <img src="pedidos/img/latest-product/lp-1.jpg" alt="">
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 class="mb-0">Nombre del producto</h5>
                                                        <p class="my-0 small">Breve descripción del producto</p>
                                                        <h5><small>Precio:</small> <span class="text-success"> S/ 15.90</span></h5>
                                                    </div>
                                                    <div class="col-4 text-center">
                                                        <div class="shoping__cart__quantity">
                                                            <div class="quantity">
                                                                <div class="pro-qty border">
                                                                    <input type="text" value="1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h6 class="small mb-0">Importe: <b>S/ 15.90</b></h6>
                                                        <a class="agregar_cart mr-3" href="#">Agregar <i class="fa fa-shopping-cart"></i></a>
                                                        <a href="#"><i class="fa fa-heart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="row border mb-2 mx-2 px-0 py-1">
                                                    <div class="col-2 pr-0 pl-1">
                                                        <img src="pedidos/img/latest-product/lp-2.jpg" alt="">
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 class="mb-0">Nombre del producto</h5>
                                                        <p class="my-0 small">Breve descripción del producto</p>
                                                        <h5><small>Precio:</small> <span class="text-success"> S/ 15.90</span></h5>
                                                    </div>
                                                    <div class="col-4 text-center">
                                                        <div class="shoping__cart__quantity">
                                                            <div class="quantity">
                                                                <div class="pro-qty border">
                                                                    <input type="text" value="1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h6 class="small mb-0">Importe: <b>S/ 15.90</b></h6>
                                                        <a class="agregar_cart mr-3" href="#">Agregar <i class="fa fa-shopping-cart"></i></a>
                                                        <a href="#"><i class="fa fa-heart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="row border mb-2 mx-2 px-0 py-1">
                                                    <div class="col-2 pr-0 pl-1">
                                                        <img src="pedidos/img/latest-product/lp-3.jpg" alt="">
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 class="mb-0">Nombre del producto</h5>
                                                        <p class="my-0 small">Breve descripción del producto</p>
                                                        <h5><small>Precio:</small> <span class="text-success"> S/ 15.90</span></h5>
                                                    </div>
                                                    <div class="col-4 text-center">
                                                        <div class="shoping__cart__quantity">
                                                            <div class="quantity">
                                                                <div class="pro-qty border">
                                                                    <input type="text" value="1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h6 class="small mb-0">Importe: <b>S/ 15.90</b></h6>
                                                        <a class="agregar_cart mr-3" href="#">Agregar <i class="fa fa-shopping-cart"></i></a>
                                                        <a href="#"><i class="fa fa-heart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="row border mb-2 mx-2 px-0 py-1">
                                                    <div class="col-2 pr-0 pl-1">
                                                        <img src="pedidos/img/featured/feature-4.jpg" alt="">
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 class="mb-0">Nombre del producto</h5>
                                                        <p class="my-0 small">Breve descripción del producto</p>
                                                        <h5><small>Precio:</small> <span class="text-success"> S/ 15.90</span></h5>
                                                    </div>
                                                    <div class="col-4 text-center">
                                                        <div class="shoping__cart__quantity">
                                                            <div class="quantity">
                                                                <div class="pro-qty border">
                                                                    <input type="text" value="1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h6 class="small mb-0">Importe: <b>S/ 15.90</b></h6>
                                                        <a class="agregar_cart mr-3" href="#">Agregar <i class="fa fa-shopping-cart"></i></a>
                                                        <a href="#"><i class="fa fa-heart"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="single-slider">
                                                <div class="single-product-wrapper border row mb-2 mx-2 px-0 py-1">
                                                    <div class="col-2 product-img">
                                                        <img src="pedidos/img/featured/feature-4.jpg" alt="">
                                                        <img class="hover-img" src="pedidos/img/featured/feature-2.jpg" alt="">
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 class="mb-0">Nombre del producto</h5>
                                                        <p class="my-0 small">Breve descripción del producto</p>
                                                        <h5><small>Precio:</small> <span class="text-success"> S/ 15.90</span></h5>
                                                    </div>
                                                    <div class="col-4 text-center">
                                                        <div class="shoping__cart__quantity">
                                                            <div class="quantity">
                                                                <div class="pro-qty border">
                                                                    <input type="text" value="1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h6 class="small mb-0">Importe: <b>S/ 15.90</b></h6>
                                                        <a class="agregar_cart mr-3" href="#">Agregar <i class="fa fa-shopping-cart"></i></a>
                                                        <a href="#"><i class="fa fa-heart"></i></a>
                                                        <a data-toggle="modal" data-target="#exampleModal" title="Quick View"><i class="fa fa-eye"></i></a>
                                                    </div>
                                                </div>


                                                <div class="row border mb-2 mx-2 px-0 py-1">
                                                    <div class="col-2 pr-0 pl-1">
                                                        <img src="pedidos/img/latest-product/lp-1.jpg" alt="">
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 class="mb-0">Nombre del producto</h5>
                                                        <p class="my-0 small">Breve descripción del producto</p>
                                                        <h5><small>Precio:</small> <span class="text-success"> S/ 15.90</span></h5>
                                                    </div>
                                                    <div class="col-4 text-center">
                                                        <div class="shoping__cart__quantity">
                                                            <div class="quantity">
                                                                <div class="pro-qty border">
                                                                    <input type="text" value="1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h6 class="small mb-0">Importe: <b>S/ 15.90</b></h6>
                                                        <a class="agregar_cart mr-3" href="#">Agregar <i class="fa fa-shopping-cart"></i></a>
                                                        <a href="#"><i class="fa fa-heart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="row border mb-2 mx-2 px-0 py-1">
                                                    <div class="col-2 pr-0 pl-1">
                                                        <img src="pedidos/img/latest-product/lp-1.jpg" alt="">
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 class="mb-0">Nombre del producto</h5>
                                                        <p class="my-0 small">Breve descripción del producto</p>
                                                        <h5><small>Precio:</small> <span class="text-success"> S/ 15.90</span></h5>
                                                    </div>
                                                    <div class="col-4 text-center">
                                                        <div class="shoping__cart__quantity">
                                                            <div class="quantity">
                                                                <div class="pro-qty border">
                                                                    <input type="text" value="1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h6 class="small mb-0">Importe: <b>S/ 15.90</b></h6>
                                                        <a class="agregar_cart mr-3" href="#">Agregar <i class="fa fa-shopping-cart"></i></a>
                                                        <a href="#"><i class="fa fa-heart"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="single-slider">
                                                <div class="row border mb-2 mx-2 px-0 py-1">
                                                    <div class="col-2 pr-0 pl-1">
                                                        <img src="pedidos/img/latest-product/lp-1.jpg" alt="">
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 class="mb-0">Nombre del producto</h5>
                                                        <p class="my-0 small">Breve descripción del producto</p>
                                                        <h5><small>Precio:</small> <span class="text-success"> S/ 15.90</span></h5>
                                                    </div>
                                                    <div class="col-4 text-center">
                                                        <div class="shoping__cart__quantity">
                                                            <div class="quantity">
                                                                <div class="pro-qty border">
                                                                    <input type="text" value="1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h6 class="small mb-0">Importe: <b>S/ 15.90</b></h6>
                                                        <a class="agregar_cart mr-3" href="#">Agregar <i class="fa fa-shopping-cart"></i></a>
                                                        <a href="#"><i class="fa fa-heart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="row border mb-2 mx-2 px-0 py-1">
                                                    <div class="col-2 pr-0 pl-1">
                                                        <img src="pedidos/img/latest-product/lp-1.jpg" alt="">
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 class="mb-0">Nombre del producto</h5>
                                                        <p class="my-0 small">Breve descripción del producto</p>
                                                        <h5><small>Precio:</small> <span class="text-success"> S/ 15.90</span></h5>
                                                    </div>
                                                    <div class="col-4 text-center">
                                                        <div class="shoping__cart__quantity">
                                                            <div class="quantity">
                                                                <div class="pro-qty border">
                                                                    <input type="text" value="1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h6 class="small mb-0">Importe: <b>S/ 15.90</b></h6>
                                                        <a class="agregar_cart mr-3" href="#">Agregar <i class="fa fa-shopping-cart"></i></a>
                                                        <a href="#"><i class="fa fa-heart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="row border mb-2 mx-2 px-0 py-1">
                                                    <div class="col-2 pr-0 pl-1">
                                                        <img src="pedidos/img/latest-product/lp-1.jpg" alt="">
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 class="mb-0">Nombre del producto</h5>
                                                        <p class="my-0 small">Breve descripción del producto</p>
                                                        <h5><small>Precio:</small> <span class="text-success"> S/ 15.90</span></h5>
                                                    </div>
                                                    <div class="col-4 text-center">
                                                        <div class="shoping__cart__quantity">
                                                            <div class="quantity">
                                                                <div class="pro-qty border">
                                                                    <input type="text" value="1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h6 class="small mb-0">Importe: <b>S/ 15.90</b></h6>
                                                        <a class="agregar_cart mr-3" href="#">Agregar <i class="fa fa-shopping-cart"></i></a>
                                                        <a href="#"><i class="fa fa-heart"></i></a>
                                                    </div>
                                                </div>
                                            </div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- End Productos nuevo y productos mas pedidos -->


    <!-- Productos -->
    <section class="new_arrivals_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title mb-3">
                        <h2>Productos</h2>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="karl-projects-menu">
                        <div class="text-center portfolio-menu">
                            <button class="btn active" data-filter="*">TODOS</button>
                            <button class="btn" data-filter=".productosOfertas">EN OFERTA</button>
                            <button class="btn" data-filter=".productosNuevos">NUEVOS</button>
                            <button class="btn" data-filter=".productosMasPedidos">MAS PEDIDOS</button>
                            <button class="btn" data-filter=".shoes">shoes</button>
                            <button class="btn" data-filter=".kids">KIDS</button>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row karl-new-arrivals mb-5">
                        <!-- Single gallery Item Start -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 single_gallery_item productosOfertas wow fadeInUpBig mb-3" data-wow-delay="0.2s">
                            <div class="single_product_wrapper">
                                <div class="product-img">
                                    <img src="pedidos/img/featured/feature-2.jpg" alt="">
                                    <img class="hover-img" src="pedidos/img/featured/feature-4.jpg" alt="">
                                    <!-- Product Badge -->
                                    <div class="product-badge offer-badge">
                                        <span>Oferta</span>
                                    </div>
                                </div>
                                <!-- Product Description -->
                                <div class="featured__item__text px-3">
                                    <h6 class="mb-0"><b>Nombre del producto</b></h6>
                                    <p class="small my-0">Breve descripción del producto</p>
                                    <hr class="my-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="small my-0 text-muted"><small><s>P. Normal: <b> S/ 20.90</b></s></small></p>
                                            {{-- <p></p> --}}
                                            <h5 class="my-0"><small>Precio:</small> <span class="text-success"> S/ 15.90</span></h5>
                                        </div>
                                    </div>
                                    <hr class="my-1">
                                    <div class="row px-1">
                                        <div class="col-7 py-0">
                                            <div class="input_group_unit_product border m-0">
                                                <input type="text" class="text-center" value="1">
                                            </div>
                                        </div>
                                        <div class="col-5 text-center text-muted">
                                            <p class="small py-0 my-0">Importe:</p>
                                            <h4 class="small"><b>S/ 15.90</b></h4>
                                        </div>
                                    </div>
                                    <hr class="mt-0 mb-1">
                                    <div class="row mb-2 px-3">
                                        <div class="col-8 p-0">
                                            <button class="agregar_cart">Agregar 
                                                <i class="fa fa-shopping-cart"></i>
                                            </button>
                                        </div>
                                        <div class="col-2 p-0">
                                            <button class="agregar_favoritos">
                                                <i class="fa fa-heart"></i>
                                            </button>
                                        </div>
                                        <div class="col-2 p-0">
                                            <button class="abrir_modal_producto" data-toggle="modal" data-target="#exampleModal">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        @foreach ($productos as $producto)
                            @if ($producto->created_at->format('Y-m-d') == date('Y-m-d'))
                                <!-- Single gallery Item Start -->
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 single_gallery_item productosNuevos wow fadeInUpBig mb-3" data-wow-delay="0.3s">
                                    <div class="single_product_wrapper">
                                        <div class="product-img">
                                            <img src="{{ asset( Storage::disk('img_productos')->url('img_productos/').$producto->fotos )}}" alt="">
                                            <img class="hover-img" src="pedidos/img/featured/feature-3.jpg" alt="">
                                            <!-- Product Badge -->
                                            <div class="product-badge new-badge">
                                                <span>Nuevo</span>
                                            </div>
                                        </div>
                                        <!-- Product Description -->
                                        <div class="featured__item__text px-3">
                                            <h6 class="mb-0"><b>{{$producto->nombre}}</b></h6>
                                            <p class="small my-0">{{$producto->descripcion}}</p>
                                            <hr class="my-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="small my-0 text-muted"><small><s>P. Normal: <b> S/ 20.90</b></s></small></p>
                                                    {{-- <p></p> --}}
                                                    <h5 class="my-0"><small>Precio:</small> <span class="text-success"> {{$producto->precio}}</span></h5>
                                                </div>
                                            </div>
                                            <hr class="my-1">
                                            <div class="row px-1">
                                                <div class="col-7 py-0">
                                                    <div class="input_group_unit_product border m-0">
                                                        <input type="text" class="text-center" value="1">
                                                    </div>
                                                </div>
                                                <div class="col-5 text-center text-muted">
                                                    <p class="small py-0 my-0">Importe:</p>
                                                    <h4 class="small"><b>S/ 15.90</b></h4>
                                                </div>
                                            </div>
                                            <hr class="mt-0 mb-1">
                                            <div class="row mb-2 px-3">
                                                <div class="col-8 p-0">
                                                    <button class="agregar_cart">Agregar 
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                </div>
                                                <div class="col-2 p-0">
                                                    <button class="agregar_favoritos">
                                                        <i class="fa fa-heart"></i>
                                                    </button>
                                                </div>
                                                <div class="col-2 p-0">
                                                    <button class="abrir_modal_producto" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
        
                        <!-- Single gallery Item Start -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 single_gallery_item productosMasPedidos wow fadeInUpBig mb-3" data-wow-delay="0.4s">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="pedidos/img/featured/feature-3.jpg" alt="">
                                <div class="product-quicview">
                                    <a href="#" data-toggle="modal" data-target="#quickview"><i class="ti-plus"></i></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <h4 class="product-price">$39.90 --- 1</h4>
                                <p>Jeans midi cocktail dress</p>
                                <!-- Add to Cart -->
                                <a href="#" class="add-to-cart-btn">ADD TO CART</a>
                            </div>
                        </div>
        
                        <!-- Single gallery Item Start -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 single_gallery_item shoes wow fadeInUpBig mb-3" data-wow-delay="0.5s">
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
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 single_gallery_item kids wow fadeInUpBig mb-3" data-wow-delay="0.6s">
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
                        </div>
        
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
                {{-- <div>
                    {!! $productos->appends(request()->query() )->links('pagination::bootstrap-4') !!}
                </div> --}}
            </div>
        </div>
    </section>
    <!-- End Todos los productos -->



    <!-- Banner Begin -->
    {{-- <div class="banner mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="pedidos/img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="pedidos/img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Banner End -->

	<!-- Modal -->
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
    <!-- Modal end -->

@endsection


@section('scripts')

    @include('publico.inicio.nuevosjs')
    @include('publico.inicio.indexjs')
    @include('publico.inicio.categoriasjs')
    @include('publico.inicio.carjs')

@endsection