<?php

namespace App\Models\Admin\Pedidos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedidoestado extends Model
{
    use  SoftDeletes;
    protected $dates =['deleted_at'];

    protected $fillable = [
        'empresa_id',
        'pedido_id',
        'estado',
        'created_by',
    ];

    
    public function pedido()
    {
        return  $this->belongsTo('App\Models\Admin\Pedidos\Pedido', 'pedido_id');
    }
    
    public function repartidor()
    {
        return  $this->belongsTo('App\User', 'created_by', 'id');
    }
}
