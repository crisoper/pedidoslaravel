
    {{-- CESTA --}}
    <div class="content_modal_menumovil"></div>
    <div class="sidebar_modal_menumovil_left">
        <button class="p-0" id="close_sidebar_menumovil">
            <i class="fas fa-times"></i>
        </button>

        <div class="content_menumovil">
            <div class="logo_menumovil">
                <img src="{{asset('pedidos/image/logo.png')}}" alt="">
            </div>
            <div class="serviviocliente_menumovil">
                <button type="button" class="btn btn_serviciocliente_menumovil py-1 px-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Servicio al cliente <i class="fas fa-angle-down"></i>
                </button>
                <div class="dropdown-menu dropdown_serviciocliente bg-dark text-center">
                    <div class="col-12 p-0 border_movil_info">
                        <a class="btn" href="#">Escribenos</a>
                    </div>
                    <div class="col-12 p-0 py-2 border_movil_info text-center">
                        <p class="mb-0 number_phone">+51 976301482</p>
                        <p class="my-0 suport"><small>Soporte 24/7</small></p>
                    </div>
                    <div class="col-12 p-0">
                        <a class="btn" href="#">Preguntas frecuentes</a>
                    </div>
                </div>                
            </div>
            <div class="content_scroll_menumovil">
                <div class="scroll_menumovil">
                    <div class="" id="cuerpo_productos_menumovil_menu">
                        
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <a class="btn btn_movil_categorias" href="{{ route('recomendados.index') }}">
                                    Recomendados
                                </a>
                            </div>
                            <div class="card">
                                <a class="btn btn_movil_categorias" href="{{ route('ofertas.index') }}">
                                    Ofertas
                                </a>
                            </div>
                            <div class="card">
                                <a class="btn btn_movil_categorias" href="{{ route('nuevos.index') }}"">
                                    Nuevos
                                </a>
                            </div>
                            <div class="card">
                                <a class="btn btn_movil_categorias" href="{{ route('maspedidos.index') }}">
                                    Más pedidos
                                </a>
                            </div>
                            <div class="card">
                                <a class="btn btn_movil_categorias" href="{{ route('productos.busqueda.index') }}">
                                    Todos los productos
                                </a>
                            </div>
                            <div class="card">
                                <a class="btn btn_movil_categorias" href="{{ route('locales.busqueda.index') }}">
                                    Todos los locales
                                </a>
                            </div>

                            {{-- CATEGORIAS --}}
                            <div class="card">
                                <div class="card-header p-0" id="headingCategorias">
                                    <button class="btn btn_movil_categorias collapsed" type="button" data-toggle="collapse" data-target="#collapseCategorias" aria-expanded="false" aria-controls="collapseCategorias">
                                        Categorías <i class="fas fa-plus float-right pt-1"></i>
                                    </button>
                                </div>
                                <div id="collapseCategorias" class="collapse" aria-labelledby="headingCategorias" data-parent="#accordionExample">
                                    <div class="card-body p-0" id="menuMovilCategorias">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            
        </div>
    </div>

    
    {{-- MENU MOVIL --}}
    <div class="modal left fade" id="open_menu_movil" tabindex="-1" role="dialog" aria-labelledby="open_menu_movil">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header py-1 bg-dark">
                    <div class="modal-title">
                        <a href="#"><img src="{{asset('pedidos/image/logo.png')}}" alt=""></a>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-12 p-0" id="scroll_menu_movil">


                    </div>


                </div>
            </div>
        </div>
    </div>