<?php

namespace App\Http\Resources\Publico;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'categoria' => new CategoriaResource( $this->categoria ),
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'precio' => $this->precio,
            'stock' => $this->stock,
            'created_at' => date('d-m-Y', strtotime($this->created_at)),
            'tags' => $this->tags,
            'encarrito' => $this->encarrito,
            'enlistadeseos' => $this->enlistadeseos,
            'nuevo' => $this->created_at >= Carbon::now()->subDays( 7 ) ? "Si" : "No",
            'fotos' => ProductofotoResource::collection( $this->fotos ),

            // 'oferta' => ProductoofertaResource::collection( $this->oferta ),
            
            'empresa_id' => $this->empresa ? $this->empresa->id : 0, 
            'empresa' => $this->empresa ? $this->empresa->nombre : '',
            'empresa_url' => $this->empresa ? url("/").'/locales/'.$this->empresa->id : '',
            
            'recomendar_id' => $this->recomendar ? $this->recomendar->id : 0, 
            'recomendar' => $this->recomendar ? $this->recomendar->recomendar : '',
            'recomendar_diainicio' => $this->recomendar ? $this->recomendar->diainicio : '',
            'recomendar_diafin' => $this->recomendar ? $this->recomendar->diafin : '',

            'oferta_id' => $this->oferta ? $this->oferta->id : 0, 
            'oferta' => $this->oferta ? $this->oferta->preciooferta : '',
            'oferta_diainicio' => $this->oferta ? $this->oferta->diainicio : '',
            'oferta_diafin' => $this->oferta ? $this->oferta->diafin : '',
            

            'diaactual' => date('d-m-Y'),
        ];
    }
}
