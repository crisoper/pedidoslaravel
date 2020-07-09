<script>
    $(document).ready(function(){


    
    
    $("#enviarFormRegistro").on('click', function(event){
        event.preventDefault();
        $( enviarFormRegistro ).prop( "disabled", true ).find("span").show();

        $.ajax({
            url: $("#form_horarioAtencionEmpresa").attr('action'),
            method: 'post',
            dataType: 'json',
            data: $("#form_horarioAtencionEmpresa").serialize(),
            success: function( user ){
                
                window.location = '{{route("configuracionempresa.index")}}';
                $( enviarFormRegistro ).prop( "disabled", false ).find("span").hide();
            },
            error:function( jqXHR, textStatus, errorThrown  ){
                if( jqXHR.status == 404 ) {}
                
                else if( jqXHR.status == 422 ) 
                {     
                    $( enviarFormRegistro ).prop( "disabled", false ).find("span").show(); 
                    $( ".spinnerr" ).hide(); 

                    GLOBARL_settearErroresEnCampos( jqXHR, "form_horarioAtencionEmpresa" );
                }
                // else if( jqXHR.status == 429 ) 
                // {   
                //     $( enviarFormRegistro ).prop( "disabled", false ).find("span").show();
                //     $( ".spinnerr" ).hide(); 

                //     let dias = ['Lunes','Martes','Miercoles','Jueves','Viernes','Sabado', 'Domingo'];
                //     let errorInicio = jqXHR.responseJSON.error.data['inicio'];
                //     let errorFin = jqXHR.responseJSON.error.data['fin'];

                //     $.each( errorInicio , function( index, diasemana ) {
                //         $("#horainicio-"+ diasemana ).addClass("is-invalid");
                //         $("#errorInicio-"+ diasemana ).addClass("is-invalid");
                       
                //     });
                    
                //     $.each( errorFin , function( index, diasemana ) {
                //         $("#horafin-"+ diasemana ).addClass("is-invalid");
                //         $("#errorfin-"+ diasemana ).addClass("is-invalid");
                       
                    
                //     });

                //     setTimeout( function() {
                //         // $( enviarFormRegistro ).prop( "disabled", false ).find("span").hide();
                //         $("#form_horarioAtencionEmpresa" ).find(".is-invalid").removeClass("is-invalid");
                //     }, 5000);

                // }  
            }
        });
    });
    function GLOBARL_settearErroresEnCampos( jqXHR, idElementoContenedorCampos ) {

    //Mostramos errores devueltos desde Backend
    let errorsRespuesta = jqXHR.responseJSON.errors;

    $.each( errorsRespuesta, function( idElemento, arrayErrores ) {
           

         if( $( "#" + idElemento ).hasClass("select2") ) {
                $( "#" + idElemento ).parent().find("span.select2-container").addClass("is-invalid");
                $( "#" + idElemento ).parent().find(".select2-selection").addClass("is-invalid");
            }      
            
        $( "#" + idElemento ).addClass("is-invalid");        
            arrayErrores.forEach( error => {
            MostrarNotificaciones( error ,  'error') ;
        });

    });

    //Ocultamos los errores despues de 5 segundos
    setTimeout( function() {
    
    $("#" + idElementoContenedorCampos).find(".is-invalid").removeClass("is-invalid");
    }, 5000);

    }



//EDITAMOS EMPRESA REGISTRADA

    $("#enviarFormActualizandoDatos").on('click', function(event){
        event.preventDefault();
        $.ajax({
            url: "{{ route('horarios.update') }}",
            // url: $("#form_UpdateRegistroEmpresa").attr('action'),
            method: "post",
            dataType: "json",
            data: $("#form_UpdateRegistroEmpresa").serialize(),
            success: function( data){
                
                // console.log(data);
                window.location= "{{ route('configuracionempresa.index') }}"
                $( enviarFormRegistro ).prop( "disabled", false ).find("span").hide();
            },
            error:function( jqXHR, textStatus, errorThrown  ){
                if( jqXHR.status == 404 ) {}
                
                else if( jqXHR.status == 422 ) 
                {     
                    $( enviarFormRegistro ).prop( "disabled", false ).find("span").show(); 
                    $( ".spinnerr" ).hide(); 

                    GLOBARL_settearErroresEnCampos( jqXHR, "form_UpdateRegistroEmpresa" );
                }
                else if( jqXHR.status == 429 ) 
                {   
                    $( enviarFormRegistro ).prop( "disabled", false ).find("span").show();
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
                        // $( enviarFormRegistro ).prop( "disabled", false ).find("span").hide();
                        $("#form_UpdateRegistroEmpresa" ).find(".is-invalid").removeClass("is-invalid");
                    }, 5000);

                }  
            }
        })
    });


       
    for (let i = 1; i < 8; i++) {
     
             let horainicio =   $('input[name="horainicio['+i+']"]').val() ;
             let horafinn =  $.trim( $('input[name="horafin['+i+']"]').val() );

             let indicehorainicio = horainicio.indexOf(":");
             let indiceminutosinicio = horainicio.indexOf(" ");
             let horainicioextraida = horainicio.substring(0, indicehorainicio);
             let minutosinicioextraida = horainicio.substring(indicehorainicio +  1, indiceminutosinicio);
             let AmPmhoraninicio =  horainicio.substring(indiceminutosinicio + 1, horainicio.length);
                 valorminimo = ( parseInt(horainicioextraida) * 60 ) +  parseInt(minutosinicioextraida) ;
         
                 if (AmPmhoraninicio == 'PM' && horainicio != '12:00 PM' ) {
                   valorminimo = valorminimo + 720;
                 }else if( horainicio == '12:00 AM'){
                  valorminimo = 0;
                 }else if(horainicio == '12:00 PM'){
                    valorminimo = 720;
                 
                 }else{
                    valorminimo = valorminimo;
                 }

             
             
             let indicehorafin = horafinn.indexOf(":");
             let indiceenpaciofin = horafinn.indexOf(" ");
             let horafinextraida = horafinn.substring(0, indicehorafin);
             let minutosfinextraida = horafinn.substring(indicehorafin + 1, indiceenpaciofin);
             let AmPmhoranfin =  horafinn.substring( indicehorafin + 4 ,  horafinn.length);
                 valormaximo = ( parseInt(horafinextraida) * 60 ) +  parseInt(minutosfinextraida) ;
            
                          
             if (AmPmhoranfin == 'PM') {
              valormaximo = valormaximo + 720;
            }else{
             valormaximo = valormaximo + 0;
            }

            if( $('input[name="dias['+i+']"]').attr('checked') ) {
                slidertime(valorminimo, valormaximo, i);
                $('div[name="slider-range['+i+']"]').show();
            }

//MOSTRAMOS SLIDER SI ACTIVAMOS DIA
            
             $('input[name="dias['+i+']"]').on('change', function() {
                     if( $(this).prop('checked') ) {
                        valorminimo = 0;
                        valormaximo = 1440;


                          $('input[name="horainicio['+i+']"]').show();
                          $('input[name="horafin['+i+']"]').show();
                          $('input[name="horainicio['+i+']"]').val('12:00 AM');
                          $('input[name="horafin['+i+']"]').val('11:59 PM');                   
                          slidertime(valorminimo, valormaximo, i);
                          $('div[name="slider-range['+i+']"]').show();
                    }else{
                         $('div[name="slider-range['+i+']"]').hide();
                         $('input[name="horainicio['+i+']"]').hide();
                         $('input[name="horafin['+i+']"]').hide();
                         $('input[name="horainicio['+i+']"]').val('');
                         $('input[name="horafin['+i+']"]').val('');
                    }
             });
         
    


    
    }



