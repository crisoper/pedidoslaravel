@extends('layouts.admin.admin')

{{-- @can('horarios') --}}

<style>
    .opcion {
        /* width: 50px; */
        height: 100px;

        background-color: #F4F6F9;
    }

    .opcion>i {
        color: antiquewhite;

    }

    .opcionIcono {
        width: 80px;
        background: transparent !important;
        background-color: #F4F6F9;
    }
    .box:hover{
        box-shadow: 0px 0px 3px rgb(21, 155, 155);
    }
</style>
@section('contenido')

<div class="container-fluid">
    <div class="row d-flex justify-content-center ">
        <h3>CONFIGURACIÓN DE EMPRESA</h3>

    </div>
    <div class="row mt-2 p-3">
        <div class="card">

            <div class="card-body">


                <div class="col-12 d-flex flex-wrap">
                  
                    <div class=" col-md-3 col-sm-12 ">
                        @php
                        $empresaid = Session::get( 'empresaactual', 0 );
                        $horariosdeempresa = DB::table('horarios')->where('empresa_id', $empresaid )->get();
                        @endphp


                        @if ( count($horariosdeempresa) < 1 ) <a href="{{route('horarios.index')}}">
                            @else
                            <a href="{{route('horarios.editar')}}">
                                @endif
                               
                                    <div class=" box">
                                        <div class="card-header text-center" >
                                            {{-- <img src="https://img.icons8.com/fluent/96/000000/calendar.png" /> --}}
                                            <img src="https://img.icons8.com/nolan/96/calendar.png"/>
                                        </div>
                                        <div class="card-body p-1 bg-info">
                                            <h5 class="card-title">Horario de atención</h5>
                                            <p class="card-text"><small>Espesifica los dias y horas de atención.</small></p>
                                        </div>
                                    </div>                              
                            
                            </a>
                    </div>
                    <div class=" col-md-3 col-sm-12">
                        <a href="{{route('config.comprobantes.index')}}">
                            
                            <div class=" box">
                                <div class="card-header text-center" >
                                    <img src="https://img.icons8.com/nolan/96/report-card.png"/>
                                </div>
                                <div class="card-body p-1 bg-info">
                                    <h5 class="card-title">Comprobantes</h5>
                                    <p class="card-text"><small><small>Especifica los tipos de comprobantes que emites.</small></small></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class=" col-md-3 col-sm-12">
                        <a href="{{route('empresas.edit', $empresaid)}}">
                            <div class=" box">
                                <div class="card-header text-center" >
                                    <img src="https://img.icons8.com/nolan/96/registry-editor.png"/>
                                </div>
                                <div class="card-body p-1 bg-info">
                                    <h5 class="card-title">Completar o modificar información</h5>
                                    <p class="card-text"><small><small>Actualiza tus datos para que tus clientes puedan identificar
                                        facilmente tu empresa.</small></small></p>
                                </div>
                            </div>

                        </a>
                    </div>
                    <div class=" col-md-3 col-sm-12">
                        <a href="{{route('config.personalizarempresa')}}">
                            <div class=" box">
                                <div class="card-header text-center" >
                                    <img src="https://img.icons8.com/nolan/96/horizontal-settings-mixer.png"/>
                                </div>
                                <div class="card-body p-1 bg-info">
                                    <h5 class="card-title">Personaliza tu Sitio web</h5>
                                    <p class="card-text"><small><small>Actualiza tu foto de perfil e imagen principal de tu sitio
                                        web.</small></small></p>
                                </div>
                            </div>

                        </a>
                    </div>
                </div>
            </div>{{-- fin de card general --}}
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection