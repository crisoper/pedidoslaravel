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
                  
                    <a class="btn btn_recommended d-flex justify-content-around" href="{{ route('registernewempresa') }}">Afilia a tu restaurante</a>
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
                            @php
                                $flagLogin = "login";
                                $flagRegister = "register"
                            @endphp

                            <a class="btn btn_login" href="{{ route('loginOrRegister',   $flagLogin) }}">Identifícate</a>
                            <a class="btn btn_register" href="{{ route('loginOrRegister', $flagRegister) }}">Regístrate</a>
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
                <div class="col-2 col-sm-2 col-md-2 col-lg-2 px-0 d-flex justify-content-around" id="header__logo">
                    <a href="{{ route('inicio.index') }}">
                        <img src="{{asset('pedidos/image/pedidosapp.png')}}" alt="" width="120">
                    </a>
                </div>
                
                {{-- MENU CATEGORIAS --}}
                <div class="col-0 col-sm-0 col-md-0 col-lg-2 px-0" id="menu_categorias">
                    <div class="header_menu_categorias">
                        <button class="btn_menu_categorias" type="button" data-toggle="dropdown">
                            <i class="fas fa-bars"></i> Categorías <i class="fas fa-angle-down ml-3"></i>
                        </button>
                        <ul class="dropdown-menu header_categorias">
                            <li><a class="dropdown-item" href="{{ route('recomendados.index') }}">Recomendados</a></li>
                            <li><a class="dropdown-item" href="{{ route('ofertas.index') }}">Ofertas</a></li>
                            <li><a class="dropdown-item" href="{{ route('nuevos.index') }}">Nuevos</a></li>
                            <li><a class="dropdown-item" href="{{ route('maspedidos.index') }}">Mas Pedidos</a></li>
                            <li><a class="dropdown-item" href="{{ route('productos.busqueda.index') }}">Todos Los Productos</a></li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item submenu_categorias" href="#">Categorías <i class="fas fa-angle-right float-right pt-1"></i></a>
                                <ul class="dropdown-menu" id="menuCategorias">
                                    
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
    
                {{-- BUSCADOR WEB --}}
                <div class="col-4 col-sm-5 col-md-7 col-lg-6 px-0" id="search_web">
                    <div class="header_search_web">
                        <form id="form_buscar_productos" action="">
                            <div class="input-group input_group_search">
                                <input id="txtBuscarTextoGeneral" type="text" class="form-control input_buscar" placeholder="Buscar en Ogani: Productos, Restaurantes, Lugares" aria-label="Buscar" autofocus name="buscarproductos" value="{{request()->query('buscarproductos')}}">

                                <div class="input-group-append">
                                    <a href="#" class="btn btn_buscar_productos">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- FAVORITOS --}}
                <div class="col-2 col-sm-2 col-md-1 col-lg-1 px-0" id="menu_favoritos">
                    <button type="button" class="btn btn_open_favorites row m-0" id="mostrar_favoritos_menu">
                        <h4 class="icon_favoritos_menu m-0">
                            <i class="fas fa-heart"></i>
                        </h4>
                        <h6 class="cantidad_favoritos_menu m-0">0</h6>
                    </button>
                </div>
                
                {{-- CESTA --}}
                <div class="col-2 col-sm-2 col-md-1 col-lg-1 col-xl-1 p-0" id="menu_cesta">
                    <button type="button" class="btn btn_modal_cesta row m-0" id="mostrar_cesta_menu">
                        <h4 class="icon_cesta_menu m-0">
                            <i class="fas fa-shopping-basket"></i>
                        </h4>
                        <h6 class="cantidad_cesta_menu m-0">0</h6>
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

@include('layouts.publico.menumovil')

@include('layouts.publico.cesta.cesta')
@include('layouts.publico.cesta.cestajs')
@include('layouts.publico.favoritos.favoritos')
@include('layouts.publico.favoritos.favoritosjs')
@include('layouts.publico.modalproductos.modalproductos')
@include('layouts.publico.modalproductos.modalproductosjs')


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