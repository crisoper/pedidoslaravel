{{-- @extends('layouts.paginas.adminlte3') --}}
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
                    <p>
                        Su usuario no tiene asignado un rol, comuniquese con el Administrador.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


