<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductoofertasCreateRequest extends FormRequest
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
            
            'preciooferta' =>['required'],
            'diainicio' =>['required'],
            'horainicio' =>['required'],
            'diafin' =>['required'],
            'horafin' =>['required'],
            
        ];
    }
}
