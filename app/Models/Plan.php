<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
<<<<<<< HEAD
   
=======

    protected $fillable = [
        'plan_name',
        'date_time',
        'spray_density',
        'plan_description',
        'user_id',
        'map_id',
        'farm_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public static function store($request , $id = null){
       $plans = $request->only([
        'plan_name',
        'date_time',
        'spray_density',
        'plan_description',
        'user_id',
        'map_id',
        'farm_id',
       ]);

       $plans = self::updateOrCreate(['id', $id],$plans);
       return $plans;
    }

>>>>>>> d26ec0550adbb1876fc6a0dc62d3100e496a5507
}
