<?php

namespace App\Models\Publico;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cesta extends Model
{
    protected $table = 'cestas';
    use SoftDeletes;
    protected $dates =['deleted_at'];

    public function producto()
    {
        return $this->belongsTo('App\Models\Admin\Producto', 'producto_id');
    }


    public function empresa()
    {
        return $this->belongsTo('App\Models\Admin\Empresa', 'empresa_id');
    }

    
    public function cliente()
    {
        return $this->belongsTo('App\User', 'cliente_id');
    }

}
