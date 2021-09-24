<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\LoginUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class JWTAuthController extends Controller
{
    /**
     * Criar novo controlador para autenticar API Calls
     * 
     * @return void
     */
    public function __construct() 
    {
        $this->middleware("auth:api", ['expect' => ['login', 'registrar']]);
    }


    /**
     * Registrar novo usuario
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function registrar(StoreUserRequest $request)
    {
        User::create([
            'email' => $request->email,
            'razaosocial' => $request->razaosocial,
            'senha' => Hash::make($request->senha)
        ]);

        return response()->json(['message' => "Cadastro efetuado com sucesso"], 201);
    }

    /**
     * Login de usuario já cadastrado
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginUserRequest $request)
    {
        $validated = $request->validated();

        if ($validated->fails()) {
            return response()->json($validated->errors(), 422);
        }

        if (! $token = Auth::attempt($validated->validated())) {
            return response()->json(['error' => 'Não autorizado'], 401);
        }

        return $this->createNewToken($token);
    }
}
