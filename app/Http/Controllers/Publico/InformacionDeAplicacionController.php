<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InformacionDeAplicacionController extends Controller
{
    public function nosotros()
    {
        return view("publico.informaciondeapp.nosotros");
    }
}
