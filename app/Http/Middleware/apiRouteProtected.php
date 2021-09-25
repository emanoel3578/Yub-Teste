<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class apiRouteProtected extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        try {

            $user = JWTAuth::parseToken()->authenticate();

        } catch (TokenExpiredException $e) {

            return response()->json(['error' => 'Token expirado'], 401);

        } catch (TokenInvalidException $e) {

            return response()->json([ 'error' => 'Token Inválido'], 401);

        } catch (JWTException $e) {

            return response()->json(['error' => 'Token não encontrado na requisição, por favor verifique os dados enviados'], 404);
        }

        return $next($request);
    }
}
