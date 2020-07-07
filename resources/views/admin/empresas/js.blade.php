<script>
    $(document).ready(function(){
        
//EDITAMOS EMPRESA REGISTRADA

    $("#enviarFormActualizandoDatos").on('click', function(){
        $( enviarFormActualizandoDatos ).prop( "disabled", false ).find("span").show();
        $.ajax({
            url: "{{ route('empresas.update') }}",
            method: "post",
            dataType: "json",
            data: $("#form_UpdateRegistroEmpresa").serialize(),
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

                    let dias = ['Lunes','Martes','Miercoles','Jueves','Viernes','Sabado', 'Domingo'];
                    let errorInicio = jqXHR.responseJSON.error.data['inicio'];
                    let errorFin = jqXHR.responseJSON.error.data['fin'];

                    $.each( errorInicio , function( index, diasemana ) {
                        $("#horainicio-"+ diasemana ).addClass("is-invalid");
                        $("#errorInicio-"+ diasemana ).addClass("is-invalid");
                       
                    });
                    
                    $.each( errorFin , function( index, diasemana ) {
                        $("#horafin-"+ diasemana ).addClass("is-invalid");
                        $("#errorfin-"+ diasemana ).addClass("is-invalid");
                       
                    
                    });

                    setTimeout( function() {
                        // $( enviarFormActualizandoDatos ).prop( "disabled", false ).find("span").hide();
                        $("#form_UpdateRegistroEmpresa" ).find(".is-invalid").removeClass("is-invalid");
                    }, 5000);

                }  
            }
        })
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