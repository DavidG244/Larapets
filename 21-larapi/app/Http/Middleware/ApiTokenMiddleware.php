<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class ApiTokenMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $header = $request->header('Authorization', '');

        if (!preg_match('/^Bearer\s+(.+)$/i', $header, $matches)) {
            return response()->json(['message' => 'Unauthenticated. Token not provided'], 401);
        }

        $token = $matches[1];
        $hashed = hash('sha256', $token);

        $user = User::where('api_token', $hashed)->first();
        if (!$user) {
            return response()->json(['message' => 'Unauthenticated. Invalid token'], 401);
        }

        auth()->setUser($user);

        return $next($request);
    }
}
