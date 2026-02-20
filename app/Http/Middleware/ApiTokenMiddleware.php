<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class ApiTokenMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();
        
        if (!$token) {
            return response()->json(['message' => 'Token not provided'], 401);
        }
        
        $user = User::where('api_token', hash('sha256', $token))->first();
        
        if (!$user) {
            return response()->json(['message' => 'Invalid token'], 401);
        }
        
        auth()->setUser($user);
        
        return $next($request);
    }
}
