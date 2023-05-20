<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_name',
        'longitude',
        'latitude',
        'plan_description',
        'drone_id',
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
}
