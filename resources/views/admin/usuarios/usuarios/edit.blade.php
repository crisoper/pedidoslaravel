@extends('layouts.admin.admin')
{{-- @extends('layouts.app') --}}

@can('users.editar')


@section('contenido')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3>Editar Usuario</h3>
                </div>
                <div class="card-body">
                    {{-- @can('public.users.crear') --}}
                        <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
                            @csrf
                            {!! method_field('PUT') !!}
                            <div class="form-row">
                                <div class="form-group col-xs-12 col-sm-4">
                                    <label for="nombre">Nombre</label>
                                    <input type="hidden" name="personaid" value="{{ $persona->id }}">
                                    <input autofocus type="text" name="nombre" id="nombre" placeholder="Nombre" value="{{ $persona->nombre }}" class="form-control">
                                    <span class="text-danger">{{ $errors->first('nombre') }}</span>
                                </div>
                                <div class="form-group col-xs-12 col-sm-4">
                                    <label for="paterno">Apellido Paterno</label>
                                    <input autofocus type="text" name="paterno" id="paterno" placeholder="Paterno" value="{{ $persona->paterno }}" class="form-control">
                                    <span class="text-danger">{{ $errors->first('paterno') }}</span>
                                </div>
                                <div class="form-group col-xs-12 col-sm-4">
                                    <label for="materno">Apellido Materno</label>
                                    <input autofocus type="text" name="materno" id="materno" placeholder="Materno" value="{{ $persona->materno }}" class="form-control">
                                    <span class="text-danger">{{ $errors->first('materno') }}</span>
                                </div>
                                <div class="form-group col-xs-12 col-sm-3">
                                    <label for="dni">Num. DNI</label>
                                    <input autofocus type="text" maxlength="8" name="dni" id="dni" placeholder="DNI" value="{{ $persona->dni }}" class="form-control">
                                    <span class="text-danger">{{ $errors->first('dni') }}</span>
                                </div>
                                <div class="form-group col-xs-12 col-sm-3">
                                    <label for="telefono">Teléfono</label>
                                    <input autofocus type="text" maxlength="9" name="telefono" id="telefono" placeholder="Teléfono" value="{{ $persona->telefono }}" class="form-control">
                                    <span class="text-danger">{{ $errors->first('telefono') }}</span>
                                </div>
                                <div class="form-group col-xs-12 col-sm-6">
                                    <label for="direccion">Dirección</label>
                                    <input autofocus type="text" name="direccion" id="direccion" placeholder="Dirección" value="{{ $persona->direccion }}" class="form-control">
                                    <span class="text-danger">{{ $errors->first('direccion') }}</span>
                                </div>                             
                                  <label for="">Usuario y contraseña:</label>
                                <div class="form-group col-xs-12 col-sm-12">
                                    <label for="name">Correo</label>
                                    <input type="text" value="{{ $usuario->email }}" class="form-control" disabled>
                                    {{-- INPUT QUE ENVIA LA INFORMACION DESACTIVADO --}}
                                    <input type="text" name="email" id="email" placeholder="correo" value="{{ $usuario->email }}" class="form-control" style="display:none">
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
                    {{-- @endcan --}}
                </div>
            </div>
        </div>
    </div>
</div>
  
@endsection



@else
    @include('includes.sinpermiso')    
@endcan