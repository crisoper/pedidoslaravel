<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Productotag extends Model
{
    public $timestamps = false;

    protected $fillable=[
        'producto_id',
        'tag_id',
    ];
}
