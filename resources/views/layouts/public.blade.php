<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Pedidos') }}</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet" type="text/css">

    @include('layouts.publico.styles')

</head>
<body>
    
    <!-- Page Preloder -->
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}
    <div class="container-fluid fixed-top m-0 p-0">
        <!-- MENU HAMBURGER APP-->
        <div class="humberger__menu__overlay"></div>
        <div class="humberger__menu__wrapper">
            <div class="humberger__menu__logo">
                <a href="#"><img src="{{asset('pedidos/img/logo.png')}}" alt=""></a>
            </div>
            <div class="humberger__menu__cart">
                <ul>
                    <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                    <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                </ul>
                <div class="header__cart__price">item: <span>$150.00</span></div>
            </div>
            <div class="humberger__menu__widget">
                <div class="header__top__right__auth mr-3">
                    <a href="#"><i class="fa fa-user"></i> Login</a>
                </div>
                <div class="header__top__right__auth">
                    <a href="#"><i class="fa fa-user"></i> Register</a>
                </div>
            </div>

            {{-- MENU APP --}}
            <nav class="humberger__menu__nav mobile-menu">
                <ul>
                    {{-- <li class="{{! Route::is('/') ?: 'active'}}"><a href="{{route('/')}}">Home</a></li> --}}
                    {{-- <li class="{{! Route::is('welcome2.index') ?: 'active'}}"><a href="{{route('welcome2.index')}}">Shop</a></li>
                    <li class="{{! Route::is('carritocompras.index') ?: 'active'}}"><a href="{{route('carritocompras.index')}}">Cart</a></li> --}}
                    <li><a href="#">Pages</a>
                        <ul class="header__menu__dropdown ml-3">
                            <li><a href="./shop-details.html">Shop Details</a></li>
                            <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                            <li><a href="./checkout.html">Check Out</a></li>
                            <li><a href="./blog-details.html">Blog Details</a></li>
                        </ul>
                    </li>
                    <li><a href="./blog.html">Blog</a></li>
                    <li><a href="./contact.html">Contact</a></li>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
            <div class="header__top__right">
                <div class="header__top__description">
                    <i class="fa fa-phone"></i>
                    <span class="arrow_carrot-down"></span>
                    <ul>
                        <h5 class="text-light">+65 11.188.888</h5>
                        <span class="text-secondary">support 24/7 time</span>
                    </ul>
                </div>
                <div class="header__top__description">
                    {{-- <img src="img/language.png" alt=""> --}}
                    <div>Redes Sociales</div>
                    <span class="arrow_carrot-down"></span>
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                    </ul>
                </div>
            </div>
            
            <div class="humberger__menu__contact">
                <ul>
                    <li>
                        <div class="header__top__description">
                            <div>Servicio al cliente</div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="#">Contáctanos</a></li>
                                <li><a href="#">Preguntas frecuentes</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="#">Afilia a tu restaurante</a></li>
                </ul>
            </div>
        </div>
    
        <!-- MENU WEB-->
        <header class="header bg-dark py-0">
            <div class="header__top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="header__top__titulo">
                                <div class="header__top__description">
                                    <div>Servicio al cliente</div>
                                    <span class="arrow_carrot-down"></span>
                                    <ul>
                                        <li style="width: 100%"><a href="#">Contáctanos</a></li>
                                        <li style="width: 100%"><a href="#">Preguntas frecuentes</a></li>
                                        <li style="width: 100%">
                                            <div class="header__top__right__social">
                                                <a href="#"><i class="text-light fa fa-facebook"></i></a>
                                                <a href="#"><i class="text-light fa fa-twitter"></i></a>
                                                <a href="#"><i class="text-light fa fa-linkedin"></i></a>
                                                <a href="#"><i class="text-light fa fa-pinterest-p"></i></a>
                                            </div>
                                        </li>
                                        <li style="width: 100%">
                                            <h5 class="text-light">+65 11.188.888</h5>
                                            <span class="text-secondary">support 24/7 time</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="header__top__titulo">
                                <div class="header__top__description">
                                    <div><a href="#">Afilia a tu restaurante</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="header__cart p-0">
                                <ul>
                                    <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                                    {{-- Carrito compras --}}
                                    <li class="carrito_compras">
                                        <a href="#">
                                            <i class="fas fa-cart-plus text-success"></i><span>3</span>
                                        </a>
                                        <ul class="compras_item">
                                            <small><b>Como mínimo debes comprar s/ 30.00</b></small>
                                            <hr class="mt-1">
                                            <div class="scroll_cart_header">
                                                <li class="dropdown_cart_header row ml-0 pt-2 pr-2">
                                                    <div class="col-12 mb-2">
                                                        <div class="row border_caja_product">
                                                            <div class="col-2 p-0">
                                                                <img src="pedidos/img/featured/feature-2.jpg" alt="">
                                                            </div>
                                                            <div class="col-6 p-0">
                                                                <p class="cart_product_description small mb-0">Descripción breve del producto</p>
                                                            </div>
                                                            <div class="col-4 p-0">
                                                                <p class="cart_product_precio small text-success mb-0"><b>S/ 12.90</b></p>
                                                                <small class="mt-0 mb-0">x2</small>
                                                            </div>
                                                            <div class="eliminar_compra p-0">x
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                        <div class="row border_caja_product">
                                                            <div class="col-2 p-0">
                                                                <img src="pedidos/img/featured/feature-2.jpg" alt="">
                                                            </div>
                                                            <div class="col-6 p-0">
                                                                <p class="cart_product_description small mb-0">Descripción breve del producto</p>
                                                            </div>
                                                            <div class="col-4 p-0">
                                                                <p class="cart_product_precio small text-success mb-0"><b>S/ 12.90</b></p>
                                                                <small class="mt-0 mb-0">x2</small>
                                                            </div>
                                                            <div class="eliminar_compra p-0">x
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                        <div class="row border_caja_product">
                                                            <div class="col-2 p-0">
                                                                <img src="pedidos/img/featured/feature-2.jpg" alt="">
                                                            </div>
                                                            <div class="col-6 p-0">
                                                                <p class="cart_product_description small mb-0">Descripción breve del producto</p>
                                                            </div>
                                                            <div class="col-4 p-0">
                                                                <p class="cart_product_precio small text-success mb-0"><b>S/ 12.90</b></p>
                                                                <small class="mt-0 mb-0">x2</small>
                                                            </div>
                                                            <div class="eliminar_compra p-0">x
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                        <div class="row border_caja_product">
                                                            <div class="col-2 p-0">
                                                                <img src="pedidos/img/featured/feature-2.jpg" alt="">
                                                            </div>
                                                            <div class="col-6 p-0">
                                                                <p class="cart_product_description small mb-0">Descripción breve del producto</p>
                                                            </div>
                                                            <div class="col-4 p-0">
                                                                <p class="cart_product_precio small text-success mb-0"><b>S/ 12.90</b></p>
                                                                <small class="mt-0 mb-0">x2</small>
                                                            </div>
                                                            <div class="eliminar_compra p-0">x
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                        <div class="row border_caja_product">
                                                            <div class="col-2 p-0">
                                                                <img src="pedidos/img/featured/feature-2.jpg" alt="">
                                                            </div>
                                                            <div class="col-6 p-0">
                                                                <p class="cart_product_description small mb-0">Descripción breve del producto</p>
                                                            </div>
                                                            <div class="col-4 p-0">
                                                                <p class="cart_product_precio small text-success mb-0"><b>S/ 12.90</b></p>
                                                                <small class="mt-0 mb-0">x2</small>
                                                            </div>
                                                            <div class="eliminar_compra p-0">x
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                        <div class="row border_caja_product">
                                                            <div class="col-2 p-0">
                                                                <img src="pedidos/img/featured/feature-2.jpg" alt="">
                                                            </div>
                                                            <div class="col-6 p-0">
                                                                <p class="cart_product_description small mb-0">Descripción breve del producto</p>
                                                            </div>
                                                            <div class="col-4 p-0">
                                                                <p class="cart_product_precio small text-success mb-0"><b>S/ 12.90</b></p>
                                                                <small class="mt-0 mb-0">x2</small>
                                                            </div>
                                                            <div class="eliminar_compra p-0">x
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </div>
                                            
                                            <hr class=" mb-1">
                                            <li class="bottom_total">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <small>Estas comprando:</small>
                                                        <h5 class="text-info">2 Productos</h5>
                                                    </div>
                                                    <div class="col-5">
                                                        <small>Total:</small>
                                                        <h5 class="text-success"><b>S/ 30.00</b></h5>
                                                    </div>
                                                    <div class="col-12">
                                                        <a class="btn btn_pedido_cart" href="{{route('cart.index')}}">Realizar Pedido</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="header__top__titulo">
                                <div class="header__top__description">
                                    <div class="py-1">Ingresar</div>
                                    <span class="arrow_carrot-down"></span>
                                    <ul>
                                        <li style="width: 100%"><a href="#">Ingresar</a></li>
                                        <li style="width: 100%"><a href="#">Registrarse</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container p-0">
                <div class="row p-0">
                    <div class="col-lg-2 py-0">
                        <div class="header__logo py-0">
                            <a href="./index.html"><img src="{{asset('pedidos/img/logo.png')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <section class="hero hero-normal py-0">
                            <div class="hero__categories">
                                <div class="hero__categories__all">
                                    <i class="fa fa-bars"></i>
                                    <span>Todas las categorias</span>
                                </div>
                                <ul id="menuCategorias">
                                    <li><a href="#">Fresh Meat</a></li>
                                    <li><a href="#">Vegetables</a></li>
                                    <li><a href="#">Fruit & Nut Gifts</a></li>
                                    <li><a href="#">Fresh Berries</a></li>
                                    <li><a href="#">Ocean Foods</a></li>
                                    <li><a href="#">Butter & Eggs</a></li>
                                    <li><a href="#">Fastfood</a></li>
                                    <li><a href="#">Fresh Onion</a></li>
                                    <li><a href="#">Papayaya & Crisps</a></li>
                                    <li><a href="#">Oatmeal</a></li>
                                    <li><a href="#">Fresh Bananas</a></li>
                                </ul>
                            </div>
                        </section>
                    </div>
                    {{-- <div class="col-lg-7">
                        <div class="hero__search py-0">
                            <div class="hero__search__form">
                                <form action="#">
                                    <div class="hero__search__categories">
                                        All Categories
                                        <span class="arrow_carrot-down"></span>
                                    </div>
                                    <input type="text" placeholder="What do yo u need?">
                                    <button type="submit" class="site-btn">SEARCH</button>
                                </form>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="humberger__open">
                    <i class="fa fa-bars"></i>
                </div>
            </div>
        </header>
        <!-- Header Section End -->
    </div>


    <section class="content" style="margin-top: 200px">
        <main class="">
            @yield('contenido')
        </main>
    </section>


    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="{{asset('pedidos/img/logo.png')}}" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 60-49 Road 11378 New York</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello@colorlib.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p>
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            </p>
                        </div>
                        <div class="footer__copyright__payment"><img src="pedidos/img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    @include('layouts.publico.scripts')

</body>


@include('includes.ajaxsetup')

@yield("scripts")

</html>



