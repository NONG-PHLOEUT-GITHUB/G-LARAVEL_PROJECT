<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DroneResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'drone_name' => $this->drone_name,
            'drone_type' => $this->drone_type,
            'battery' => $this->battery,
            'playload_capacity' => $this->playload_capacity,
            'plan_id' => $this->plan_id,
            'user_id' => $this->user_id,
        ];
    }
}
