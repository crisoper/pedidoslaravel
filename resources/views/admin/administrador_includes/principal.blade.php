
<div class="col-12 d-flex flex-wrap">
    <div class="col-sm-12 col-md-7 border" style="background-color:#FFFFFF;">
        <div class="col">
            <div class="col-12 d-flex flex-nowrap mt-1">
                <div class="col-5">
                    <span>Ventas </span>
                </div>
               </div>
            <canvas id="myChart" style="min-height: 350px; height: 350px; max-height: 200px; max-width: 100%;"></canvas>
        </div>
    </div>
    
    <div class="col-sm-12 col-md-5 list-group">
        <div class="col">
            <div class="card" style="border-radius: 0% !important; padding:0px !important; margin:0px;">
                <div class="card-header">
                   <span>Productos más vendidos</span>
                </div>
                <div class="card-body">
                    <canvas id="ChartProductosMasVendidos" style="min-height: 150px; height: 100px; max-height: 250px; max-width: 100%;"></canvas>
                
                    <div class="row">
                        <div class="col">
                         <div class="table-responsive">
                            <table class="table table-light table-sm table-striped">
                                <thead class="thead-light ">
                                    <tr>
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
        var myChart;
        var tipografico = 'pie';

    $(window).on('load', function(){             
          
        $.ajax({
            url:"{{route('getproductosmasvendidos')}}",
            method: "get",
            dataType:"json",
            data:{},
            success: function( data ){          

              var arraydeproductos =[];
              $.each(data, function(index, producto){
                arraydeproductos.push(producto.producto);
                $("#tbl_productosmasvendidos").append(
                        "<tr>"+
                            "<td>"+ producto.producto+" </td>"+
                             "<td>"+ producto.cantidad +" </td>"+                            
                        "</tr>"
                    );
              })             
                generarGrafico(arraydeproductos, tipografico);
                generarGraficoPrincial(arraydeproductos, tipografico);
            }
        });
                            
    });
//FITRAR CAMPOS UNICOS DE UN ARRAY
    function onlyUnique(value, index, self) { 
    return self.indexOf(value) === index;
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
           
                var ctx = document.getElementById('ChartProductosMasVendidos');
                myChart = new Chart(ctx, {                   
                    type: tipografico ,                    
                    data: {
                        labels: ["0s", "10s", "20s", "30s", "40s", "50s", "60s"],
                        datasets: [{
                            label: '10 Productos más vendido',
                            data: [0, 59, 75, 20, 20, 55, 40],
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

function generarGraficoPrincial(data, tipografico){            
            
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
                    type: 'bar' ,                    
                    data: {
                        labels: ["0s", "10s", "20s", "30s", "40s", "50s", "60s"],
                        datasets: [{
                            label: 'VENTAS DEL MES',
                            data: [0, 59, 75, 20, 20, 55, 40],
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
