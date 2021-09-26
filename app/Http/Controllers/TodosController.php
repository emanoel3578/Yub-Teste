<?php

namespace App\Http\Controllers;

use App\Models\Cadastro;
use Exception;
use Illuminate\Support\Facades\Auth;

class TodosController extends Controller
{
    public function index(){
        $dados = Cadastro::where('dono', "=", Auth::user()->email)->get();

        try {

            if($dados->count() > 1) {
                return response()->json([
                    "Status" => "Sucesso",
                    "Mensagem" => "Dados encontrados com sucesso",
                    "ID da empresa" => Auth::user()->id,
                    "Email da empresa" => Auth::user()->email,
                    "Produtos" => Cadastro::where('dono', "=", Auth::user()->email)->get(),
                ], 201);
            }else {
                return response()->json([
                    "Status" => "Não encontrado",
                    "Mensagem" => "Nenhum produto ainda adicionado para sua empresa",
                ], 404);
            }

        }catch (Exception $e) {
            return response()->json([
                'Status' => 'Error',
                'Mensagem' => 'Não foi possivel verificar suas credenciais, por favor contate o suporte',
            ],500);
        }

        
    }
}
