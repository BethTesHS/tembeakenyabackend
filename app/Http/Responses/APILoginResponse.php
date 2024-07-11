<?php
// File: app/Http/Responses/CustomLoginResponse.php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class APILoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        return response()->json([
            'two_factor' => false,
            'message' => 'Logged in successfully.',
            'user' => $request->user(),
            'token' => session('login_token'), // Retrieve the token from the session
        ], 200);
    }
}
