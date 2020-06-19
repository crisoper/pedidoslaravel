
  <div class="row">
    <div class="col-12 d-flex flex-wrap ">
      <div class="col-sm-12 col-md-8 d-flex flex-wrap" >
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><img
                src="https://img.icons8.com/bubbles/100/000000/small-business.png" /></span>
    
            <div class="info-box-content text-center">
              <span class="info-box-number" id="totalEmpresas">
    
              </span>
              <span class="info-box-text">Empresas</span>
            </div>
          </div>
        </div>
    
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><img
                src="https://img.icons8.com/bubbles/100/000000/add-user-group-man-man.png" /></span>
    
            <div class="info-box-content text-center">
              <span class="info-box-number" id="totalUsuarios">
    
              </span>
              <span class="info-box-text">Usuarios</span>
            </div>
          </div>
        </div>
    
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-primary elevation-1"><img
                src="https://img.icons8.com/color/48/000000/cash-in-hand.png" /></span>
    
            <div class="info-box-content text-center">
              <span class="info-box-number" id="totalPedidos">
    
              </span>
              <span class="info-box-text">Pedidos</span>
            </div>
          </div>
        </div>
  
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon elevation-1" style="background: rgb(89, 233, 45);"><img
              <img src="https://img.icons8.com/bubbles/50/000000/bookmark.png"/>
              </span>
    
            <div class="info-box-content text-center">
              <span class="info-box-number" id="totalReclamos">
              <h3>20</h3>
              </span>
              <span class="info-box-text">Reclamos</span>
              
            </div>
          </div>
        </div>
      </div>
  
      <div class="col sm-6 col-md-4 d-flex flex-nowrap">
        <div class="col-6">
          <div class="mb-3" style="background: rgb(216, 15, 15); height:100px; color:white;">
             
            <div class="info-box-content d-flex justify-content-between p-2">
              <span><h5><i class="fas fa-book-reader"> </i> Reclamos</h5></span>
              <span class="info-box-number">
                  <h2>80</h2>
              </span>
            </div>

            <div class="d-flex justify-content-between p-2">
              <span class="info-box-text">Mes anterior</span>
              <span class="badge badge-warning badge-pill"><small ><a href="">detalle</a></small></span>
            </div>
          </div>
        </div>
        <div class="col-6 ">
          <div class="mb-3 bg-info" style="height:100px; color:white;">
             
            <div class="info-box-content d-flex justify-content-between p-2">
              <span><h5><i class="fas fa-book-reader"> </i> Visitas</h5></span>
              <span class="info-box-number">
                  <h2>80</h2>
              </span>
            </div>

            <div class="d-flex justify-content-between p-2">
              <span class="info-box-text">Mes anterior</span>
              <span class="badge badge-warning badge-pill"><small ><a class="text-light" href="">detalle</a></small></span>
            </div>
          </div>
        </div>
       
      </div>
    </div>
 
  </div>

<div class="row">
  <div class="col-12 d-flex flex-wrap">
    <div class="col-sm-12 col-md-8">
        <div class="card">
          <div class="card-header">
            Pedidos sin atender
          </div>
          <div class="card-body">
            <h5 class="card-title">Title</h5>
            <p class="card-text">Content</p>
          </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 ">
      <div class="card">
        <div class="card-header">
          <span><i class="fas fa-building"></i> Empresas</span>
        </div>
        <div class="card-body">
          <div class="col-12">
            <div class="table-responsive">
  
              <table class="table table-bordered table-sm" id="tbl_Empresas">
                <thead class="bg-warning">
                  <tr>
  
                    <th>Ruc</th>
                    <th>Empresa</th>
                    <th>Dirección</th>
  
                  </tr>
                </thead>
  
              </table>
            </div>
          </div>
        </div>
  
      </div>
  
      <div class="card">
        <div class="card-header">
          <span><i class="fas fa-building"></i> Usuarios</span>
        </div>
        <div class="card-body">
          <div class="col-12">
            <div class="table-responsive">
  
              <table class="table table-bordered table-sm" id="tbl_Empresas">
                <thead class="bg-primary">
                  <tr>
  
                    <th>Nombre</th>
                    <th>Empresa</th>
                    <th>Dirección</th>
  
                  </tr>
                </thead>
  
              </table>
            </div>
          </div>
        </div>
  
      </div>
  
    </div>
  </div>
  <!-- /.col -->
</div>



@section('scripts')
<script>
  $(document).ready(function(){
    
    $.ajax({
      url: "{{route('empresasRegitradas')}}",
      method: "get",
      dataType: "json",
      success: function(data){
        console.log( data );
            $.each(data, function(index, empresa){
              $("#tbl_Empresas").append( "<tr>"+
                              "<td>"+ empresa.ruc+ "</td>"+
                              "<td>"+ empresa.nombre+ "</td>"+
                              "<td>"+ empresa.direccion+ "</td>"+
                              "<tr>"
              )
            });
          }
    });

    // $("#tbl_Empresas").DataTable();

    $.ajax({
      url: "{{route('totalderegistros')}}",
      method: "get",
      dataType: "json",
      success: function( data ){

        $("#totalEmpresas").html('<h3>'+ data[0] +'</h3>')
        $("#totalUsuarios").html('<h3>'+ data[1] +'</h3>')
        $("#totalPedidos").html('<h3>'+ data[2] +'</h3>')
     
      }
    });
   
  });
</script>
@endsection