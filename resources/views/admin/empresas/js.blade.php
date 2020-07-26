<script>
    $(document).ready(function(){
        
//EDITAMOS EMPRESA REGISTRADA

    $("#enviarFormActualizandoDatos").on('click', function(e){
        e.preventDefault();

        $( enviarFormActualizandoDatos ).prop( "disabled", false ).find("span").show();
        var formData = new FormData(document.getElementById("form_UpdateRegistroEmpresa"));            
            $.ajax({            
                url:  "{{ route('empresas.update')}}",
                type: "post",
                data: formData,
                cache: false,
                contentType: false,
	            processData: false,
            success: function( data){
                window.location= "{{ route('configuracionempresa.index') }}"
                $( enviarFormActualizandoDatos ).prop( "disabled", false ).find("span").hide();
            },
            error:function( jqXHR, textStatus, errorThrown  ){
                if( jqXHR.status == 404 ) {}
                
                else if( jqXHR.status == 422 ) 
                {     
                    $( enviarFormActualizandoDatos ).prop( "disabled", false ).find("span").show(); 
                    $( ".spinnerr" ).hide(); 

                    GLOBARL_settearErroresEnCampos( jqXHR, "form_UpdateRegistroEmpresa" );
                }
                else if( jqXHR.status == 429 ) 
                {   
                    $( enviarFormActualizandoDatos ).prop( "disabled", false ).find("span").show();
                    $( ".spinnerr" ).hide(); 

                    setTimeout( function() {
                        // $( enviarFormActualizandoDatos ).prop( "disabled", false ).find("span").hide();
                        $("#form_UpdateRegistroEmpresa" ).find(".is-invalid").removeClass("is-invalid");
                    }, 5000);

                }  
            }
        })
    });

    $("#btn_postnewbusiness").on('click', function(event){
    event.preventDefault();           
            var formData = new FormData(document.getElementById("form_nuewbusiness"));            
            $.ajax({            
                url:  "{{ route('empresa.store')}}",
                type: "post",
                data: formData,
                cache: false,
                contentType: false,
	            processData: false,
            success: function(data){
                window.location="{{route('empresas.index')}}";
                $('#form_nuewbusiness')[0].reset();
            },
            error: function(jqXHR, textStatus, errorThrown ){
                if( jqXHR.status == 404 ) {}                
                else if( jqXHR.status == 422 ) 
                {     
                    $( btn_postnewbusiness ).prop( "disabled", false ).find("span").show(); 
                    $( ".spinnerr" ).hide(); 
                    GLOBARL_settearErroresEnCampos( jqXHR, "form_nuewbusiness");
                }
                else if( jqXHR.status == 429 ) 
                {   
                    $( btn_postnewbusiness ).prop( "disabled", false ).find("span").show();
                    $( ".spinnerr" ).hide(); 

                    setTimeout( function() {
                        $("#form_nuewbusiness" ).find(".is-invalid").removeClass("is-invalid");
                    }, 1000);
                }  
            }
        });
    });

  
    $('#departamentoid').select2({
            placeholder: "Departamento"
    });
    $('#provinciaid').select2({
            placeholder: "Provincia"
    });
    $('#distritoid').select2({
            placeholder: "Distrito"
    });
    $('#rubro_id').select2({
            placeholder: "Rubro"
    });
   
    $('#departamentoid').on("change", function () {

        let elemento = this;

        $.ajax({
            url: "{{ route('ajax.getprovinciaByDepartamentoId') }}",
            method:'GET',
            dataType:'json',
            data: {
                departamento_id : $( elemento ).val()
            },
            success: function( resp ){
                //console.log( resp );
                $("#provinciaid").html(""); 

                $.each( resp.data, function( key, value ) {

                    let opcion = `<option value="${ value.id }">${ value.nombre }<option>`;
                    $("#provinciaid").append( opcion ); 
                });

                $('#provinciaid').trigger("change");

            },
            error:  function( jqXHR, textStatus, errorThrown ) {
                $("#provinciaid").html(""); 
                console.log( jqXHR );
            }

        });

    });
        
        
    
    $('#provinciaid').on("change", function () {
    
        let elemento = this;
        
        $.ajax({
            url: "{{ route('ajax.getdistritosByProvinciaId') }}",
            method:'GET',
            dataType:'json',
            data: {
                provincia_id : $( elemento ).val()
            },
            success: function( resp ){
            
                $("#distritoid").html(""); 
                $.each( resp.data, function( key, value ) {
                    let opcion = `<option value="${ value.id }">${ value.nombre }<option>`;
                    $("#distritoid").append( opcion ); 
                });
                
            },
            error:  function( jqXHR, textStatus, errorThrown ) {
                $("#distritoid").html(""); 
            
            }
        
        });
        
    });


    });
</script>