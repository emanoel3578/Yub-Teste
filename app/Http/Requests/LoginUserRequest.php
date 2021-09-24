<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\BaseFormRequest;

class StoreUserRequest extends BaseFormRequest
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
            'email' => 'required|email|max:50',
            'senha' => 'required|max:50|min:6',
        ];
    }

    /**
     * Mensagems referente a validação dos dados
     * @return array
     */

    public function messages()
    {
        return [
            'email.required' => 'Email é obrigatório!',
            'email.max' => 'A razão social tem um limite de 50 characters, por favor digite novamente',
            'senha.required' => 'Senha é obrigatório!',
            'senha.max' => 'A senha tem um limite de 50 characters, por favor digite novamente uma nova senha',
            'senha.min' => 'A senha precisa ter no minimo 6 characters'
        ];
    }

    /**
     *  Filters to be applied to the input.
     *
     * @return array
     */
    public function filters()
    {
        return [
            'email' => 'trim|escape',
        ];
    }
}
