@extends('layouts.public')

@section('contenido')

        <div class="row text-center">
            <div class="col-9">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                       <div>
                           Productos
                       </div>
                       <div>                      
                            <a class="btn btn-primary" href="{{route('productos.create')}}">Nuevo Producto</a>
                       </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-light table-sm" name="tableproductos" id="tableproductos" >
                            <thead class="thead-light">
                                <tr>
                                    <th>Item</th>
                                    <th>Categoría</th>
                                    <th>Código</th>                                    
                                    <th>Producto</th>                                    
                                    <th>Descripción</th>                                    
                                    <th>Precio</th>                                    
                                    <th>Stock</th>                                    
                                    <th colspan="2">Acciones</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto)
                                <tr>
                                    <td>{{$producto->id}}</td>                                   
                                    <td>
                                        @foreach ($categorias as $categoria)
                                              @if ( $categoria->id== $producto->categoria_id)
                                                  {{$categoria->nombre}}
                                              @endif
                                        @endforeach                                    
                                    </td>
                                    <td>{{$producto->codigo}}</td> 
                                    <td>{{$producto->nombre}}</td> 
                                    <td>{{$producto->descripcion}}</td> 
                                    <td>{{$producto->precio}}</td> 
                                    <td>{{$producto->stock}}</td> 
                                   
                                    <td>
                                    <a class="btn btn-info" href="{{route('productos.edit', $producto->id)}}">Editar</a>
                                    </td>
                                    <td>
                                    <div>
                                        <form id="form.producto.delete.{{$producto->id}}" action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                                            {!! method_field('DELETE') !!}
                                            {!! csrf_field() !!}
                                            <a class="text-danger" href="#" onclick="event.preventDefault(); document.getElementById('form.producto.delete.{{$producto->id}}').submit();">Eliminar</a>
                                        </form>                                    
                                    </div>
                                </td>
                                </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    

    


@endsection

