<?php
declare(strict_types=1);
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\V1\UserResource;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    //Inyectamos el servicio via constructor para mantener el controller delgado
    public function __construct(private readonly AuthService $authService) {}

    public function register(RegisterRequest $request) :JsonResponse
    {
        $result = $this->authService->register($request->validated());

        return response()->json([
            'user' => UserResource::make($result['user']->load('profile')),
            'access_token' => $result['token'],
            'token_type' => 'Bearer',
        ],201);
    }



    public function login(LoginRequest $request): JsonResponse
    {
        $result = $this->authService->login($request->validated());

        if (!$result) {
            return response()->json([
                'message' => 'Credenciales incorrectas.',
            ], 401);
        }


        
        return response()->json([
            'user' => UserResource::make($result['user']->load('profile')),
            'access_token' => $result['token'],
            'token_type' => 'Bearer',
        ]);
        

    }


    public function logout(Request $request): JsonResponse
    {
        $this->authService->logout($request);

        return response()->json([
            'message' => 'Sesión cerrada correctamente.',
        ]);
    }


    public function me(): JsonResponse
    {
        return response()->json([
           'user'=> UserResource::make(Auth::user()->load('profile')),
        ]);
    }


}
