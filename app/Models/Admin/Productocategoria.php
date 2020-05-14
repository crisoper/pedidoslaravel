<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Productocategoria extends Model
{
    use  SoftDeletes;
    protected $dates =['deleted_at'];
}
