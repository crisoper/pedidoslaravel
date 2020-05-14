
<script>

    Messenger.options = {
        // extraClasses: 'messenger-fixed messenger-on-top messenger-on-center',
        extraClasses: 'messenger-fixed messenger-on-bottom messenger-on-right',
        theme: 'flat'
    }


    function MostrarNotificaciones( mensaje, tipo ) {
        
        Messenger().post({
            message: mensaje,
            type: tipo,
            showCloseButton: true,
            hideAfter: 3
        });

    }

    function GLOBARL_MostrarNotificaciones( mensaje, tipo ) {
        Messenger().post({
            message: mensaje,
            type: tipo,
            showCloseButton: true,
            hideAfter: 3
        });
    }



    function GLOBARL_settearErroresEnCampos( jqXHR, idElementoContenedorCampos ) {

        //Mostramos errores devueltos desde Backend
        let errorsRespuesta = jqXHR.responseJSON.errors;

        $.each( errorsRespuesta, function( idElemento, arrayErrores ) {
            
            //Establecemos errores para html
            $( "#" + idElemento ).addClass("is-invalid");

            //Establecemos errores para select 2
            if( $( "#" + idElemento ).hasClass("select2") ) {
                $( "#" + idElemento ).parent().find("span.select2-container").addClass("is-invalid");
                $( "#" + idElemento ).parent().find(".select2-selection").addClass("is-invalid");
            }

            arrayErrores.forEach( error => {
                MostrarNotificaciones( error , "error");
            });

        });

        //Ocultamos los errores despues de 5 segundos
        setTimeout( function() {
            $("#" + idElementoContenedorCampos).find(".is-invalid").removeClass("is-invalid");
        }, 5000);

    }


    function GLOBAL_ConfirmarOperacionSI_NO( _mensaje, _callBackfunction ) {
        
        bootbox.confirm({
            message: _mensaje,
            buttons: {
                confirm: {
                    label: 'Si',
                    className: 'btn-info btn-sm'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-danger  btn-sm'
                }
            },
            callback: function ( result ) {
                
                if ( result == true ) {
                    // console.log( _callBackfunction );
                    eval("_callBackfunction");
                }
                else{
                    // return false;
                    //Podriamos mostrar notificaciones
                }
            }
        });

    }


    $(".select2").select2();
    
    
    function GLOBAL_obtenerDatosMedianteAjaxParaSelect_GET( _url, _parametros, _idSelectLlenarDatos, _functionCallBack ) {

        $.ajax({
            method: "GET",
            url: _url,
            data: _parametros,
            success: function( data ) {
                $( _idSelectLlenarDatos ).html( data );
            },
            error: function( jqXHR, textStatus, errorThrown ) {
                if( jqXHR.status == 422 ) {
                    MostrarNotificaciones(jqXHR.responseJSON.error, "error");
                }
                else if( jqXHR.status == 404 ) {
                    MostrarNotificaciones("Pagina no encontrada", "error");
                }
            }
        })
        .done( function ( ) {
            // console.log( _functionCallBack );
            eval( _functionCallBack );
        });

    }

</script>

@if ( Session::has('info') )
    <script>
        $(function(){            
            Messenger().post({
                message: "{{ session('info') }}",
                showCloseButton: true
            });
            var loc = ['top', 'right'];
            var style = 'flat';
            
            var $output = $('.controls output');
            
            var update = function(){
                // var classes = 'messenger-fixed';
            
                // for (var i=0; i < loc.length; i++)
                let classes = "messenger-fixed messenger-on-top messenger-on-center";
                // classes += ' messenger-on-' + loc[i];
            
                $.globalMessenger({ extraClasses: classes, theme: style, showCloseButton: true });
                Messenger.options = { extraClasses: classes, theme: style, showCloseButton: true };
            
                $output.text("Messenger.options = {\n    extraClasses: '" + classes + "',\n    theme: '" + style + "'\n}");
            };
            
            update();
        
        });
        
    </script>
@endif


@if ( Session::has('error') )
    <script>

        $(function(){
            Messenger().post({
                message: "{{ session('error') }}",
                showCloseButton: true,
                type: 'error'
            });
            var loc = ['top', 'right'];
            var style = 'flat';
            
            var $output = $('.controls output');
            
            var update = function(){
                // var classes = 'messenger-fixed';
            
                // for (var i=0; i < loc.length; i++)
                // classes += ' messenger-on-' + loc[i];
                let classes = "messenger-fixed messenger-on-top messenger-on-center";
            
                $.globalMessenger({ extraClasses: classes, theme: style, showCloseButton: true });
                Messenger.options = { extraClasses: classes, theme: style, showCloseButton: true };
            
                $output.text("Messenger.options = {\n    extraClasses: '" + classes + "',\n    theme: '" + style + "'\n}");
            };
            
            update();
        
        });
        
    </script>
@endif


