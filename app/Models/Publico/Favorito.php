<?php

namespace App\Models\Publico;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Favorito extends Model
{
    protected $table = 'favoritos';
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
