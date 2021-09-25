<?php

namespace App\Http\Controllers;

use App\Models\Cadastro;
use Illuminate\Support\Facades\Auth;

class TodosController extends Controller
{
    public function index(){
        return response()->json([
            "Status" => "Sucesso",
            "Mensagem" => "Dados encontrados com sucesso",
            "ID da empresa" => Auth::user()->id,
            "Email da empresa" => Auth::user()->email,
            "Produtos" => Cadastro::where('dono', "=", Auth::user()->email)->get(),
        ], 201);
    }
}
