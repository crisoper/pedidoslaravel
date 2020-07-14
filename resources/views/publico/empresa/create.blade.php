@extends('layouts.publico.registraempresa')

@include('publico.empresa.css')
<style>
    .radiocero {
        border-radius: 0px !important;
        background-color: blue;

    }



    .titulos {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 5vw;
        /* text-align: right; */
    }

    .titulos>div {
        display: flex;
        color: white;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: orange;
        justify-content: center;
        align-items: center;
        /* text-align: center; */
        font-family: Calibri, 'Trebuchet MS', sans-serif;
        font-size: 2.5rem;

    }

    .titulo_inicial {
        color: orange;
        text-align: center;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        font-size: 36px;
        /* text-shadow: 1px 1px 1px red; */
        padding: 10px;

    }

    #container_left {
        background-color: #F8F9FA;
        padding-left: 5rem;
        padding-right: 5rem;
        height: 100vh;

    }

    #texto {
        padding-left: 5rem;
        padding-right: 5rem;
        text-align: center;

    }

    #contenedor_fijo {
        height: 100vh;
        width: 40%;
        margin: auto;
        position: fixed;
        left: 0;
        top: 0
    }

    @media screen and (min-width: 300px) {
        .titulo {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            color: #F8F9FA;
            margin-top: 3em;
            font-size: 2em;
            line-height: 32px;
        }
        span {
            color: black;
        }
        #container_left {
            background-color: #108B9E;
            padding-left: 1em;
            padding-right: 1em;
            height: 100vh;

        }

    }

    @media screen and (min-width: 768) {
        .titulo {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            color: #F8F9FA;
            margin-top: 0.5em;
            font-size: 2rem;
        }

        #texto {
            background-color: #12353a;
            margin: 0 !important;
            padding: 0 !important;
        }
        #container_left {
            background-color: #108B9E;
            padding-left: 1em;
            padding-right: 1em;
            height: 100vh;

        }
    }

    @media screen and (min-width: 1200) {
        .titulo {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            color: #F8F9FA;
            margin-top: 3em;
            font-size: 5rem;
        }

        #texto {
            background-color: #12353a;
            margin: 0 !important;
            padding: 0 !important;
        }
        #container_left {
            background-color: #108B9E;
            padding-left: 1em;
            padding-right: 1em;
            height: 100vh;

        }
    }


  


    .parrafo>span {
        font-size: 16px;
    }

    img {
        width: 150px;
        height: 40px;
    }

    #apps {
        margin-bottom: 1rem;
    }
</style>
@section('contenido')

