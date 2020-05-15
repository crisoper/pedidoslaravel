
@extends('layouts.admin.admin')

@section('contenido')
    
    <div class="col-12">
        <div class="alert alert-info text-center" role="alert">
            <br>
            <br>
            <i class="fa fa-info-circle" style="font-size: 1.35em;"></i> 
            <br>
            <span>La empresa aun no cuenta con periodos activos</span>
            <br>
            <small>Por favor registre un nuevo periodo <a href="{{ route("periodos.index") }}" >aquí</a></small>
            <br>
            
            <br>
            <br>
        </div>    
    </div>
   
@endsection


                    
   