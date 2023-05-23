<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public static function store($request, $id = null)
    {

        $maps = $request->only([
            'name',
            'area_type',
            'area',
            'description',
        ]);

        if ($id) {
            $map = self::find($id);
            if (!$map) {
                return response()->json(['error' => 'Record not found'], 404);
            }
            $map->update($maps);
        } else {
            $map = self::create($maps);
            $id = $map->$id;
        }

        return response()->json(['success' => true, 'data' => $map], 200);
    }

  

       // Relation to drone
    public function drones():HasMany
    {
        return $this->hasMany(Drone::class);
    }

    // Relation to location
    public function location()
    {
        return $this->belongsTo(Location::class);
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
