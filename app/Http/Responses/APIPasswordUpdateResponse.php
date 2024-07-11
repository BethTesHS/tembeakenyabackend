<?php

namespace App\Http\Responses;
use Laravel\Fortify\Contracts\PasswordUpdateResponse;


class APIPasswordUpdateResponse implements PasswordUpdateResponse
{
    public function toResponse($request)
    {
        return response()->json([
            'message' => 'Password updated successfully.',
            'user' => $request->user(),
            ], 200);
    }
}
