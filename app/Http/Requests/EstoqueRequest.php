<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseFormRequest;

class EstoqueRequest extends BaseFormRequest
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
            'tipo' => ['required', 'regex:/^(entrada|saida)/i', 'min:5', 'max:7'],
            'quantidade' => 'required|integer|min:1',
            'id' => 'required|integer|min:1'
        ];
    }

    /**
     * Retorno as mensagems de error para validação
     * 
     * @return array
     */
    public function messages()
    {
        return [
            'tipo.required' => "O campo 'tipo' está vazio, por favor insira um valor válido",
            'tipo.regex' => "O valor inserido no campo tipo, precisa ser 'Entrada' ou 'Saida' !",
            'tipo.min' => "O campo 'tipo' precisa de pelo menos 5 characteres",
            'tipo.max' => "O campo 'tipo' aceita ao máximo 7 characteres",
            'id.required' => "O campo 'id' está vazio, por favor insira um valor válido",
            'id.integer' => "O valor inserido no campo 'id' precisa ser numerico, verifique novamente",
            'id.min' => "O campo 'id' precisa de ser um numero válido e maior que 1",
            'quantidade.required' => "O campo 'quantidade' está vazio, por favor insira um valor válido",
            'quantidade.integer' => "O campo 'quantidade' precisa ser um numero válido",
            'quantidade.min' => "O campo 'quantidade' precisa de ser um numero válido e maior que 1"
        ];
    }

    /**
     * Filtros para sanitização
     * 
     * @return array
     */
    public function filters()
    {
        return [
            'tipo' => 'trim|capitalize|escape|strip_tags',
            'quantidade' => 'cast:integer|escape|strip_tags',
            'id' => 'cast:integer|escape|strip_tags'
        ];
    }
}
