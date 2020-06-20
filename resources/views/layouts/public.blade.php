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
<body class="contenidoPrincipalPagina m-0 p-0">
    
    <!-- Page Preloder -->
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}
    
    
    <!-- MENU WEB 1 -->
    <header class="container-fluid header__top mx-0 px-0 bg-dark">
        <div class="container">
            <div class="row">
                {{-- SERVICIO AL CLIENTE --}}
                <div class="col-6 col-sm-6 col-md-3 col-lg-2 p-0" id="header_top_client">
                    <div class="header_top_options">
                        <button type="button" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Servicio al cliente <i class="fas fa-angle-down"></i>
                        </button>
                        <div class="dropdown-menu dropdown_options p-0">
                            <a class="btn btn_top_client hr_options" href="#">Escribenos</a>
                            <div class="hr_options py-2">
                                <p class="mb-0 number_phone">+51 976301482</p>
                                <p class="my-0 suport"><small>Soporte 24/7</small></p>
                            </div>
                            <a class="btn btn_top_client" href="#">Preguntas frecuentes</a>
                        </div>
                    </div>
                </div>
    
                {{-- AFILIAR RESTAURANTE --}}
                <div class="col-7 col-sm-4 col-md-5 col-lg-6 p-0" id="header_top_restaurant">
                    <a class="btn btn_recommended d-flex justify-content-around" href="{{ route('registrartuempresa') }}">Afilia a tu restaurante</a>
                </div>
                
                {{-- APPS --}}
                <div class="col-5 col-sm-4 col-md-2 col-lg-2 p-0" id="header_top_apps">
                    <div class="header_top_options">
                        <button type="button" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Apps <i class="fas fa-angle-down"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown_options p-0">
                            <a class="btn btn_app_android p-0" href="#">
                                <img src="{{asset('img/appmovil/googleplay.png')}}" alt="">
                            </a>
                            <a class="btn btn_app_ios p-0" href="#">
                                <img src="{{asset('img/appmovil/appstore.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
    
                {{-- LOGIN --}}
                <div class="col-5 col-sm-4 col-md-2 col-lg-2 p-0" id="header_top_login">
                    <div class="header_top_options">
                        <button type="button" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Mi cuenta <i class="fas fa-angle-down"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown_options p-0 pb-2">
                            <a class="btn btn_login" href="{{ route('login') }}">Identifícate</a>
                            <a class="btn btn_register" href="{{ route('register') }}">Regístrate</a>
                            <hr class="my-2">
                            <button class="btn btn_favoritos bg-success" data-toggle="modal" data-target="#modal_favoritos">Favoritos <i class="fa fa-heart"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- MENU WEB 2 -->
    <div class="container-fluid header_top_secondary mx-0 px-0 sticky-top">
        <div class="container">
            <div class="row">
                {{-- ABRIR MENU MOVIL --}}
                <div class="col-2 col-sm-1 col-md-1 " id="humberger__open">
                    <button type="button" class="open_menu_movil p-0" data-toggle="modal" data-target="#open_menu_movil">
                        <div id="icon_humberger">
                            <h4><i class="fa fa-bars"></i></h4>
                        </div>
                        <div id="menu_humberger">
                            <p class="small m-0 p-0">Menú</p>
                        </div>
                    </button>
                </div>
    
                {{-- LOGOTIPO --}}
                <div class="col-4 col-sm-2 col-md-2 col-lg-2 px-0 d-flex justify-content-around" id="header__logo">
                    <a href="{{ route('inicio.index') }}">
                        <img src="{{asset('pedidos/img/logo.png')}}" alt="">
                    </a>
                </div>
                
                {{-- MENU CATEGORIAS --}}
                <div class="col-0 col-sm-0 col-md-0 col-lg-2 px-0" id="menu_categorias">
                    <div class="header_menu_categorias">
                        <button class="btn_menu_categorias" type="button" data-toggle="dropdown">
                            <i class="fas fa-bars"></i> Categorías <i class="fas fa-angle-down ml-3"></i>
                        </button>
                        <ul class="dropdown-menu header_categorias">
                            <li><a class="dropdown-item js-scroll-trigger" href="#preductRecomendado">Recomendados</a></li>
                            <li><a class="dropdown-item js-scroll-trigger" href="#productosEnOferta">Ofertas</a></li>
                            <li><a class="dropdown-item js-scroll-trigger" href="#productosNuevos">Nuevos</a></li>
                            <li><a class="dropdown-item js-scroll-trigger" href="#productosMasPedidos">Mas Pedidos</a></li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item submenu_categorias" href="#">Categorías <i class="fas fa-angle-right float-right pt-1"></i></a>
                                <ul class="dropdown-menu" id="menuCategorias">
                                    
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
    
                {{-- BUSCADOR WEB --}}
                <div class="col-0 col-sm-8 col-md-8 col-lg-7 px-0" id="search_web">
                    <div class="header_search_web">
                        <form id="form_buscar_productos" action="">
                            <div class="form-row">
                                <div class="col-12 px-4">
                                    <div class="input-group">
                                        <input id="txtBuscarTextoGeneral" type="text" class="form-control input_buscar" placeholder="Buscar productos o categorías" aria-label="Buscar" autofocus name="buscar" value="{{request()->query('buscar')}}">
        
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
                <div class="col-2 col-sm-2 col-md-2 col-lg-0 px-0 mx-0" id="search_movil">
                    <div class="header_search_movil">
                        <button id="header_search_movil">
                            <div id="icon_search">
                                <h3><i class="fa fa-search"></i></h3>
                            </div>
                        </button>
                    </div>
                </div>
                
                {{-- LOGIN MOVIL --}}
                <div class="col-2 col-sm-2 col-md-2 col-lg-0 px-0 mx-0" id="login_movil">
                    <div class="header_login_movil">
                        <button type="button" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div id="icon_login_movil">
                                <h3><i class="fas fa-user"></i></h3>
                            </div>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right header_login p-0">
                            <a class="btn btn_login" href="{{ route('login') }}">Identifícate</a>
                            <a class="btn btn_register" href="{{ route('register') }}">Regístrate</a>
                        </div>
                    </div>
                </div>
    
                {{-- LISTA DE DESEOS Y CESTA --}}
                <div class="col-2 col-sm-1 col-md-1 col-lg-1 px-0" id="listadeseos_and_cesta">
                    {{-- LISTA DE DESEOS --}}
                    <div class="header_top_favorites">
                        <button type="button" class="row d-flex justify-content-around" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="mostrarProductosListaDeseosMenuFlotante">
                            <div id="icon_favorites">
                                <h4><i class="fa fa-heart"></i></h4>
                                <p class="m-0 p-0">Favoritos</p>
                            </div>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right header_favorites">
                            <small><b>Mi lista de deseos</b></small>
                            <hr class="mt-1">
                            <div class="scroll_favorites_header">
                                <div class="dropdown_favorites_header row" id="mostrarProductosListaDeseosMenuFlotanteItems">
                                    
                                </div>
                            </div>
    
                            <hr class="mb-1">
                            <div class="bottom_total">
                                <a class="btn btn_pedido_favorites" href="{{route('listadedeseos.index')}}">Ver Todos</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BUSCADOR MOVIL -->
    <div class="search_input pt-3" id="search_input_box">
        <div class="container">
            <div class="header_search_web">
                <form id="form_buscar_productos" action="">
                    <div class="form-row">
                        <div class="col-12">
                            <div class="input-group mt-2">
                                <input type="text" class="form-control input_buscar" placeholder="Buscar productos o categorías" aria-label="Buscar" autofocus name="buscar" value="{{request()->query('buscar')}}">

                                <div class="input-group-append">
                                    <a href="#" class="btn btn_buscar_productos" onclick="event.preventDefault(); document.getElementById('form_buscar_productos').submit();">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </div>
                            </div>
                            <h4 id="close_search"><i class="fas fa-times-circle"></i></h4>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

    {{-- MENU MOVIL --}}
    <div class="modal left fade" id="open_menu_movil" tabindex="-1" role="dialog" aria-labelledby="open_menu_movil">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header py-1 bg-dark">
                    <div class="modal-title">
                        <a href="#"><img src="{{asset('pedidos/img/logo.png')}}" alt=""></a>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-12 p-0" id="scroll_menu_movil">

                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header p-0" id="headingOne">
                                    <a class="btn btn_movil_categorias js-scroll-trigger"  href="#preductRecomendado" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        Recomendados
                                    </a>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header p-0" id="headingTwo">
                                    <a class="btn btn_movil_categorias js-scroll-trigger collapsed"  href="#productosEnOferta" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Ofertas
                                    </a>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header p-0" id="headingThree">
                                    <a class="btn btn_movil_categorias js-scroll-trigger collapsed"  href="#productosNuevos" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Nuevos
                                    </a>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header p-0" id="headingFour">
                                    <a class="btn btn_movil_categorias js-scroll-trigger collapsed"  href="#productosMasPedidos" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        Más pedidos
                                    </a>
                                </div>
                            </div>

                            {{-- CATEGORIAS --}}
                            <div class="card">
                                <div class="card-header p-0" id="headingFive">
                                    <button class="btn btn_movil_categorias collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        Categorías <i class="fas fa-plus float-right pt-1"></i>
                                    </button>
                                </div>
                                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                    <div class="card-body p-0" id="menuMovilCategorias">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    {{-- ATENCION AL CLIENTE --}}
                    <div class="humberger__menu__contact fixed-bottom bg-dark">
                        <button type="button" class="btn btn_servicio_2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Servicio al cliente <i class="fas fa-angle-up"></i>
                        </button>
                        <div class="dropdown-menu dropdown_menu_movil bg-dark">
                            <div class="col-12 p-0 border_movil_info"><a class="btn" href="#">Escribenos</a></div>
                            <div class="col-12 p-0 py-2 border_movil_info text-center">
                                <p class="mb-0 number_phone">+51 976301482</p>
                                <p class="my-0 suport"><small>Soporte 24/7</small></p>
                            </div>
                            <div class="col-12 p-0"><a class="btn" href="#">Preguntas frecuentes</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- FAVORITOS --}}
    <div class="modal right fade" id="modal_favoritos" tabindex="-1" role="dialog" aria-labelledby="modal_favoritos">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header modal_header_favoritos py-1 bg-dark">
                    <button type="button" class="close mr-auto" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times-circle"></i>
                    </button>
                </div>
                <div class="modal-body modal_body_favoritos">
                    <div class="favoritos_productos">
                        <h5 class="titulo_fav_prod my-0">Productos</h5>
                        <div class="content_fav_prod">

                            <div class="row m-0 p-3" id="mostarFavoritosProductos">
                                <div class="col-12 mb-2">
                                    <div class="row border_fav_prod p-1">
                                        <div class="col-3 p-0">
                                            <div class="foto_fav_prod">
                                                <img src="{{asset('pedidos/img/product/product-2.jpg')}}" alt="" class="m-0">
                                            </div>
                                        </div>
                                        <div class="col-9 p-0 pl-2">
                                            <p class="nombre_fav_prod my-0">
                                                <a href="#">Nombre de producto</a>
                                                </p>
                                            <p class="descripcion_fav_prod my-0">Descripcion de producto</p>
                                            <p class="precio_fav_prod mb-0"><b>s/ 14.90</b></p>
                                        </div>
                                        
                                        <div class="p-0 eliminarProductoListaDeseos" producto_id=""><i class="fas fa-trash-alt small"></i></div>
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="row border_fav_prod p-1">
                                        <div class="col-3 p-0">
                                            <div class="foto_fav_prod">
                                                <img src="{{asset('pedidos/img/product/product-2.jpg')}}" alt="" class="m-0">
                                            </div>
                                        </div>
                                        <div class="col-9 p-0 pl-2">
                                            <p class="nombre_fav_prod my-0">
                                                <a href="#">Nombre de producto</a>
                                                </p>
                                            <p class="descripcion_fav_prod my-0">Descripcion de producto</p>
                                            <p class="precio_fav_prod mb-0"><b>s/ 14.90</b></p>
                                        </div>
                                        
                                        <div class="p-0 eliminarProductoListaDeseos" producto_id=""><i class="fas fa-trash-alt small"></i></div>
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="row border_fav_prod p-1">
                                        <div class="col-3 p-0">
                                            <div class="foto_fav_prod">
                                                <img src="{{asset('pedidos/img/product/product-2.jpg')}}" alt="" class="m-0">
                                            </div>
                                        </div>
                                        <div class="col-9 p-0 pl-2">
                                            <p class="nombre_fav_prod my-0">
                                                <a href="#">Nombre de producto</a>
                                                </p>
                                            <p class="descripcion_fav_prod my-0">Descripcion de producto</p>
                                            <p class="precio_fav_prod mb-0"><b>s/ 14.90</b></p>
                                        </div>
                                        
                                        <div class="p-0 eliminarProductoListaDeseos" producto_id=""><i class="fas fa-trash-alt small"></i></div>
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="row border_fav_prod p-1">
                                        <div class="col-3 p-0">
                                            <div class="foto_fav_prod">
                                                <img src="{{asset('pedidos/img/product/product-2.jpg')}}" alt="" class="m-0">
                                            </div>
                                        </div>
                                        <div class="col-9 p-0 pl-2">
                                            <p class="nombre_fav_prod my-0">
                                                <a href="#">Nombre de producto</a>
                                                </p>
                                            <p class="descripcion_fav_prod my-0">Descripcion de producto</p>
                                            <p class="precio_fav_prod mb-0"><b>s/ 14.90</b></p>
                                        </div>
                                        
                                        <div class="p-0 eliminarProductoListaDeseos" producto_id=""><i class="fas fa-trash-alt small"></i></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="favoritos_restaurantes">
                        <h5 class="titulo_fav_rest my-0">Restaurantes</h5>
                        <div class="content_fav_rest">
                            <div class="row m-0 p-3" id="mostarFavoritosRestaurantes">
                                <div class="col-12 mb-2">
                                    <div class="row border_fav_rest p-1">
                                        <div class="col-3 p-0">
                                            <div class="foto_fav_rest">
                                                <img src="{{asset('pedidos/img/banner/banner-1.jpg')}}" alt="" class="m-0">
                                            </div>
                                        </div>
                                        <div class="col-9 p-0 pl-2">
                                            <p class="nombre_fav_rest my-0">
                                                <a href="#">Nombre de Empresa</a>
                                                </p>
                                            <p class="tipococina_fav_rest my-0">Tipo de cocina</p>
                                            <p class="direccion_fav_rest mb-0"><b>Direccion de empresa</b></p>
                                        </div>
                                        
                                        <div class="p-0 eliminarEmpresaListaDeseos" empresa_id=""><i class="fas fa-trash-alt small"></i></div>
                                    </div>
                                </div>                                
                                <div class="col-12 mb-2">
                                    <div class="row border_fav_rest p-1">
                                        <div class="col-3 p-0">
                                            <div class="foto_fav_rest">
                                                <img src="{{asset('pedidos/img/product/product-3.jpg')}}" alt="" class="m-0">
                                            </div>
                                        </div>
                                        <div class="col-9 p-0 pl-2">
                                            <p class="nombre_fav_rest my-0">
                                                <a href="#">Nombre de Empresa</a>
                                                </p>
                                            <p class="tipococina_fav_rest my-0">Tipo de cocina</p>
                                            <p class="direccion_fav_rest mb-0"><b>Direccion de empresa</b></p>
                                        </div>
                                        
                                        <div class="p-0 eliminarEmpresaListaDeseos" empresa_id=""><i class="fas fa-trash-alt small"></i></div>
                                    </div>
                                </div>                                
                                <div class="col-12 mb-2">
                                    <div class="row border_fav_rest p-1">
                                        <div class="col-3 p-0">
                                            <div class="foto_fav_rest">
                                                <img src="{{asset('pedidos/img/product/product-3.jpg')}}" alt="" class="m-0">
                                            </div>
                                        </div>
                                        <div class="col-9 p-0 pl-2">
                                            <p class="nombre_fav_rest my-0">
                                                <a href="#">Nombre de Empresa</a>
                                                </p>
                                            <p class="tipococina_fav_rest my-0">Tipo de cocina</p>
                                            <p class="direccion_fav_rest mb-0"><b>Direccion de empresa</b></p>
                                        </div>
                                        
                                        <div class="p-0 eliminarEmpresaListaDeseos" empresa_id=""><i class="fas fa-trash-alt small"></i></div>
                                    </div>
                                </div>                                
                                <div class="col-12 mb-2">
                                    <div class="row border_fav_rest p-1">
                                        <div class="col-3 p-0">
                                            <div class="foto_fav_rest">
                                                <img src="{{asset('pedidos/img/product/product-3.jpg')}}" alt="" class="m-0">
                                            </div>
                                        </div>
                                        <div class="col-9 p-0 pl-2">
                                            <p class="nombre_fav_rest my-0">
                                                <a href="#">Nombre de Empresa</a>
                                                </p>
                                            <p class="tipococina_fav_rest my-0">Tipo de cocina</p>
                                            <p class="direccion_fav_rest mb-0"><b>Direccion de empresa</b></p>
                                        </div>
                                        
                                        <div class="p-0 eliminarEmpresaListaDeseos" empresa_id=""><i class="fas fa-trash-alt small"></i></div>
                                    </div>
                                </div>                                
                                <div class="col-12 mb-2">
                                    <div class="row border_fav_rest p-1">
                                        <div class="col-3 p-0">
                                            <div class="foto_fav_rest">
                                                <img src="{{asset('pedidos/img/product/product-3.jpg')}}" alt="" class="m-0">
                                            </div>
                                        </div>
                                        <div class="col-9 p-0 pl-2">
                                            <p class="nombre_fav_rest my-0">
                                                <a href="#">Nombre de Empresa</a>
                                                </p>
                                            <p class="tipococina_fav_rest my-0">Tipo de cocina</p>
                                            <p class="direccion_fav_rest mb-0"><b>Direccion de empresa</b></p>
                                        </div>
                                        
                                        <div class="p-0 eliminarEmpresaListaDeseos" empresa_id=""><i class="fas fa-trash-alt small"></i></div>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    {{-- CONTENIDO INICIO --}}
    <section style="margin-top: 30px;">
        <main>
            @yield('contenido')
        </main>
    </section>



    {{-- FOOTER --}}
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


</body>


@include('layouts.publico.scripts')
@include('includes.ajaxsetup')
@include('publico.inicio.categoriasjs')


@include('publico.locales.carjs')
@include('publico.inicio.listadeseosjs')
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



