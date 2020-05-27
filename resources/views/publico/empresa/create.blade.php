@extends('layouts.publico.registraempresa')

@section('contenido')
<style>
    input {
        border-radius: 0em;

    }
</style>
<div class="container">
    <div class="row">
        <div class="col">

            <div class="col-12" style="background-color: #F5F5F5">

                <form action="{{route('registratuempresa.store')}}" method="POST" enctype="multipart/form-data">
                    <div class="row mt-5">
                        <div class="col-md-4 col-sm-12 mx-auto d-flex justify-content-center align-items-center">
                            <span class="display-3 ">Bienvenido</span>
                            <p>

                            </p>
                        </div>

                        <div class="col-md-8 col-sm-12  mx-auto ">
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <span>Datos de la Empresa</span>
                                </div>

                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-row">
                                            <div class="col-12 d-flex flex-wrap p-2">
                                                <div class="col-md-8 col-sm-12">
                                                    <div class="form-group col-md-12 col-sm-12">
                                                        <select name="rubro_id" id="rubro_id"
                                                            class="form-control form-control-sm btn-block " autofocus>
                                                            <option value="">Rubro de negocio</option>
                                                            @foreach ($empresarubros as $empresarubro)
                                                            <option value="{{ $empresarubro->id }}"
                                                                {{ old('rubro_id') == $empresarubro->id ? 'selected' : '' }}>
                                                                {{ $empresarubro->nombre }}</option>
                                                            @endforeach
                                                            <span
                                                                class="text-danger">{{ $errors->first('rubro_id') }}</span>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-12 col-sm-12">
                                                        <input type="text" name="ruc" id="ruc" maxlength="11"
                                                            class="form-control form-control-sm" value="{{old('ruc')}}"
                                                            placeholder="Ruc">
                                                        <span class="text-danger">{{ $errors->first('ruc') }}</span>
                                                    </div>

                                                    <div class="form-group col-md-12 col-sm-12">
                                                        <input type="text" name="nombre" id="nombre"
                                                            class="form-control form-control-sm"
                                                            value="{{old('nombre')}}"
                                                            placeholder="Nombre o Razón Social">
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
                                                        <span
                                                            class="text-danger">{{ $errors->first('direccion') }}</span>
                                                    </div>
                                                    <div class="form-group col-md-12 col-sm-12">
                                                        <input type="text" name="facebook" id="facebook"
                                                            class="form-control form-control-sm"
                                                            value="{{old('facebook')}}"
                                                            placeholder="Página de facebook">
                                                        <span
                                                            class="text-danger">{{ $errors->first('facebook') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-12 mx-auto">
                                                    <div class="form-row">
                                                        <div class="form-group col-12">
                                                            <div class="cajaInputAgregarLogo text-center">
                                                                <label for="logo">
                                                                    <div class="cajaNombreLogo" data-text="">Seleccionar
                                                                        Logo
                                                                    </div>
                                                                </label>
                                                                <input type="file" name="logo" id="logo"
                                                                    data-initial-preview="#" accept="image/*">
                                                            </div>
                                                            <span
                                                                class="text-danger">{{ $errors->first('logo') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12 d-flex flex-wrap">
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <select name="departamentoid" id="departamentoid"
                                                        class="form-control form-control-sm " autofocus>
                                                        <option value="">Departamento</option>
                                                        @foreach ($departamentos as $departamento)
                                                        <option value="{{ $departamento->id }}"
                                                            {{ old('departamentoid') == $departamento->id ? 'selected' : '' }}>
                                                            {{ $departamento->nombre }}</option>
                                                        @endforeach
                                                        <span
                                                            class="text-danger">{{ $errors->first('departamentoid') }}</span>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12">
                                                    <select name="procinciaid" id="procinciaid"
                                                        class="form-control form-control-sm " autofocus>
                                                        <option value="">Provincia</option>
                                                        @foreach ($provincias as $provincia)
                                                        <option value="{{ $provincia->id }}"
                                                            {{ old('procinciaid') == $provincia->id ? 'selected' : '' }}>
                                                            {{ $provincia->nombre }}</option>
                                                        @endforeach
                                                        <span
                                                            class="text-danger">{{ $errors->first('procinciaid') }}</span>
                                                    </select>
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
                                                        <span
                                                            class="text-danger">{{ $errors->first('distritoid') }}</span>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-4 col-sm-12 mx-auto d-flex justify-content-center align-items-center">
                        </div>
                        <div class="col-md-8 col-sm-12  mx-auto ">
                            <div class="card card-outline card-primary col-12 ">
                                <div class="card-header">
                                    <span>Datos del Representante</span>
                                </div>
                                <div class="card-body">
                                    

                                    <div class="d-flex">
                                        <div class="form-group col-md-4">
                                            <input id="name" type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Nombres" >

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            {{-- <span class="text-danger">{{ $errors->first('nombre') }}</span> --}}
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" name="paterno" id="paterno"
                                                class="form-control form-control-sm  @error('paterno') is-invalid @enderror" value="{{old('paterno')}}" placeholder="Apellido paterno"  required autocomplete="paterno">

                                                @error('paterno')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            {{-- <span class="text-danger">{{ $errors->first('paterno') }}</span> --}}
                                        </div>

                                        <div class="form-group col-md-4">
                                            <input type="text" name="materno" id="materno"
                                                class="form-control form-control-sm @error('materno') is-invalid @enderror" value="{{old('materno')}}" placeholder="Apellido materno" required autocomplete="materno">
                                            {{-- <span class="text-danger">{{ $errors->first('materno') }}</span> --}}
                                        </div>
                                        @error('materno')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>

                                    <div class="d-flex">
                                        <div class="form-group col-md-4">
                                            <input type="text" name="dni" id="dni" class="form-control form-control-sm"
                                                value="{{old('dni')}}" placeholder="DNI" maxlength="8">
                                            <span class="text-danger">{{ $errors->first('dni') }}</span>
                                        </div>
               
                                        <div class="form-group col-md-4">
                                            <input type="text" name="telefono" id="telefono"
                                                class="form-control form-control-sm" value="{{old('telefono')}}"
                                                placeholder="Teléfono" minlength="9" maxlength="9">
                                            <span class="text-danger">{{ $errors->first('telefono') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12">
                                            <input id="email" type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Dirección de correo electrónico">
            
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                            <div class="col-sm-12 col-md-6">
                                                <input id="password" type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña" minlength="8">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                     
                                            <div class="col-sm-12 col-md-6">
                                                <input id="password-confirm" type="password" class="form-control form-control-sm" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar la contraseña">
                                            </div>
               
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-12 mx-auto d-flex justify-content-center align-items-center">

                        </div>
                        <div class="col-md-8 col-sm-12  mx-auto">
                            <div class="card card-outline">
                                <div class="card-header">
                               <input type="hidden" name="" id="changeicon" value="0">
                                    <a class="btn" data-toggle="collapse" href="#verhorario" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-angle-double-down" id="icono"></i> Horario de atención
                                      </a>
                                </div>

                                <div class="collapse" id="verhorario">
                                    <div class="card-body pt-0">
                                        @foreach ($dias as $dia)
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-6">
                                                <div class="ml-5 d-flex align-items-center">
                                                    <label class="form-check-label" for="dia{{ $dia }}">
                                                    <input class="form-check-input" type="checkbox" name="dia[]" id="dia{{ $dia }}"
                                                        value="{{ $dia }}">{{ $dia }}
                                                    </label>
                                                </div>
                                              

                                            </div>
                                            <div class="form-group col-sm-12 col-md-3">
                                                <small class="text-muted">Desde:</small>
                                                <div class="input-group date horainicio" id="timepicker"
                                                    data-target-input="nearest">
                                                    <input type="text" name="horainicio[]" id="horainicio{{ $dia }}"
                                                        class="form-control form-control-sm datetimepicker-input"
                                                        data-target="#hora" />
                                                    <div class="input-group-append" data-target="#hora"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text">
                                                            <i class="far fa-clock"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3">
                                                <small class="text-muted">Hasta:</small>
                                                <div class="input-group date horafin" id="timepicker"
                                                    data-target-input="nearest">
                                                    <input type="text" name="horafin[]" id="horafin{{ $dia }}"
                                                        class="form-control form-control-sm datetimepicker-input"
                                                        data-target="#hora" />
                                                    <div class="input-group-append" data-target="#hora"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text">
                                                            <i class="far fa-clock"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-3">
                            <div class="form-row text-center">
                                <div class="form-group col-12">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <a href="{{route('empresas.index')}}" class="btn btn-danger">Cancelar</a>
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
<script>
    $(document).ready(function(){
   
    $('#departamentoid').select2({
            placeholder: "Departamento"
    });
    $('#procinciaid').select2({
            placeholder: "Provincia"
    });
    $('#distritoid').select2({
            placeholder: "Distrito"
    });
    $('#rubro_id').select2({
            placeholder: "Rubro"
    });
   
   
            
});
</script>

@endsection