@extends('layouts.public')

@section('contenido')
 
          <div class="card">
              <div class="card-header">
                  Categorias
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
  
 @endsection
     

