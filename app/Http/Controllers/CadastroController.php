<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastroProductRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Cadastro;
use Exception;

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
        try {

            if(!$emailDono = Auth::user()->email) {
                return response()->json(['error' => 'Não foi possivel achar o email do usuario autenticado']);
            }
            
            $novoCadastro = Cadastro::create([
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

        }catch(Exception $e) {
            return response()->json([
                "Status" => "Error",
                "Mensagem" => "Por favor verifique o seu Token, caso o problema persista gere um novo Token e altere os dados da requisição"
            ], 404);
        }
        
    }
}
