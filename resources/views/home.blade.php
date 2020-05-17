
@extends('layouts.admin.admin')

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="row">
                @include('layouts.admin.dashboardhome.vistaEncuestador')
            </div>
            <div class="row">
                @include('layouts.admin.dashboardhome.vistaAdministrador')
            </div>
            <div class="row">
                @include('layouts.admin.dashboardhome.vistaEmpresa')
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script>
        $( document ).ready( function () {
            $( ".card" ).hover(
                function() {
                $(this).addClass('shadow-lg').css( 'pointer'); 
                }, function() {
                $(this).removeClass('shadow-lg');
            });
        
        })
    </script>
@endsection