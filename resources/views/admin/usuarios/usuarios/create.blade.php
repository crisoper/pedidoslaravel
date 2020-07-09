@extends('layouts.admin.admin')

@can('users.crear') 

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3>Crear Usuario</h3>
                </div>
                <div class="card-body">                   
                        <form action="{{ route('usuarios.store') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-xs-12 col-sm-4">
                                    <label for="name">Nombre</label>
                                    <input autofocus type="text" name="name" id="name" placeholder="Nombre" value="{{ old('name') }}" class="form-control">
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                </div>
                                <div class="form-group col-xs-12 col-sm-4">
                                    <label for="paterno">Apellido Paterno</label>
                                    <input autofocus type="text" name="paterno" id="paterno" placeholder="Paterno" value="{{ old('paterno') }}" class="form-control">
                                    <span class="text-danger">{{ $errors->first('paterno') }}</span>
                                </div>
                                <div class="form-group col-xs-12 col-sm-4">
                                    <label for="materno">Apellido Materno</label>
                                    <input autofocus type="text" name="materno" id="materno" placeholder="Materno" value="{{ old('materno') }}" class="form-control">
                                    <span class="text-danger">{{ $errors->first('materno') }}</span>
                                </div>
                                <div class="form-group col-xs-12 col-sm-3">
                                    <label for="dni">Num. DNI</label>
                                    <input autofocus type="text" maxlength="8" name="dni" id="dni" placeholder="DNI" value="{{ old('dni') }}" class="form-control">
                                    <span class="text-danger">{{ $errors->first('dni') }}</span>
                                </div>
                                <div class="form-group col-xs-12 col-sm-3">
                                    <label for="telefono">Teléfono</label>
                                    <input autofocus type="text" maxlength="9" name="telefono" id="telefono" placeholder="Teléfono" value="{{ old('telefono') }}" class="form-control">
                                    <span class="text-danger">{{ $errors->first('telefono') }}</span>
                                </div>
                                <div class="form-group col-xs-12 col-sm-6">
                                    <label for="direccion">Dirección</label>
                                    <input autofocus type="text" name="direccion" id="direccion" placeholder="Dirección" value="{{ old('direccion') }}" class="form-control">
                                    <span class="text-danger">{{ $errors->first('direccion') }}</span>
                                </div>                             
                                  <label for="">Usuario y contraseña:</label>
                                <div class="form-group col-xs-12 col-sm-12">
                                    <label for="email">Correo</label>
                                    <input type="text" name="email" id="email" placeholder="correo" value="{{ old('email') }}" class="form-control">
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                </div>
                                <div class="form-group col-xs-12 col-sm-6">
                                    <label for="password">Contraseña</label>
                                    <input class="form-control" type="password" name="password" value="">
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                </div>
                                <div class="form-group col-xs-12 col-sm-6">
                                    <label for="password_confirmation">Confirmar contraseña</label>
                                    <input class="form-control" type="password" name="password_confirmation" value="">
                                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                </div>
                             
                            </div>
              
                            <div class="form-row">
                                <div class="form-group col-xs-12 col-sm-12">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <a href="{{ route('usuarios.index') }}" class="btn btn-danger">Cancelar</a>
                                </div>
                            </div>
                        </form>
                     
                </div>
            </div>
        </div>
    </div>
</div>
  
@endsection

@else
    @include('includes.sinpermiso')
@endcan