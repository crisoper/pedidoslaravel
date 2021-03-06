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
    
    public function empresa()
    {
        return $this->belongsTo('App\Models\Admin\Empresa', 'empresa_id');
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
    
    public function oferta()
    {
        return $this->hasOne('App\Models\Admin\Productooferta', 'producto_id');
    }
    
    public function recomendar()
    {
        return $this->hasOne('App\Models\Admin\Productorecomendar', 'producto_id');
    }
    
    public function cesta()
    {
        return $this->hasOne('App\Models\Publico\Cesta', 'producto_id');
    }
    
    public function favorito()
    {
        return $this->hasOne('App\Models\Publico\Favorito', 'producto_id');
    }

    
}
