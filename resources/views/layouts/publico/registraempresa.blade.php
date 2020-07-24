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
            margin: 0;
            padding: 0;
        }
        .footer{
            border-top: 1px solid rgb(158, 158, 158);
            padding-top: 2px;
        }
        .logo{
            width: 120px !important;
            height: 40px;
            margin: 0;
            padding: 0;
        }
        body{
            margin: 0;
            padding: 0;
        }
     
    </style>
</head>

<body>
    <div id="contenido" class="d-flex align-content-between flex-wrap">

        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
              
                    <a href="{{ route('inicio.index') }}">
                        <img class="logo" src="{{asset('pedidos/image/pedidosapp.png')}}" alt="logo pedidosApp" >
                    </a>
                 
            </nav>

            <main>
                @yield('contenido')
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
{{-- @include('includes.ajaxsetup') --}}

</html>