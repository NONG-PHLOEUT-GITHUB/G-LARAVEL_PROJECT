<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'longitude',
        'latitude',
        'plan_description',
        'map_id',
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
            'plan_description',
            'map_id',
       ]);

       $locations = self::updateOrCreate(['id'=> $id],$locations);
       return $locations;
    }
}
