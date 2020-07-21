
{{-- MODAL APP MOVIL --}}
<div class="modal fade" id="open_apps_movil" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="open_apps_movilLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <div class="row-m-0">
                    <div class="col-12">
                        <h3 class="text-uppercase"><b>Descárgate la app</b></h3>
                    </div>
                    <div class="col-12 mt-4">
                        <a class="btn btn_app_android p-0" href="#">
                            <img src="{{asset('pedidos/image/appmovil/googleplay.png')}}" alt="">
                        </a>
                        <a class="btn btn_app_ios p-0" href="#">
                            <img src="{{asset('pedidos/image/appmovil/appstore.png')}}" alt="">
                        </a>
                    </div>

                    <div class="col-12 p-0"><hr></div>

                    <div class="col-12">
                        <button type="button" class="btn btn_seguir_navengado_navegador" data-dismiss="modal">
                            Seguir en el navegador
                        </button>
                    </div>
                    <div class="col-12 mt-4">
                        <div class="logo_modal_apps_movil">
                            <img src="{{asset('pedidos/image/pedidosapp.png')}}" alt="" width="120">
                        </div>
                    </div>
                </div>
                

            </div>
        </div>
    </div>
</div>




<script>
    
    $(document).ready(function () {
        "use strict";
        if ($( window ).width() <= 576) {
            $('#open_apps_movil').modal('show');
        } else {
            $('#open_apps_movil').modal('hide');            
        }
    });

</script>