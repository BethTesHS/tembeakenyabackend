<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'hike_id' => $this->hike_id,
            'review' => $this->review,
            'rating' => $this->rating,
            'user' => new UserResource($this->whenLoaded('user')),
            'hike' => new HikeResource($this->whenLoaded('hike')),
        ];
    }
}
