<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Drone extends Model
{
    use HasFactory;

    protected $fillable = [
        'drone_id',
        'drone_type',
        'drone_name',
        'battery',
        'playload_capacity',
        'user_id',
        'plan_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    // FUNTION TO CREATE AND UPDATE drone
    public static function store($request, $id = null)
    {

        $drones = $request->only([
            "drone_id",
            "drone_type",
            "drone_name",
            "battery",
            "playload_capacity",
            "user_id",
            "plan_id"
        ]);

        if ($id) {
            $drone = self::find($id);
            if (!$drone) {
                return response()->json(['error' => 'Record not found'], 404);
            }
            $drone->update($drones);
        } else {
            $drone = self::create($drones);
            $id = $drone->$id;
        }

        return response()->json(['success' => true, 'data' => $drone], 200);
    }

    //==================RELATION==============================================================
    // Relation to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation to plan
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
    
    // Relation to instruction
    public function instructions():HasMany
    {
        return $this->hasMany(Instruction::class);
    }

    // Relation to many location
    public function locations(): HasMany
    {
        return $this->hasMany(Location::class);
    }
    // Relation to many location
    public function maps(): HasMany
    {
        return $this->hasMany(Map::class);
    }
}
