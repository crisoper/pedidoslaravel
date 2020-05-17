@extends('layouts.admin.admin')

{{-- @can('role_has_permissions.crear') --}}
{{-- 
@section('breadcrumbs')    
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Admistracion</a></li>
        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
        <li class="breadcrumb-item active">Editar rol</li>
    </ol>
@endsection --}}

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3>{{$empresa->nombre}}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('empresas.guardarcomprobantetipos', $empresa->id ) }}" method="POST">
                        @csrf
                        <div class="form-row">
                            Seleccionar Comprobantes:
                        </div>
                    
                        <div class="form-row">
                            @foreach ($comprobantetipos as $comprobantetipo)
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <label class="form-check-label">
                                        <input 
                                            type="checkbox" 
                                            nombre="comprobantetipos[]"
                                            @if ( $comprobantetipo->nombre )
                                                checked
                                            @endif
                                            value="{{ $comprobantetipo->nombre }}">
                                        {{ $comprobantetipo->nombre }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                                
                        <div class="form-row">
                            <span class="text-danger">{{ $errors->first('comprobantetipos') }}</span>
                        </div>
                        
                        <div class="form-row py-2">
                            <div class="form-group col">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{ route('empresas.index') }}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



{{-- @else
    @include('includes.sinpermiso')
@endcan --}}