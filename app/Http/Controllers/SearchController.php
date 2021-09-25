<?php

namespace App\Http\Controllers;
use App\Models\Cadastro;
use App\Http\Requests\SearchProdutoRequest;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(SearchProdutoRequest $request)
    {
        $search = Cadastro::where('nome', 'LIKE', '%'.$request->nome.'%')->get();
        
        if($search->count() == 0) {
            return response()->json(['error' => 'Items não encontrados para o nome procurado'], 404);
        }

        return response()->json(['status' => 'Sucesso', 'mensagem' => 'Item encontrado com sucesso', 'Resultado' => $search], 200);
    }
}
