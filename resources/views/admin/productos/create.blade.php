
@extends('layouts.admin.admin')

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-11">
                            <h3>Crear Productos</h3>                          
                        </div>
                        <div class="mb-3 text-center col-1">
                            <a title="Atras" class="" href="{{Route('productos.index')}}"><h4><i class="fas fa-reply "></i></h4></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('productos.store')}}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <input type="text" name="nombre" id="nombre"  class="form-control" placeholder="Producto" value="{{old('nombre')}}">
                                            <span class="text-danger">{{ $errors->first('nombre') }}</span>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="4" placeholder="Descripcion de producto" >{{old('descripcion')}}</textarea>
                                            <span class="text-danger">{{ $errors->first('descripcion') }}</span>
                                        </div>
                                    
                                    
                                        <div class="form-group ">                                        
                                            {{-- <select class="form-control" name="categoriaid" id="categoriaid" >
                                                <option value="">Seleccione categoría</option>
                                                @foreach ($categorias as $categoria)
                                                    <option value="{{ $categoria->id}}">
                                                        {{ $categoria->nombre}}
                                                    </option>
                                                @endforeach    
                                            </select> --}}
                                            <input  class="form-control" name="categoriaid" id="categoriaid">
                                            <span class="text-danger">{{ $errors->first('categoriaid') }}</span>
                                        </div>
                                        <div class="form-group ">                                
                                            <select class="form-control" name="tagid" id="tagid" >
                                                <option value=""></option>
                                                @foreach ($tags as $tag)
                                                    <option value="{{ $tag->id}}">
                                                        {{ $tag->nombre}}
                                                    </option>
                                                @endforeach    
                                            </select>
                                            <span class="text-danger">{{ $errors->first('tagid') }}</span>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="text" name="codigo" id="codigo"  class="form-control" placeholder="Código " value="{{old('codigo')}}">
                                            <span class="text-danger">{{ $errors->first('codigo') }}</span>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="text" name="precio" id="precio"  class="form-control" placeholder="Precio" value="{{old('precio')}}">
                                            <span class="text-danger">{{ $errors->first('precio') }}</span>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="text" name="stock" id="stock"  class="form-control" placeholder="Stock" value="{{old('stock')}}">
                                            <span class="text-danger">{{ $errors->first('stock') }}</span>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group col-md-12">
                                        <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="3" placeholder="Descripcion de producto" >{{old('descripcion')}}</textarea>
                                        <span class="text-danger">{{ $errors->first('descripcion') }}</span>
                                    </div>
                                    <div class="form-group col-12">                                        
                                        <select class="form-control" name="categoriaid" id="categoriaid" >
                                            <option value="">Seleccione categoría</option>
                                            @foreach ($categorias as $categoria)
                                                <option value="{{ $categoria->id}}">
                                                    {{ $categoria->nombre}}
                                                </option>
                                            @endforeach    
                                        </select>
                                        <span class="text-danger">{{ $errors->first('categoriaid') }}</span>
                                    </div>
                                    <div class="form-group col-12">                                
                                        <select class="form-control" name="tagid" id="tagid">
                                            <option value=""></option>
                                            @foreach ($tags as $tag)
                                                <option value="{{ $tag->id}}">
                                                    {{ $tag->nombre}}
                                                </option>
                                            @endforeach    
                                        </select>
                                        <span class="text-danger">{{ $errors->first('tagid') }}</span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" name="codigo" id="codigo"  class="form-control" placeholder="Código " value="{{old('codigo')}}">
                                        <span class="text-danger">{{ $errors->first('codigo') }}</span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" name="precio" id="precio"  class="form-control" placeholder="Precio" value="{{old('precio')}}">
                                        <span class="text-danger">{{ $errors->first('precio') }}</span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" name="stock" id="stock"  class="form-control" placeholder="Stock" value="{{old('stock')}}">
                                        <span class="text-danger">{{ $errors->first('stock') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-5 mx-auto" id="products_border">
                                <div class="form-row">
                                    <div class="form-group col-12 col-md-11 mb-3 mx-auto">
                                        <div style="display: none " >
                                           <input type="file" name="fotoproducto[]" id="fotoproducto" maxlength="250" multiple class="form-control">
                                        </div>                                              
                                        <input class="btn btn-light border btn-block" type="button" name="cargarfoto" id="cargarfoto" value="Subir imágen">
                                    </div>
                                    <div class="form-group text-center col-12">
                                        <img class=" img-thumbnail" src="{{ Storage::url('img_productos/imgproducto.jpg') }}" width="350px" height="300px" id="imgdefault" data-initial-preview="#" accept="image/*">
                                        <img class=" img-thumbnail" src="" width="350px" height="300px" id="imagenmuestra">
                                    </div>
                                    <div class="form-group mx-auto col-12">
                                        <div class="d-flex justify-content-between" id="preview">
                                        </div>
                                        <span class="text-danger">{{ $errors->first('fotoproducto') }}</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12 text-center mt-3">
                                @csrf
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{route('productos.index')}}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>

                        <div class="md-form">

                            <div class="ui-widget">
                                <label for="tags">Tags: </label>
                               
                              </div>

                        </div>
                          
                        



                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')
    @include('admin.productos.js');

    <script>
        $(function(){
            var categorias = [];
            var categoriasArray = [];
            $.ajax({
                url:"{{ route('categorias.getCategorias') }}",
                dataType:"json",
                method:"get",
                data:{},
                success: function(data){                  
                    
                    $.each(data[1], function(index, valor){
                        categorias.push(valor);
                        categoriasArray.push(categorias[index].nombre);
                    });
                    console.log(categoriasArray);
                }
            });

      
    $( "#categoriaid" ).autocomplete({
      source: categoriasArray
    });

        });
    
    </script>
@endsection

