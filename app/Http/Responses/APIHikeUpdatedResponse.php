<?php

namespace App\Http\Responses;
use Illuminate\Http\Request;

class APIHikeUpdatedResponse
{
    public function toResponse(Request $request)
    {
        return response()->json([
            'message' => 'Hike updated successfully',
        ], 200);
    }
}
