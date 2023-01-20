<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class IsTokenValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();
        $login = $request->header('login');

        if (!$token) {
            return response()->json([
                'success' => false,
                'message' => 'Token not provided',
            ]);
        }
        
        if (!$this->isValidToken($token, $login)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid token or login',
            ]);
        }

        return $next($request);
    }

    private function isValidToken(string $token, string $login)
    {
        $user = User::where('email', $login)->first();
        
        if (!$user || $user->token != $token) return false;

        return true;
    }
}
