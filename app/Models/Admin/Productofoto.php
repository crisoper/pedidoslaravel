<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Productofoto extends Model
{
    use  SoftDeletes;
    protected $dates =['deleted_at'];
    
    protected $fillable=[
        'empresa_id',
        'producto_id',
        'nombre',
        'url',
    ];

    public function getUrl()
    {
        return Storage::url($this->url);
    }
    public function producto()
    {
        return  $this->belongsTo('App\Models\Admin\Producto');
    }
}
