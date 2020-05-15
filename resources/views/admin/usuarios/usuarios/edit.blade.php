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
                                <div class="form-group col-xs-12 col-sm-6">
                                    <label for="name">Nombre</label>
                                    <input autofocus type="text" name="name" id="name" placeholder="nombre" value="{{ $usuario->name }}" class="form-control">
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                </div>
                                <div class="form-group col-xs-12 col-sm-6">
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
    @include('layouts.paginas.mensajes.sinpermiso')    
@endcan