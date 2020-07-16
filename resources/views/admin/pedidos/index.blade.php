
@extends('layouts.admin.admin')
@section('contenido')


<div class="container">
    <div class="row">
        <div class="col-12">
            <h4 class="text-center">PEDIDOS INGRESADOS</h4>
        </div>
        <div class="col-12">
            <div class="row m-0" id="cuerpoPedidosPorConfirmar">

            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    @include('admin.pedidos.indexjs')
@endsection
