<?php

namespace App\Http\Resources;

use App\Http\Controllers\FarmController;
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
            'farm_name'=>$this->farm_name,
            'description'=>$this->description,
            'create_by_id'=>$this->user_id,
            'map_id'=>$this->map_id,
            'user'=>$this->user,
            'map'=>$this->map,
        ];
    }
}
