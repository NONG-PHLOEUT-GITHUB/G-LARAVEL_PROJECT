<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'phone_number'=>$this->phone_number ?? null,
            'farms'=>$this->farms,
            'drones'=>$this->drones,
            'plans'=>$this->plans,
        ];

    }
}
