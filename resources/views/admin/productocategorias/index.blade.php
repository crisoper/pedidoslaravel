@extends('layouts.public')

@section('contenido')

        <div class="row">
            <div class="col-9">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                       <div>
                           Categorias
                       </div>
                       <div>                      
                            <a class="btn btn-primary" href="{{route('categorias.create')}}">Nueva Categoria</a>
                       </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-light table-sm" name="tableCategorias" id="tableCategorias" >
                            <thead class="thead-light">
                                <tr>
                                    <th>Item</th>
                                    <th>Categoría padre</th>
                                    <th>categoria</th>                                    
                                    <th colspan="2">Acciones</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categorias as $categoria)
                                <tr>
                                    <td>{{$categoria->id}}</td>                                   
                                    <td>
                                        @foreach ($categorias as $itemcategoria)
                                              @if ( $categoria->parent_id == $itemcategoria->id)
                                                  {{$itemcategoria->nombre}}
                                              @endif
                                        @endforeach                                    
                                    </td>
                                    <td>{{$categoria->nombre}}</td>
                                    <td>
                                    <a class="btn btn-info" href="{{route('categorias.edit', $categoria->id)}}">Editar</a>
                                    </td>
                                    <td>
                                    <div>
                                        <form id="form.categoria.delete.{{$categoria->id}}" action="{{ route('categorias.destroy', $categoria->id) }}" method="POST">
                                            {!! method_field('DELETE') !!}
                                            {!! csrf_field() !!}
                                            <a class="text-danger" href="#" onclick="event.preventDefault(); document.getElementById('form.categoria.delete.{{$categoria->id}}').submit();">Eliminar</a>
                                        </form>
                                        </div>
                                        
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

