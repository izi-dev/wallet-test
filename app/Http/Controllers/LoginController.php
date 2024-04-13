<?php

namespace App\Http\Controllers;

use App\Exceptions\BadCredentialsIncorrectException;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController
{
    /**
     * @throws BadCredentialsIncorrectException
     */
    public function __invoke(LoginRequest $request): array
    {
        $isAuth = Auth::attempt(
            $request->only(['email', 'password'])
        );

        if (! $isAuth) {
            throw new BadCredentialsIncorrectException;
        }

        return [
            'token' => $request->user()->createToken('Wallet'),
        ];
    }
}
