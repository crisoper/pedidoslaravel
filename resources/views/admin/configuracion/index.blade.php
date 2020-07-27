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
        color: red;
    }
    .menuconfig{
        background-color: white;
        padding: 5px;
    }
    .card-body{
        display: flex;
        justify-content: center;
        border: none !important;
         
    }
   
</style>
@section('contenido')

<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex flex-wrap menuconfig" >
            <div class="col-sm-12 col-md-4 d-flex align-items-center border-right border-danger">
                <h3>CONFIGURACIÓN DE EMPRESA</h3>
            </div>
            <div class="col-sm-12 col-md-8 d-flex flex-wrap">
                <div class=" col-4">
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
                                        <img src="https://img.icons8.com/cute-clipart/64/000000/edit-calendar.png"/>
                                    </div>
                                    <div class="card-body text-center bg-success p-1">
                                        <span class="card-title">Horario de atención</span>
                                        
                                    </div>
                                </div>                              
                        
                        </a>
                </div>
                <div class="col-4">
                    <a href="{{route('config.comprobantes.index')}}">
                        
                        <div class="box">
                            <div class="card-header text-center" >
                                <img src="https://img.icons8.com/cute-clipart/64/000000/document.png"/>
                            </div>
                            <div class="card-body bg-primary p-1">
                                <span class="card-title">Comprobantes</span>
                                {{-- <p class="card-text"><small><small>Especifica los tipos de comprobantes que emites.</small></small></p> --}}
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-4">
                    <a href="{{route('empresa.editar', $empresaid)}}">
                        <div class=" box">
                            <div class="card-header text-center" >
                                <img src="https://img.icons8.com/cute-clipart/64/000000/edit.png"/>
                            </div>
                            <div class="card-body text-center p-1 bg-warning">
                                <span class="card-title text-light">Editar empresa</span>
                                {{-- <p class="card-text"><small><small>Actualiza tus datos para que tus clientes puedan identificar
                                    facilmente tu empresa.</small></small></p> --}}
                            </div>
                        </div>

                    </a>
                </div>
            </div>
        </div>

    </div>
    <div class="row mt-2 p-3">
       <div class="col-12">
        <div class="card card-outline card-primary">

            <div class="card-header">
                <span>Información de empresa</span>
            </div>

            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-12 col-lg-8">
                        <div class="col-md-12 col-sm-12 d-flex flex-wrap">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="rubro_id">Rubro:</label>
                                <span>{{ $empresarubros ? $empresarubros->nombre : "----" }}</span>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="ruc">Ruc:</label>
                                <Span name="ruc">{{$empresa->ruc}}</Span> 
                            </div>

                            <div class="form-group col-md-6 col-sm-12">
                                <label for="nombre">Nombre o Razón Social:</label><br>
                                <span>{{$empresa->nombre}}</span>
                            </div>

                            <div class="form-group col-md-6 col-sm-12">
                                <label for="nombrecomercial">Nombre Comercial:</label><br>
                                <span>{{ $empresa->nombrecomercial }}</span>
                            </div>

                            <div class="form-group col-md-12 col-sm-12">
                                <label for="direccion">Dirección:</label><br>
                                <span>{{ $empresa->direccion }}</span>
                            </div>
                        
                            <div class="form-group col-md-4 col-sm-12">
                                <label for="departamentoid">Departamento:</label><br>
                                <span>{{  $departamentos ? $departamentos->nombre : "----" }}</span>
                            </div>
                            <div class="form-group col-md-4 col-sm-12">
                                <label for="provinciaid">Provincia:</label><br>
                                 <span>{{ $provincias ? $provincias->nombre : "----" }}</span>
                            </div>
                            <div class="form-group col-md-4 col-sm-12">
                                <label for="distritoid">Distrito:</label><br>
                                <span>{{ $distritos ? $distritos->nombre: "----" }}</span>
                            </div>
                        </div>
                       
                    </div>
                    <div class="col-md-12 col-lg-4 mx-auto">
                        <div class="form-row">
                            <div class="form-group col-12">
                                <div class="cajaInputAgregarLogo text-center">                                    
                                    <input type="file" name="logo" id="logo" data-initial-preview="{{ asset( Storage::disk('usuarios')->url('empresaslogos/').$empresa->logo ) }}"
                                           accept="image/*">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>{{--Fin Cardbpdy --}}
        </div>
       </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection