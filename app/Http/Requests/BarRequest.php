<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest; //de Form request podria coger los mensajes de error automatizados y cambiarlos

class BarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {//validaciones creadas por mi
        return [
            'name'=>'required|min:3',
            'description'=>'required|max:250',
        ];
    }
}
