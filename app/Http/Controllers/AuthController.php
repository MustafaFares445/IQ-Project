<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct(protected User $user)
    {

    }

    public function register(RegisterRequest $request): JsonResponse
    {
        $user = $this->user->findByPhone($request->get('phone'));

        if (!empty($user)){
            return $this->failedResponse(__('User already exists'));
        }

        $user = User::create($request->validated());
        return $this->successResponse(
            [
                'user' => UserResource::make($user),
                'token' => $user->createToken('user')->plainTextToken,
            ],
            message: __('register success')
        );
    }
    public function login(LoginRequest $request): JsonResponse
    {
        $user = $this->user->findByPhone($request->get('phone'));
        if (empty($user) || Hash::check($request->get('password'), $user->password) === false) {
            return $this->failedResponse(__('invalid credentials'));
        }

        $user->age = $request->get('age');
        $user->save();

        return $this->successResponse(
            [
                'user' => UserResource::make($user),
                'token' => $user->createToken('user')->plainTextToken,
            ],
            message: __('login success')
        );
    }

    public function logout(): JsonResponse
    {
        $user = Auth::guard('sanctum')->user();
        $user->currentAccessToken()->delete();

        return $this->successResponse(message: __('logout success'));
    }
}
