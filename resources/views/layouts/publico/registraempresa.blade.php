<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Pedidos') }}</title>


    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('adminlte301/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('Plugins/daterangepicker/contenido.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte301/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte301/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('adminlte301/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('adminlte301/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('adminlte301/plugins/fontawesome-free/css/all.min.css') }}">

    {{-- Agregar Imagenes --}}
    <link rel="stylesheet" href="{{ asset('css/agregarImagenes.css') }}">
    <link rel="stylesheet" href="{{ asset('agregarImagenes/css/fileinput.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/imagenes.css') }}">
    <link rel="stylesheet" href="{{ asset('Plugins/custom/custom.css') }}">



    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />

    @include('layouts.admin.scripts')
</head>

<body cz-shortcut-listen="true" style="background-color: #F5F5F5">
    <header>
        <nav class="navbar navbar-expand-md navbar-light fixed-top bg-dark text-light">
            <ul class="navbar-nav">
                <li>
                    @guest
                    {{ config('app.name', 'Pedidos') }}
                    @else
                    <small>@if ( Session::has( 'empresadescripcion') ) {{   Session::get( 'empresadescripcion') }}
                        @endif </small>
                    @endguest
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">

                    @guest

                    @else
                    <a class="nav-link" data-toggle="dropdown" href="#">
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
                        <a class="dropdown-item" href="{{ route('usuarios.miperfil') }}"><i
                                class="fas fa-users-cog"></i></i> Mi cuenta</a>

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
        </nav>
    </header>

    <main class="container-fluid" role="main" >

        <section class="content">

            @yield('contenido')

        </section>
    </main>

    <footer class="footer fixed-bottom bg-dark text-light">
        <small>@if ( Session::has( 'empresadescripcion') ) {{ Session::get( 'empresadescripcion') }} @endif </small>
        <div class="float-right d-none d-sm-inline-block">
            <small><strong>Copyright &copy; {{ date('Y') }}</strong></small>
        </div>
    </footer>
</body>

@include('includes.ajaxsetup')
@yield("scripts")

</html>