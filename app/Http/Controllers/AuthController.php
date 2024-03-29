<?php

namespace App\Http\Controllers;

use App\Model\Usuario;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function me(){
        
        return Auth()->user()->id;
    }
    public function register(Request $request)
    {
        $user = Usuario::create([
            'name'=> $request->input("name"),
            'email'=> $request->input("email"),
            'password'=> $request->input("password"),
            'email_verified_at' => now(),
         ]);
        $token = auth()->login($user);
        return $this->respondWithToken($token);
    }

    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        return $this->respondWithToken($token);
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth()->factory()->getTTL() * 60
        ]);
    }
}
