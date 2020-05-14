@section('layouts.admin')
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    Productos
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <select name="categoria" id="categoria" >
                                <option value="">categoria</option>
                            </select>
                            
                        </div>
                        <div class="form-group">
                            <input id="producto" class="form-control" type="text" name="producto">
                        </div>
                        <div class="form-group">
                            <textarea name="descripcion" id="descripcion" cols="30" rows="10"></textarea>
                        </div>
                        <div class="col-6 form-group">
                            <textarea name="precio" id="precio" cols="30" rows="10"></textarea>
                        </div>
                        <div class="col-6 form-group">
                            <textarea name="stock" id="stock" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Guardar</button>
                            <button class="btn btn-danger">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection