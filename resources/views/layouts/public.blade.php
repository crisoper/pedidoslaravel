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
            
            <div class="humberger__menu__login">
                <div class="row">
                    <div class="col-6">
                        <a href="#"><i class="fa fa-user"></i> Registrarse</a>
                    </div>
                    <div class="col-6">
                        <a href="#"><i class="fa fa-user"></i> Ingresar</a>
                    </div>
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
                        {{-- SERVICIO AL CLIENTE --}}
                        <div class="col-6 col-sm-6 col-md-3 col-lg-2">
                            <div class="header__top__titulo text-left">
                                <div>Servicio al cliente <i class="fas fa-angle-down"></i></div>
                                <ul class="header__top__titulo_service">
                                    <hr class="my-0">
                                    <li style="width: 100%"><a href="#">Escribenos</a></li>
                                    <hr class="my-0">
                                    <li style="width: 100%">
                                        <p class="mb-0">+65 11.188.888</p>
                                        <p class="my-0 small">support 24/7 time</p>
                                    </li>
                                    <hr class="my-0">
                                    <li class="mt-0" style="width: 100%">
                                        <a href="#"><i class="fab fa-facebook-square"></i></a>
                                        <a href="#"><i class="fab fa-twitter-square"></i></a>
                                        <a href="#"><i class="fab fa-linkedin"></i></a>
                                        <a href="#"><i class="fab fa-pinterest-square"></i></a>
                                    </li>
                                    <hr class="my-0">
                                    <li style="width: 100%"><a href="#">Preguntas frecuentes</a></li>
                                </ul>
                            </div>
                        </div>

                        {{-- AFILIAR RESTAURANTE --}}
                        <div class="col-6 col-sm-6 col-md-3 col-lg-5">
                            <div class="header__top__titulo text-center">
                                <div>
                                    <a class="text-primary" href="#">Afilia a tu restaurante</a>
                                </div>
                            </div>
                        </div>
                        
                        {{-- BUSCADOR --}}
                        <div class="col-2 col-sm-3 col-md-1 col-lg-0">
                            <div class="header__search__movil">
                                <div id="search_2"><i class="fa fa-search"></i></div>
                            </div>
                        </div>

                        {{-- CARRITO COMPRAS --}}
                        <div class="col-6 col-sm-5 col-md-3 col-lg-2">
                            <div class="header__cart text-right">
                                <ul>
                                    <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                                    <li class="carrito_compras">
                                        <a href="#">
                                            <i class="fas fa-cart-plus"></i><span>3</span>
                                        </a>
                                        <ul class="compras_item text-center">
                                            <small><b>Como mínimo debes comprar s/ 30.00</b></small>
                                            <hr class="mt-1">
                                            <div class="scroll_cart_header">
                                                <li class="dropdown_cart_header row">
                                                    <div class="col-12 mt-2">
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
                                                    <div class="col-12 mt-2">
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
                                                    <div class="col-12 mt-2">
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
                                                    <div class="col-12 mt-2">
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
                                                    <div class="col-12 mt-2">
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
                                                    <div class="col-12 mt-2">
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

                        {{-- LOGIN --}}
                        <div class="col-4 col-sm-4 col-md-2 col-lg-2">
                            <div class="header__top__titulo text-right">
                                <div>Ingresar <i class="fas fa-angle-down"></i></div>
                                <ul class="header__top__titulo_login">
                                    <hr class="my-0">
                                    <li style="width: 100%"><a href="#">Ingresar</a></li>
                                    <hr class="my-0">
                                    <li style="width: 100%"><a href="#">Registrase</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="header__logo">
                            <a href="./index.html"><img src="{{asset('pedidos/img/logo.png')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <nav class="header__menu">
                            <ul>
                                <li>
                                    <a href="#">Tipos de comida <i class="fas fa-angle-down"></i></a>
                                    <ul class="header__menu__dropdown"  id="menuCategorias">
                                        <!-- li><a href="">Shop Details</a></li -->
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Principales lugares <i class="fas fa-angle-down"></i></a>
                                    <ul class="header__menu__dropdown"  id="">
                                        <!-- li><a href="">Shop Details</a></li -->
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-1">
                        <div class="header__search__web text-right">
                            <a id="search_1" href="#"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                </div>
                <div class="humberger__open">
                    <i class="fa fa-bars"></i>
                </div>
            </div>
        </header>
    </div>
    <!-- Buscador -->
    <div class="search_input pt-3" id="search_input_box">
        <div class="container">
            <div class="row">
                <div class="col-11">
                    <form id="form-buscar-productos" action="">
                        <div class="form-row">
                            <div class="col-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <select name="productos" id="productos" class="form-control">
                                        <option value="0">Seleccionar todos</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-9 col-md-9">
                                <div class="input-group">
                                    <input type="text" class="form-control rounded-1" placeholder="Buscar" aria-label="Buscar" autofocus name="buscar" value="{{request()->query('buscar')}}">
    
                                    <div class="input-group-append">
                                        <a href="#" class="btn btn-outline-secondary" onclick="event.preventDefault(); document.getElementById('form-buscar-productos').submit();">
                                            <i class="fas fa-search"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-1">
                    <span id="close_search" title="Close Search"><i class="fas fa-times-circle"></i></span>
                </div>
            </div>
        </div>
    </div>
    

    
    <section class="content" style="margin-top: 130px">
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

<script>
    // Script que permite guardar el codigo del cliente en local storafe
    function obtenerLocalStorageclienteID () {
        if(typeof(Storage) !== "undefined") {
            if ( !localStorage.LocalStorageclienteID ) {
                $.ajax({
                    url: '{{ route("localstorage.index") }}',
                    method: 'GET',
                    data: { },
                    success: function ( data ) {
                        localStorage.LocalStorageclienteID = data
                    },
                    error: function ( jqXHR, textStatus, errorThrown ) {
                        console.log(jqXHR.responseJSON);
                    }
                });
            }
            return localStorage.LocalStorageclienteID;
        } 
        else {
            return false;
        }
    }

    //Creamos el local Sotorge clienteID
    obtenerLocalStorageclienteID ();
</script>

@yield("scripts")

</html>



