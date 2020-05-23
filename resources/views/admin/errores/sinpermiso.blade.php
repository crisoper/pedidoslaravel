
@extends('layouts.admin.admin')

@section('contenido')
    
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3>Sin acceso</h3>
                </div>
                <div class="card-body">
                    Usted no tiene acceso a esta seccion, comuniquese con el Administrador.
                    <br><br>
                    <a href="{{ route("home") }}">Ir a pagina inicial</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection