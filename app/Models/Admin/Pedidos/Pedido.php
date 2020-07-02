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

    
    public function empresa()
    {
        return $this->belongsTo('App\Models\Admin\Empresa', 'empresa_id', 'id');
    }
    
    public function cliente()
    {
        return $this->belongsTo('App\User', 'cliente_id', 'id');
    }
}
