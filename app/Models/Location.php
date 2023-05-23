<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'longitude',
        'latitude',
        'drone_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public static function store($request , $id = null){

       $locations = $request->only([
            'name',
            'longitude',
            'latitude',
            'drone_id',
       ]);

       $locations = self::updateOrCreate(['id'=> $id],$locations);
       return $locations;
    }

    // Relation to map
    public function map(){
        return $this->hasOne(Map::class);
    }

    // Relation to drone
    public function drone(){
        return $this->belongsTo(Drone::class);
    }
  
}
