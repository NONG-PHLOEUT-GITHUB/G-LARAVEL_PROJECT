<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'longitude',
        'latitude',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public static function store($request , $id = null){
       $locations = $request->only([
            'plan_name',
            'longitude',
            'latitude',
            'plan_description',
            'drone_id',
       ]);

       $locations = self::updateOrCreate(['id'=> $id],$locations);
       return $locations;
    }

    // Relation to map
    public function map():HasOne{
        return $this->hasOne(Map::class);
    }
}
