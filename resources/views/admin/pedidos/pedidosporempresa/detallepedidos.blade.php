@extends('layouts.admin.admin')

@can('pedidos.listar')
@section('contenido')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">

                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-11">
                            <h3>Productos vendidos</h3>
                        </div>
                        <div class="mb-3 text-center col-1">
                            <a title="Ir a principal" class="" href="{{Route('home')}}">
                                <h4><i class="fas fa-reply "></i></h4>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row card-body">
                    <div class="col-12 col-md-9 mb 3">
                        <form id="form-buscar-roles" class="" action="">
                            <div class="input-group">
                                <input type="text" class="form-control rounded-1" placeholder="Buscar"
                                    aria-label="Buscar" autofocus name="buscar" value="{{request()->query('buscar')}}">

                                <div class="input-group-append">
                                    <a href="#" class="btn btn-outline-info"
                                        onclick="event.preventDefault(); document.getElementById('form-buscar-roles').submit();">
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
                                        <th>Item</th>
                                        <th>Cliente</th>
                                        <th>Producto</th>
                                        <th>Código</th>
                                        <th>Precio</th>

                                    </tr>
                                </thead>
                                <tbody id="tablaProductos">
                                    @foreach ($pedidos as $pedido)

                                    @foreach ($pedido->pedidodetalle as $detalle)

                                    <tr>
                                        <td>{{$pedido->id}}</td>
                                        <td>{{$pedido->cliente->name}}</td>
                                        <td>{{$detalle->producto->nombre}}</td>
                                        <td>{{$detalle->producto->codigo}}</td>
                                        <td>{{$detalle->producto->precio}}</td>



                                    </tr>
                                    @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12">
                        {!! $pedidos->appends(request()->query() )->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')

@endsection

@else
@include('layouts.admin.messenger')
@include('includes.sinpermiso')
@endcan