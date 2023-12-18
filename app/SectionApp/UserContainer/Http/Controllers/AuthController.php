<?php

declare(strict_types=1);

namespace App\SectionApp\UserContainer\Http\Controllers;

use App\SectionApp\UserContainer\Values\CreateUserValue;
use App\SectionApp\UserContainer\Values\UserCredentialValue;
use App\Ship\Exceptions\InvalidUserCredentialException;
use App\Ship\Http\Controllers\BaseController;
use App\Ship\Library\JWTService;
use App\Ship\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

/**
 * Class AuthController
 *
 * This class responsible for handling requests related to authentication user
 */
class AuthController extends BaseController
{
    /**
     * Login by using credentials.
     */
    public function login(
        UserCredentialValue $credential,
        JWTService $jwtService
    ): JsonResponse {
        // TODO: refactor code to porto design pattern
        $user = User::where('email', $credential->email)->first();

        if (is_null($user) || ! Hash::check($credential->password, $user->password)) {
            throw new InvalidUserCredentialException();
        }

        return $this->responseSuccess([
            'access_token' => $jwtService->createToken($user->email),
            'expires_in' => config('jwt.timeout'),
            'token_type' => 'Bearer',
        ]);
    }

    /**
     * Register a new user.
     */
    public function register(
        CreateUserValue $user,
    ): JsonResponse {
        // TODO: refactor code to porto design pattern
        $newUser = [
            'name' => $user->name,
            'email' => $user->email,
            'password' => Hash::make($user->password),
        ];

        User::create($newUser);

        return $this->responseSuccess();
    }
}
