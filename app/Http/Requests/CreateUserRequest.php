<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'cep' => 'required',
            'address' => 'required',
//            'channels.whatsapp' => 'required',
//            'channels.instagram' => 'sometimes|alpha',
//            'channels.facebook' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nome',
            'address' => 'Endereço',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'email' => 'O campo :attribute deve ser um email válido.',
            'email.unique' => 'Este :attribute já foi utilizado.',
        ];
    }
}
