<?php

declare(strict_types=1);
namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthService {
    
    public function register(array $data):array 
    {
        $user = User::create($data);

        // Creamos el perfil vacío al registrarse para garantizar
        // que siempre exista la relación profile en el usuario
        $user->profile()->create();

        $token = $user->createToken('auth_token')->plainTextToken;

        return compact('user','token');
    }

    public function login(array $data):?array
    {
        // Auth::attempt verifica credenciales y establece la sesión
        if(!Auth::attempt($data))
        {
            return null;
        }

        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;
        return compact('user','token');
    }

    public function  logout(Request $request):void 
    {
        // Eliminamos solo el token actual, no todos los del usuario
        // Esto permite tener sesiones activas en otros dispositivos
        $request->user()->currentAccessToken()->delete();
    }

}