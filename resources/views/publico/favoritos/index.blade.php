@extends('layouts.public')

@section('contenido')


	<!-- Shopping Cart -->
    <div class="container mb-5">
        <div class="row">
            <div class="col-12">
                <div class="section-title mb-0">
                    <h2 class="float-left m-0 p-0">Detalle de lista de deseos</h2>
                </div>
            </div>
            <div class="col-12">
                <hr class="subrayado_productos mt-1">
            </div>
            <div class="col-12 mb-0" id="contenido_detalle_pedido">
                <div class="row pl-4 pt-4 pr-4 pb-2" id="cuerpoTablaListaDeseos">

                </div>
            </div>
        </div>
    </div>

    

@endsection


@section('scripts')
    @include('publico.favoritos.indexjs')
@endsection