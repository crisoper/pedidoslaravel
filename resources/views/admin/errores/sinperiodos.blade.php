
{{-- @extends('encuestas.paginas.adminlte3') --}}
@extends('layouts.admin.admin')

@section('contenido')
    
    <div class="col-12">
        <div class="alert alert-info text-center" role="alert">
            <br>
            <br>
            <i class="fa fa-info-circle" style="font-size: 1.35em;"></i> 
            <br>
            <span>La empresa no se encuentra activa</span>
            <br>
            <small>Por favor comuniquese con el administrador. </small>
                {{-- <a href="{{ route("periodos.index") }}" >aquí</a></small> --}}
            {{-- <small>Por favor registre un nuevo periodo <a href="{{ route("periodos.index") }}" >aquí</a></small> --}}
            <br>
            
            <br>
            <br>
        </div>    
    </div>
   
@endsection


                    
   