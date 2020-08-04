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
    tr{
        border: 0px;
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
                       
                            <table class="table table-sm ">
                                <tbody>
                                    <tr>
                                        <td><label for="rubro_id">Rubro:</label></td>
                                        <td><span>{{ $empresarubros ? $empresarubros->nombre : "----" }}</span></td>
                                    </tr>
                                    <tr>
                                        <td><label for="ruc">Ruc:</label></td>
                                        <td><Span name="ruc">{{$empresa->ruc}}</Span></td>
                                    </tr>
                                    <tr>
                                        <td> <label for="nombre">Nombre o Razón Social:</label></td>
                                        <td> <span>{{$empresa->nombre}}</span></td>
                                    </tr>
                                    <tr>
                                        <td> <label for="nombrecomercial">Nombre Comercial:</label> </td>
                                        <td>   <span>{{ $empresa->nombrecomercial }}</span> </td>
                                    </tr>
                                    <tr>
                                        <td>  <label for="direccion">Dirección:</label> </td>
                                        <td>     <span>{{ $empresa->direccion }}</span> </td>
                                    </tr>
                                    <tr>
                                        <td>  <label for="departamentoid">Departamento:</label> </td>
                                        <td>   <span>{{  $departamentos ? $departamentos->nombre : "----" }}</span> </td>
                                    </tr>
                                    <tr>
                                        <td>    <label for="provinciaid">Provincia:</label> </td>
                                        <td>   <span>{{ $provincias ? $provincias->nombre : "----" }}</span> </td>
                                    </tr>
                                    <tr>
                                        <td>  <label for="distritoid">Distrito:</label> </td>
                                        <td>  <span>{{ $distritos ? $distritos->nombre: "----" }}</span> </td>
                                    </tr>
                                </tbody>
                            </table>
                  
                       
                       
                    </div>
                    <div class="col-md-12 col-lg-4 mx-auto">
                        <div class="form-row">
                            <div class="form-group col-12">
                                <div class="cajaInputAgregarLogo text-center">                                    
                                    <img class="img-fluid" src="{{ asset( Storage::disk('usuarios')->url('empresaslogos/').$empresa->logo ) }}" width="250px" height="250px" alt="Logo de empresa">
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