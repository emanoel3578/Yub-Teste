<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\LoginUserRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;
use Tymon\JWTAuth\Exceptions\JWTException;

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
        try{

            User::create([
                'email' => $request->email,
                'razaosocial' => $request->razaosocial,
                'password' => bcrypt($request->password)
            ],201);

        }catch (Exception $e) {

            return response()->json([
                'Status' => 'Error',
                'Mensagem' => 'Não foi possivel completar seu cadastro, por favor contate o suporte',
            ], 500);
        }

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
        return response()->json(['status'  => 'sucesso', 'token' => $token, 'expira em' => (string)$expiratedTime.'s'], 200);
    }

    /**
     * Retornar Todos os dados sobre o usuario logado no request
     * 
     * return \Illuminate\Http\JsonResponse
     */
    public function dadosUser ()
    {
        try {

            return response()->json([
                'Status' => 'Sucesso',
                'Dados' => Auth::user()
            ], 200);

        }catch (JWTException $e) {

            return response()->json([
                'Status' => 'Error',
                'Mensagem' => 'Não foi possivel verificar suas credenciais, por favor contate o suporte'
            ], 404);
        }
    }
}