<div class="container-fluid ">
    <div class="row">
        <div class="col-12 d-flex flex-wrap ">

            <div id="texto" class="col-md-5 col-sm-12 d-flex flex-column">
                <div class="titulo ">
                    <span>
                        Registra tu negocio <span class="text-warning">Completamente gratis</span> e incrementa tus
                        ingresos.
                    </span>
                </div>

                <div class="parrafo mt-2">
                    <span>
                        Hacercate más a la gente y gana mas clientes. Promociona tus productos y vende por internet.
                    </span>
                </div>
                <div class="mt-auto p-2" id="apps">
                    <a class="btn btn_app_android p-0" href="#">
                        <img src="{{asset('pedidos/image/appmovil/googleplay.png')}}" alt="">
                    </a>
                    <a class="btn btn_app_ios p-0" href="#">
                        <img src="{{asset('pedidos/image/appmovil/appstore.png')}}" alt="">
                    </a>
                </div>

            </div>
            <div id="container_left" class=" col-md-7 col-sm-12 pt-5">

                <form id="formularioRegistroEmpresa" action="{{route('nuevaEmpresa.store')}}" method="POST"
                    enctype="multipart/form-data">

                    @php
                    $usuario = Auth()->user()
                    @endphp

                    <div class="form-row  pt-3">
                        <div class="col-md-12 col-sm-12  mx-auto ">
                            <div class="col-12">
                                <span>
                                    1. Datos de la empresa
                                </span>
                            </div>
                            <div class="form-row">
                                <div class="col-12 d-flex flex-wrap">

                                    <div class="form-group col-md-6 col-sm-12">
                                        <select name="rubro_id" id="rubro_id" class="form-control" autofocus>
                                            <option value="">Rubro de negocio</option>
                                            @foreach ($empresarubros as $empresarubro)
                                            <option value="{{ $empresarubro->id }}"
                                                {{ old('rubro_id') == $empresarubro->id ? 'selected' : '' }}>
                                                {{ $empresarubro->nombre }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('rubro_id') }}</span>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <input type="text" name="ruc" id="ruc" size="11" maxlength="11"
                                            class="form-control" value="{{old('ruc')}}" placeholder="Ruc">
                                        <span class="text-danger">{{ $errors->first('ruc') }}</span>
                                    </div>

                                    <div class="form-group col-md-12 col-sm-12">
                                        <input type="text" name="nombreempresa" id="nombre" class="form-control"
                                            value="{{old('nombre')}}" placeholder="Nombre o Razón Social">
                                        <span class="text-danger">{{ $errors->first('nombre') }}</span>
                                        <span class="text-danger">{{ $errors->first('nombre') }}</span>
                                    </div>

                                    <div class="form-group col-md-8 col-sm-12">
                                        <input type="text" name="direccion" id="direccion" class="form-control"
                                            value="{{old('direccion')}}" placeholder="Dirección">
                                        <span class="text-danger">{{ $errors->first('direccion') }}</span>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <input type="text" name="telefono" id="telefono" class="form-control"
                                            value="{{old('telefono')}}" placeholder="Teléfono" maxlength="9">
                                        <span class="text-danger">{{ $errors->first('telefono') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>{{--Fin Cardbpdy --}}

                    <div class="form-row mt-2 ">
                        <div class="col-12">
                            <span>
                                2. Datos del representante/dueño del negocio
                            </span>
                        </div>

                        <div class="col-md-12 col-sm-12  mx-auto ">
                            <div class="d-flex flex-wrap">
                                <div class="form-group col-sm-12 col-md-12">
                                    <input id="name_representante" type="text"
                                        class="form-control  @error('name_representante') is-invalid @enderror"
                                        name="name_representante" value="{{ old('name_representante') }}" required
                                        autocomplete="name_representante" placeholder="Nombres">

                                    @error('name_representante')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <input type="text" name="paterno" id="paterno"
                                        class="form-control   @error('paterno') is-invalid @enderror"
                                        value="{{old('paterno')}}" placeholder="Apellido paterno" required
                                        autocomplete="paterno">

                                    @error('paterno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    {{-- <span class="text-danger">{{ $errors->first('paterno') }}</span>
                                    --}}
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <input type="text" name="materno" id="materno"
                                        class="form-control  @error('materno') is-invalid @enderror"
                                        value="{{old('materno')}}" placeholder="Apellido materno" required
                                        autocomplete="materno">
                                    {{-- <span class="text-danger">{{ $errors->first('materno') }}</span>
                                    --}}
                                </div>
                                @error('materno')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="form-row ">
                                <div class="col-12">
                                    <span>
                                        3. Usuario y contraseña
                                    </span>
                                </div>

                                <div class="col-12 p-2 d-flex flex-wrap" style="border-radius: 0px;">
                                    <div class="form-group col-sm-12 col-sm-12 col-md-12">
                                        <input id="email" type="email" class="form-control  " name="email"
                                            value="{{ old('email') }}" required autocomplete="email"
                                            placeholder="Correo electrónico">
                                        {{-- form-control  @error('email') is-invalid @enderror --}}
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6">
                                        <input id="password" type="password"
                                            class="form-control  @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="new-password"
                                            placeholder="Contraseña" minlength="8">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-sm-12 col-md-6">
                                        <input id="password-confirm" type="password" class="form-control "
                                            name="password_confirmation" required autocomplete="new-password"
                                            placeholder="Confirmar la contraseña">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row justify-content-center ">
                        <div class="col-12">
                            @foreach ($errors as $error)

                            <span class="text-danger">{{ $error}}</span>
                            @endforeach
                        </div>

                        <div class="col-12 d-flex flex-row justify-content-center">

                            @csrf

                            <div class="form-group col-6">
                                <button type="button" class="btn btn-primary btn-block" id="enviarFormRegistro">
                                    <span class="spinner-border spinner-border-sm spinnerr" role="status"
                                        aria-hidden="true" style="display: none"></span>
                                    Guardar
                                </button>
                            </div>
                            <div class="form-group col-6">
                                <a href="{{route('inicio.index')}}" class="btn btn-danger btn-block">Cancelar</a>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

@include('publico.empresa.js')
@endsection