@extends('layouts.admin.admin')

{{-- @can('horarios') --}}

<style>
    .opcion{
        /* width: 50px; */
        height: 100px;
        
        background-color: #F4F6F9;
    }
    .opcion>i{
        color: antiquewhite;
        
    }
    .opcionIcono{
        width: 80px;
        background: transparent !important;
        background-color: #F4F6F9;
    }
</style>
@section('contenido')

<div class="container-fluid ">
    <div class="row d-flex justify-content-center ">
        <h3>CONFIGURACIÓN DE EMPRESA</h3>

    </div>
    <div class="row mt-3">
        <div class="col-12 d-flex flex-wrap">
            <div class=" col-md-4 col-sm-12 ">
                @php
                    $empresaid =  Session::get( 'empresaactual', 0 );
                    $horariosdeempresa = DB::table('horarios')->where('empresa_id', $empresaid )->get();
                @endphp
                
             
                @if ( count($horariosdeempresa) < 1  )              
                        <a href="{{route('horarios.index')}}">                            
                            @else
                        <a href="{{route('horarios.editar')}}">
                @endif
                    <div class="card mb-1">
                        <div class="row d-flex flex-nowrap">
                            <div
                                class="opcionIcono col-xs-2 col-sm-2 col-md-2 col-lg-2 d-flex align-items-center justify-content-center bg-info">
                                <h2><i class="fa fa-calendar" aria-hidden="true"></i></h2>
                            </div>
                            <div class="opcion col-xs-10 col-sm-10 col-md-10 col-lg-10 px-2">
                                <div class="card-block px-2 py-2 text-dark" style="line-height:12px">
                                    <h4 class="card-title">Horario</h4>
                                    <p class="card-text py-2">
                                        <small>Espesifique los dias y horas de atención.</small></p>

                                </div>
                            </div>


                        </div>
                    </div>
                </a>
            </div>
            <div class=" col-md-4 col-sm-12">
                <a href="{{route('config.comprobantes.index')}}">
                    <div class="card mb-1">
                        <div class="row d-flex flex-nowrap">
                            <div
                                class="opcionIcono col-xs-2 col-sm-2 col-md-2 col-lg-2 d-flex align-items-center justify-content-center bg-info">
                                <h2><i class="fas fa-user" ></i></h2>
                            </div>
                            <div class="opcion col-xs-10 col-sm-10 col-md-10 col-lg-10 px-2">
                                <div class="card-block px-2 py-2 text-dark" style="line-height:12px">
                                    <h4 class="card-title">Comprobantes</h4>
                                    <p class="card-text py-2">
                                        <small>Especifique los tipos de comprobantes que emite.</small></p>

                                </div>
                            </div>


                        </div>
                    </div>
                </a>
            </div>
            <div class=" col-md-4 col-sm-12">
                <a href="{{route('horarios.index')}}">
                    <div class="card mb-1">
                        <div class="row d-flex flex-nowrap">
                            <div
                                class=" opcionIcono col-xs-2 col-sm-2 col-md-2 col-lg-2 d-flex align-items-center justify-content-center bg-info">
                                <h2><i class="fas fa-user" ></i></h2>
                            </div>
                            <div class="opcion col-xs-10 col-sm-10 col-md-10 col-lg-10 px-2">
                                <div class="card-block px-2 py-2 text-dark" style="line-height:12px">
                                    <h4 class="card-title">Completar o modificar información</h4>
                                    <p class="card-text py-2">
                                        <small>Actualiza tus datos para que tus cleintes te puedan identificar
                                            facilmente.</small></p>

                                </div>
                            </div>


                        </div>
                    </div>
                </a>
            </div>
            <div class=" col-md-4 col-sm-12">
                <a href="{{route('horarios.index')}}">
                    <div class="card mb-1">
                        <div class="row d-flex flex-nowrap">
                            <div
                                class="opcionIcono col-xs-2 col-sm-2 col-md-2 col-lg-2 d-flex align-items-center justify-content-center bg-info">
                                <h2><i class="fas fa-user" ></i></h2>
                            </div>
                            <div class="opcion col-xs-10 col-sm-10 col-md-10 col-lg-10 px-2">
                                <div class="card-block px-2 py-2 text-dark" style="line-height:12px">
                                    <h4 class="card-title">Personaliza tu Sitio web</h4>
                                    <p class="card-text py-2">
                                        <small>Actualiza tu foto de perfil e imagen principal de tu sitio web.</small>
                                    </p>

                                </div>
                            </div>


                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection