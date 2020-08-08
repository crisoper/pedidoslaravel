<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Mail\Publico\ContactanosMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InformacionaplicacionController extends Controller
{
    public function nosotros()
    {
        return view("publico.informaciondeapp.nosotros");
    }

    public function contactate()
    {
        return view("publico.informaciondeapp.contactanos");
    }
    public function contactatecreate(Request $request)
    {
          

        try {
         
            Mail::to('pedidosapp.pe@gmail.com')->send( new  ContactanosMail( $request ) );
            return redirect()->route('inicio.index')->with('info', 'Tu mensaje se a enviado pronto nos comunicaremos contigo.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '¡Algo salio mal! tu mensaje no se ha enviado, vuelvelo a intentar.');
            
        }
        
        // echo "<script type='text/javascript'>alert('Tu mensaje se a enviado pronto nos comunicaremos contigo.')</script>";
      
      
      
    }

    public function quienessomos()
    {
            return view("publico.informaciondeapp.quienessomos");
    }
    public function terminosycondiciones()
    {
            return view("publico.informaciondeapp.terminosycondiciones");
    }
    
    public function politicasdeprivacidad()
    {
            return view("publico.informaciondeapp.politcasdeprivacidad");
    }
    public function preguntasfrecuentes()
    {
            return view("publico.informaciondeapp.preguntasfrecuentes");
    }
    
}
