<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drone extends Model
{
    use HasFactory;
    protected $fillable = [
        'drone_type',
        'drone_name',
        'battery',
        'playload_capacity',
        'user_id',
        'plan_id',
    ];

    // FUNTION TO CREATE AND UPDATE drone
    public static function store($request, $id=null){
        $drone = $request->only(["drone_type","drone_name","battery","playload_capacity","user_id","plan_id"]);
        $drone = self::updateOrCreate(["id" => $id], $drone);
        return $drone;
    }
    //==================RELATION==============================================================
    // Relation to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation to many maps
    public function maps()
    {
        return $this->hasMany(Map::class);
    }

    // Relation to plan
     public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    // Relation to many location
    public function locations()
    {
        return $this->hasMany(Location::class);
    }

}
