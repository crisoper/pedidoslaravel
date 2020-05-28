<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Pedidos') }}</title>
   
    @include('layouts.admin.styles')
    @include('layouts.admin.scripts')
    @include('layouts.admin.messenger')
    
</head>
<body class="hold-transition  layout-fixed layout-navbar-fixed">
    <div class="wrapper" id="app">
  
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li>
                    <small>@if ( Session::has( 'empresadescripcion') ) {{ Session::get( 'empresadescripcion') }} @endif </small><br>
                    <small>@if ( Session::has( 'periododescripcion') ) {{ Session::get( 'periododescripcion') }} @endif </small>
                </li>
            </ul>
            
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    {{-- <a class="nav-link" data-toggle="dropdown" href="#">
                        <img width="25px" height="25px" 
                         
                        alt="{{ auth()->user()->name }}" class="rounded-circle logoPerfilForm">
                    </a> --}}
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">
                            @guest
                            {{-- @else
                            {{ Auth::user()->name }} --}}
                            @endguest
                        </span>
                        <div class="dropdown-divider"></div>
                        
                        @guest
                        
                        @else
                            <a class="dropdown-item" href="{{ route('usuarios.miperfil') }}"><i class="fas fa-users-cog"></i></i> Mi cuenta</a>
                            <a class="dropdown-item" href="{{ route('config.seleccionar.periodo') }}"><i class="fa fa-calendar" aria-hidden="true"></i> Cambiar periodo</a>
                            <a class="dropdown-item" href="{{ route('config.seleccionar.empresa') }}"><i class="fa fa-building" aria-hidden="true"></i> Cambiar empresa</a>
                            
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
        </nav>
      
        
  
        <div class="content-wrapper">          
            {{-- CONTENIDO --}}
            <section class="content">
                <div class="row">

                    @yield('contenido')

                </div>
            </section>
        </div>


        <footer class="main-footer layout-footer-fixed py-1">
            <small>@if ( Session::has( 'empresadescripcion') ) {{ Session::get( 'empresadescripcion') }} @endif </small>
            <div class="float-right d-none d-sm-inline-block">
                <small><strong>Copyright &copy; {{ date('Y') }}</strong></small>
            </div>
        </footer>
        
    </div>
</body>

@include('includes.ajaxsetup')

@yield("scripts")

</html>