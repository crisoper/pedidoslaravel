<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductorecomendarResource extends JsonResource
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
            // 'created_at' => date('d-m-Y', strtotime($this->created_at)),
            // 'tags' => $this->tags,

            // 'oferta' => ProductoofertaResource::collection( $this->oferta ),
            
            'empresa_id' => $this->empresa ? $this->empresa->id : 0, 
            'empresa' => $this->empresa ? $this->empresa->nombre : '',
            
            'recomendar_id' => $this->recomendar ? $this->recomendar->id : 0, 
            'recomendar' => $this->recomendar ? $this->recomendar->recomendar : '',
            'recomendar_diainicio' => $this->recomendar ? $this->recomendar->diainicio : '',
            'recomendar_diafin' => $this->recomendar ? $this->recomendar->diafin : '',
            
            'diaactual' => date('Y-m-d'),
        ];
    }
}
