
<div class="col-12" style="background-color: #fff; border: 1px solid rgb(211, 210, 210)">
  <div class="d-flex flex-nowrap align-items-center">
    <div class="col-12 col-md-9 mb 3">
        <form id="form-buscar-roles" class="" action="">
            <div class="input-group">
                <input type="text" class="form-control rounded-1" placeholder="Buscar" aria-label="Buscar" autofocus name="buscar" value="{{request()->query('buscar')}}">
                <div class="input-group-append">
                    <a href="#" class="btn btn-outline-info" onclick="event.preventDefault(); document.getElementById('form-buscar-roles').submit();">
                        <i class="fas fa-search"></i>
                    </a>
                </div>
            </div>
        </form>
    </div>
    <div class="col-12 col-md-3 mb-3 text-right ">      
            <a class="btn btn-outline-info" href="{{ route('productos.create') }}" class="dropdown-item"><i class="fas fa-plus-square text-success"></i> Nuevo Producto</a>
    </div>
  </div>
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-sm">
                <thead class="thead-light">
                    <tr>
                        <th>Item</th>
                        <th>Categoría</th>
                        <th>Código</th>                                    
                        <th>Producto</th>                                    
                        <th>Descripción</th>                                    
                        <th>Precio</th>                                    
                        <th>Stock</th> 
                        <th class="text-center">Foto</th>                                   
                       
                    </tr>
                </thead>
                <tbody id="tablaProductos">
                    @foreach ($productos as $producto)
                        <tr id="{{$producto->id}}">
                            <td>{{$producto->id}}</td>                                   
                            <td>
                                @foreach ($categorias as $categoria)
                                    @if ( $categoria->id== $producto->categoria_id)
                                        {{$categoria->nombre}}
                                    @endif
                                @endforeach                                    
                            </td>
                            <td>{{$producto->codigo}}</td> 
                            <td>{{$producto->nombre}}</td> 
                            <td>{{$producto->descripcion}}</td> 
                            <td>{{$producto->precio}}</td> 
                            <td>{{$producto->stock}}</td> 
                            <td class="text-center">
                                <button type="button" class="btn btn_imagenes_producto p-0" data-toggle="modal" data-target="#modalimagenes" id="{{$producto->id}}">
                                    <i class="fas fa-eye text-info"></i>
                                </button>
                            </td>                           
                        
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-12">
            {!! $productos->appends(request()->query() )->links('pagination::bootstrap-4') !!}
        </div>
    </div>
</div>