<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistarController extends Controller
{
    public function store(StoreUserRequest $request) {

        User::create([
            'email' => $request->email,
            'razaosocial' => $request->razaosocial,
            'senha' => Hash::make($request->senha)
        ]);

        return response()->json(['message' => "Cadastro efetuado com sucesso"], 200);
    }
}
