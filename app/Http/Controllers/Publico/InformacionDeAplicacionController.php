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

    public function contactanos()
    {
            return view("publico.informaciondeapp.contactanos");
    }

    public function quienessomos()
    {
            return view("publico.informaciondeapp.quienessomos");
    }
    public function terminosycondiciones()
    {
            return view("publico.informaciondeapp.terminosycondiciones");
    }
    public function terminosycondiciones_empresa()
    {
            return view("publico.informaciondeapp.terminosycondiciones_empresa");
    }
    public function terminosycondiciones_consumidor()
    {
            return view("publico.informaciondeapp.terminosycondiciones_empresa");
    }


}
