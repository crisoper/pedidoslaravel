<?php

namespace App\Http\Resources\Publico;

use App\Models\Admin\Empresa;
use App\Models\Publico\Horario;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductomodalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,           
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'precio' => $this->precio,
            'stock' => $this->stock,    
            'fotos' => ProductofotoResource::collection( $this->fotos ),

            'empresa_id' => $this->empresa ? $this->empresa->id : 0, 
            'empresa' => $this->empresa ? $this->empresa->nombre : '',
            
            'empresa_hora_inicio' => $this->empresa ? ( $this->empresa->horarios ? ($this->empresa->horarios->first()?$this->empresa->horarios->first()->horainicio:'') : '') : '',
            'empresa_hora_fin' => $this->empresa ? ( $this->empresa->horarios ? ($this->empresa->horarios->first()? $this->empresa->horarios->first()->horafin:'') : '') : '',

            $horainicio = $this->empresa ? ( $this->empresa->horarios ?($this->empresa->horarios->first()?$this->empresa->horarios->first()->horainicio:'') : '') : '',
            $horafin =  $this->empresa ? ( $this->empresa->horarios ? ($this->empresa->horarios->first()? $this->empresa->horarios->first()->horafin:'')  : '') : '',
            'horario_atencion' => Horario::select('dia', 'horainicio', 'horafin')->where('empresa_id', $this->empresa->id )->get(),
            'puedehacerpedido' => $this->validaRangoHorario($horainicio, $horafin ),


           
        ];

        
    }
    public function validaRangoHorario( $horainicio, $horafin){

        $horaactual  = date('H:i');       
        $h_inicio =  date("H:i", strtotime( substr( $horainicio, 0,-3)));
        $h_fin = date("H:i", strtotime( substr( $horafin, 0,-3)));

        if( $h_inicio <= $horaactual && $horafin >=  $h_fin ){
            return "si";
        }
        return "no";
    }
}
