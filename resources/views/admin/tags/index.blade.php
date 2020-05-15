@extends('layouts.public')

@section('contenido')

        <div class="row">
            <div class="col-9">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                       <div>
                           Tags
                       </div>
                       <div>                      
                            <a class="btn btn-primary" href="{{route('tags.create')}}">Nuevo Tag</a>
                       </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-light table-sm" name="tabletag" id="tabletag" >
                            <thead class="thead-light">
                                <tr>
                                    <th>Item</th>
                                    <th>Tag</th>
                                                    
                                    <th colspan="2">Acciones</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tags as $tag)
                                <tr>
                                    <td>{{$tag->id}}</td>                                
                                    <td>{{$tag->nombre}}</td>                                   
                                   
                                    <td>
                                    <a class="btn btn-info" href="{{route('tags.edit', $tag->id)}}">Editar</a>
                                    </td>
                                    <td>
                                    <div>
                                        <form id="form.tag.delete.{{$tag->id}}" action="{{ route('tags.destroy', $tag->id) }}" method="POST">
                                            {!! method_field('DELETE') !!}
                                            {!! csrf_field() !!}
                                            <a class="text-danger" href="#" onclick="event.preventDefault(); document.getElementById('form.tag.delete.{{$tag->id}}').submit();">Eliminar</a>
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

