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
        'location_id',
        'drone_id',
        'plan_id'
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
       ]);

       $maps = self::updateOrCreate(['id' => $id],$maps);
       return $maps;
    }

     // Relation to plan
     public function plan()
     {
         return $this->belongsTo(Plan::class);
     }

       // Relation to drone
       public function drone()
       {
           return $this->belongsTo(Drone::class);
       }

    // Relation to location
     public function location()
     {
         return $this->belongsTo(Location::class);
     }

       // Relation to farm
    public function farms():HasMany{
        return $this->hasMany(Farm::class);
    }
}
