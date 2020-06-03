<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Pedidos') }}</title>


    @include('layouts.publico.styles')

</head>
<body class="contenidoPrincipalPagina">
    
    <!-- Page Preloder -->
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}
    <div class="container-fluid fixed-top m-0 p-0">
        <!-- MENU HAMBURGER APP-->
        <div class="humberger__menu__overlay"></div>
        <div class="humberger__menu__wrapper">
            <div class="humberger__menu__logo py-2 px-3 bg-dark">
                <a href="#"><img src="{{asset('pedidos/img/logo.png')}}" alt=""></a>
            </div>
            
            {{-- LOGIN --}}
            <div class="humberger__menu__login py-2 px-3 bg-dark">
                <div class="row">
                    <div class="col-6">
                        <a href="#">Registrarse</a>
                    </div>
                    <div class="col-6">
                        <a href="#">Ingresar</a>
                    </div>
                </div>
                <hr class="my-2">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('registrartuempresa') }}">Afilia a tu restaurante</a>
                    </div>
                </div>
            </div>


            {{-- MENU APP --}}
            <nav class="humberger__menu__nav py-2">
                {{-- PRIMERO MENU --}}
                <ul class="nav_items px-3">
                    <li class="nav-item nav_expanded">
                        <a class="nav_link" href="#">
                        Menu <i class="fas fa-chevron-right float-right"></i>
                        </a>
                        {{-- SEGUNDO MENU --}}
                        <ul class="nav_items nav_expand_content px-3">
                            <li class="nav-item">
                                <a class="nav_link" href="#">
                                Level 2
                                </a>
                            </li>
                            <li class="nav-item nav_expanded">
                                <a class="nav_link" href="#">
                                Menu <i class="fas fa-chevron-right float-right"></i>
                                </a>
                                {{-- TERCER MENU --}}
                                <ul class="nav_items nav_expand_content pl-3 pr-2">
                                    <li class="nav-item">
                                        <a class="nav_link" href="#">
                                        Level 3
                                        </a>
                                    </li>
                                    <li class="nav-item nav_expanded">
                                        <a class="nav_link" href="#">Menu</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav_link" href="#">Level 3 Directory</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav_link" href="#">Level 3 Contact</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav_link" href="#">Level 3 Quick links</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav_link" href="#">Launchpad</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav_link" href="#">Level 2 Directory</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav_link" href="#">Level 2 Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav_link" href="#">Level 2 Quick links</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav_link" href="#">Launchpad 1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav_link" href="#">Launchpad 1</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav_link" href="#">Directory</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav_link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav_link" href="#">Quick links</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav_link" href="#">Launchpad 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav_link" href="#">Launchpad 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav_link" href="#">Launchpad 3</a>
                    </li>
                </ul>
            </nav>
            
            {{-- ATENCION AL CLIENTE --}}
            <div class="humberger__menu__contact fixed-bottom">
                <hr class="my-1">
                <div class="row">
                    <div class="col-12">
                        <div class="btn-group dropup">
                            <button type="button" class="btn btn_servicio_2 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Servicio al cliente
                            </button>
                            <div class="dropdown-menu">
                                <div><a href="#">Escribenos</a></div>
                                <div>
                                    <p class="mb-0">+65 11.188.888</p>
                                    <p class="my-0 small">support 24/7 time</p>
                                </div>
                                <div>
                                    <a href="#"><i class="fab fa-facebook-square"></i></a>
                                    <a href="#"><i class="fab fa-twitter-square"></i></a>
                                    <a href="#"><i class="fab fa-linkedin"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-square"></i></a>
                                </div>
                                <div><a href="#">Preguntas frecuentes</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- MENU WEB-->
        <header class="header py-0">
            <div class="header__top bg-dark">
                <div class="container">
                    <div class="row">
                        {{-- SERVICIO AL CLIENTE --}}
                        <div class="col-6 col-sm-6 col-md-3 col-lg-2 p-0 header_top_client">
                            <div class="btn-group">
                                <button type="button" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Servicio al cliente <i class="fas fa-angle-down"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <div><a href="#">Escribenos</a></div>
                                    <hr class="my-1">
                                    <div class="">
                                        <p class="mb-0">+65 11.188.888</p>
                                        <p class="my-0 small">support 24/7 time</p>
                                    </div>
                                    <hr class="mt-2 mb-1">
                                    <div><a href="#">Preguntas frecuentes</a></div>
                                </div>
                            </div>
                        </div>

                        {{-- AFILIAR RESTAURANTE --}}
                        <div class="col-6 col-sm-6 col-md-6 col-lg-8 p-0 header_top_recommended">
                            <a class="btn btn_recommended" href="{{ route('registrartuempresa') }}">Afilia a tu restaurante</a>
                        </div>
                        
                        {{-- LOGIN --}}
                        <div class="col-4 col-sm-4 col-md-3 col-lg-2 p-0 header_top_login">
                            <div class="btn-group">
                                <button type="button" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user-circle"></i> Iniciar sesión <i class="fas fa-angle-down"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div>
                                        <a class="btn btn_login" href="{{ route('login') }}">Identifícate</a>
                                    </div>
                                    <hr class="my-2">
                                    <div>
                                        <a class="btn btn_register" href="{{ route('register') }}">Regístrate</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header_top_secondary">
                <div class="container">
                    <div class="row">
                        {{-- ABRIR MENU MOVIL --}}
                        <div class="col-2 col-md-2 px-0" id="humberger__open">
                            <div class="humberger__open text-center">
                                <button>
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-around" id="icon_humberger">
                                            <h3><i class="fa fa-bars"></i></h3>
                                        </div>
                                        <div class="col-12 px-0 d-flex justify-content-around">
                                            <p class="small m-0 p-0">Menú</p>
                                        </div>
                                    </div>
                                </button>
                            </div>
                        </div>

                        {{-- LOGOTIPO --}}
                        <div class="col-4 col-md-2 col-lg-2 px-0 d-flex justify-content-around" id="header__logo">
                            <a href="{{ route('inicio.index') }}"><img src="{{asset('pedidos/img/logo.png')}}" alt=""></a>
                        </div>

                        {{-- MENU WEB --}}
                        <div class="col-md-7 col-lg-4 p-0" id="header_menu">
                            <nav class="navbar navbar-expand-lg p-0">
                                <ul class="navbar-nav">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link btn_" href="#" data-toggle="dropdown">
                                            Todas las categorías
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="has-submenu">
                                                <a class="dropdown-item dropdownCategorias" href="#">
                                                    Categorías <i class="fas fa-angle-right float-right"></i>
                                                </a>
                                                <div class="megasubmenu dropdown-menu" id="dropdownCategorias">
                                                    <ul id="menuCategorias">

                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="has-submenu">
                                                <a class="dropdown-item dropdownLugares" href="#"> 
                                                    Lugares <i class="fas fa-angle-right float-right"></i>
                                                </a>
                                                <div class="megasubmenu dropdown-menu" id="dropdownLugares">
                                                    <ul id="menuLugares">
                                                        Bienvenidos
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="has-submenu">
                                                <a class="dropdown-item dropdownRecomendados" href="#">
                                                    Recomendados <i class="fas fa-angle-right float-right"></i>
                                                </a>
                                                <div class="megasubmenu dropdown-menu" id="dropdownRecomendados">
                                                    <ul id="menuRecomendados">
                                                        hola mundo
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>




                            {{-- <nav class="header__menu">
                                <ul>
                                    <li>
                                        <a href="#">Todas las categorías <i class="fas fa-angle-down"></i></a>
                                        <ul class="header__menu__dropdown"  id="menuCategorias">
                                        </ul>
                                    </li>
                                </ul>
                            </nav> --}}
                        </div>

                        {{-- BUSCADOR --}}
                        <div class="col-2 col-md-1 col-lg-2 px-0">
                            <div class="header__search">
                                <button id="search_1">
                                    <div class="row">
                                        <div class="col-12 col-lg-6 pt-2 text-right" id="icon_search">
                                            <h3><i class="fa fa-search"></i></h3>
                                        </div>
                                        <div class="col-12 col-lg-6 px-0 pt-3 text-left">
                                            <p class="small m-0 p-0">Buscar</p>
                                        </div>
                                    </div>
                                </button>
                            </div>
                        </div>

                        {{-- LISTA DE DESEOS --}}
                        <div class="col-2 col-md-1 col-lg-2 px-0">
                            <div class="btn-group header_top_favorites">
                                <button type="button" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="">
                                    <div class="row">
                                        <div class="col-12 col-lg-6 pt-2 pr-1 text-right" id="icon_favorites">
                                            <h2><i class="fa fa-heart"></i><span>5</span></h2>
                                        </div>
                                        <div class="col-12 col-lg-6 pl-0 pt-3 text-left">
                                            <p class="small m-0 p-0" id="amount_menu_favorites">Mi lista <br> de deseos</p>
                                        </div>
                                    </div>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right header_favorites">
                                    <small><b>Tus productos elegidos como favoritos</b></small>
                                    <hr class="mt-1">
                                    <div class="scroll_favorites_header">
                                        <div class="dropdown_favorites_header row" id="">
                                            <div class="col-12 mt-2">
                                                <div class="row border_caja_favorites">
                                                    <div class="col-2 p-0">
                                                        <img src="pedidos/img/featured/feature-2.jpg" alt="">
                                                    </div>
                                                    <div class="col-6 p-0">
                                                        <p class="favorites_product_description small mb-0">Descripción breve del producto</p>
                                                    </div>
                                                    <div class="col-4 p-0">
                                                        <p class="favorites_product_precio text-success mb-0"><b>S/ 12.90</b></p>
                                                    </div>
                                                    <div class="eliminar_favoritos p-0"><i class="far fa-trash-alt small"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="mb-1">
                                    <div class="bottom_total">
                                        <a class="btn btn_pedido_favorites" href="#">Ver Todos</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- LISTA DE PEDIDOS  --}}
                        <div class="col-2 col-md-1 col-lg-2 p-0">
                            <div class="btn-group header_top_cart">
                                <button type="button" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="mostrarProductosCestaMenuFlotante">
                                    <div class="row">
                                        <div class="col-12 col-lg-6 pt-2 pr-1 text-right" id="icon_pedido">
                                            <h2><i class="fas fa-shopping-basket"></i><span>3</span></h2>
                                        </div>
                                        <div class="col-12 col-lg-6 px-0 pt-3 text-left">
                                            <p class="small m-0 p-0">Mi pedido</p>
                                            <h5 class="small m-0 p-0" id="amount_menu_pedido">S/ 100.00</h5>
                                        </div>
                                    </div>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right header_cart">
                                    <small><b>Como mínimo debes comprar s/ 30.00</b></small>
                                    <hr class="mt-1">
                                    <div class="scroll_cart_header">
                                        <div class="dropdown_cart_header row" id="mostrarProductosCestaMenuFlotanteItems">
                                            {{-- <div class="col-12 mt-2">
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
                                            </div> --}}
                                        </div>
                                    </div>
                                    <hr class="mb-1">
                                    <div class="bottom_total">
                                        <div class="row text-center">
                                            <div class="col-7">
                                                <small>Estas comprando:</small>
                                                <h5 class="text-info">
                                                    <span class="sumaCantidadCestaMenu">2</span> Productos
                                                </h5>
                                            </div>
                                            <div class="col-5">
                                                <small>Total:</small>
                                                <h5 class="text-success">
                                                    <b>S/ <span class="sumaTotalCestaMenu">30.00</span></b>
                                                </h5>
                                            </div>
                                            <div class="col-12">
                                                <a class="btn btn_pedido_cart" href="{{route('cart.index')}}">Realizar Pedido</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
    

    
    <section style="margin-top: 130px">
        <main>
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


</body>


@include('layouts.publico.scripts')
@include('includes.ajaxsetup')
@include('publico.inicio.categoriasjs')

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



