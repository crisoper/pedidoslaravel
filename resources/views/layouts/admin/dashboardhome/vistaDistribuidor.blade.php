<style>
    .ventas{
        background-color: rgb(179, 6, 6);
        color: rgb(255, 255, 255);
    }
    H5{
        color: rgb(255, 255, 255);
    }
    
    .pedidos{
        background-color: #b32929;
    }
    .ventas{
        background-color: rgb(212, 162, 25);
    }
    .productos{
        background-color:#3a5bf0;
    }
    .clientes{
        background-color: rgb(121, 179, 28);
    }
    .card-body:hover{
         opacity: 0.8;
    }
    .card-body>h5:hover{
         color: blue;
    }
    </style>
    
    <div class="col-12 d-flex flex-wrap">
        {{-- <div class="col-sm-12 col-md-12 border" style="background-color:#FFFFFF;"> --}}
            
            <div class="col-sm-3">
    
                <div class="card">
                    <div class="card-header p-1 text-center ">
                        <img src="https://img.icons8.com/bubbles/100/000000/task.png"/>
                    </div>
                    <div class="card-body p-1 pedidos d-flex justify-content-center">
                        <h5 class="card-title">Nuevos Pedidos <i class="fas fa-arrow-circle-right"></i></h5>
                       
                    </div>
                </div>
            
            </div>
            
            <div class="col-sm-3">
    
                <div class="card">
                    <div class="card-header p-1 text-center ">
                        <img src="https://img.icons8.com/plasticine/100/000000/order-on-the-way.png"/>
                        {{-- <img src="https://img.icons8.com/fluent/96/000000/delivery.png"/> --}}
                    </div>
                    <div class="card-body p-1 ventas d-flex justify-content-center">
                        <h5 class="card-title">Pedidos por entregar <i class="fas fa-arrow-circle-right"></i></h5>
                       
                    </div>
                </div>
            
            </div>
    
            <div class="col-sm-3">
    
                <div class="card">
                    <div class="card-header p-1 text-center ">
                       {{-- <span class="display-3 text-warning"><i class="fas fa-utensils"></i></span> --}}
                       {{-- <img src="https://img.icons8.com/bubbles/100/000000/add-shopping-cart.png"/> --}}
                       <img src="https://img.icons8.com/bubbles/100/000000/phone-cash-money.png"/>
                    </div>
                    <a href="{{route('productos.index')}}">
                        <div class="card-body p-1 productos d-flex justify-content-center">
                            <h5 class="card-title">Pedidos entregados <i class="fas fa-arrow-circle-right"></i></h5>
                        </div>
                    </a>
                </div>
            
            </div>
    
            <div class="col-sm-3">
    
                <div class="card">
                    <div class="card-header p-1 text-center ">
                       {{-- <span class="display-3 text-success"><i class="fas fa-users"></i></span> --}}
                       <img src="https://img.icons8.com/clouds/100/000000/group.png"/>
                    </div>
                    <div class="card-body p-1 clientes d-flex justify-content-center">
                        <h5 class="card-title">Clientes <i class="fas fa-arrow-circle-right"></i></h5>
                       
                    </div>
                </div>
            
            </div>
    
      
    </div>
    
    
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
    