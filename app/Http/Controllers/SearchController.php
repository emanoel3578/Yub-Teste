<?php

namespace App\Http\Controllers;
use App\Models\Cadastro;
use App\Http\Requests\SearchProdutoRequest;
use Exception;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function search(SearchProdutoRequest $request)
    {
        try{

            $search = Cadastro::where('nome', 'LIKE', '%'.$request->nome.'%')
            ->where('dono', '=', Auth::user()->email)
            ->get();
            
            if($search->count() == 0) {
                return response()->json(['error' => 'Items não encontrados para o nome procurado'], 404);
            }

            return response()->json(['status' => 'Sucesso', 'mensagem' => 'Item encontrado com sucesso', 'Resultado' => $search], 200);

        }catch (Exception $e) {
            return response()->json([
                'Status' => 'Error',
                'Mensagem' => 'Não foi possivel verificar suas credenciais, por favor contate o suporte',
            ],500);
        }

        
    }
}
