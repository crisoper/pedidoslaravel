<?php

namespace App\Http\Requests\Admin\Menus;

use Illuminate\Foundation\Http\FormRequest;

class MenuCreateRequest extends FormRequest
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
            'tipo' => ['required'],
            'nombre' => ['required'],
            'url' => ['required_unless:tipo,agrupador'],
            'orden' => ['required', 'numeric'],
            'tooltip' => ['required'],
        ];
    }
}
