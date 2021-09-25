<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastroProductRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Cadastro;

class CadastroController extends Controller
{
    /**
     * Cadastrar novo produto no banco de dados
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CadastroProductRequest $request)
    {
        // If para debugging provavelmete, redudante no codigo final
        if(!$emailDono = Auth::user()->email) {
            return response()->json(['error' => 'Não foi possivel achar o email do usuario autenticado']);
        }



        return response()->json([
            'Status' => 'Sucesso', 
            'Empresa responsável' => Auth::user()->razaosocial,
            'Email da empresa' => Auth::user()->email,
            'Nome do produto' => $request->nome,
            'Marca do produto' => $request->marca,
            'Quantidade do produto' => $request->quantidade,
        ]);
    }
}
