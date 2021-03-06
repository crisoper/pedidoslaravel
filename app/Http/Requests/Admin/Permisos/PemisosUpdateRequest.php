<?php

namespace App\Http\Requests\Admin\Permisos;

use Illuminate\Foundation\Http\FormRequest;

class PemisosUpdateRequest extends FormRequest
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
            'acciones' => ['required'],
            'name' => ['required', 'unique:permissions,name,'.$this->route('permission')],
        ];
    }
}
