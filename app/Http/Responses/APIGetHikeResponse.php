<?php

namespace App\Http\Responses;
use Illuminate\Http\Request;

class APIGetHikeResponse
{
    public function toResponse(Request $request)
    {
        return response()->json([
            'message' => 'Hikes retrieved Successfully',
        ], 200);
    }
}
