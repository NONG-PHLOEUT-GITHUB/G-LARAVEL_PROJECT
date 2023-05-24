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

    public static function store($request, $id = null)
    {

        $locations = $request->only([
            'name',
            'longitude',
            'latitude',
            'drone_id',
        ]);

        if ($id) {
            $location = self::find($id);
            if (!$location) {
                return response()->json(['error' => 'Record not found'], 404);
            }
            $location->update($locations);
        } else {
            $location = self::create($locations);
            $id = $location->$id;
        }

        return response()->json(['success' => true, 'data' => $location], 200);
    }

    // Relation to map
    public function maps(){
        return $this->hasMany(Map::class);
    }
    public function drone(){
        return $this->belongsTo(Drone::class);
    }
  
}
