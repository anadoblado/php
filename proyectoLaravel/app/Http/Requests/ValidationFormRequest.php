<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationFormRequest extends FormRequest
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
            'nombre'=>'min:15|required',
            'descripcion'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required'=>'Error, el campo es obligatorio',
            'nombre.min:15'=>'Mínimo 15',
            'descripcion.required'=>'Descripción obligatoria'
        ];
    }
}
