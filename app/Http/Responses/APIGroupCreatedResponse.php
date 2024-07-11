<?php

namespace App\Http\Responses;

class APIGroupCreatedResponse
{
    public function toResponse($request)
    {
        return response()->json([
            'message' => 'Successfully created a new group',
        ], 201);
    }
}
