<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductosCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           
            'categoriasId'=>['required'],
            'nombre'=>['required'],
            'descripcion'=>['required'],
            'precio'=>['required'],
            'stock'=>['required'],
            'codigo' =>['required'],
            'fotoproducto'=>['required'],
        ];
    }
    public function messages()
    {
        return [
            
            'fotoproducto.required_without'  => 'El campo imagen es obligatorio',
           
        ];
    }
}
