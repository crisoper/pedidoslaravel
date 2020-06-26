<?php

namespace App\Models\Admin\Pedidos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    use  SoftDeletes;
    protected $dates =['deleted_at'];

    protected $fillable = [
        'empresa_id',
        'producto_id',
        'total',
        'cliente_id',
    ];

    
    public function pedidodetalle()
    {
        return $this->hasMany('App\Models\Admin\Pedidos\Pedidodetalle', 'pedido_id');
    }
}
