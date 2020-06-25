@extends('layouts.admin.admin')
@include('publico.empresa.css')
@section('contenido')

<div class="container-fluid ">


    <div class="row d-flex justify-content-center ">


        <div class="col-11">
            @php
            $usuario = Auth()->user()
            @endphp

            <form id="formularioRegistroEmpresa" action="{{route('tuempresa.update', $empresa->id)}}" method="POST"
                enctype="multipart/form-data">

                <div class="row mt-3 ">


                    <div class="col-12  mx-auto ">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <span>Datos de la Empresa</span>
                            </div>

                            <div class="card-body">
                                <div class="form-row">

                                    <div class="col-md-8 col-sm-12 ">
                                        <div class="form-group col-md-12 col-sm-12">
                                            <select name="rubro_id" id="rubro_id" class="form-control" autofocus>
                                                <option value="">Rubro de negocio</option>
                                                @foreach ($empresarubros as $empresarubro)
                                                <option value="{{ $empresarubro->id }}" @if ( $empresarubro->id =
                                                    $empresa->rubro_id )
                                                    selected = 'selected'
                                                    @endif
                                                    >
                                                    {{ $empresarubro->nombre }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->first('rubro_id') }}</span>
                                        </div>
                                        <div class="form-group col-md-12 col-sm-12">
                                            <input type="text" name="ruc" id="ruc" size="11" maxlength="11"
                                                class="form-control form-control-sm" value="{{$empresa->ruc}}"
                                                placeholder="Ruc">

                                        </div>

                                        <div class="form-group col-md-12 col-sm-12">
                                            <input type="text" name="nombre" id="nombre"
                                                class="form-control form-control-sm" value="{{$empresa->nombre}}"
                                                placeholder="Nombre o Razón Social">

                                        </div>
                                        <div class="form-group col-md-12 col-sm-12">
                                            <input type="text" name="nombrecomercial" id="nombrecomercial"
                                                class="form-control form-control-sm"
                                                value="{{ $empresa->nombrecomercial }}" placeholder="Nombre Comercial">

                                        </div>
                                        <div class="form-group col-md-12 col-sm-12">
                                            <input type="text" name="direccion" id="direccion"
                                                class="form-control form-control-sm" value="{{ $empresa->direccion }}"
                                                placeholder="Dirección">

                                        </div>
                                        <div class="form-group col-md-12 col-sm-12">
                                            <input type="url" name="facebook" id="facebook"
                                                class="form-control form-control-sm" value="{{ $empresa->paginaweb }}"
                                                placeholder="Página de facebook (Opcional)">
                                            <span class="text-danger">{{ $errors->first('facebook') }}</span>
                                        </div>


                                    </div>
                                    <div class="col-md-4 col-sm-12 text-center d-flex flex-column">

                                        <div class="boxSep">
                                            <div id="imagePreview" class="imgLiquid" style="width:200px; height:200px;">
                                                <img src="{{ $empresa->url }}" alt="">
                                            </div>

                                        </div>
                                        <figcaption class="text-danger"><small><i>Tamaño recomendado: 200 x
                                                    200px</i></small> </figcaption>


                                        <div class="bg-danger pt-1 pb-1" id="errorextension"
                                            style="display: none; line-height : 10px;">

                                            <p style="line-height : 12px;"> <small> <strong>¡Error!</strong>
                                                    <br>
                                                    Solo se permiten archivos con extensión
                                                    .jpeg/.jpg/.png</small>
                                            </p>
                                        </div>

                                        <span id="camara">
                                            <h4><i class="fas fa-camera"></i></h4>
                                        </span>
                                        <input type="file" id="file" name="logo" id="logo" style="display: none">


                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4 col-sm-12">
                                        <select name="departamentoid" id="departamentoid"
                                            class="form-control form-control-sm select2" autofocus>
                                            <option value="">Departamento</option>
                                            @foreach ($departamentos as $departamento)
                                            <option value="{{ $departamento->id }}" @if ( $departamento->id =
                                                $empresa->departamento_id )
                                                selected = 'selected'
                                                @endif
                                                >
                                                {{ $departamento->nombre }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('departamentoid') }}</span>

                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <select name="provinciaid" id="provinciaid"
                                            class="form-control form-control-sm select2" autofocus>
                                            <option value="">Provincia</option>
                                            @foreach ($provincias as $provincia)
                                            <option value="{{ $provincia->id }}" @if ( $provincia->id =
                                                $empresa->provincia_id )
                                                selected = 'selected'
                                                @endif
                                                >
                                                {{ $provincia->nombre }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('provinciaid') }}</span>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <select name="distritoid" id="distritoid" class="form-control form-control-sm "
                                            autofocus>
                                            <option value="">Distrito</option>
                                            @foreach ($distritos as $distrito)
                                            <option value="{{ $distrito->id }}" @if ( $distrito->id =
                                                $empresa->distrito_id )
                                                selected = 'selected'
                                                @endif
                                                >
                                                {{ $distrito->nombre }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('distritoid') }}</span>
                                    </div>

                                </div>
                            </div>{{--Fin Cardbpdy --}}
                        </div>

                    </div>
                </div>

                <div class="row ">

                    <div class="col-12  mx-auto">
                        <div class="card card-outline card-primary">
                            <div class="card-header d-flex flex-nowrap">
                                <div class="form-group col-12">
                                    <input type="hidden" name="" id="changeicon" value="0">
                                    <a class="btn" data-toggle="collapse" href="#verhorario" role="button"
                                        aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-angle-double-down" id="icono"></i> Horario de atención
                                    </a>
                                </div>

                            </div>


                            <div class="collapse " id="verhorario">

                                <div class="card-body ">
                                    <table class="table table-striped table-sm border">
                                        <thead class="bg-primary">
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
                                                                <input class="form-check-input"
                                                                    type="checkbox"
                                                                    name="dias[{{ $loop->iteration }}]"
                                                                    id="dias[{{ $loop->iteration }}]" 
                                                                    value="{{ $dia }}"
                                                                    @if ( in_array( $dia, $diasenhorario)  )
                                                                    checked
                                                                        
                                                                    @endif


                                                                    >{{ $dia }}
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
                                                                    class="form-control form-control-sm text-center "
                                                                    data-target="#horainicio-{{ $dia }}"
                                                                    @if ( in_array( $dia, $diasenhorario)  )
                                                                        @php                                                                        
                                                                            $horariohorainicio = DB::table('horarios')->where("empresa_id", $empresa->id)->where('dia', $dia)->first();                                                                  
                                                                        @endphp
                                                                       
                                                                    value="{{ $horariohorainicio->horainicio }}"
                                                                     style="border: none;  background-color:transparent; display: 1;" 
                                                                     @else
                                                                     style="border: none;  background-color:transparent; display: none;" 
                                                                        
                                                                    @endif
                                                                    />
                                                                <span> - </span>
                                                                <input type="text"
                                                                    name="horafin[{{ $loop->iteration }}]"
                                                                    id="horafin-{{ $dia }}"
                                                                    class="form-control form-control-sm text-center "
                                                                    data-target="#horafin-{{ $dia }}" 
                                                                    @if ( in_array( $dia, $diasenhorario)  )
                                                                    @php
                                                                        
                                                                        $horariohorafin = DB::table('horarios')->where("empresa_id", $empresa->id)->where('dia', $dia)->first();
                                                                   
                                                                        @endphp
                                                                       
                                                                    value="  {{ $horariohorafin->horafin }} "
                                                                    
                                                                     style="border: none;  background-color:transparent; display: 1;" 
                                                                        @else
                                                                        style="border: none;  background-color:transparent; display: none;" 
                                                                    @endif
                                                                    
                                                                    />
                                                            </div>
                                                            <div id="time-range-{{ $loop->iteration }}">

                                                                <div class="sliders_step1 ">
                                                                    <div class="slider-range"
                                                                        name="slider-range[{{$loop->iteration}}]"

                                                                      
                                                                        @if ( in_array( $dia, $diasenhorario)  )
                                                                        style="display: 1;">
                                                                           @else
                                                                           style="display: none;">
                                                                       @endif

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

                <div class="row ">


                    <div class="col-12 mt-3">
                        <div class="form-row text-center">
                            <div class="form-group col-5 d-flex flex-nowrap">
                            </div>
                            <div class="form-group col-7 d-flex flex-nowrap">

                                <div>

                                    @foreach ($errors as $error)

                                    <span class="text-danger">{{ $error}}</span>
                                    @endforeach
                                </div>
                                @csrf
                                {!! method_field('PUT') !!}
                                <div class="form-group col-6">
                                    <button type="button" class="btn btn-primary btn-block" id="enviarFormRegistro">
                                        <span class="spinner-border spinner-border-sm spinnerr" role="status"
                                            aria-hidden="true" style="display: none"></span>
                                        Guardar
                                    </button>
                                </div>
                                <div class="form-group col-6">
                                    <a href="{{route('empresas.index')}}" class="btn btn-danger btn-block">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>


    </div>

    @endsection

    @section('scripts')

    @include('publico.empresa.js')
    @endsection