function slidertime(valorminimo, valormaximo, i){
         $('div[name="slider-range['+i+']"]').slider({
         range: true,   
         min: 0,
         max: 1440,
         step: 15,
         values: [valorminimo , valormaximo],
         slide: function (e, ui) {
             var hours1 = Math.floor(ui.values[0] / 60);
             var minutes1 = ui.values[0] - (hours1 * 60);

             if (hours1.length == 1) hours1 = '0' + hours1;
             if (minutes1.length == 1) minutes1 = '0' + minutes1;
             if (minutes1 == 0) minutes1 = '00';
             if (hours1 >= 12) {
                 if (hours1 == 12) {
                     hours1 = hours1;
                     minutes1 = minutes1 + " PM";
                 } else {
                     hours1 = hours1 - 12;
                     minutes1 = minutes1 + " PM";
                 }
             } else {
                 hours1 = hours1;
                 minutes1 = minutes1 + " AM";
             }
             if (hours1 == 0) {
                 hours1 = 12;
                 minutes1 = minutes1;
             }
         
             // $('div[name="slider-range['+i+']"]').on('click', function() {});            
                 $('input[name="horainicio['+i+']"]').val(hours1 + ':' + minutes1);
             // $('.slider-time').html(hours1 + ':' + minutes1);       

         
             var hours2 = Math.floor(ui.values[1] / 60);
             var minutes2 = ui.values[1] - (hours2 * 60);
         
             if (hours2.length == 1) hours2 = '0' + hours2;
             if (minutes2.length == 1) minutes2 = '0' + minutes2;
             if (minutes2 == 0) minutes2 = '00';
             if (hours2 >= 12) {
                 if (hours2 == 12) {
                     hours2 = hours2;
                     minutes2 = minutes2 + " PM";
                 } else if (hours2 == 24) {
                     hours2 = 11;
                     minutes2 = "59 PM";
                 } else {
                     hours2 = hours2 - 12;
                     minutes2 = minutes2 + " PM";
                 }
             } else {
                 hours2 = hours2;
                 minutes2 = minutes2 + " AM";
             }
         
        // $('.slider-time2').html(hours2 + ':' + minutes2);
        $('input[name="horafin['+i+']"]').val(hours2 + ':' + minutes2);
       
        }
        });
    }
});
</script>