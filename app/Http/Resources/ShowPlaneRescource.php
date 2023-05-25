<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowPlaneRescource extends JsonResource
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
            'name'=> $this->plan_name,
            'date_time'=> $this->date_time,
            'date_time'=> $this->date_time,
            'spray_density'=> $this->spray_density,
            'plan_description' => $this->plan_description,
            'user_id' => $this->user_id,
            'user' => new UserResource($this->user),
            'drones' => DroneResource::collection($this->drones),
        ];
    }
}
