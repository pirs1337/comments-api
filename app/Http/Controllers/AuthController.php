<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\LoginRequest;
use App\Http\Resources\LoginResource;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

final class AuthController extends Controller
{
    public function login(LoginRequest $request, UserRepository $repository): LoginResource
    {
        $user = $repository->findByEmail($request->input('email'));

        if (is_null($user) || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return new LoginResource(
            token: $user->createToken('api')->plainTextToken,
            user: $user,
        );
    }
}
