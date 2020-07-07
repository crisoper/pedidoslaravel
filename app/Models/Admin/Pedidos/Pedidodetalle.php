<?php

namespace App\Models\Admin\Pedidos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedidodetalle extends Model
{
    use  SoftDeletes;
    protected $dates =['deleted_at'];

    protected $fillable = [
        'empresa_id',
        'producto_id',
        'pedido_id',
        'preciounitario',
        'cantidad',
        'subtotal',
    ];

    
    public function pedido()
    {
        return  $this->belongsTo('App\Models\Admin\Pedidos\Pedido', 'pedido_id');
    }
    
    public function producto()
    {
        return  $this->belongsTo('App\Models\Admin\Producto', 'producto_id');
    }
}
