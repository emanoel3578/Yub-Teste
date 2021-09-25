<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstoqueRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Estoque;
use Illuminate\Http\Request;

class EstoqueController extends Controller
{
    public function store(EstoqueRequest $request)
    {
    
        if(!$emailDono = Auth::user()->email) {
            return response()->json(['error' => 'Não foi possivel achar o email do usuario autenticado']);
        }
        
        $novoEstoque = Estoque::create([
            'dono' => $emailDono,
            'nome' => $request -> nome,
            'marca' => $request -> marca,
            'quantidade' => $request -> quantidade,
        ]);

        return response()->json([
            'Status' => 'Sucesso', 
            'Empresa responsável' => Auth::user()->razaosocial,
            'Email da empresa' => Auth::user()->email,
            'Nome do produto' => $request->nome,
            'Marca do produto' => $request->marca,
            'Quantidade do produto' => $request->quantidade,
        ], 201);
    }
}
