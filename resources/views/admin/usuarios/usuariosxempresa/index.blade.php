@extends('layouts.admin.admin')

@can('userempresas.listar')
@section('contenido')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-11">
                            <h3>Usuarios por empresa</h3>
                            <small class="text-muted">
                                Por favor agregue usuarios a la empresa: @if ( Session::has( 'empresadescripcion') ) {{ Session::get( 'empresadescripcion') }} @endif
                            </small>                
                        </div>
                        <div class="mb-3 text-center col-1">
                            <a title="Ir a principal" class="" href="{{Route('home')}}"><h4><i class="fas fa-reply "></i></h4></a>
                        </div>
                    </div>
                </div>

                <div class="row card-body">
                    
                    <div class="col-12 col-md-12 mb-3">
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
                    
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Nro</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th colspan="3" class="text-center">Acciones</th>
                                    </tr>
                                </thead>
    
                                <tbody>
                                    @foreach ( $usuarioempresas as $usuario )
                                        
                                        @if ( ! $usuario->hasRole('SuperAdministrador'))
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration + $usuarioempresas->perPage() * ($usuarioempresas->currentPage() - 1) }}
                                                </td>
                                                <td>{{ $usuario->name }}</td>
                                                <td>{{ $usuario->email }}</td>
                                                <td class="text-center">
                                                   
                                                    @if ( $usuario->empresas->pluck('id')->contains( Session::get('empresaactual', 0 ) ) )
                                                  
                                                        @can('userempresas.eliminar')
                                                            <form id="form.usuarioempresa.eliminar.{{$usuario->id}}" action="{{ route( 'usuariosxempresa.destroy', $usuario->id )}}" method="POST">
                                                                {!! method_field('DELETE') !!}
                                                                <input type="hidden" name="usuario" value="{{$usuario->id}}">
                                                                {!! csrf_field() !!}
                                                                <a class="text-danger" href="#"
                                                                    onclick="event.preventDefault();
                                                                    document.getElementById('form.usuarioempresa.eliminar.{{$usuario->id}}').submit();"><i class="fas fa-trash-alt"></i><a/>
                                                            </form>
                                                        @endcan

                                                    @else
                                                        @can('userempresas.crear')
                                                            <form id="form.usuarioempresa.agregar.{{$usuario->id}}" action="{{ route('usuariosxempresa.store') }}" method="POST">
                                                                {!! csrf_field() !!}
                                                                <input type="hidden" name="usuario" value="{{$usuario->id}}">
                                                                <a class="text-info" href="#"
                                                                onclick="event.preventDefault();
                                                                document.getElementById('form.usuarioempresa.agregar.{{$usuario->id}}').submit();"><i class="fas fa-plus-square"></i> </a>
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
                        {!! $usuarioempresas->appends(request()->query() )->links('pagination::bootstrap-4') !!}
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