{{-- @extends('errors::minimal') --}}

{{-- @section('title', __('Page Expired')) --}}
{{-- @section('code', '419') --}}
{{-- @section('message') --}}
    
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sesión expirada</title>
    @include('layouts.publico.styles')
</head>
<body>
    <div class="container d-flex justify-content-center">
        <div class="row ">
            <div class="col-12 p-5 text-center">
                <img src="{{ asset('pedidos/image/pedidosapp.png') }}" alt="Logo pedidosApp " width="200" >
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <span class="display-3">419</span>
            </div>
            <div class="col-8 text-rigth ">
                
              <div class="border-left border-danger pl-5">
                <div class="col-12">
                    <span class="display-4">¡Sessión expirada!</span>
                </div>
                <div class="col-12">
                <p > Posiblemente su sesión ha caducado, regrese a la <a href="{{ route('inicio.index')}}">página principal</a> o volver a iniciar sesión con su cuenta.  </p>
                </div>
                <div class="col-21">
                    <a href="{{ route('loginOrRegister','login') }}" class="btn btn-danger btn-lg">Acceda con su cuenta</a>
                </div>
              </div>
                
            </div>
        </div>
    </div>
</body>
</html>



{{-- @section('message', __('')) --}}
