<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BadCredentialsIncorrectException extends Exception
{
    /**
     * Render the exception into an HTTP response.
     */
    public function render(Request $request): Response
    {
        return response([
            'code' => 'BAD_CREDENTIALS_INCORRECT',
            'status' => 403,
        ], 403);
    }
}
