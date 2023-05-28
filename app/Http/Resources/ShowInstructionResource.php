<?php

namespace App\Http\Resources;

use App\Http\Requests\InstructionRequest;
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
            'take_off'=>$this->take_off,
            'landing'=>$this->landing,
            'return_back'=>$this->return_back,
            'recharge'=>$this->recharge,
            'drone_id'=>$this->drone_id,
            'plan_id'=>$this->plan_id,
            'plan' => new PlanResource($this->plan),
            'drone' =>new DroneResource($this->drone),
        ];
    }
}
