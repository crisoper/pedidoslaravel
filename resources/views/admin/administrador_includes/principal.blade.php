
<div class="col-12 d-flex flex-wrap">
    <div class="col-sm-12 col-md-7 border" style="background-color:#FFFFFF;">
        <div class="col">
            <div class="col-12 d-flex flex-nowrap mt-1">
                <div class="col-5">
                    <span>Ventas </span>
                </div>
               </div>
            <canvas id="chartHistoricoVentas" style="min-height: 350px; height: 350px; max-height: 200px; max-width: 100%;"></canvas>
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
                console.log(data);
              var nombredeproducto =[];
              var cantidadeproducto =[];
              $.each(data, function(index, producto){
                nombredeproducto.push(producto.nombre);
                cantidadeproducto.push(producto.cantidad);
                $("#tbl_productosmasvendidos").append(
                        "<tr>"+
                            "<td>"+ producto.nombre+" </td>"+
                             "<td>"+ producto.cantidad +" </td>"+                            
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
                nombredeproducto.push(producto.nombre);
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
           
                var ctx = document.getElementById('chartHistoricoVentas');
                CharthistoticoVentas = new Chart(ctx, {                   
                    type: 'bar' ,                    
                    data: {
                        labels: nombredeproducto,
                        datasets: [{
                            label: 'VENTAS REALIZADAS HASTA LA FECHA ACTUAL',
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
           
                var ctx = document.getElementById('ChartProductosMasVendidos');
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