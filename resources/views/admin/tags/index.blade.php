@extends('layouts.admin.admin')

@can('roles.crear')
@section('contenido')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-11">
                            <h3>Tags</h3>                          
                        </div>
                        <div class="mb-3 text-center col-1">
                            <a title="Ir a principal" class="" href="{{Route('home')}}"><h4><i class="fas fa-reply "></i></h4></a>
                        </div>
                    </div>
                </div>
                <div class="row card-body">
                    <div class="col-12 col-md-9 mb 3">
                        <form id="form-buscar-roles" class="" action="">
                            <div class="input-group">
                                <input type="text" class="form-control rounded-1" placeholder="Buscar" aria-label="Buscar" autofocus name="buscar" value="{{request()->query('buscar')}}">

                                <div class="input-group-append">
                                    <a href="#" class="btn btn-outline-info" onclick="event.preventDefault(); document.getElementById('form-buscar-roles').submit();">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 col-md-3 mb-3 text-right">
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Operaciones
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <a href="{{ route('tags.create') }}" class="dropdown-item"><i class="fas fa-plus-square text-success"></i> Crear</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-sm">
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
                                            <td class="text-center">
                                                <a class="" href="{{route('tags.edit', $tag->id)}}" title="Editar">
                                                    <i class="fas fa-edit" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <form id="form.tag.delete.{{$tag->id}}" action="{{ route('tags.destroy', $tag->id) }}" method="POST">
                                                    {!! method_field('DELETE') !!}
                                                    {!! csrf_field() !!}
                                                    <a class="text-danger" href="#" onclick="event.preventDefault(); document.getElementById('form.tag.delete.{{$tag->id}}').submit();" title="Eliminar"><i class="fas fa-trash-alt" aria-hidden="true"></i></a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12">
                        {!! $tags->appends(request()->query() )->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@else
    @include('includes.sinpermiso')
@endcan