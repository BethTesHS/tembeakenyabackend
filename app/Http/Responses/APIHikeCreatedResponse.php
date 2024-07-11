<?php

namespace App\Http\Responses;

class APIHikeCreatedResponse
{
    public function toResponse($request)
    {
        return response()->json([
            'message' => 'Hike created successfully',
        ], 201);
    }
}
