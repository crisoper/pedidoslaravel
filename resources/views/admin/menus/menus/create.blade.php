@extends('layouts.admin.admin')

@section('contenido')

{{-- @can('public.menus.crear') --}}

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3>Crear Menu</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('menus.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                                <label for="parent_id">Menu padre</label>
                                <select class="form-control" name="parent_id" id="parent_id">
                                    <option value="">Seleccionar</option>
                                    @foreach ($menus as $menu)
                                        <option value="{{ $menu->id }}">{{ $menu->nombre }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('parent_id') }}</span>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="{{ old('nombre') }}" class="form-control">
                                <span class="text-danger">{{ $errors->first('nombre') }}</span>
                            </div>
                            
                            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                                <label for="nombre">Tipo</label>
                                <br>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="tipo" value="navegacion" @if ( old('tipo') == 'navegacion' ) checked @endif > Navegacion
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="tipo" value="agrupador" @if ( old('tipo') == 'agrupador' ) checked @endif > Agrupador
                                    </label>
                                </div>
                                <br>
                                <span class="text-danger">{{ $errors->first('tipo') }}</span>
                            </div>
                            
                            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                                <label for="url">URL</label>
                                <input type="text" name="url" id="url" placeholder="Url" value="{{ old('url') }}" class="form-control">
                                <span class="text-danger">{{ $errors->first('url') }}</span>
                            </div>
            
                            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                                <label for="tooltip">Tooltip</label>
                                <input type="text" name="tooltip" id="tooltip" placeholder="Tooltip" value="{{ old('tooltip') }}" class="form-control">
                                <span class="text-danger">{{ $errors->first('tooltip') }}</span>
                            </div>
                            
                            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                                <label for="orden">Orden</label>
                                <input type="text" name="orden" id="orden" placeholder="Orden" value="{{ old('orden') }}" class="form-control">
                                <span class="text-danger">{{ $errors->first('orden') }}</span>
                            </div>
                            
                            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                                <label for="icono">Icono</label>
                                <input type="text" name="icono" id="icono" placeholder="Icono" value="{{ old('icono') }}" class="form-control">
                                <span class="text-danger">{{ $errors->first('icono') }}</span>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{ route('menus.index') }}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
            
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- @endcan --}}
  
@endsection