<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Pedidosapp') }}</title>


    @include('layouts.publico.styles')

 

</head>

<body class="contenidoPrincipalPagina m-0 p-0">

    <!-- Page Preloder -->
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}


    <!-- MENU WEB 1 -->
    <header class="container-fluid header__top mx-0 px-0">
        <div class="container">
            <div class="row m-0">
                {{-- SERVICIO AL CLIENTE --}}
                <div class="col-7 col-sm-7 col-md-3 col-lg-2 p-0" id="header_top_client">
                    <div class="header_top_options">
                        <button type="button" class="btn" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            Servicio al cliente <i class="fas fa-angle-down"></i>
                        </button>
                        <div class="dropdown-menu dropdown_options p-0">
                            <a class="btn btn_top_client hr_options" href="#">Escribenos</a>
                            <div class="hr_options py-2">
                                <p class="mb-0 number_phone">+51 976830280</p>
                                <p class="my-0 suport"><small>Soporte 24/7</small></p>
                            </div>
                            <a class="btn btn_top_client" href="{{ route('preguntasfrecuentes') }}">Preguntas frecuentes</a>
                        </div>
                    </div>
                </div>

                {{-- AFILIAR RESTAURANTE --}}
                <div class="col-0 col-sm-0 col-md-7 col-lg-8 p-0 " id="header_top_restaurant">
                    <a class="btn btn_recommended d-flex justify-content-around" href="{{ route('registernewempresa') }}">
                        Regístrate aquí y publica tus productos 
                    </a>
                </div>

                {{-- APPS --}}
                {{-- <div class="col-3 col-sm-3 col-md-2 col-lg-2 p-0" id="header_top_apps">
                    <div class="header_top_options">
                        <button type="button" class="btn" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
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
                </div> --}}

                {{-- LOGIN --}}
                <div class="col-5 col-sm-5 col-md-2 col-lg-2 p-0 " id="header_top_login">

                    @if ( Auth::user() == '' || Auth::user() == null )

                    <div class="header_top_options">
                        <button type="button" class="btn" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            Iniciar Sesión <i class="fas fa-angle-down"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown_options p-0 pb-2">
                            @php
                            $flagLogin = "login";
                            $flagRegister = "register"
                            @endphp

                            <a class="btn btn_login" href="{{ route('loginOrRegister', $flagLogin) }}">Ingresar</a>
                            <a class="btn btn_register" href="{{ route('loginOrRegister', $flagRegister) }}">Registrarse</a>
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
                                        Mi cuenta <i class="fas fa-angle-down"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right dropdown_options">
                                    @guest
                                    @else
                                        <p class="m-0 nombre_cuenta_publica hr_options pt-1 pb-2 text-uppercase">{{ auth()->user()->name }}</p>

                                        @if ( Auth()->user()->hasRole('web_Comprador'))
                                            <a class="dropdown-item btn btn_perfil_cuenta_publica py-2" href="{{ route('loginOrRegister.editar.comprador') }}">
                                                <i class="fas fa-users-cog"></i></i> Mi perfil
                                            </a>
                                            <a class="dropdown-item btn btn_perfil_cuenta_publica_pedidos py-2" href="{{ route('mispedidos') }}">
                                                <i class="fas fa-shopping-basket"></i> Mis pedidos
                                            </a>
                                        @else
                                            <a class="dropdown-item btn btn_perfil_cuenta_publica py-2" href="{{ route('usuarios.miperfil') }}">
                                                <i class="fas fa-users-cog"></i></i> Mi perfil
                                            </a>
                                            <a class="dropdown-item btn btn_perfil_cuenta_publica py-2" href="{{ route('home') }}"><i class="fa fa-cogs" aria-hidden="true"></i> Vista admin</a>
                                        @endif
                                        
                                        <hr class="hr_options m-0">

                                        <a class="dropdown-item btn btn_cerrar_sesion_cuenta_publica pt-2" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt"></i> {{ __('Cerrar sesion') }}
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
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
                <div class="col-2 col-sm-2 col-md-1 p-0" id="humberger__open">
                    <button type="button" class="open_menu_movil p-0" id="mostrar_menumovil">
                        <div id="icon_humberger">
                            <h4><i class="fa fa-bars"></i></h4>
                        </div>
                        <div id="menu_humberger">
                            <p class="small m-0 p-0">Menú</p>
                        </div>
                    </button>
                </div>

                {{-- LOGOTIPO --}}
                <div class="col-4 col-sm-3 col-md-2 col-lg-2 p-0" id="header__logo">
                    <a class="btn btn_logotipo_app pl-2 pr-1 py-1" href="{{ route('inicio.index') }}">
                        <img src="{{asset('pedidos/image/pedidosapp_inicio.png')}}" alt="" width="120">
                    </a>
                </div>

                {{-- MENU CATEGORIAS --}}
                <div class="col-0 col-sm-0 col-md-0 col-lg-2 p-0" id="menu_categorias">
                    <div class="header_menu_categorias">
                        <button class="btn_menu_categorias" type="button" data-toggle="dropdown">
                            <i class="fas fa-bars"></i> Categorías <i class="fas fa-angle-down ml-3"></i>
                        </button>
                        <ul class="dropdown-menu header_categorias">
                            <li><a class="dropdown-item" href="{{ route('recomendados.index') }}">Recomendados</a></li>
                            <li><a class="dropdown-item" href="{{ route('ofertas.index') }}">Ofertas</a></li>
                            <li><a class="dropdown-item" href="{{ route('nuevos.index') }}">Nuevos</a></li>
                            <li><a class="dropdown-item" href="{{ route('maspedidos.index') }}">Mas Pedidos</a></li>
                            <li><a class="dropdown-item" href="{{ route('productos.busqueda.index') }}">Todos Los
                                    Productos</a></li>
                            {{-- <li class="dropdown-submenu">
                                <a class="dropdown-item submenu_categorias" href="#">Categorías <i
                                        class="fas fa-angle-right float-right pt-1"></i></a>
                                <ul class="dropdown-menu" id="menuCategorias">

                                </ul>
                            </li> --}}
                        </ul>
                    </div>
                </div>

                {{-- BUSCADOR WEB --}}
                <div class="col-0 col-sm-5 col-md-7 col-lg-6 p-0" id="search_web">
                    <div class="header_search_web">
                        <form id="form_buscar_productos" action="{{route('productos.busqueda.index')}}">
                            <div class="input-group input_group_search">
                                <input id="txtBuscarTextoGeneral" type="text" class="form-control input_buscar"
                                    placeholder="Buscar Productos" aria-label="Buscar"
                                    autofocus name="buscarproductos" value="{{request()->query('buscarproductos')}}">

                                <div class="input-group-append">
                                    <button class="btn btn_buscar_productos">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- BUSCADOR MOVIL --}}
                <div class="col-2 col-sm-0 col-md-1 col-lg-1 p-0" id="search_movil">
                    <button type="button" class="btn btn_open_search_movil row m-0  float-right" id="mostrar_search_movil_menu">
                        <h4 class="icon_search_movil_menu">
                            <i class="fas fa-search"></i>
                        </h4>
                    </button>
                </div>

                {{-- FAVORITOS --}}
                <div class="col-2 col-sm-2 col-md-1 col-lg-1 p-0" id="menu_favoritos">
                    <button type="button" class="btn btn_open_favorites row m-0 float-right" id="mostrar_favoritos_menu">
                        <h4 class="icon_favoritos_menu">
                            <i class="far fa-heart"></i>
                        </h4>
                        <h6 class="cantidad_favoritos_menu">0</h6>
                    </button>
                </div>

                {{-- CESTA --}}
                <div class="col-2 col-sm-2 col-md-1 col-lg-1 col-xl-1 p-0" id="menu_cesta">
                    <button type="button" class="btn btn_modal_cesta row m-0 float-right" id="mostrar_cesta_menu">
                        <h4 class="icon_cesta_menu">
                            <i class="fas fa-shopping-basket"></i>
                        </h4>
                        <h6 class="cantidad_cesta_menu">0</h6>
                    </button>
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

                            <img src="{{asset('pedidos/image/pedidosapp.png')}}" alt="" width="120">
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
                    <p class="my-1"><a href="nosotros">Nosotros</a></p>
                    <p class="my-1"><a href="{{route('contactate.send')}}">Contáctanos</a></p>
                    <p class="my-1"><a href="quienessomos">Quienes somos</a></p>
                  
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 footer_links text-center">
                    <h5><b>Más información</b></h5>
                <p class="my-1"><a href="{{ route('preguntasfrecuentes') }}">Preguntas frecuentes</a></p>
                    <p class="my-1"><a href="{{ route('mispedidos') }}">Seguimiento de delivery</a></p>
                    <p class="my-1"><a href=" {{ route('registernewempresa') }} ">Regístrate y publica tus productos</a></p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 footer_links text-center">
                    <h5><b>Políticas y condiciones</b></h5>
                    <p class="my-1"><a href="{{route('politicasdeprivacidad')}}">Políticas de Privacidad</a></p>
                    <p class="my-1"><a href="{{route('terminosycondiciones')}}">Términos y Condiciones</a></p>
                    {{-- <p class="my-1"><a href="#">Libro de Reclamaciones</a></p> --}}
                </div>
            </div>
        </div>
        <div class="row bg-dark copyright pt-2 pb-0">
            <div class="col-lg-12">
                <p class="text-center p-0">
                    Copyright &copy;2020 - Derechos Reservados | pedidosapp.pe
                </p>
            </div>
        </div>
    </footer>

    

</body>




@include('layouts.publico.scripts')
@include('includes.ajaxsetup')
{{-- @include('publico.inicio.categoriasjs') --}}


@include('layouts.publico.cesta.cesta')
@include('layouts.publico.cesta.cestajs')
@include('layouts.publico.favoritos.favoritos')
@include('layouts.publico.favoritos.favoritosjs')
@include('layouts.publico.modalproductos.modalproductos')
@include('layouts.publico.buscarproductos.buscarproductosjs')

@include('layouts.publico.movil.menumovil')
@include('layouts.publico.movil.buscarproductosmovil')




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