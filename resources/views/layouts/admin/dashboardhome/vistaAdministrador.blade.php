
<div class="col-12 d-flex flex-wrap">
    <div class="col-sm-12 col-md-7 border" style="background-color:#FFFFFF;">
        <div class="col">
            <div class="col-12 d-flex flex-nowrap mt-1">
                <div class="col-5">
                    <span>Selecionar un gráfico diferente: </span>
                </div>
                <select name="tipografico" id="tipografico" class="form-control">
                    <option value="bar">Barras verticales</option>
                    <option value="pie">Circular</option>
                    <option value="horizontalBar">Barras horizontales</option>
                    <option value="doughnut">Dona</option>
                </select>
            </div>
            <canvas id="myChart" style="min-height: 350px; height: 200px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
    </div>
    
    <div class="col-sm-12 col-md-5 list-group">
        @can('empresas.listar')
            <a href="{{route('empresas.index')}}">
                <div class="col">
                    <div class="card mb-1" >
                        <div class="row d-flex flex-nowrap">                    
                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10   px-2">
                                <div class="card-block px-2 py-2 text-dark" style="line-height:12px" >
                                    <h4 class="card-title">Empresas</h4>
                                    <p class="card-text py-2 " > 
                                        <small> Visualizar en detalle las empresas registradas o registrar y modificar información</small>
                                    </p>
                                </div>
                            </div>
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 d-flex align-items-center justify-content-center bg-info" >
                                <h2><i class="fas fa-building " style="color:#F4F6F9"></i></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endcan
        @can('users.listar')
            <a href="{{route('usuarios.index')}}">
                <div class="col ">
                    <div class="card mb-1" >
                        <div class="row d-flex flex-nowrap">                    
                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 px-2">
                                <div class="card-block px-2 py-2 text-dark" style="line-height:12px">
                                    <h4 class="card-title">Usuarios</h4>
                                    <p class="card-text py-2"> 
                                        <small >Visualizar en detalle los usuarios registrados o registrar y modificar información</small>
                                    </p>
                                </div>
                            </div>
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 d-flex align-items-center justify-content-center bg-info" >
                                <h2><i class="fas fa-user" style="color:#F4F6F9"></i></h2>
                            </div>
                
                        </div>
                    </div>
                </div>
            </a>
        @endcan
        @can('roles.listar')
            <a href="{{route('roles.index')}}">
                <div class="col ">
                    <div class="card mb-1" >
                        <div class="row d-flex flex-nowrap">                    
                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 px-2">
                                <div class="card-block px-2 py-2 text-dark" style="line-height:12px">
                                    <h4 class="card-title">Roles</h4>
                                    <p class="card-text py-2"> 
                                        <small >Visualizar en detalle los roles registrados o registrar y modificar información</small>
                                    </p>
                                </div>
                            </div>
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 d-flex align-items-center justify-content-center bg-info" >
                                <h2> <i class="fas fa-list-alt" style="color:#F4F6F9"></i></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endcan
        @can('periodos.listar')
            <a href="{{route('permissions.index')}}">
                <div class="col ">
                    <div class="card mb-1" >
                        <div class="row d-flex flex-nowrap">                    
                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 px-2">
                                <div class="card-block px-2 py-2 text-dark" style="line-height:12px">
                                    <h4 class="card-title">Permisos</h4>
                                    <p class="card-text py-2"> 
                                        <small >Visualizar en detalle los permios asignados o registrar y modificar información</small>
                                    </p>
                                </div>
                            </div>
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 d-flex align-items-center justify-content-center bg-info" >
                                <h2><i class="fas fa-id-card" style="color:#F4F6F9"></i></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endcan
        @can('menus.listar')
            <a href="{{route('menus.index')}}">
                <div class="col ">
                    <div class="card mb-1" >
                        <div class="row d-flex flex-nowrap">                    
                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 px-2">
                                <div class="card-block px-2 py-2 text-dark" style="line-height:12px">
                                    <h4 class="card-title">Menus</h4>
                                    <p class="card-text py-2"> 
                                        <small>Registra o modificar nuevos menus</small>
                                    </p>
                                </div>
                            </div>
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 d-flex align-items-center justify-content-center bg-info" >
                                <h2><i class="fab fa-elementor" style="color:#F4F6F9"></i></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endcan
    </div>
</div>


{{-- @section('scripts')
    <script>
        $(document).ready(function(){
            var myChart;
            var tipografico = 'bar';
        $(window).on('load', function(){
                
                encuestadoBySector( tipografico );                             
        });

      
        
        function encuestadoBySector( tipografico ){
                 $.ajax({
                    url: "{{ route('encuestadosBySector') }}",
                    method: 'get',
                    dataType:'json',
                    data:{},
                    success: function( data ){
                       
                         generarGrafico(data, tipografico);
                      
                        },
                    error: function(){
                        console.log("error al resivir datos");
                    }
                });
        }
        function generarGrafico(data, tipografico){
            
            
            var sectores=[];
            var totalresgitro =[];
            var colores=[];
            $.each( data , function(index, valor){               
                    sectores.push(index);
                    totalresgitro.push(valor);                      
                   
                        var colorUno = Math.random() * (255 - 1) + 1;
                        var colorDos = Math.random() * (255 - 1) + 1;
                        var colorTres = Math.random() * (255 - 1) + 1;
                        colores.push('rgba( '+ colorUno +',' +colorDos + ',' + colorTres + ',' + 1 +  ')' );
                        
                    });
           
                var ctx = document.getElementById('myChart');
                myChart = new Chart(ctx, {
                   
                    type: tipografico ,
                    
                    data: {
                        labels: sectores,
                        datasets: [{
                            label: 'TOTAL DE ENCUESTADOS POR SECTOR',
                            data: totalresgitro,
                            backgroundColor: colores,
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    
                                }
                            }],
                            xAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                   
                                }
                            }]
                        }
                    }
                });
               
        }
        $("#tipografico").on('change', function(){

            var tipografico = $(this).val();
 
             $.ajax({
                 url: "{{ route('encuestadosBySector') }}",
                 method: 'get',
                 dataType:'json',
                 data:{},
                 success: function( data ){
                    
                      generarGrafico(data, tipografico);
                   
                     },
                 error: function(){
                     console.log("error al resivir datos");
                 }
             });
            
             myChart.destroy();
         });
        

        })
    </script>
@endsection --}}