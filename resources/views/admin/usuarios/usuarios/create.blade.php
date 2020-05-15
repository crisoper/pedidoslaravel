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
                                <div class="form-group col-xs-12 col-sm-6">
                                    <label for="name">Nombre</label>
                                    <input autofocus type="text" name="name" id="name" placeholder="nombre" value="{{ old('name') }}" class="form-control">
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                </div>
                                <div class="form-group col-xs-12 col-sm-6">
                                    <label for="name">Correo</label>
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