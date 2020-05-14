@section('layouts.admin')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                       <div>
                           Productos
                       </div>
                       <div>
                           Nuevo Producto
                       </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-light" name="listaproductos" id="listaproductos">
                            <thead class="thead-light">
                                <tr>
                                    <th>Item</th>
                                    <th>Categoría</th>
                                    <th>Producto</th>
                                    <th>Descripción</th>
                                    <th>Precio</th>
                                    <th>Stock</th>
                                    <th colspan="2">Acciones</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

