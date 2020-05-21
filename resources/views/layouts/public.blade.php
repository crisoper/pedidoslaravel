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
                <div class="header__top__right__language">
                    <i class="fa fa-phone"></i>
                    <span class="arrow_carrot-down"></span>
                    <ul>
                        <h5 class="text-light">+65 11.188.888</h5>
                        <span class="text-secondary">support 24/7 time</span>
                    </ul>
                </div>
                <div class="header__top__right__language">
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
                        <div class="header__top__right__language">
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
        <header class="header bg-dark">
            <div class="header__top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="header__top__left">
                                <ul>
                                    <li>
                                        <div class="header__top__right__language">
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
                        <div class="col-lg-6 col-md-6">
                            <div class="header__top__right">
                                <div class="header__top__right__language">
                                    <i class="fa fa-phone"></i>
                                    <span class="arrow_carrot-down"></span>
                                    <ul>
                                        <h5 class="text-light">+65 11.188.888</h5>
                                        <span class="text-secondary">support 24/7 time</span>
                                    </ul>
                                </div>
                                <div class="header__top__right__language">
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
                                <div class="header__top__right__auth">
                                    <a href="#"><i class="fa fa-user"></i> Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="header__logo pt-1 pb-0">
                            <a href="./index.html"><img src="{{asset('pedidos/img/logo.png')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <nav class="header__menu m-0 pb-0">
                            <ul>
                                {{-- <li class="{{! Route::is('/') ?: 'active'}}"><a href="{{route('/')}}">Home</a></li> --}}
                                {{-- <li class="{{! Route::is('welcome2.index') ?: 'active'}}"><a href="{{route('welcome2.index')}}">Shop</a></li> --}}
                                {{-- <li class="{{! Route::is('carritocompras.index') ?: 'active'}}"><a href="{{route('carritocompras.index')}}">Cart</a></li> --}}
                                <li><a href="#">Pages</a>
                                    <ul class="header__menu__dropdown">
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
                    </div>
                    <div class="col-lg-3">
                        <div class="header__cart m-0 pb-0">
                            <ul>
                                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                                <li class="shopping">
                                    <a href="#"><i class="fa fa-shopping-bag text-info"></i> <span>3</span></a>
                                    <ul class="shopping_item">
                                        <li class="dropdown_cart_header">
                                            <span class="float-left text-uppercase">2 Items</span>
                                            <a class="float-right text-uppercase" href="#">View Cart</a>
                                        </li>
                                        <hr class="mt-0">
                                        <li class="dropdown_cart_header">
                                            <div class="cart_description float-left">
                                                <h6><a href="#">Woman Ring</a></h6>
                                                <p class="mb-0">1x - <span class="amount">$99.00</span></p>
                                                <a href="#" class="btn border py-0 px-1"><i class="fa fa-remove text-secondary"></i></a>
                                            </div>
                                            <a class="cart_img float-right" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
                                        </li>
                                        <hr>
                                        <li class="dropdown_cart_header">
                                            <div class="cart_description float-left">
                                                <h6><a href="#">Woman Necklace</a></h6>
                                                <p class="mb-0">1x - <span class="amount">$35.00</span></p>
                                                <a href="#" class="btn border py-0 px-1"><i class="fa fa-remove text-secondary"></i></a>
                                            </div>
                                            <a class="cart_img float-right" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
                                        </li>
                                        <hr>
                                        <li class="bottom_total">
                                            <div class="total mx-4">
                                                <span>Total</span>
                                                <span class="total_amount">$134.00</span>
                                            </div>
                                            <a class="btn animate" href="checkout.html">Checkout</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="header__cart__price">item: <span>$150.00</span></div>
                        </div>
                    </div>
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



