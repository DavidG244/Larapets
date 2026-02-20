<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string']
        ]);
        
        $user = User::where('email', $request->email)->first();
        
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Credenciales inválidas'], 401);
        }
        
        // Generar token para el usuario
        $token = $this->generateToken();
        $user->api_token = hash('sha256', $token);
        $user->save();
        
        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'token_type' => 'Bearer',
            'user' => [
                'id' => $user->id,
                'email' => $user->email,
                'fullname' => $user->fullname,
                'photo' => $user->photo ?? 'no-image.png'
            ]
        ], 200);
    }
    
    public function logout(Request $request)
    {
        $user = auth()->user();
        
        if ($user) {
            $user->api_token = null;
            $user->save();
        }
        
        return response()->json(['message' => 'Logout successful'], 200);
    }
    
    public function me(Request $request)
    {
        $user = auth()->user();
        
        if (!$user) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }
        
        return response()->json([
            'user' => [
                'id' => $user->id,
                'email' => $user->email,
                'fullname' => $user->fullname,
                'photo' => $user->photo ?? 'no-image.png'
            ]
        ], 200);
    }
    
    private function generateToken()
    {
        return bin2hex(random_bytes(32));
    }
}
