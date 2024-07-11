<?php
// File: app/Http/Responses/CustomLogoutResponse.php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LogoutResponse as LogoutResponseContract;

class APILogoutResponse implements LogoutResponseContract
{
    public function toResponse($request)
    {
        return response()->json([
            'message' => 'Logged out successfully.'
        ], 204);
    }
}
