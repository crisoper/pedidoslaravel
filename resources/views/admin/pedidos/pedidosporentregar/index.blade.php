
@extends('layouts.admin.admin')
@section('contenido')


<div class="container">
    <div class="row">
        <div class="col-12">
            <h4 class="text-center">PEDIDOS POR ENTREGAR</h4>
        </div>
        <div class="col-12">
            <div class="row m-0" id="cuerpo_pedidos_por_entregar">

            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    @include('admin.pedidos.pedidosporentregar.indexjs')
@endsection