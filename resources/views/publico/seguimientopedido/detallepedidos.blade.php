@extends('layouts.public')

@section('contenido')


<div class="container">
    <div class="row">
        <div class="col-12 section_title p-0 mb-4">
            <h2 class="my-1">Detalle de pedidos</h2>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row m-0" id="cuerpo_detalle_pedidos_cliente">

            </div>
        </div>
    </div>
</div>


@endsection


@section('scripts')
    @include('publico.seguimientopedido.detallepedidosjs')
@endsection



