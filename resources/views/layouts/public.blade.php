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
            <div class="row m-0">
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
                <div class="col-6 col-sm-4 col-md-5 col-lg-6 p-0 " id="header_top_restaurant">
                    <a class="btn btn_recommended d-flex justify-content-around" href="{{ route('registrartuempresa') }}">Afilia a tu restaurante</a>
                </div>
                
                {{-- APPS --}}
                <div class="col-3 col-sm-4 col-md-2 col-lg-2 p-0" id="header_top_apps">
                    <div class="header_top_options">
                        <button type="button" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Apps <i class="fas fa-angle-down"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown_options p-0">
                            <a class="btn btn_app_android p-0" href="#">
                                <img src="{{asset('pedidos/image/appmovil/googleplay.png')}}" alt="">
                            </a>
                            <a class="btn btn_app_ios p-0" href="#">
                                <img src="{{asset('pedidos/image/appmovil/appstore.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
    
                {{-- LOGIN --}}
                <div class="col-3 col-sm-4 col-md-2 col-lg-2 p-0 " id="header_top_login">

                  @if ( Auth::user() == '' || Auth::user() == null )
                    
                    <div class="header_top_options">
                        <button type="button" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Mi cuenta <i class="fas fa-angle-down"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown_options p-0 pb-2">
                            <a class="btn btn_login" href="{{ route('login') }}">Identifícate</a>
                            <a class="btn btn_register" href="{{ route('register') }}">Regístrate</a>
                            <hr class="my-2">
                            
                            <button id="btn_open_favorites">
                                Favoritos <i class="fas fa-heart"></i>
                            </button>
                        </div>
                        
                    </div>    
                    @else
                    <div class="header_top_options">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                {{-- <a class="nav-link" data-toggle="dropdown" href="#">
                                    <img width="25px" height="25px" 
                                        @if ( auth()->user()->avatar != null && Storage::disk('usuarios')->exists('usuarios/').auth()->user()->avatar )
                                        src="{{ asset( Storage::disk('usuarios')->url('usuarios/').auth()->user()->avatar ) }}" 
                                        @else 
                                        src="{{ asset( Storage::disk('usuarios')->url('usuarios/default.png') )  }}" 
                                        @endif
                                        src="{{Storage::url('usuarios/default.png')}}"
                                        
                                    alt="{{ auth()->user()->name }}" class="rounded-circle logoPerfilForm">
                                    
                                </a> --}}
                                <button type="button" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ auth()->user()->name }} <i class="fas fa-angle-down"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                    @guest
                                    @else
                                        <a class="dropdown-item" href="{{ route('usuarios.miperfil') }}"><i class="fas fa-users-cog"></i></i> Mi cuenta</a>
                                        <div class="dropdown-divider"></div>

                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt"></i> {{ __('Cerrar sesion') }}
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </a>
                                    @endguest
                                </div>
                            </li>
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </header>
    <!-- MENU WEB 2 -->
    <div class="container-fluid header_top_secondary mx-0 px-0 sticky-top">
        <div class="container">
            <div class="row m-0">
                {{-- ABRIR MENU MOVIL --}}
                <div class="col-2 col-sm-1 col-md-1 px-0" id="humberger__open">
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
                <div class="col-2 col-sm-2 col-md-2 col-lg-2 px-0 d-flex justify-content-around" id="header__logo">
                    <a href="{{ route('inicio.index') }}">
                        <img src="{{asset('pedidos/image/logo.png')}}" alt="">
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
                <div class="col-8 col-sm-9 col-md-9 col-lg-8 px-0" id="search_web">
                    <div class="header_search_web">
                        <form id="form_buscar_productos" action="">
                            <div class="input-group input_group_search">
                                <input id="txtBuscarTextoGeneral" type="text" class="form-control input_buscar" placeholder="Buscar en Ogani: Productos, Restaurantes, Lugares" aria-label="Buscar" autofocus name="buscar" value="{{request()->query('buscar')}}">

                                <div class="input-group-append">
                                    <a href="#" class="btn btn_buscar_productos">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- MENU MOVIL --}}
    <div class="modal left fade" id="open_menu_movil" tabindex="-1" role="dialog" aria-labelledby="open_menu_movil">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header py-1 bg-dark">
                    <div class="modal-title">
                        <a href="#"><img src="{{asset('pedidos/image/logo.png')}}" alt=""></a>
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
    <div class="content_modal"></div>
    <div class="sideban_modal_right">
        <button class="p-0" id="close_sidebar">
            <i class="fas fa-times"></i>
        </button>

        <div class="cart_content">
            <div class="cart_tittle_favorites">
                <a href="#" class="btn btn_link_favoritos">Ver Todos</a>
            </div>
            <div class="scroll_cart_content">
                <div class="row m-0 p-3" id="mostarFavoritosProductos">
                    
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
                            <img src="{{asset('pedidos/image/logo.png')}}" alt="">
                        </a>
                    </div>
                    <div class="text-center">
                        <a class="btn btn_app_android" href="#">
                            <img src="{{asset('pedidos/image/appmovil/googleplay.png')}}" alt="" style="width: 110px">
                        </a>
                        <a class="btn btn_app_ios" href="#">
                            <img src="{{asset('pedidos/image/appmovil/appstore.png')}}" alt="" style="width: 110px">
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