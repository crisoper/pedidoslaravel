<script>
  $(document).ready(function(){
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


    $.ajax({
      url: "{{route('empresasRegitradas')}}",
      method: "get",
      dataType: "json",
      success: function(data){
        
        let tablaempresa = "";
        $.each(data, function(index, empresa){           
            tablaempresa = tablaempresa + 
            `<tr>
              <td>${ empresa.ruc }</td>
              <td>${ empresa.nombre }</td>
             </tr>`
        });

        $("#tbl_Empresas").html(tablaempresa);
        paginateEmpresas();           
      }
    });


    $.ajax({
      url: "{{route('pedidosporentregar')}}",
      method: "get",
      dataType:'json',
      success: function(data){
     
        let tablapedidos = "";
        $.each(data.data, function(index, pedido){
       
          tablapedidos = tablapedidos + 
          `<tr><td>${pedido.cliente}</td>
               <td>${pedido.cliente_direccion}</td>
               <td>${pedido.created_at}</td>
               <td>${pedido.empresa}</td></tr>`
        });
        $("#tbl_pedidos").html(tablapedidos);
        paginatePedidos(".pagination-tbl_pedidos" );
        
        let items = $("#tbl_pedidos tr");           
        $("#totalPxentregar").html('<h3>'+ items.length +'</h3>')
      }
    })

function paginateEmpresas( ) {
    var items = $("#tbl_Empresas tr");     
    var numItems = items.length;
    var perPage = 10;      
    // var ".pagination-tbl_Empresas" = pagination ;
    var myPageName = "#pages-";       
    items.slice(perPage).hide();
    $(".pagination-tbl_Empresas").pagination({
        items: numItems,
        itemsOnPage: perPage,
        cssStyle:"light-theme",
        hrefTextPrefix: myPageName,
        onPageClick: function(pageNumber) { 
            var showFrom = perPage * (pageNumber - 1);
            var showTo = showFrom + perPage;        
            items.hide() 
                 .slice(showFrom, showTo).show();
        }
    });
    var checkFragment = function() {
          var hash = window.location.hash || (myPageName+"1");
          var re = new RegExp("^"+myPageName+"(\\d+)$");
          hash = hash.match(re);    
        if(hash)
          $(".pagination-tbl_Empresas").pagination("selectPage", parseInt(hash[1]));
    };   
    $(window).bind("popstate", checkFragment);    
    checkFragment();    
  }

  function paginatePedidos( pagination ) {
    var items = $("#tbl_pedidos tr");
    console.log(items);
    var numItems = items.length;
    var perPage = 10;      
    var pagination_placeholder_selector = pagination ;
    var myPageName = "#page-";       
    items.slice(perPage).hide();
    $(pagination_placeholder_selector).pagination({
        items: numItems,
        itemsOnPage: perPage,
        cssStyle:"light-theme",
        hrefTextPrefix: myPageName,
        onPageClick: function(pageNumber) { 
            var showFrom = perPage * (pageNumber - 1);
            var showTo = showFrom + perPage;        
            items.hide() 
                 .slice(showFrom, showTo).show();
        }
    });
    var checkFragment = function() {
          var hash = window.location.hash || (myPageName+"1");
          var re = new RegExp("^"+myPageName+"(\\d+)$");
          hash = hash.match(re);    
        if(hash)
          $(pagination_placeholder_selector).pagination("selectPage", parseInt(hash[1]));
    };   
    $(window).bind("popstate", checkFragment);    
    checkFragment();    
  }

  });
</script>