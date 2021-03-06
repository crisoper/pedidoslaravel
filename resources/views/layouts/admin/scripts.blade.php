
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="{{ asset('adminlte301/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

<script src="{{ asset('Plugins/imgLiquid/imgLiquid.js') }}"></script>
<script src="{{ asset('adminlte301/js/adminlte.js') }}"></script>
<script src="{{ asset('adminlte301/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte301/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

<script src="{{ asset('adminlte301/plugins/bootbox/bootbox.min.js') }}"></script>
<script src="{{ asset('adminlte301/plugins/messeger/js/messenger.min.js') }}"></script>
<script src="{{ asset('adminlte301/plugins/toastr/toastr.min.js') }}"></script>





{{-- Agregar Imagenes --}}
<script type="text/javascript" src="{{ asset('pedidos/kartik_bootstrap_fileinput/js/fileinput.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('pedidos/kartik_bootstrap_fileinput/js/locales/es.js') }}"></script>
<script type="text/javascript" src="{{ asset('pedidos/kartik_bootstrap_fileinput/themes/fas/theme.min.js') }}"></script>




<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js" integrity="sha256-8zyeSXm+yTvzUN1VgAOinFgaVFEFTyYzWShOy9w7WoQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js" integrity="sha256-nZaxPHA2uAaquixjSDX19TmIlbRNCOrf5HO1oHl5p70=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js" integrity="sha256-sfG8c9ILUB8EXQ5muswfjZsKICbRIJUG/kBogvvV5sY=" crossorigin="anonymous"></script>

<!-- Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="{{ asset('adminlte301/plugins/messeger/js/messenger-theme-flat.js') }}"></script>

<script src="{{ asset('adminlte301/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('adminlte301/plugins/daterangepicker/moment.min.js') }}"></script>


{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script> --}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>

<script src="{{ asset('adminlte301/plugins/simplePagination/simplePagination.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

{{-- ELEVATE ZOOM --}}
<script src="https://cdn.jsdelivr.net/gh/igorlino/elevatezoom-plus@1.2.3/src/jquery.ez-plus.js"></script>


<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>

<script>
  
    var urlabuscar = '{{ str_replace( request()->path(), "", request()->url() ).substr( Route::currentRouteName(), 0, (  strpos( Route::currentRouteName(), '.' ) ? strpos( Route::currentRouteName(), '.' ) : 0  ) ) }}';

    if( document.location.pathname != '/home')
    {
      var len = $('a[href="'+ urlabuscar +'"]')
                  .addClass('active', function( ) {
                    if ( ! $(this).hasClass("nav-link") ) {
                      $( this ).removeClass("active");
                    }
                  })
                  .parents('ul .siderbar-custom')
                  .css({"display":"block"})
                  .length;
      if (len <= 0) {
        // console.log("No encontrado")
      }
    }

    //Almacenando en LocalStorage el estado de la barra lateral
    $(document).ready(function(){    
        
        $('.showHideSideBar').on("click", function(){
            validarShowHideSideBar( true );
        });

        function validarShowHideSideBar( cambiarEstado ) {

            if ( localStorage.showHideSideBar == undefined ) {
                localStorage.setItem("showHideSideBar", "sidebar-collapse");
            }

            if ( cambiarEstado ) {
                if( localStorage.getItem("showHideSideBar") == "sidebar-collapse" ) {
                    localStorage.setItem("showHideSideBar", "");
                }
                else {
                    localStorage.setItem("showHideSideBar", "sidebar-collapse");
                }
            }
            else {
                if( localStorage.getItem("showHideSideBar") == "sidebar-collapse" ) {
                    $("body").addClass("sidebar-collapse");
                }
                else {
                    $("body").removeClass("sidebar-collapse");
                }
            }

        }

        validarShowHideSideBar( false );

    });


</script>