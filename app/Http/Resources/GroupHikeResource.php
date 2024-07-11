<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GroupHikeResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'group_id' => $this->group_id,
            'hike_id' => $this->hike_id,
            'guide_id' => $this->guide_id,
            'hike_date' => $this->hike_date,
            'group' => new GroupResource($this->whenLoaded('group')),
            'hike' => new HikeResource($this->whenLoaded('hike')),
            'guide' => new UserResource($this->whenLoaded('guide')),
            'attendees' => GroupHikeAttendeeResource::collection($this->whenLoaded('attendees')),
        ];
    }
}
