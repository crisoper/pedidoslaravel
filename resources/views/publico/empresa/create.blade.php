@extends('layouts.publico.registraempresa')

@include('publico.empresa.css')
<style>
    .radiocero {
        border-radius: 0px !important;
        background-color: blue;

    }



    .titulos {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 28px;
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

    }
</style>
@section('contenido')

<div class="container-fluid ">
    <div class="row mt-5">
        <div class="col-12 d-flex flex-wrap">
            <div class="col-md-5 col-sm-12 ">
                <span class="display-4">hola</span>
            </div>
            <div id="container_left" class=" col-md-7 col-sm-12 ">

                <form id="formularioRegistroEmpresa" action="{{route('nuevaEmpresa.store')}}" method="POST"
                    enctype="multipart/form-data">

                    @php
                    $usuario = Auth()->user()
                    @endphp
                    <div class="form-row titulo_inicial pt-4">
                        <div class="col-12">
                            <span>Registre su negocio en tres simples pasos</span>
                        </div>
                    </div>

                    <div class="form-row  pt-3">
                        {{-- <div class="form-row  ">

                            <div class="form-group pl-5 d-flex flex-row titulos align-items-center">
                                <div class="">
                                    1
                                </div>
                              
                                <span class="text-info ml-2">
                                    <h3>Ingrese los datos de su empresa</h3>
                                </span>
                            </div>
                        </div> --}}
                        <div class="col-md-12 col-sm-12  mx-auto ">
                            <div class="col-12">
                                <span>
                                    Datos de la empresa
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
                                        <input type="text" name="nombre" id="nombre" class="form-control"
                                            value="{{old('nombre')}}" placeholder="Nombre o Razón Social">
                                        <span class="text-danger">{{ $errors->first('nombre') }}</span>
                                        <span class="text-danger">{{ $errors->first('nombre') }}</span>
                                    </div>
                                    {{-- <div class="form-group col-md-12 col-sm-12">
                                            <input type="text" name="nombrecomercial" id="nombrecomercial"
                                                class="form-control" value="{{old('nombrecomercial')}}"
                                    placeholder="Nombre Comercial">
                                    <span class="text-danger">{{ $errors->first('nombrecomercial') }}</span>
                                </div> --}}
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

                                {{-- <div class="form-group col-md-4 col-sm-12">
                                    <select name="departamentoid" id="departamentoid"
                                        class="form-control  select2" autofocus>
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
                                <select name="provinciaid" id="provinciaid" class="form-control  select2" autofocus>
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
                                <select name="distritoid" id="distritoid" class="form-control  " autofocus>
                                    <option value="">Distrito</option>
                                    @foreach ($distritos as $distrito)
                                    <option value="{{ $distrito->id }}"
                                        {{ old('distritoid') == $distrito->id ? 'selected' : '' }}>
                                        {{ $distrito->nombre }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('distritoid') }}</span>
                            </div> --}}

                            {{-- <div class="form-group col-md-12 col-sm-12">
                                            <input type="url" name="facebook" id="facebook"
                                                class="form-control" value="{{old('facebook')}}"
                            placeholder="Página de facebook (Opcional)">
                            <span class="text-danger">{{ $errors->first('facebook') }}</span>
                        </div> --}}

                    </div>
            </div>
        </div>

    </div>{{--Fin Cardbpdy --}}

    <div class="form-row mt-2 ">
        <div class="col-12">
            <span>
                Datos del repesentante o dueño del negocio
            </span>
        </div>
        {{-- <div class="form-group ml-5 d-flex flex-row titulos">
                <div>
                    2
                </div>
                <span class="text-info ml-3">
                    <h3>Ingrese los datos del representante o dueño del negocio</h3>
                </span>
            </div> --}}

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
                        class="form-control   @error('paterno') is-invalid @enderror" value="{{old('paterno')}}"
                        placeholder="Apellido paterno" required autocomplete="paterno">

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
                        class="form-control  @error('materno') is-invalid @enderror" value="{{old('materno')}}"
                        placeholder="Apellido materno" required autocomplete="materno">
                    {{-- <span class="text-danger">{{ $errors->first('materno') }}</span>
                    --}}
                </div>
                @error('materno')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            {{-- <div class="d-flex flex-wrap">
                    <div class="form-group col-sm-12 col-md-4">
                        <input type="text" name="dni" id="dni" class="form-control "
                            value="{{old('dni')}}" placeholder="DNI" maxlength="8">
            <span class="text-danger">{{ $errors->first('dni') }}</span>
        </div>

        <div class="form-group col-sm-12 col-md-4">
            <input type="text" name="telefono" id="telefono" class="form-control " value="{{old('telefono')}}"
                placeholder="Teléfono" minlength="9" maxlength="9">
            <span class="text-danger">{{ $errors->first('telefono') }}</span>
        </div>
    </div> --}}

    <div class="form-row ">
        <div class="col-12">
            <span>
                Usuario y contraseña
            </span>
        </div>

        <div class="col-12 p-2 d-flex flex-wrap" style="border-radius: 0px;">
            <div class="form-group col-sm-12 col-sm-12 col-md-12">
                <input id="email" type="email" class="form-control  " name="email" value="{{ old('email') }}" required
                    autocomplete="email" placeholder="Dirección de correo electrónico">
                {{-- form-control  @error('email') is-invalid @enderror --}}
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>


            <div class="form-group col-sm-12 col-md-6">
                <input id="password" type="password" class="form-control  @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password" placeholder="Contraseña" minlength="8">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group col-sm-12 col-md-6">
                <input id="password-confirm" type="password" class="form-control " name="password_confirmation" required
                    autocomplete="new-password" placeholder="Confirmar la contraseña">
            </div>



        </div>
    </div>
