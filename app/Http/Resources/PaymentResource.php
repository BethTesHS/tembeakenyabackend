<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request) : array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'group_hike_id' => $this->group_hike_id,
            'payment_status' => $this->payment_status,
            'user' => new UserResource($this->whenLoaded('user')),
            'group_hike' => new GroupHikeResource($this->whenLoaded('group_hike')),
        ];
    }
}
