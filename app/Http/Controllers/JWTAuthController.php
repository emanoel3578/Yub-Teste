<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\LoginUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class JWTAuthController extends Controller
{
    /**
     * Criar novo controlador para autenticar API Calls
     * 
     * @return void
     */
    public function __construct() 
    {
        // $this->middleware("auth:api", ['expect' => ['login', 'registrar']]);
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
            'password' => bcrypt($request->password)
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

        $credentials = $request->only(['email', 'password']);

        try {
            if (! $token = Auth::attempt($credentials)) {

                return response()->json(['error' => 'Credenciais inválidas'], 401);

            }
        } catch (JWTException $e) {

            return response()->json(['error' => 'Não foi possivel verificar suas credenciais, por favor contate o suporte'], 400);
        }

        $expiratedTime = Auth::factory()->getTTL() * 60;
        return response()->json(['status'  => 'sucesso', 'token' => $token, 'expira em' => (string)$expiratedTime.'s']);
    }

    /**
     * Retornar Todos os dados sobre o usuario logado no request
     * 
     * return \Illuminate\Http\JsonResponse
     */
    public function dadosUser ()
    {
        return response()->json(['Dados' => Auth::user()]);
    }
}
