@extends('layouts.public')

@section('contenido')


<div class="row">
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a href="{{route('productos.index')}}" class="btn btn-primary" >Productos</a>
          <a href="{{route('categorias.index')}}" class="btn btn-primary" >Categorias</a>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
</div>



@endsection


@section('scripts')
    @include('publico.inicio.indexjs')
@endsection