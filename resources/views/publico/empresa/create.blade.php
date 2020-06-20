@extends('layouts.publico.registraempresa')

<style>
    .texto-1 {
        font-size: 38px;
        text-align: center;
        clear: both;
        text-transform: none;
        line-height: 1.4;
        font-weight: 700;
        color: #fff;
        font-family: 'Montserrat', Helvetica, sans-serif;

    }

    p {
        font-family: 'Montserrat', Helvetica, sans-serif;
        font-size: 1.5rem;
        color: #fff;
        padding-top: 5px;
    }

    .seccion-1 {
        margin-top: 2.5rem;
        padding: 8rem;
    }
    .seccion-2 {
        margin-top: 2.5rem;
        padding: 5rem;
    }
    h4 {
        font-size: 24px;
    }

    #foot {
        width: 350px;
        height: 400px;
    }
</style>

@section('contenido')

<div class="container-fluid ">

    <div class="row seccion-1  color-1">
        <div class="col-md-6 col-sm-12 text-center">
            <img src="{{asset('img/logo tienda.png')}}" width="400px" alt="">
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="col-12  texto-1">
                <span class=" "> Registra tu negocio <br>
                    y <span class="text-warning"><strong>empieza a incrementar</strong></span> tus ventas.
                </span>
            </div>
            <div>
                <p>
                    <span class="text-warning"> <strong>{{config('app.name')}}</strong></span> te ofrece todo lo que
                    necesitas para vender en internet, lo mejor de todo <span class="text-warning"><strong>es
                            gratis.</strong></span>
                </p>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="row mt-5">
            <div class="col">
                <div class="col-12">
                    @php
                    $usuario = Auth()->user()
                    @endphp

                    <form id="formularioRegistroEmpresa" action="{{route('registratuempresa.store')}}" method="POST"
                        enctype="multipart/form-data">

                        <div class="row mt-3 ">
                            <div
                                class="col-md-5 col-sm-12 mx-auto d-flex flex-column justify-content-center align-items-center ">
                                <div class="d-flex flex-nowrap align-items-center">
                                    <img id="foot" src="{{asset('img/resitroempresa/foot.png')}}">

                                    <h4 class="text-center">
                                        La información que ingreses en este formulario se mostraran en la página
                                        principal junto a los productos que registres. <strong>
                                            Es importante que la información ingresada sea real.
                                        </strong>
                                    </h4>
                                </div>

                            </div>

                            <div class="col-md-7 col-sm-12  mx-auto ">
                                <div class="card card-outline card-primary">
                                    <div class="card-header">
                                        <span>Datos de la Empresa</span>
                                    </div>

                                    <div class="card-body">
                                        <div class="form-row">

                                            <div class="col-md-8 col-sm-12 ">
                                                <div class="form-group col-md-12 col-sm-12">
                                                    <select name="rubro_id" id="rubro_id" class="form-control"
                                                        autofocus>
                                                        <option value="">Rubro de negocio</option>
                                                        @foreach ($empresarubros as $empresarubro)
                                                        <option value="{{ $empresarubro->id }}"
                                                            {{ old('rubro_id') == $empresarubro->id ? 'selected' : '' }}>
                                                            {{ $empresarubro->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger">{{ $errors->first('rubro_id') }}</span>
                                                </div>
                                                <div class="form-group col-md-12 col-sm-12">
                                                    <input type="text" name="ruc" id="ruc" size="11" maxlength="11"
                                                        class="form-control form-control-sm" value="{{old('ruc')}}"
                                                        placeholder="Ruc">
                                                    <span class="text-danger">{{ $errors->first('ruc') }}</span>
                                                </div>

                                                <div class="form-group col-md-12 col-sm-12">
                                                    <input type="text" name="nombre" id="nombre"
                                                        class="form-control form-control-sm" value="{{old('nombre')}}"
                                                        placeholder="Nombre o Razón Social">
                                                    <span class="text-danger">{{ $errors->first('nombre') }}</span>
                                                    <span class="text-danger">{{ $errors->first('nombre') }}</span>
                                                </div>
                                                <div class="form-group col-md-12 col-sm-12">
                                                    <input type="text" name="nombrecomercial" id="nombrecomercial"
                                                        class="form-control form-control-sm"
                                                        value="{{old('nombrecomercial')}}"
                                                        placeholder="Nombre Comercial">
                                                    <span
                                                        class="text-danger">{{ $errors->first('nombrecomercial') }}</span>
                                                </div>
                                                <div class="form-group col-md-12 col-sm-12">
                                                    <input type="text" name="direccion" id="direccion"
                                                        class="form-control form-control-sm"
                                                        value="{{old('direccion')}}" placeholder="Dirección">
                                                    <span class="text-danger">{{ $errors->first('direccion') }}</span>
                                                </div>
                                                <div class="form-group col-md-12 col-sm-12">
                                                    <input type="url" name="facebook" id="facebook"
                                                        class="form-control form-control-sm" value="{{old('facebook')}}"
                                                        placeholder="Página de facebook (Opcional)">
                                                    <span class="text-danger">{{ $errors->first('facebook') }}</span>
                                                </div>


                                            </div>
                                            <div class="col-md-4 col-sm-12 text-center d-flex flex-column">

                                                <div class="boxSep">
                                                    <div id="imagePreview" class="imgLiquid"
                                                        style="width:200px; height:200px;">
                                                        <img src="{{'img/logodefault.png'}}" alt="">
                                                    </div>

                                                </div>
                                                <figcaption class="text-danger"><small><i>Tamaño recomendado: 200 x                                                             200px</i></small> </figcaption>


                                                <div class="bg-danger pt-1 pb-1" id="errorextension"
                                                    style="display: none; line-height : 10px;">

                                                    <p style="line-height : 12px;"> <small> <strong>¡Error!</strong>
                                                            <br>
                                                            Solo se permiten archivos con extensión
                                                            .jpeg/.jpg/.png</small>
                                                    </p>
                                                </div>

                                                <span id="camara">
                                                    <h4><i class="fas fa-camera"></i></h4>
                                                </span>
                                                <input type="file" id="file" name="logo" id="logo"
                                                    style="display: none">


                                                <span class="text-danger">{{ $errors->first('logo') }}
                                                </span>

                                            </div>

                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4 col-sm-12">
                                                <select name="departamentoid" id="departamentoid"
                                                    class="form-control form-control-sm select2" autofocus>
                                                    <option value="">Departamento</option>
                                                    @foreach ($departamentos as $departamento)
                                                    <option value="{{ $departamento->id }}"
                                                        {{ old('departamentoid') == $departamento->id ? 'selected' : '' }}>
                                                        {{ $departamento->nombre }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">{{ $errors->first('departamentoid') }}</span>

                                            </div>
                                            <div class="form-group col-md-4 col-sm-12">
                                                <select name="provinciaid" id="provinciaid"
                                                    class="form-control form-control-sm select2" autofocus>
                                                    <option value="">Provincia</option>
                                                    @foreach ($provincias as $provincia)
                                                    <option value="{{ $provincia->id }}"
                                                        {{ old('provinciaid') == $provincia->id ? 'selected' : '' }}>
                                                        {{ $provincia->nombre }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">{{ $errors->first('provinciaid') }}</span>
                                            </div>
                                            <div class="form-group col-md-4 col-sm-12">
                                                <select name="distritoid" id="distritoid"
                                                    class="form-control form-control-sm " autofocus>
                                                    <option value="">Distrito</option>
                                                    @foreach ($distritos as $distrito)
                                                    <option value="{{ $distrito->id }}"
                                                        {{ old('distritoid') == $distrito->id ? 'selected' : '' }}>
                                                        {{ $distrito->nombre }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">{{ $errors->first('distritoid') }}</span>
                                            </div>

                                        </div>
                                    </div>{{--Fin Cardbpdy --}}
                                </div>

                            </div>
                        </div>
                        <div class="row mt-5  seccion-2 p-5 ">
                            <div class="col-md-5 col-sm-12 mx-auto d-flex justify-content-center align-items-center">

                                <h3>
                                    <strong>{{config('app.name')}}</strong> te ofrece un sitio web independiente donde
                                    tus clientes podrán ingresar y realizar sus pedidos de los diferentes productos que
                                    publiques.
                                </h3>

                            </div>
                            <div class="col-md-7 col-sm-12  mx-auto ">
                                <div class="card card-outline card-primary">

                                    <div class="card-header">
                                        <span>Datos del Representante</span>
                                    </div>
                                    <div class="card-body">

                                        <div class="d-flex flex-wrap">
                                            <div class="form-group col-sm-12 col-md-4">
                                                <input id="name" type="text"
                                                    class="form-control form-control-sm @error('name') is-invalid @enderror"
                                                    name="name" value="{{ old('name') }}" required autocomplete="name"
                                                    placeholder="Nombres">

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                                {{-- <span class="text-danger">{{ $errors->first('nombre') }}</span>
                                                --}}
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4">
                                                <input type="text" name="paterno" id="paterno"
                                                    class="form-control form-control-sm  @error('paterno') is-invalid @enderror"
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

                                            <div class="form-group col-sm-12 col-md-4">
                                                <input type="text" name="materno" id="materno"
                                                    class="form-control form-control-sm @error('materno') is-invalid @enderror"
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

                                        <div class="d-flex flex-wrap">
                                            <div class="form-group col-sm-12 col-md-4">
                                                <input type="text" name="dni" id="dni"
                                                    class="form-control form-control-sm" value="{{old('dni')}}"
                                                    placeholder="DNI" maxlength="8">
                                                <span class="text-danger">{{ $errors->first('dni') }}</span>
                                            </div>

                                            <div class="form-group col-sm-12 col-md-4">
                                                <input type="text" name="telefono" id="telefono"
                                                    class="form-control form-control-sm" value="{{old('telefono')}}"
                                                    placeholder="Teléfono" minlength="9" maxlength="9">
                                                <span class="text-danger">{{ $errors->first('telefono') }}</span>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-12">
                                                <span>
                                                    Usuario y contraseña
                                                </span>
                                            </div>

                                            <div class="col-12 border border-primary p-2" style="border-radius: 5px;">
                                                <div class="form-group col-sm-12 col-sm-12 col-md-12">
                                                    <input id="email" type="email" class="form-control form-control-sm "
                                                        name="email" value="{{ old('email') }}" required
                                                        autocomplete="email"
                                                        placeholder="Dirección de correo electrónico">
                                                    {{-- form-control form-control-sm @error('email') is-invalid @enderror --}}
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="col-12 d-flex flex-wrap">
                                                    <div class="form-group col-sm-12 col-md-6">
                                                        <input id="password" type="password"
                                                            class="form-control form-control-sm @error('password') is-invalid @enderror"
                                                            name="password" required autocomplete="new-password"
                                                            placeholder="Contraseña" minlength="8">

                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group col-sm-12 col-md-6">
                                                        <input id="password-confirm" type="password"
                                                            class="form-control form-control-sm"
                                                            name="password_confirmation" required
                                                            autocomplete="new-password"
                                                            placeholder="Confirmar la contraseña">
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row ">
                            <div class="col-md-5 col-sm-12 mx-auto d-flex justify-content-center align-items-center">
                                <h3>Registra los días y horas de atención.  </h3>
                            </div>
                            <div class="col-md-7 col-sm-12  mx-auto">
                                <div class="card card-outline card-primary">
                                    <div class="card-header">
                                        <input type="hidden" name="" id="changeicon" value="0">
                                        <a class="btn" data-toggle="collapse" href="#verhorario" role="button"
                                            aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fas fa-angle-double-down" id="icono"></i> Horario de atención
                                        </a>
                                    </div>


                                    <div class="collapse" id="verhorario">
                                        <div class="card-body pt-0">



                                            @foreach ($dias as $dia)
                                            <div class="form-row d-flex align-items-center">
                                                <div class="form-group col-sm-4 col-md-6">
                                                    <div class="ml-5 d-flex align-items-center">
                                                        <label class="form-check-label"
                                                            for="dias[{{ $loop->iteration }}]">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="dias[{{ $loop->iteration }}]"
                                                                id="dias[{{ $loop->iteration }}]"
                                                                value="{{ $dia }}">{{ $dia }}
                                                        </label>
                                                    </div>


                                                </div>
                                                <div class="form-group col-sm-4 col-md-3">

                                                    {{-- <small class="text-muted">Desde:</small>
                                                <div class="input-group date horainicio" id="timepicker"
                                                    data-target-input="nearest">
                                                    <input type="text" name="horainicio[{{ $loop->iteration }}]"
                                                    id="horainicio-{{ $dia }}"
                                                    class="form-control form-control-sm datetimepicker-input
                                                    datetimepicker"
                                                    data-target="horainicio[{{$loop->iteration}}]" />
                                                    <div class="input-group-append"
                                                        data-target="horainicio[{{$loop->iteration}}]"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text">
                                                            <i class="far fa-clock"></i>
                                                        </div>

                                                    </div>
                                                </div> --}}



                                                <div class="input-group date mr-3" id="timepicker"
                                                    data-target-input="nearest">
                                                    <span class="col-12 ">Desde:</span>
                                                    <input type="text" name="horainicio[{{ $loop->iteration }}]"
                                                        id="horainicio-{{ $dia }}"
                                                        class="form-control form-control-sm col-12 datetimepicker-input"
                                                        data-target="#horainicio-{{ $dia }}" />
                                                    <div class="input-group-append" data-target="#horainicio-{{ $dia }}"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                    </div>
                                                </div>
                                                <span id="errorInicio-{{ $dia }}" class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-sm-4 col-md-3">
                                                <div class="input-group date mr-3" id="timepicker"
                                                    data-target-input="nearest">
                                                    <span class="col-12 ">Hasta:</span>
                                                    <input type="text" name="horafin[{{ $loop->iteration }}]"
                                                        id="horafin-{{ $dia }}"
                                                        class="form-control form-control-sm col-12 datetimepicker-input"
                                                        data-target="#horafin-{{ $dia }}" />
                                                    <div class="input-group-append" data-target="#horafin-{{ $dia }}"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                    </div>
                                                </div>
                                                <span id="errorfin-{{ $dia }}" class="text-danger"></span>
                                            </div>
                                        </div>

                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

                <div class="row ">


                    <div class="col-12 mt-3">
                        <div class="form-row text-center">
                            <div class="form-group col-5 d-flex flex-nowrap">
                            </div>
                            <div class="form-group col-7 d-flex flex-nowrap">

                                <div>

                                    @foreach ($errors as $error)

                                    <span class="text-danger">{{ $error}}</span>
                                    @endforeach
                                </div>

                                @csrf

                                <div class="form-group col-6">
                                    <button type="button" class="btn btn-primary btn-block" id="enviarFormRegistro">
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"
                                            style="display: none"></span>
                                        Guardar
                                    </button>
                                </div>
                                <div class="form-group col-6">
                                    <a href="{{route('empresas.index')}}" class="btn btn-danger btn-block">Cancelar</a>
                                </div>
                            </div>
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