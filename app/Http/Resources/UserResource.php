<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'username' => $this->username,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'role_id' => $this->role_id,
            'image_id' => $this->image_id,
            'no_of_hikes' => $this->no_of_hikes,
            'total_distance_walked' => $this->total_distance_walked,
            'no_of_steps_taken' => $this->no_of_steps_taken,
            'followers_count' => $this->followers()->count(),
            'following_count' => $this->following()->count(),
            'groups' => GroupResource::collection($this->whenLoaded('groups')),
            'guideAdminsGroups' => GroupResource::collection($this->whenLoaded('guideAdminsGroups')),
            'hikes' => HikeResource::collection($this->whenLoaded('hikes')),
            'reviews' => ReviewResource::collection($this->whenLoaded('reviews')),
        ];
    }
}
