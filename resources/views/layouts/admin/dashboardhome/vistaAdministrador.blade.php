<style>
    .ventas {
        background-color: rgb(179, 6, 6);
        color: rgb(255, 255, 255);
    }



    .pedidos {
        background-color: rgb(219, 14, 14);
    }

    .card-title {
        color: #ebebeb;
    }

    .ventas {
        background-color: rgb(240, 184, 29);
    }

    .productos {
        background-color: #92df03;
    }

    .configuracion {
        background-color: rgb(40, 27, 223);
    }



    .card {
        border-radius: 0% !important;
        padding: 0px !important;
        margin: 0px;

    }

    .card:hover {
        box-shadow: 0 3px 5px #000000;

    }

    .grafico_header_productos {
        background-color: rgb(219, 14, 14) !important;
        color: white;
    }

    .alert {
        position: absolute;
        top: 0;
        left: 0;

    }
</style>

<div class="col-12 d-flex flex-wrap">
    {{-- <div class="col-sm-12 col-md-12 border" style="background-color:#FFFFFF;"> --}}

    <div class="col-sm-3">
        <a href="{{ route('pedidos.ingresados')}}">
            <div class="card">
                <div class="card-header p-1 text-center ">
                    {{-- <span class="display-3 text-info"><i class="fas fa-users"></i></span> --}}
                    <img src="https://img.icons8.com/bubbles/100/000000/bar-chart.png" />
                </div>
                <div class="card-body p-1 pedidos d-flex justify-content-center">
                    <h5 class="card-title">Pedidos ingresados <i class="fas fa-arrow-circle-right"></i></h5>

                </div>
            </div>
        </a>

    </div>

    <div class="col-sm-3">
        <a href="{{route('reportedetalledepedidos')}}">
            <div class="card">
                <div class="card-header p-1 text-center ">
                    {{-- <span class="display-3 iconoventas text-danger"><i class="fas fa-shopping-basket"></i></span> --}}
                    <img src="https://img.icons8.com/plasticine/100/000000/total-sales.png" />
                </div>
                <div class="card-body p-1 ventas d-flex justify-content-center">
                    <h5 class="card-title">Productos vendidos<i class="fas fa-arrow-circle-right"></i></h5>

                </div>
            </div>
        </a>
    </div>

    <div class="col-sm-3">
        <a href="{{route('productos.index')}}">
            <div class="card">
                <div class="card-header p-1 text-center ">
                    {{-- <span class="display-3 text-warning"><i class="fas fa-utensils"></i></span> --}}
                    <img src="https://img.icons8.com/bubbles/100/000000/add-shopping-cart.png" />
                </div>

                <div class="card-body p-1 productos d-flex justify-content-center">
                    <h5 class="card-title">Productos <i class="fas fa-arrow-circle-right"></i></h5>
                </div>
            </div>
        </a>

    </div>

    <div class="col-sm-3">
        <a href="{{route('configuracionempresa.index')}}">
            <div class="card">
                <div class="card-header p-1 text-center ">
                    {{-- <span class="display-3 text-success"><i class="fas fa-users"></i></span> --}}
                    <img src="https://img.icons8.com/color/100/000000/gears.png" />
                </div>
                <div class="card-body p-1 configuracion d-flex justify-content-center">
                    <h5 class="card-title">Configuración <i class="fas fa-arrow-circle-right"></i></h5>

                </div>
            </div>
        </a>
    </div>
    @php

    $productos = DB::table('productos')->where('empresa_id', Session::get('empresaactual',0))->get();
    $horarios = DB::table('horarios')->where('empresa_id', Session::get('empresaactual',0))->get();
    $empresa = DB::table('empresas')->where('id', Session::get('empresaactual',0))->first();
    @endphp
    <input type="hidden" name="" id="hidden_productos"  value='{{ count($productos) }}'>
    <input type="hidden" name="" id="hidden_horarios" value="{{ count($horarios) }}">
    <input type="hidden" name="" id="empresa_dep" value="{{ $empresa->departamento_id }}">
    <input type="hidden" name="" id="empresa_dis" value="{{ $empresa->distrito_id }}">
    <input type="hidden" name="" id="empresa_pro" value="{{ $empresa->provincia_id }}">
    <input type="hidden" name="" id="hidden_idempresa" value=" {{  $empresa->id  }}">
<input type="hidden" id="hidden_editar" value="{{route('empresa.editar', $empresa->id)}}">
</div>
<div class="col-12 d-flex flex-wrap mt-3">
    <div class="col-sm-12 col-md-7 border" style="background-color:#FFFFFF;">
        <div class="col">
            <div class="col-12 d-flex flex-nowrap mt-1">
                <div class="col-5">
                    <span>Pedidos atendidos</span>
                </div>
            </div>
            <canvas id="chartHistoricoVentas"
                style="min-height: 350px; height: 350px; max-height: 200px; max-width: 100%;"></canvas>
        </div>
    </div>

    <div class="col-sm-12 col-md-5 list-group">
        <div class="col">
            <div class="card">
                <div class="card-header grafico_header_productos">
                    <span>Productos más vendidos</span>
                </div>
                <div class="card-body">
                    <canvas id="ChartProductosMasVendidos"
                        style="min-height: 150px; height: 100px; max-height: 250px; max-width: 100%;"></canvas>

                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-light table-sm table-striped">
                                    <thead class="thead-light ">
                                        <tr>
                                            <th>Código</th>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbl_productosmasvendidos">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>




