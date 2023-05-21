<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowMapRescource extends JsonResource
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
            'plans' =>PlanResource::collection($this->plans),
            'locations' =>LocationRescource::collection($this->locations),
            'farms' =>FarmResource::collection($this->farms),
            'drones' =>DroneResource::collection($this->drones),
        ];
    }
}
