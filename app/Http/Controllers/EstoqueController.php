<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstoqueRequest;
use App\Models\Cadastro;
use Illuminate\Support\Facades\Auth;
use App\Models\Estoque;
use Exception;
use Illuminate\Support\Carbon;

class EstoqueController extends Controller
{
    public function store(EstoqueRequest $request)
    {
    
        if(!$emailDono = Auth::user()->email) {
            return response()->json(['error' => 'Não foi possivel achar o email do usuario autenticado']);
        }

        // Check if product exists
        $cadastroQuery = Cadastro::find($request->id);
        try
        {
            if(!$cadastroQuery == null){
                    Estoque::create([
                    'produto_id' => $request->id,
                    'dono' => $emailDono,
                    'nomedaempresa' => Auth::user()->razaosocial,
                    'tipo' => $request -> tipo,
                    'quantidade' => $request -> quantidade,
                ]);
        
                return response()->json([
                    'Status' => 'Sucesso',
                    'Empresa responsável' => Auth::user()->razaosocial,
                    'Email da empresa' => $emailDono,
                    'Tipo' => $request->tipo,
                    'ID do produto' => $request->id,
                    'Nome do produto' => $cadastroQuery->nome,
                    'Quantidade do produto' => $request->quantidade,
                    'Criado em' => Carbon::now()->format('d/m/Y H:i')
                ], 201);
            }else {
                return response()->json([
                    'Status' => 'Não encontrado',
                    'Mensagem' => 'O produto com o id informado não foi encontrado no seu registro, verifique o valor do ID'
                ], 404);
            }
        }catch (Exception $e) {
            return response()->json([
                "Status" => "Por favor verifique o seu Token, caso o problema persista gere um novo Token e altere os dados da requisição"
            ]);
        }
    }
}