@section('scripts')
<script>
    $(document).ready(function(){   

        let producto = $("#hidden_productos").val();
        let horario = $("#hidden_horarios").val();
      
       
        if (  producto == 0 ) {
            toastr.info('Registre sus productos para empezar a vender')
        }
        if ( horario == 0   ) {
            toastr.error('Registre sus horarios de atención.').on('click', function(){
                window.location ="{{ route('horarios.index') }}"
            });
        }

        
        if ( $("#empresa_dep").val() == null || $("#empresa_dep").val() == '' ) {
            toastr.info('Actualice la información de su empresa ingresando su departamento.').on('click', function(){
               window.location = $("#hidden_editar").val();
            });
        }
        if ( $("#empresa_dis").val() == null || $("#empresa_dis").val() == '' ) {
            toastr.info('Actualice la información de su empresa ingresando su distrito.').on('click', function(){
               window.location = $("#hidden_editar").val();
            });
        }
        if ( $("#empresa_pro").val() == null || $("#empresa_pro").val() == '' ) {
            toastr.info('Actualice la información de su empresa ingresando su provincia.').on('click', function(){
               window.location = $("#hidden_editar").val();
            });
        }

      

        var CharthistoticoVentas;
        var ChartProductos;       

    $(window).on('load', function(){   
        HistoricoVentas();
        productosMasVendidos();                           
    });
    
//FITRAR CAMPOS UNICOS DE UN ARRAY
    // function onlyUnique(value, index, self) { 
    // return self.indexOf(value) === index;
//}
function productosMasVendidos(){
    $.ajax({
            url:"{{route('getproductosmaspedidos')}}",
            method: "get",
            dataType:"json",
            data:{},
            success: function( data ){          
             
              var nombredeproducto =[];
              var cantidadeproducto =[];
              $.each(data, function(index, producto){
                nombredeproducto.push(producto.codigo);
                cantidadeproducto.push(producto.cantidad);
                $("#tbl_productosmasvendidos").append(
                        "<tr>"+
                            "<td><small>"+ producto.codigo+"</small> </td>"+
                            "<td><small>"+ producto.nombre+"</small> </td>"+
                             "<td class='text-center'><small>"+ producto.cantidad +"</small> </td>"+                            
                        "</tr>"
                    );
              })             
                // generarGrafico(nombredeproducto, tipografico);
                GraficoProductosmasVendidos(nombredeproducto,cantidadeproducto);
            }
        });
}
function HistoricoVentas(){
    $.ajax({
            url:"{{route('getHistoricoVentas')}}",
            method: "get",
            dataType:"json",
            data:{},
            success: function( data ){          
              
              var nombredeproducto =[];
              var totalvendidos =[];
              $.each(data, function(index, producto){
                nombredeproducto.push(producto.codigo);
                totalvendidos.push(producto.cantidad);         
             
                graficoHistoricoVentas(nombredeproducto,totalvendidos);
            });
           
            }
        });              
}
    
function graficoHistoricoVentas(nombredeproducto,cantidadeproducto){            
   
            var colores=[];
            $.each( nombredeproducto , function(index, valor){       
                var colorUno = Math.random() * (255 - 1) + 1;
                var colorDos = Math.random() * (255 - 1) + 1;
                var colorTres = Math.random() * (255 - 1) + 1;
                colores.push('rgba( '+ colorUno +',' +colorDos + ',' + colorTres + ',' + 1 +  ')' );
            });
               
                let ctx = document.getElementById('chartHistoricoVentas');              
                CharthistoticoVentas = new Chart(ctx, {                   
                    type: 'bar' ,                    
                    data: {
                        labels: nombredeproducto,
                        datasets: [{
                            label: 'PRODUCTOS FILTRADOS POR CÓDIGO',
                            data: cantidadeproducto,
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
//GRAFICO PRINCIPAL

function GraficoProductosmasVendidos(nombredeproducto,cantidadeproducto){            
       
            var colores=[];
            $.each( nombredeproducto , function(index, valor){ 
                var colorUno = Math.random() * (255 - 1) + 1;
                var colorDos = Math.random() * (255 - 1) + 1;
                var colorTres = Math.random() * (255 - 1) + 1;
                colores.push('rgba( '+ colorUno +',' +colorDos + ',' + colorTres + ',' + 1 +  ')' );
            });
           
                let ctx = document.getElementById('ChartProductosMasVendidos');
                ChartProductos = new Chart(ctx, {                   
                    type: 'pie' ,                    
                    data: {
                        labels: nombredeproducto,
                        datasets: [{
                            label: 'PRODUCTOS MAS VENDIDOS',
                            data: cantidadeproducto,
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

    
    // $("#tipografico").on('change', function(){

    //     var tipografico = $(this).val();

    //      $.ajax({
    //          url: "",
    //          method: 'get',
    //          dataType:'json',
    //          data:{},
    //          success: function( data ){
                
    //               generarGrafico(data, tipografico);
               
    //              },
    //          error: function(){
    //              console.log("error al resivir datos");
    //          }
    //      });
        
    //      myChart.destroy();
    //  });
    

    });
</script>
@endsection