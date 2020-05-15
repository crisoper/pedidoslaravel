<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Pedidos') }}</title>
    
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> --}}
    
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> --}}
    
    @include('layouts.admin.styles')
    @include('layouts.admin.scripts')
    @include('layouts.admin.messenger')
    
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper" id="app">
  
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link showHideSideBar" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
        
                <li>
                    <small>@if ( Session::has( 'empresadescripcion') ) {{ Session::get( 'empresadescripcion') }} @endif </small><br>
                    <small>@if ( Session::has( 'periododescripcion') ) {{ Session::get( 'periododescripcion') }} @endif </small>
                </li>
            </ul>
    
            
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <img width="25px" height="25px" 
                            @if ( auth()->user()->avatar != null && Storage::disk('usuarios')->exists('usuarios/').auth()->user()->avatar )
                            src="{{ asset( Storage::disk('usuarios')->url('usuarios/').auth()->user()->avatar ) }}" 
                            @else 
                            src="{{ asset( Storage::disk('usuarios')->url('usuarios/default.png') )  }}" 
                            @endif
                        alt="{{ auth()->user()->name }}" class="rounded-circle logoPerfilForm">
                    </a>
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
      
        @include('layouts.adminlte3.sidebar')
  
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h6 class="m-0 text-dark">
                                @yield('tituloseccion')
                            </h6>
                        </div>
                        <div class="col-sm-6 small">
                            @yield('breadcrumbs')
                        </div>
                    </div>
                </div>
            </div>
    
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