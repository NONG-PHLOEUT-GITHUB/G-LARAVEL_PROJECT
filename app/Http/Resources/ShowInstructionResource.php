<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowInstructionResource extends JsonResource
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
            'tak_off'=>$this->tak_off,
            'landing'=>$this->landing,
            'return_back'=>$this->return_back,
            'recharnge'=>$this->recharnge,
            'drone_id'=>$this->drone,
            'plan_id'=>$this->plan,
            'plan' => new PlanResource($this->plan),
            'drone' =>new DroneResource($this->drone),
        ];
    }
}
