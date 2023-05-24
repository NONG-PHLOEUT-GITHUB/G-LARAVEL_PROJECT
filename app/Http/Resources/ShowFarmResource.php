<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowFarmResource extends JsonResource
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
            'farm_name'=>$this->name,
            'description'=>$this->description,
            'user_id'=>$this->user,
            'map_id'=>$this->map,
        ];
    }
}
