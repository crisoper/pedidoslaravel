<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Tag extends Model
{
    // use  SoftDeletes;
    // protected $dates =['deleted_at'];
    protected $fillable=[
        'nombre',
    ];
    
    //Tags del producto
    public function tags()
    {
        return $this->belongsToMany('App\Models\Admin\Producto', 'productotags', 'producto_id', 'tag_id');
    }
    
}
