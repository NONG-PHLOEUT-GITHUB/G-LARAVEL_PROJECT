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
            'location_id',
            'drone_id',
       ]);

       $maps = self::updateOrCreate(['id' => $id],$maps);
       return $maps;
    }

    public function drones():HasMany{
        return $this->hasMany(Dronet::class);
    }

    public function farms():HasMany{
        return $this->hasMany(Farm::class);
    }

    public function plan(){
        return $this->belongsTo(Plan::class);
    }

    public function locations(){
        return $this->belongsTo(Location::class);
    }
}
