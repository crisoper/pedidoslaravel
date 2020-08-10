<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductoofertaResource extends JsonResource
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
            
            'empresa_id' => $this->empresa ? $this->empresa->id : 0, 
            'empresa' => $this->empresa ? $this->empresa->nombre : '',
            
            'oferta_id' => $this->oferta ? $this->oferta->id : 0, 
            'oferta' => $this->oferta ? $this->oferta->preciooferta : '',
            'oferta_diainicio' => $this->oferta ? $this->oferta->diainicio : '',
            'oferta_diafin' => $this->oferta ? $this->oferta->diafin : '',
            
            'diaactual' => date('d-m-Y'),
        ];
    }
}
