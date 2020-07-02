<?php

namespace App\Http\Resources\Publico;

use Illuminate\Http\Resources\Json\JsonResource;

class EmpresaResource extends JsonResource
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
            'nombre' => $this->nombre,
            'logo' => url("/").'/storage/empresaslogos/'.$this->logo,
            'direccion' => $this->direccion,
            'paginaweb' => $this->paginaweb,
            'nombrecomercial' => $this->nombrecomercial,
            'empresa_url' => $this->id ? url("/").'/locales/'.$this->id : '',
            
            'rubro_id' => $this->rubro ? $this->rubro->id : 0, 
            'rubro' => $this->rubro ? $this->rubro->nombre : '',
            
            'provincia_id' => $this->provincia ? $this->provincia->id : 0, 
            'provincia' => $this->provincia ? $this->provincia->nombre : '',
            
            'distrito_id' => $this->distrito ? $this->distrito->id : 0, 
            'distrito' => $this->distrito ? $this->distrito->nombre : '',
            
            'departamentoid_id' => $this->departamentoid ? $this->departamentoid->id : 0, 
            'departamentoid' => $this->departamentoid ? $this->departamentoid->nombre : '',
        ];
    }
}
