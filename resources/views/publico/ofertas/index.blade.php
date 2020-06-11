@extends('layouts.public')

@section('contenido')


<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-12 m-0 p-0">
                <div class="section-title mb-0">
                    <h2 class="float-left m-0 p-0">Ofertas</h2>
                </div>
            </div>
            <div class="col-12 m-0 p-0">
                <hr class="subrayado_productos mt-1 mb-1">
            </div>
            <div class="col-12 m-0 p-0 mb-3">
                <h6 class="float-left"><b>10</b> Productos encontrados</h6>
                <button type="button" class="float-right btn btn_filtrar_productos" data-toggle="modal" data-target="#filtrar_productos">Filtrar por</button>
            </div>
            <div class="col-12 m-0 p-0">
                <div class="row" id="cuerpoProductosOfertados">

                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal right fade" id="filtrar_productos" tabindex="-1" role="dialog" aria-labelledby="filtrar_productos">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Filtrar por</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Ordenar por
                                </button>
                            </h2>
                        </div>
                    
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="masVendidos">
                                    <label class="form-check-label" for="masVendidos">
                                      Mejores ofertas
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="masVendidos">
                                    <label class="form-check-label" for="masVendidos">
                                      Más vendidos
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="mejorDescuento">
                                    <label class="form-check-label" for="mejorDescuento">
                                      Mejor descuento
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="mayorMenor">
                                    <label class="form-check-label" for="mayorMenor">
                                      Mayor a menor
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="menorMayor">
                                    <label class="form-check-label" for="menorMayor">
                                      Menor a mayor
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="menorMayor">
                                    <label class="form-check-label" for="menorMayor">
                                      Orden alfabético
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Precio
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <input type="number" name="" id="" placeholder="Min.">
                                    </div>
                                    <div class="col-3">
                                        -
                                    </div>
                                    <div class="col-3">
                                        <input type="number" name="" id="" placeholder="Max.">
                                    </div>
                                    <div class="col-3">
                                        <button type="button" class="btn btn-info"><i class="fas fa-angle-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Lugares
                                </button>
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="masVendidos">
                                    <label class="form-check-label" for="masVendidos">
                                      Cajamarca
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="masVendidos">
                                    <label class="form-check-label" for="masVendidos">
                                      Baños del inca
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @include('publico.ofertas.indexjs')
@endsection