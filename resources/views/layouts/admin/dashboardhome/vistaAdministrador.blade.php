<style>
.ventas{
    background-color: rgb(179, 6, 6);
    color: rgb(255, 255, 255);
}
H5{
    color: rgb(0, 0, 0);
}

.pedidos{
    background-color: #FCE0A2;
}
.ventas{
    background-color: rgb(240, 184, 29);
}
.productos{
    background-color:#E6EDB7;
}
.clientes{
    background-color: rgb(155, 206, 72);
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
                   {{-- <span class="display-3 text-info"><i class="fas fa-users"></i></span> --}}
                   <img src="https://img.icons8.com/bubbles/100/000000/bar-chart.png"/>
                </div>
                <div class="card-body p-1 pedidos d-flex justify-content-center">
                    <h5 class="card-title">Lo más pedido <i class="fas fa-arrow-circle-right"></i></h5>
                   
                </div>
            </div>
        
        </div>
        
        <div class="col-sm-3">

            <div class="card">
                <div class="card-header p-1 text-center ">
                   {{-- <span class="display-3 iconoventas text-danger"><i class="fas fa-shopping-basket"></i></span> --}}
                   <img src="https://img.icons8.com/bubbles/100/000000/sales-performance.png"/>
                </div>
                <div class="card-body p-1 ventas d-flex justify-content-center">
                    <h5 class="card-title">Ventas <i class="fas fa-arrow-circle-right"></i></h5>
                   
                </div>
            </div>
        
        </div>

        <div class="col-sm-3">

            <div class="card">
                <div class="card-header p-1 text-center ">
                   {{-- <span class="display-3 text-warning"><i class="fas fa-utensils"></i></span> --}}
                   <img src="https://img.icons8.com/bubbles/100/000000/add-shopping-cart.png"/>
                </div>
                <a href="{{route('includeProductos.productos')}}">
                    <div class="card-body p-1 productos d-flex justify-content-center">
                        <h5 class="card-title">Productos <i class="fas fa-arrow-circle-right"></i></h5>
                    </div>
                </a>
            </div>
        
        </div>

        <div class="col-sm-3">

            <div class="card">
                <div class="card-header p-1 text-center ">
                   {{-- <span class="display-3 text-success"><i class="fas fa-users"></i></span> --}}
                   <img src="https://img.icons8.com/bubbles/100/000000/client-company.png"/>
                </div>
                <div class="card-body p-1 clientes d-flex justify-content-center">
                    <h5 class="card-title">Clientes <i class="fas fa-arrow-circle-right"></i></h5>
                   
                </div>
            </div>
        
        </div>

  
</div>

