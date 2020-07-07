@extends('layouts.admin.admin')

{{-- @can('horarios') --}}
@include('admin.configuracion.empresa.horarios.css')
@section('contenido')

<div class="container-fluid ">
    <div class="row d-flex justify-content-center ">
        <div class="col-11">
            @php
            $usuario = Auth()->user()

            @endphp

            <form id="form_horarioAtencionEmpresa" action='{{ route('horario.atencion.empresa' )}}' method="POST">

                <div class="row mt-3 ">
                    <div class="col-12  mx-auto">
                        <div class="card card-outline card-primary">
                            <div class="card-header d-flex flex-nowrap justify-content-around pr-5">
                                <div class="form-group col-12">
                                    <input type="hidden" name="empresaid" value="{{ $empresaid }}">
                                    Seleccione los días y horas de atención
                                </div>
                                <div>
                                <a href="{{route('configuracionempresa.index')}}"><h4> <i class="fa fa-reply-all" aria-hidden="true"></i></h4></a>
                                </div>
                            </div>
                            <div>
                                <div class="card-body ">
                                    <table class="table table-striped  border">
                                        <thead class="bg-info ">
                                            <tr>
                                                <th>
                                                    <div class="col-12 text-center">
                                                        <span> Dia de la semana</span>
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="col-12 d-flex flex-nowrap justify-content-around">
                                                        <span>Hora Inicio</span>
                                                        <span>Hora fin</span>
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dias as $dia)
                                            <tr>
                                                <td>
                                                    <div class="form-group col-12">

                                                        <div class="ml-5 d-flex align-items-center">
                                                            <label class="form-check-label"
                                                                for="dias[{{ $loop->iteration }}]">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="dias[{{ $loop->iteration }}]"
                                                                    id="dias[{{ $loop->iteration }}]"
                                                                    value="{{ $dia }}">{{ $dia }}
                                                            </label>
                                                        </div>


                                                    </div>
                                                </td>
                                                <td>

                                                    <div class="form-row d-flex align-items-center flex-nowrap">

                                                        <div class="form-group col-12">
                                                            <div class="d-flex flex-nowrap">

                                                                <input type="text"
                                                                    name="horainicio[{{ $loop->iteration }}]"
                                                                    id="horainicio-{{ $dia }}"
                                                                    class="form-control  text-center "
                                                                    data-target="#horainicio-{{ $dia }}"
                                                                    value="12:00 AM"
                                                                    style="border: none;  background-color:transparent; display: none;" />
                                                                <span> - </span>
                                                                <input type="text"
                                                                    name="horafin[{{ $loop->iteration }}]"
                                                                    id="horafin-{{ $dia }}"
                                                                    class="form-control  text-center "
                                                                    data-target="#horafin-{{ $dia }}" value="11:59 PM"
                                                                    style="border: none ;  background-color:transparent; display: none;" />
                                                            </div>
                                                            <div id="time-range-{{ $loop->iteration }}">

                                                                <div class="sliders_step1 ">
                                                                    <div class="slider-range"
                                                                        name="slider-range[{{$loop->iteration}}]"
                                                                        style="display: none;">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <span id="errorInicio-{{ $dia }}"
                                                                class="text-danger"></span>
                                                        </div>

                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row justify-content-center ">
                    <div class="col-12">
                        @foreach ($errors as $error)
        
                        <span class="text-danger">{{ $error}}</span>
                        @endforeach
                    </div>
        
                    <div class="col-12 d-flex flex-row justify-content-center">
        
                        @csrf
        
                        <div class="form-group col-6">
                            <button type="button" class="btn btn-primary btn-block" id="enviarFormRegistro">
                                <span class="spinner-border spinner-border-sm spinnerr" role="status" aria-hidden="true"
                                    style="display: none"></span>
                                Guardar
                            </button>
                        </div>
                        <div class="form-group col-6">
                            <a href="{{route('configuracionempresa.index')}}" class="btn btn-danger btn-block">Cancelar</a>
                        </div>
        
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

@endsection

@section('scripts')
@include('admin.configuracion.empresa.horarios.js')
@endsection