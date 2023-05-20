<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Map extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'area_type',
        'area',
        'description',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public static function store($request , $id = null){
       $maps = $request->only([
            'name',
            'area_type',
            'area',
            'description',
       ]);

       $maps = self::updateOrCreate(['id' => $id],$maps);
       return $maps;
    }

  

       // Relation to drone
    public function drones():HasMany
    {
        return $this->hasMany(Drone::class);
    }

    // Relation to location
    public function locations():HasMany
    {
        return $this->hasMany(Location::class);
    }

       // Relation to farm
    public function farms():HasMany
    {
        return $this->hasMany(Farm::class);
    } 
      
    // Relation to plan
    public function plans():HasMany
    {
         return $this->hasMany(Plan::class);
    }
}
