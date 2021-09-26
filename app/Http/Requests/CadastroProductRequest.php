<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseFormRequest;

class CadastroProductRequest extends BaseFormRequest
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
            'nome' => 'required|string|unique:cadastros|max:100|min:2',
            'marca' => 'required|string|max:100|min:2',
            'quantidade' => 'required|integer|min:1'
        ];
    }

    /**
     * Error messages
     * 
     * @return array
     */
    public function messages()
    {
        return [
            'nome.required' => "O campo 'nome' está vazio, por favor insira um valor válido",
            'nome.unique' => "O campo 'nome' já está cadastrado, por favor insira um valor válido",
            'nome.max' => "O campo 'nome' passou do limite de 100 characters",
            'nome.min' => "O campo 'nome' precisa de no minimo 4 characters",
            'marca.required' => "O campo 'marca' está vazio, por favor insira um valor válido",
            'marca.max' => "O campo 'marca' passou do limite de 100 characters",
            'marca.min' => "O campo 'marca' precisa de no minimo 4 characters",
            'quantidade.required' => "O campo 'quantidade' está vazio, por favor insira um valor válido",
            'quantidade.integer' => "O campo 'quantidade' precisa de um valor numérico válido, por favor tente novamente",
            'quantidade.min' => "o campo 'quantidade' precisa de no minimo o valor 1, por favor altere o valor inserido",
        ];
    }

    /**
     * Filtros para sanitização dos inputs usando Pacote Sanitizer/Wavi
     * 
     * @return array
     */
    public function filters()
    {
        return [
            'nome' => 'capitalize|escape|strip_tags|cast:string', // ? Poderia fazer usar Trim ?
            'marca' => 'capitalize|escape|strip_tags|cast:string', // ? Poderia fazer usar Trim  ?
            'quantidade' => 'escape|strip_tags|cast:integer',
        ];
    }
}
