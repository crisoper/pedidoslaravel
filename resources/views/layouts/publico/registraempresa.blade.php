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
    @include('publico.empresa.css')
    @include('layouts.admin.messenger')

    <style>
        @import url(http://fonts.googleapis.com/css?family=Playfair+Display:400,700,700italic|Lora:400,700,700italic|Source+Code+Pro:400,700|Abril+Fatface|Montserrat);

        .color-1 {
            font-family: 'Lora', serif;
            background: -webkit-linear-gradient(90deg, #53bbbf 10%, #0f1939 90%);
            background: -moz-linear-gradient(90deg, #53bbbf 10%, #0f1939 90%);
            background: -ms-linear-gradient(90deg, #53bbbf 10%, #0f1939 90%);
            background: -o-linear-gradient(90deg, #53bbbf 10%, #0f1939 90%);
            background: linear-gradient(90deg, #53bbbf 10%, #0f1939 90%);
        }

        .color-1 h1 1 {
            font-size: 48px;
            text-align: center;
        }

        texto-2 {
            clear: both;
            text-transform: none;
            line-height: 1.4;
            font-weight: 700;
            font-style: italic;
            color: #fff;
        }

        .section_item p {
            font-family: 'Lora', serif;
            font-size: 1.2rem;
            color: #fff;
             
                    }
        body{
            background: linear-gradient(90deg, #17A2B8 10%, #F8F9FA 90%);
            padding: 0;
            margin: 0;
        }
        
     
    </style>
</head>

<body cz-shortcut-listen="true"  >

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
                    <a class="nav-link text-light" data-toggle="dropdown" href="#">
                        <img width="25px" height="25px" @if ( auth()->user()->avatar != null &&
                        Storage::disk('usuarios')->exists('usuarios/').auth()->user()->avatar )
                        src="{{ asset( Storage::disk('usuarios')->url('usuarios/').auth()->user()->avatar ) }}"
                        @else
                        src="{{ asset( Storage::disk('usuarios')->url('usuarios/default.png') )  }}"
                        @endif
                        alt="{{ auth()->user()->name }}" class="rounded-circle logoPerfilForm">
                    </a>
                    @endguest


                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">
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
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
   
        <main class="container-fluid " role="main">

                           
                    @yield('contenido')
            
        </main>
    

    <footer class="footer fixed-bottom bg-dark text-light">
        <small>@if ( Session::has( 'empresadescripcion') ) {{ config('app.name')}} @endif </small>
        <div class="float-right d-none d-sm-inline-block">
            <small><strong>Copyright &copy; {{ date('Y') }}</strong></small>
        </div>
    </footer>
</body>

@include('includes.ajaxsetup')
@yield("scripts")

</html>