<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseFormRequest;

class SearchProdutoRequest extends BaseFormRequest
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
            'nome' => 'required|max:100'
        ];
    }

    /**
     * Retornar e customizar as mensagems de error
     * 
     * @return array
     */
    public function messages()
    {
        return [
            'nome.required' => "O campo 'nome' não pode ser vazio, preencha novamente",
            'nome.max' => "O campo 'nome' tem mais de 100 characters, tente novamente",
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
            'nome' => 'capitalize|escape|strip_tags'
        ];
    }
}
