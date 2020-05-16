@extends('layouts.public')

@section('contenido')

<div class="row">
    <div class="col-12">
        <form>
          
            <div class="input-group mb-3">
                <input id="txtBuscarProducto" autofocus type="text" class="form-control" placeholder="Buscar">
                    <div class="input-group-append">
                    <button class="input-group-text btnBuscarProductos">Buscar</button>
                </div>
            </div>
          </form>
    </div>  
</div>


<div class="row" id="listaproductos">
    {{-- <div class="col-12">
      <div class="card">
        <div class="card-body text-center">
          <div class="spinner-border text-muted"></div>
        </div>
      </div>
    </div> --}}
    {{-- <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div> --}}
</div>



@endsection


@section('scripts')
    @include('publico.inicio.indexjs')
@endsection