{{-- 
<div class="col d-flex flex-wrap ">
    
    @can('encuestarespuestas.crear')
        <div class="col-xs-12 col-sm-12 col-md-4 list-group">
            <a href="{{route('encuestarealizar.index')}}">
                <div class="col">
                    <div class="card mb-2" >
                        <div class="row d-flex flex-nowrap"> 
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 d-flex align-items-center justify-content-center bg-danger" >
                                <h2><i class="fas fa-clipboard-list" style="color:#F4F6F9"></i></h2>
                            </div>                   
                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10   px-2">
                                <div class="card-block px-2 py-2 text-dark" style="line-height:12px" >
                                    <h4 class="card-title">Realizar encuesta</h4>
                                    <p class="card-text py-2 " > 
                                        <small>Encuestas activas a desarrollar</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endcan

    @can('encuestarespuestas.listar')        

    	<div class="col-xs-12 col-sm-12 col-md-4 list-group">
            <a href="{{route('encuestas.resultados.index')}}">
                <div class="col ">
                    <div class="card mb-2" >
                        <div class="row d-flex flex-nowrap">  
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 d-flex align-items-center justify-content-center bg-warning" >
                                <h2><i class="fas fa-chart-bar" style="color:#F4F6F9"></i></h2>
                            </div>                  
                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 px-2">
                                <div class="card-block px-2 py-2 text-dark" style="line-height:12px">
                                    <h4 class="card-title">Resultados de encuestas</h4>
                                    <p class="card-text py-2"> 
                                        <small>Visualiza resltados a detalle.</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
   		</div>
    @endcan
    @can('encuestas.crear')        

    	<div class="col-xs-12 col-sm-12 col-md-4 list-group">
            <a href="{{route('encuestas.index')}}">
                <div class="col ">
                    <div class="card mb-2" >
                        <div class="row d-flex flex-nowrap">  
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 d-flex align-items-center justify-content-center bg-success" >
                                <h2><i class="fas fa-plus" style="color:#F4F6F9"></i></h2>
                            </div>                  
                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 px-2">
                                <div class="card-block px-2 py-2 text-dark" style="line-height:12px">
                                    <h4 class="card-title">Crear encuestas</h4>
                                    <p class="card-text py-2"> 
                                        <small>Registrar nuevas encuestas.</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
   		</div>
    @endcan
</div>             --}}
