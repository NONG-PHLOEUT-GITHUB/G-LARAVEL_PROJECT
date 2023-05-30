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
            'image' => $this->image,
            'description' => $this->description,
            'capture_by_drone' => $this->drone_id,
            'location' =>new LocationRescource($this->location),
            'farms' =>FarmResource::collection($this->farms),
            'drone' =>new DroneResource($this->drone),
        ];
    }
}