</div>

</div>
{{-- <div class="form-row mt-5">
            <div class="form-row  ">
                <div class="form-group pl-5  d-flex flex-row titulos">
                    <div>
                        3
                    </div>
                    <span class="text-info ml-3">
                        <h3>Seleccione los días y horas de atención</h3>
                    </span>
                </div>
            </div>

            <div class="col-12 col-sm-12   ">

                <table class="table table-striped  border">
                    <thead class="bg-info ">
                        <tr>
                            <th>
                                <div class="col-12 text-center">
                                    <span> Dia de la semana</span>
                                </div>
                            </th>
                            <th>
                                <div class="col-12 d-flex flex-nowrap justify-content-around">
                                    <span>Hora Inicio</span>
                                    <span>Hora fin</span>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dias as $dia)
                        <tr>
                            <td>
                                <div class="form-group col-12">

                                    <div class="ml-5 d-flex align-items-center">
                                        <label class="form-check-label" for="dias[{{ $loop->iteration }}]">
<input class="form-check-input" type="checkbox" name="dias[{{ $loop->iteration }}]" id="dias[{{ $loop->iteration }}]"
    value="{{ $dia }}">{{ $dia }}
</label>
</div>


</div>
</td>
<td>

    <div class="form-row d-flex align-items-center flex-nowrap">

        <div class="form-group col-12">


            <div class="d-flex flex-nowrap">


                <input type="text" name="horainicio[{{ $loop->iteration }}]" id="horainicio-{{ $dia }}"
                    class="form-control  text-center " data-target="#horainicio-{{ $dia }}" value="12:00 AM"
                    style="border: none;  background-color:transparent; display: none;" />
                <span> - </span>
                <input type="text" name="horafin[{{ $loop->iteration }}]" id="horafin-{{ $dia }}"
                    class="form-control  text-center " data-target="#horafin-{{ $dia }}" value="11:59 PM"
                    style="border: none ;  background-color:transparent; display: none;" />
            </div>
            <div id="time-range-{{ $loop->iteration }}">

                <div class="sliders_step1 ">
                    <div class="slider-range" name="slider-range[{{$loop->iteration}}]" style="display: none;">
                    </div>
                </div>
            </div>

            <span id="errorInicio-{{ $dia }}" class="text-danger"></span>
        </div>

    </div>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div> --}}
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
                <span class="spinner-border spinner-border-sm spinnerr" role="status" aria-hidden="true"
                    style="display: none"></span>
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