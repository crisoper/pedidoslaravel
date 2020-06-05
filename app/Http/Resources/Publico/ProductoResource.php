<?php

namespace App\Http\Resources\Publico;

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
            'tags' => $this->tags,
            'encarrito' => false,
            'enlistadeseos' => false,
            'fotos' => ProductofotoResource::collection( $this->fotos ),
        ];
    }
}
