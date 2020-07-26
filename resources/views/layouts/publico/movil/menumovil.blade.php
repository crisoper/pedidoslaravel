
    {{-- CESTA --}}
    <div class="content_modal_menumovil"></div>
    <div class="sidebar_modal_menumovil_left">

        <button class="p-0" id="close_sidebar_menumovil">
            <i class="fas fa-times"></i>
        </button>

        <div class="row m-0">
            <div class="col-7 p-0">
                <div class="serviviocliente_menumovil">
                    <button type="button" class="btn btn_serviciocliente_menumovil py-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Servicio al cliente <i class="fas fa-angle-down"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown_serviciocliente bg-dark text-center">
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
            </div>
            <div class="col-5 p-0">
                <div class="apps_menumovil">
                    <button type="button" class="btn btn_apps_menumovil py-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Apps <i class="fas fa-angle-down"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown_apps_movil bg-dark text-center">
                        <a class="btn btn_app_android p-0" href="#">
                            <img src="{{asset('pedidos/image/appmovil/googleplay.png')}}" alt="">
                        </a>
                        <a class="btn btn_app_ios p-0" href="#">
                            <img src="{{asset('pedidos/image/appmovil/appstore.png')}}" alt="">
                        </a>
                    </div>                
                </div>
            </div>
        </div>

        <div class="content_menumovil">
            <div class="logo_menumovil">
                <img src="{{asset('pedidos/image/pedidosapp_inicio.png')}}" alt="{{asset('pedidos/image/pedidosapp.png')}}">
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

                            {{-- CATEGORIAS --}}
                            {{-- <div class="card">
                                <div class="card-header p-0" id="headingCategorias">
                                    <button class="btn btn_movil_categorias collapsed" type="button" data-toggle="collapse" data-target="#collapseCategorias" aria-expanded="false" aria-controls="collapseCategorias">
                                        Categorías <i class="fas fa-plus float-right pt-1"></i>
                                    </button>
                                </div>
                                <div id="collapseCategorias" class="collapse" aria-labelledby="headingCategorias" data-parent="#accordionExample">
                                    <div class="card-body p-0" id="menuMovilCategorias">
                                        
                                    </div>
                                </div>
                            </div> --}}
                        </div>

                    </div>
                </div>
            </div>
            
        </div>
    </div>

    