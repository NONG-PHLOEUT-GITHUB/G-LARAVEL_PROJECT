<?php

namespace App\Http\Resources;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowDroneRescource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'drone_name' => $this->drone_name,
            'drone_type' => $this->drone_type,
            'battery' => $this->battery,
            'playload_capacity' => $this->playload_capacity,
            'plan_id' => $this->plan_id,
            'user_id' =>new UserResource($this->user),
            'map' => new MapResource($this->map),
            'plan' => new PlanResource($this->plan),
            // 'location' => new LocationRescource($this->location),
        ];
    }
}
