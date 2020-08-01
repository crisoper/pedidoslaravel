<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Productooferta extends Model
{
    use  SoftDeletes;
    protected $dates =['deleted_at'];

    protected $fillable =[
        'empresa_id',
        'producto_id',
        'preciooferta',
        'diainicio',
        'horainicio',
        'diafin',
        'horafin',
        'created_by',
    ];
    
    
    public function producto()
    {
        return  $this->belongsTo('App\Models\Admin\Producto', 'producto_id');
    }
}
