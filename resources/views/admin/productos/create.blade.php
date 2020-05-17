
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
                            <div class="form-row">
                                <div class="col-12 d-flex flex-wrap">
                                        <div class="col-6">
                                        <div class="form-group col-md-12">
                                            <input type="text" name="nombre" id="nombre"  class="form-control" placeholder="Producto">
                                            <span class="text-danger">{{ $errors->first('nombre') }}</span>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="4" placeholder="Descripcion de producto"></textarea>
                                            <span class="text-danger">{{ $errors->first('descripcion') }}</span>
                                        </div>
                                    
                                    
                                        <div class="form-group col-md-12">                                        
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
                                        <div class="form-group col-md-12">                                
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
                                            <input type="text" name="codigo" id="codigo"  class="form-control" placeholder="Código ">
                                            <span class="text-danger">{{ $errors->first('codigo') }}</span>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="text" name="precio" id="precio"  class="form-control" placeholder="Precio ">
                                            <span class="text-danger">{{ $errors->first('precio') }}</span>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="text" name="stock" id="stock"  class="form-control" placeholder="Stock">
                                            <span class="text-danger">{{ $errors->first('stock') }}</span>
                                        </div>
                                        <div class="form-group col-12">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                            <a href="{{route('productos.index')}}" class="btn btn-danger">Cancelar</a>
                                        </div>
                                    </div>
                                         <div class="col-6">

                                            <div class="d-flex flex-wrap">
                                                <div>
                                                <img src="{{Storage::get('imgproducto.jpg') }}" width="380px" height="330px" id="">
                                                <img src="" width="380px" height="330px" id="imagenmuestra">
                                                </div>
                                                <div>
                                                    <div  id="preview">
                                                        <img src="" width="100px" height="80px" id="iconoimagen">
                                                    </div>
                                                </div>
                                                
                                            </div>

                                             <div class="form-group col-12 mb-4">  
                                                 <small>Extensiones permitidas: .JPG, .PNG, .BMP }}</small><br>
                                                 <div style="display: none">
                                                 <input type="file" name="fotoproducto[]" id="fotoproducto" maxlength="500" multiple class="form-control">
                                                </div>                                              
                                                 <input class="btn btn-success" type="button" name="cargarfoto" id="cargarfoto" value="Subir imágen">
                                                 <br>
                                                

                                             </div>
                                         <div class="col-1">

                                         </div>
                                    </div>
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
<script>
    $(function(){   
        
        $('#categoriaid').select2({
                placeholder: "Seleccione categoría"
        });
       $('#tagid').select2({
               placeholder: "Selccione Tag"
       });

       $("#cargarfoto").on('click',function(){
           
           $("#fotoproducto").trigger("click");
       })

// El listener va asignado al input


$('#bntver').on('click',function(){
  var i=0;
  var fotos = fotoproducto.files;
  var fotosArray = Array.from(fotos);
  
    $.each(fotosArray, function(indice, elemento) {
        console.log( elemento.name );
    });
});

$("#fotoproducto").change(function() {
  readURL(this);   
});

function readURL(input) {
    var fotos = fotoproducto.files;
    var fotosArray = Array.from(fotos);

  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
        console.log(e);
      // Asignamos el atributo src a la tag de imagen
      $('#imagenmuestra').attr('src', e.target.result);
        $('#iconoimagen').attr('src', e.target.result);

      $.each(fotosArray, function(indice, elemento) {
        $('#preview').attr('src', e.target.result);
        // var preview1 = "<div><img src=' e.target.result' width='100px' height='80px' id='iconoimagen'> </div>" ;
        // $("#preview").html(preview1);
    });

    }
    $.each(fotosArray, function(indice, elemento) {
        reader.readAsDataURL(input.files[indice]);
    });
   
  }
}



   });
   </script>
@endsection