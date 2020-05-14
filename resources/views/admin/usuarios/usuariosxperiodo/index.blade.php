@extends('layouts.adminlte3.adminlte3')

@can('userperiodos.listar')

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-11">
                            <h3>Usuarios por periodo</h3>
                            <small class="text-muted">
                                Por favor agregue usuarios al periodo {{ Session::get('periododescripcion', "") }}
                                {{ Session::get('periodoactual', "") }}
                            </small>                
                        </div>
                        <div class="mb-3 text-center col-1">
                            <a title="Ir a principal" class="" href="{{Route('home')}}"><h4><i class="fas fa-reply "></i></h4></a>
                        </div>
                    </div>
              
                </div>
                <div class="row card-body">
                   <!-- @can('users.listar')  -->
                    <div class="col-12 col-md-9 mb-3">
                        <form id="form-buscar-usuarios" action="">
                            <div class="input-group">
                                <input type="text" class="form-control rounded-1" placeholder="Buscar" aria-label="Buscar" autofocus name="buscar" value="{{request()->query('buscar')}}">

                                <div class="input-group-append">
                                    <a href="#" class="btn btn-outline-info" onclick="event.preventDefault(); document.getElementById('form-buscar-usuarios').submit();">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- @endcan -->
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Nro</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th colspan="3" class="text-center">Acciones</th>
                                    </tr>
                                </thead>
    
                                <tbody>
                                    @foreach ( $usuarioperiodos as $usuario )

                                        @if ( ! $usuario->hasRole('SuperAdministrador'))
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration + $usuarioperiodos->perPage() * ($usuarioperiodos->currentPage() - 1) }}
                                                </td>
                                                <td>{{ $usuario->name }}</td>
                                                <td>{{ $usuario->email }}</td>
                                                <td class="text-center">
                                                    @if ( $usuario->periodos->pluck('id')->contains( Session::get('periodoactual', 0 ) ) )
                                                        @can('userperiodos.eliminar')
                                                            <form id="form.usuarioperiodo.eliminar.{{$usuario->id}}" action="{{ route( 'usuariosxperiodo.destroy', $usuario->id )}}" method="POST">
                                                                {!! method_field('DELETE') !!}
                                                                <input type="hidden" name="usuario" value="{{$usuario->id}}">
                                                                {!! csrf_field() !!}
                                                                <a class="text-danger" href="#" 
                                                                    onclick="event.preventDefault();
                                                                    document.getElementById('form.usuarioperiodo.eliminar.{{$usuario->id}}').submit();"><i class="fas fa-trash-alt"></i><a/>
                                                            </form>
                                                        @endcan  
                                                    @else
                                                        @can('userperiodos.crear')
                                                            <form id="form.usuarioperiodo.agregar.{{$usuario->id}}" action="{{ route('usuariosxperiodo.store') }}" method="POST">
                                                                {!! csrf_field() !!}
                                                                <input type="hidden" name="usuario" value="{{$usuario->id}}">
                                                                <a class="text-success" href="#"
                                                                onclick="event.preventDefault();
                                                                document.getElementById('form.usuarioperiodo.agregar.{{$usuario->id}}').submit();"><i class="fas fa-plus-square"></i></a>
                                                            </form>
                                                        @endcan
                                                    @endif
                                                </td>
                                            </tr>    
                                        @endif
                                    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12">
                        {!! $usuarioperiodos->appends(request()->query() )->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@else
    @include('layouts.paginas.mensajes.sinpermiso')
@endcan