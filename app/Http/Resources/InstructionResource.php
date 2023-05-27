<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InstructionResource extends JsonResource
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
        ];
    }
}
