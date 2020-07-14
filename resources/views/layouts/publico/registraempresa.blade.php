<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Pedidos') }}</title>

    @include('layouts.admin.styles')
    @include('layouts.admin.scripts')

    @include('layouts.admin.messenger')
    
    {{-- MENUS --}}
  
    <link rel="stylesheet" href="{{asset('pedidos/css/style.css')}}">
    <style>
        @import url(http://fonts.googleapis.com/css?family=Playfair+Display:400,700,700italic|Lora:400,700,700italic|Source+Code+Pro:400,700|Abril+Fatface|Montserrat);

      
       
    </style>
</head>

<body cz-shortcut-listen="true" class="bg-light">

    <header>
        <nav class="navbar navbar-expand-md navbar-light fixed-top shadow-sm">
            <div class="container">
                <ul class="navbar-nav">
                    <li>
                        @guest
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'PedidosApp') }}
                        </a>
                        @else
                        <small>
                            @if ( Session::has( 'empresadescripcion') )
                            {{ Session::get( 'empresadescripcion') }}
                            @endif
                        </small>
                        @endguest
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown ">

                        @guest

                        @else
                        <a class="nav-link text-dark" data-toggle="dropdown" href="#">
                            <img width="25px" height="25px" @if ( auth()->user()->avatar != null &&
                            Storage::disk('usuarios')->exists('usuarios/').auth()->user()->avatar )
                            src="{{ asset( Storage::disk('usuarios')->url('usuarios/').auth()->user()->avatar ) }}"
                            @else
                            src="{{ asset( Storage::disk('usuarios')->url('usuarios/default.png') )  }}"
                            @endif
                            alt=" {{ auth()->user()->name }}" class="rounded-circle logoPerfilForm">
                        </a>
                        @endguest
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-item dropdown-header ">
                                @guest
                                @else
                                {{ Auth::user()->name }}
                                @endguest
                            </span>
                            <div class="dropdown-divider"></div>

                            @guest

                            @else
                            {{-- <a class="dropdown-item" href="{{ route('usuarios.miperfil') }}"><i
                                class="fas fa-users-cog"></i></i> Mi cuenta</a> --}}

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="{{ route('logout') }}"
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
        </nav>
    </header>

    <main role="main">


        @yield('contenido')

    </main>


 
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
        <div class="row bg-dark p-2 pb-0 text-center ">
            <div class="col-lg-12">
                <span class="text-center p-0">
                    Copyright &copy;2020 - Derechos Reservados | <b>Delivery.com</b>
                </span>
            </div>
        </div>
    </footer>
</body>

@include('includes.ajaxsetup')
@yield("scripts")

</html>