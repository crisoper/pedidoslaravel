
@extends('layouts.admin.admin')
@can('productocategorias.editar')
@section('contenido')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-11">
                            <h3>Editar Categoría</h3>                          
                        </div>
                        <div class="mb-3 text-center col-1">
                            <a title="Atras" class="" href="{{Route('categorias.index')}}"><h4><i class="fas fa-reply "></i></h4></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('categorias.update', $categoria->id)}}" method="post" id="formularioCategorias">
                        @csrf
                        {!! method_field('PUT') !!}
                          <div class="form-group col-sm-12">
                              <input id="nombre" class="form-control" type="text" name="nombre" value="{{$categoria->nombre}}">
                          </div>
                          <div class="form-group col-sm-12">
                              <label for="categoriaid"> Categoría Padre</label>
                              <select class="form-control" name="categoriaid" id="categoriaid" placeholder="Buscar categoría">
                                  <option value="">Seleccione Categoría</option>
                                  
                                  @foreach ($categorias   as $categoriaitem)
                                  
                                        <option  value="{{ $categoriaitem->id }}" 
                                            @if ($categoriaitem->id == $categoria->parent_id )
                                            selected ="selected"                                           
                                                     @endif    
                                        >
                                                     {{ $categoriaitem->nombre }}  
                                        </option>                                                    
                                  @endforeach
                              </select>
                          </div>
                              <div class="form-group mt-4">
                                  <button class="btn btn-primary" name="btnenviarFormulario" id="btnenviarFormulario">Guardar</button>
                                  
                                  <a href="{{route('categorias.index')}}" class="btn btn-danger" id="cancelar"> Cancelar </a>
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