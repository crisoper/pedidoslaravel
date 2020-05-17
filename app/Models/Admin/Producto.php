<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Producto extends Model
{
    use  SoftDeletes;
    protected $dates =['deleted_at'];

    protected $fillable = [
        'empresa_id',
        'categoria_id',
        'codigo',
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'created_by',
    ];


    
    //Categoria a la que pertence el producto
    public function categoria()
    {
        return $this->belongsTo('App\Models\Admin\Productocategoria', 'categoria_id');
    }


    //Fotos del producto
    public function fotos()
    {
        return $this->hasMany('App\Models\Admin\Productofoto', 'producto_id');
    }

    //Tags del producto
    public function tags()
    {
        return $this->belongsToMany('App\Models\Admin\Tag', 'productotags', 'producto_id', 'tag_id');
    }

    
}
