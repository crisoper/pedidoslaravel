<?php

namespace App\Models\Publico;

use Illuminate\Database\Eloquent\Model;

class Pedidodetalle extends Model
{
    public function producto(){
        return $this->belongsTo('App\Models\Admin\Producto', 'producto_id');
    }
}
