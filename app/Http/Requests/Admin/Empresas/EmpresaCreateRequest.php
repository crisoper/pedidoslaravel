<?php

namespace App\Http\Requests\Admin\Empresas;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaCreateRequest extends FormRequest
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
            "rubro_id" => ["required"],
            "ruc" => ["required", 'max:11'],
            "nombre" => ["required"],
            "direccion" => ["required"],
            "paginaweb" => ["nullable"],
            'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ];
    }
}
