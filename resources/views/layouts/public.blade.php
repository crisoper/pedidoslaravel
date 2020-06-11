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
    </div>
    
    <!-- MENU WEB 1 -->
    <header class="container-fluid header__top bg-dark mx-0 px-5">
        <div class="row">
            {{-- SERVICIO AL CLIENTE --}}
            <div class="col-6 col-sm-6 col-md-3 col-lg-2 p-0 header_top_client">
                <div class="btn-group">
                    <button type="button" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Servicio al cliente <i class="fas fa-angle-down"></i>
                    </button>
                    <div class="dropdown-menu dropdown_menu">
                        <div><a href="#">Escribenos</a></div>
                        <hr class="my-1">
                        <div class="">
                            <p class="mb-0 number_phone">+51 976301482</p>
                            <p class="my-0 suport"><small>Soporte 24/7</small></p>
                        </div>
                        <hr class="mt-2 mb-1">
                        <div><a href="#">Preguntas frecuentes</a></div>
                    </div>
                </div>
            </div>

            {{-- AFILIAR RESTAURANTE --}}
            <div class="col-6 col-sm-6 col-md-5 col-lg-6 p-0 header_top_recommended">
                <a class="btn btn_recommended" href="{{ route('registrartuempresa') }}">Afilia a tu restaurante</a>
            </div>
            
            {{-- APPS --}}
            <div class="col-4 col-sm-4 col-md-2 col-lg-2 p-0 header_top_login">
                <div class="btn-group">
                    <button type="button" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Apps <i class="fas fa-angle-down"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown_menu">
                        <div>
                            <a class="btn btn_app_android" href="#">
                                <img src="{{asset('img/appmovil/googleplay.png')}}" alt="">
                            </a>
                        </div>
                        <hr class="my-1">
                        <div>
                            <a class="btn btn_app_ios" href="#">
                                <img src="{{asset('img/appmovil/appstore.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- LOGIN --}}
            <div class="col-4 col-sm-4 col-md-2 col-lg-2 p-0 header_top_login">
                <div class="btn-group">
                    <button type="button" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Iniciar sesión <i class="fas fa-angle-down"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown_menu">
                        <div class="d-flex justify-content-center">
                            <a class="btn btn_login" href="{{ route('login') }}">Identifícate</a>
                        </div>
                        <hr class="my-2">
                        <div class="d-flex justify-content-center mb-1">
                            <a class="btn btn_register" href="{{ route('register') }}">Regístrate</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- MENU WEB 2 -->
    <div class="container-fluid header_top_secondary mx-0 px-5 sticky-top">
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
                <a href="{{ route('inicio.index') }}">
                    <img src="{{asset('pedidos/img/logo.png')}}" alt="">
                </a>
            </div>
            
            {{-- MENU CATEGORIAS --}}
            <div class="col-4 col-md-2 col-lg-2 px-0" id="menu_categorias">
                <div class="header_menu_categorias">
                    <nav class="navbar navbar-expand-lg p-0">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link btn_ text-uppercase" href="#" data-toggle="dropdown">
                                    <i class="fas fa-bars"></i> Categorías <i class="fas fa-angle-down ml-3"></i>
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
                </div>
            </div>

            {{-- BUSCADOR WEB --}}
            <div class="col-2 col-md-6 col-lg-4 px-0" id="search_web">
                <div class="header_search_web">
                    <form id="form_buscar_productos" action="">
                        <div class="form-row">
                            <div class="col-12 px-4">
                                <div class="input-group">
                                    <input type="text" class="form-control input_buscar" placeholder="Buscar productos o categorías" aria-label="Buscar" autofocus name="buscar" value="{{request()->query('buscar')}}">
    
                                    <div class="input-group-append">
                                        <a href="#" class="btn btn_buscar_productos" onclick="event.preventDefault(); document.getElementById('form_buscar_productos').submit();">
                                            <i class="fas fa-search"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- BUSCADOR MOVIL --}}
            <div class="col-2 col-md-0 col-lg-0 px-0" id="search_movil">
                <div class="header_search_movil">
                    <button id="header_search_movil">
                        <div class="row">
                            <div class="col-12 col-lg-6 d-flex justify-content-center" id="icon_search">
                                <h3><i class="fa fa-search"></i></h3>
                            </div>
                            <div class="col-12 col-lg-6 d-flex justify-content-center">
                                <p class="small m-0 p-0">Buscar</p>
                            </div>
                        </div>
                    </button>
                </div>
            </div>

            {{-- LISTA DE DESEOS --}}
            <div class="col-2 col-md-1 col-lg-2 px-0">
                <div class="btn-group header_top_favorites">
                    <button type="button" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="mostrarProductosListaDeseosMenuFlotante">
                        <div class="row">
                            <div class="col-12 col-lg-6 text-right" id="icon_favorites">
                                <h3><i class="fa fa-heart"></i><span>5</span></h3>
                            </div>
                            <div class="col-12 col-lg-6 text-left" id="content_mi_pedido_fav">
                                <p class="small m-0 p-0">Mi lista <br> de deseos</p>
                            </div>
                        </div>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right header_favorites">
                        <small><b>Mi lista de deseos</b></small>
                        <hr class="mt-1">
                        <div class="scroll_favorites_header">
                            <div class="dropdown_favorites_header row" id="mostrarProductosListaDeseosMenuFlotanteItems">
                                {{-- <div class="col-12 mt-2">
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
                                </div> --}}
                            </div>
                        </div>

                        <hr class="mb-1">
                        <div class="bottom_total">
                            <a class="btn btn_pedido_favorites" href="{{route('listadedeseos.index')}}">Ver Todos</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- LISTA DE PEDIDOS  --}}
            <div class="col-2 col-md-1 col-lg-2 p-0">
                <div class="btn-group header_top_cart">
                    <button type="button" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="mostrarProductosCestaMenuFlotante">
                        <div class="row">
                            <div class="col-12 col-lg-6 text-right" id="icon_pedido">
                                <h3><i class="fas fa-shopping-basket"></i><span>3</span></h3>
                            </div>
                            <div class="col-12 col-lg-6 text-left" id="content_mi_pedido">
                                <p class="small m-0 p-0">Mi pedido</p>
                                <h5 class="small m-0 p-0" id="amount_menu_pedido">S/ 100.00</h5>
                            </div>
                        </div>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right header_cart">
                        <small class="holamundo"><b>Como mínimo debes comprar s/ 30.00</b></small>
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
                                    <h5 class="sumaCantidadCestaMenu_content">
                                        <span class="sumaCantidadCestaMenu">0</span> Productos
                                    </h5>
                                </div>
                                <div class="col-5">
                                    <small>Total:</small>
                                    <h5 class="sumaTotalCestaMenu_content">
                                        <b>S/ <span class="sumaTotalCestaMenu">0.00</span></b>
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
    
    
    
    <section style="margin-top: 30px;">
        <main>
            @yield('contenido')
        </main>
    </section>

    {{-- <div class="clear"></div> --}}


    <!-- Footer Section Begin -->
    <footer class="container-fluid footer m-0 mt-5">
        <div class="container">
            <div class="row footer_info">
                <div class="col-lg-3 col-md-6 col-sm-6 footer_logo">
                    <div class="text-center">
                        <a href="{{ route('inicio.index') }}">
                            <img src="{{asset('pedidos/img/logo.png')}}" alt="">
                        </a>
                    </div>
                    <div class="text-center">
                        <a class="btn btn_app_android" href="#">
                            <img src="{{asset('img/appmovil/googleplay.png')}}" alt="" style="width: 110px">
                        </a>
                        <a class="btn btn_app_ios" href="#">
                            <img src="{{asset('img/appmovil/appstore.png')}}" alt="" style="width: 110px">
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 footer_links text-center">
                    <h5><b>Acerca de Pedidos.com</b></h5>
                    <p class="my-1"><a href="#">Nosotros</a></p>
                    <p class="my-1"><a href="#">Contáctanos</a></p>
                    <p class="my-1"><a href="#">Quienes somos</a></p>
                    <p class="my-1"><a href="#">Preguntas frecuentes</a></p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 footer_links text-center">
                    <h5><b>Más información</b></h5>
                    <p class="my-1"><a href="#">Afilia a tu restaurante</a></p>
                    <p class="my-1"><a href="#">Pedir delivery</a></p>
                    <p class="my-1"><a href="#">Seguimiento de delivery</a></p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 footer_links text-center">
                    <h5><b>Políticas y condiciones</b></h5>
                    <p class="my-1"><a href="#">Políticas de Privacidad</a></p>
                    <p class="my-1"><a href="#">Términos y Condiciones</a></p>
                    <p class="my-1"><a href="#">Libro de Reclamaciones</a></p>
                </div>
            </div>
        </div>
        <div class="row bg-dark copyright pt-2 pb-0">
            <div class="col-lg-12">
                <p class="text-center p-0">
                    Copyright &copy;2020 - Derechos Reservados | <b>Delivery.com</b>
                </p>
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



