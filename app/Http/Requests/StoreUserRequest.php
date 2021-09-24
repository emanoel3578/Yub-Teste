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
            'razaosocial' => 'required|string|unique:users|max:50',
            'email' => 'required|email|unique:users|max:50',
            'senha' => 'required|max:50',
        ];
    }

    /**
     * Mensagems referente a validação dos dados
     * @return array
     */

    public function messages()
    {
        return [
            'razaosocial.required' => 'A razão social é obrigatório!',
            'razaosocial.unique' => 'Está razão social já está cadastrada',
            'razaosocial.max' => 'A razão social tem um limite de 50 characters, por favor digite novamente',
            'email.required' => 'Email é obrigatório!',
            'email.max' => 'A razão social tem um limite de 50 characters, por favor digite novamente',
            'email.unique' => 'Esse Email já está cadastrado',
            'senha.required' => 'Senha é obrigatório!',
            'senha.max' => 'A senha tem um limite de 50 characters, por favor digite novamente uma nova senha',
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
            'razaosocial' => 'capitalize|escape',
            'created_at' => 'format_date:"m/d/Y", "F j, Y"',
            'updated_at' => 'format_date:"m/d/Y"'
        ];
    }
}
