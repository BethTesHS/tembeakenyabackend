<?php

namespace App\Http\Resources;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GroupResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'guide_id' => $this->guide_id,
            'image_id' => $this->image_id,
            'guide' => new UserResource($this->whenLoaded('guide')),
            'members' => UserResource::collection($this->whenLoaded('members')),
            'group-hikes' => GroupHikeResource::collection($this->whenLoaded('groupHikes')),
        ];
    }
}
