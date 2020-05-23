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
						<div class="single-product bg-light pb-2">
							<div class="product-img">
								<a href="#">
									<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
									<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
								</a>
								<div class="button-head">
									<div class="product-action-2">
										<button class="btn btn-secondary border-0" title="Add to cart" href="#">Visitar</button>
									</div>
								</div>
							</div>
							<div class="product-content mt-0">
								<h3 class="text-center"><a href="#">Restaurante 1</a></h3>
							</div>
                        </div>
                        
						<div class="single-product bg-light pb-2">
							<div class="product-img">
								<a href="#">
									<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
									<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
								</a>
								<div class="button-head">
									<div class="product-action-2">
										<button class="btn btn-secondary border-0" title="Add to cart" href="#">Visitar</button>
									</div>
								</div>
							</div>
							<div class="product-content mt-0">
								<h3 class="text-center"><a href="#">Restaurante 2</a></h3>
							</div>
						</div>
                        
						<div class="single-product bg-light pb-2">
							<div class="product-img">
								<a href="#">
									<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
									<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
								</a>
								<div class="button-head">
									<div class="product-action-2">
										<button class="btn btn-secondary border-0" title="Add to cart" href="#">Visitar</button>
									</div>
								</div>
							</div>
							<div class="product-content mt-0">
								<h3 class="text-center"><a href="#">Restaurante 3</a></h3>
							</div>
						</div>
                        
						<div class="single-product bg-light pb-2">
							<div class="product-img">
								<a href="#">
									<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
									<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
								</a>
								<div class="button-head">
									<div class="product-action-2">
										<button class="btn btn-secondary border-0" title="Add to cart" href="#">Visitar</button>
									</div>
								</div>
							</div>
							<div class="product-content mt-0">
								<h3 class="text-center"><a href="#">Restaurante 4</a></h3>
							</div>
						</div>
                        
						<div class="single-product bg-light pb-2">
							<div class="product-img">
								<a href="#">
									<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
									<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
									<span class="new">New</span>
								</a>
								<div class="button-head">
									<div class="product-action-2">
										<button class="btn btn-secondary border-0" title="Add to cart" href="#">Visitar</button>
									</div>
								</div>
							</div>
							<div class="product-content mt-0">
								<h3 class="text-center"><a href="#">Restaurante 5</a></h3>
							</div>
						</div>
                        
						<div class="single-product bg-light pb-2">
							<div class="product-img">
								<a href="#">
									<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
									<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
								</a>
								<div class="button-head">
									<div class="product-action-2">
										<button class="btn btn-secondary border-0" title="Add to cart" href="#">Visitar</button>
									</div>
								</div>
							</div>
							<div class="product-content mt-0">
								<h3 class="text-center"><a href="#">Restaurante 6</a></h3>
							</div>
						</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- End Empresas recomendadas  -->

	<!-- Prodcutos en oferta -->
	<div class="product-area most-popular section mb-5">
        <div class="container">
            <div class="row">
				<div class="col-12">
					<div class="section-title mb-0">
						<h2>Productos en oferta</h2>
					</div>
				</div>
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
						<div class="single-product bg-light pb-2" id="single_product">
							<div class="product-img pb-0">
                                <img class="d-block w-100" src="https://rawgit.com/creativetimofficial/material-kit/master/assets/img/bg.jpg"
                                alt="First slide">
							</div>
							<div class="product-content mt-1 text-center">
                                <h5>Nombre del producto</h5>
                                <small>Breve descripción del producto</small>
                                <hr class="my-0">
                                <div class="row">
                                    <div class="col-12">
                                        <s><small><small>P. Normal:</small><b> S/ 20.90</b></small></s>
                                    </div>
                                    <div class="col-12 text-center">
                                        <h5><small>Precio:</small> <span class="text-success"> S/ 15.90</span></h5>
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
                                <hr class="my-1">
                                <div>
                                    <div class="row">
                                        <div class="col-6 mx-auto">
                                            <a class="agregar_cart" href="#">Agregar <i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                        <div class="col-3 mx-auto">
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                        </div>
                                        {{-- <div class="col-3 mx-auto">
                                            <a data-toggle="modal" data-target="#exampleModal" title="Quick View"><i class="fa fa-eye"></i></a>
                                        </div> --}}
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
                                <h3><a href="#">Women Hot Collection</a></h3>
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
    </div>
	<!-- End Prodcutos en oferta -->
    

    <!-- Productos nuevo y productos mas pedidos -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 latest_product_border">
                    <div class="latest-product__text">
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
                <div class="col-lg-6 col-md-6">
                    <div class="latest-product__text">
                        <h4 class="mb-3">Productos mas pedidos</h4>
                        <div class="row">
                            <div class="col-12">
                                <div class="product-gallery">
                                    <div class="quickview-slider-active">
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
                                        </div>

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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Productos nuevo y productos mas pedidos -->

    <!-- Todos los productos -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title mb-3">
                        <h2>Todos los pruductos</h2>
                    </div>
                    <div class="featured__controls mb-3">
                        <ul>
                            <li class="active" data-filter="*">Todos</li>
                            <li data-filter=".oranges">Desayunos</li>
                            <li data-filter=".fresh-meat">Almuerzos</li>
                            <li data-filter=".vegetables">Cenas</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat bg-light px-0 pb-3">
                    <div class="featured__item">
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
                        <div class="featured__item__text px-3">
                            {{-- <h5>$30.00</h5> --}}
                            <h5>Nombre del producto</h5>
                            <small>Breve descripción del producto</small>
                            <hr class="my-0">
                            <div class="row">
                                <div class="col-12">
                                    <s><small><small>P. Normal:</small><b> S/ 20.90</b></small></s>
                                </div>
                                <div class="col-12 text-center">
                                    <h5><small>Precio:</small> <span class="text-success"> S/ 15.90</span></h5>
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
                            <hr class="mt-1">
                            <div class="mb-3">
                                <ul class="featured__item__pic__hover1 pb-3">
                                    <li><a class="agregar_cart" href="#">Agregar <i class="fa fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    {{-- <li>
                                        <a data-toggle="modal" data-target="#exampleModal" title="Quick View"><i class="fa fa-eye"></i></a>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fastfood">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="pedidos/img/featured/feature-2.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="pedidos/img/featured/feature-3.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood oranges">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="pedidos/img/featured/feature-4.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
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

@endsection