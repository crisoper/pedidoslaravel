<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Productorecomendar extends Model
{
    use  SoftDeletes;
    protected $dates =['deleted_at'];

    protected $fillable =[
        'empresa_id',
        'producto_id',
        'recomendar',
        'created_by',
    ];
    
    
    public function producto()
    {
        return  $this->belongsTo('App\Models\Admin\Producto', 'producto_id');
    }
}
