<?php

namespace App\Http\Resources\Publico;

use Illuminate\Http\Resources\Json\JsonResource;

class ListadeseoResource extends JsonResource
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
            'producto' => new ProductoResource( $this->producto ),
            'tipo' => $this->tipo,
            'stock' => $this->stock,
            'fecha' => $this->created_at != null ? date("d/m/Y", strtotime($this->created_at) ) : '',
        ];
    }
}
