<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PedidosApp') }}</title>

    @include('layouts.admin.styles')
    @include('layouts.admin.scripts')
    @include('layouts.admin.messenger')
    
    <style>
        #contenido {
            height: 100vh;
            

        }
        #app{
            width: 100vw;
        }
        .footer{
            border-top: 1px solid rgb(158, 158, 158);
            padding-top: 2px;
        }
    </style>
</head>

<body>
    <div id="contenido" class="d-flex align-content-between flex-wrap">

        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    {{-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'PedidosApp') }}
                    </a> --}}
                    <a href="{{ route('inicio.index') }}">
                        <img src="{{asset('pedidos/image/pedidosapp.png')}}" alt="logo pedidosApp" width="100px">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('loginOrRegister', 'login') }}">{{ __('Iniciar sesión') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('loginOrRegister', 'register') }}">{{ __('Registrate') }}</a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>
        </div>

        {{-- FOOTER --}}
        <footer class="container-fluid footer">
  
            <div class="row bg-dark p-2 pb-0 text-center text-light ">
                <div class="col-lg-12">
                    <span class="text-center p-0 ">
                        Copyright &copy;2020 - Derechos Reservados | PedidosApp
                    </span>
                </div>
            </div>
        </footer>
    </div>
</body>
    @yield("scripts")
</html>