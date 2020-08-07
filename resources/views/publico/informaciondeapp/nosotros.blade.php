@extends('layouts.public')

@section('contenido')


<div class="container">
    <div class="row">
        <div class="col-12 section_title p-0 mb-4">
            <h2 class="my-1">Nosotros</h2>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-5">
        <img src="{{ asset('img/diversos/nosotros.jpg')}}" alt="Nosotros">
        
        </div>
        <div class="col-7">
           
                Pedidosapp es una aplicación que nace ante la necesidad de las personas para hacer un requerimiento en línea, 
            hoy en día el cliente hace los pedidos desde equipos digitales y la tendencia es incremetar cada vez más esta forma 
            de atención por internet, las empresas además de atender las necesidades,
            promocionan sus productos de una forma ordenanda y personalizada.

        </div>
    </div>
</div>


@endsection



