@extends('layouts.public')

@section('contenido')


<div class="container">
    <div class="row">
        <div class="col-12 section_title p-0 mb-4">
            <h2 class="my-1">Quienes Somos</h2>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-5">
            <img src="{{ asset('img/diversos/quienessomos.jpg')}}" alt="Quienes somos">
        </div>
        <div class="col-7">
           
                Somos un grupo de profesionales cajamarquinos con mención en programación de aplicaciones web. 
            Nos desénvolvemos con altos estándares de gestión y producción, para competir lealmente.
            Nuestra profesionalización ha permitido que seamos reconocidos como uno de los grupos en programación con  
            importante aceptacion en la región de Cajamarca.

            <br>

                Pedidosapp nace en agosto de 2019, con un modelo de trabajo donde no concebimos el éxito de
            nuestro trabajo sin la satisfacción de nuestros clientes.


        </div>
    </div>
</div>


@endsection



