<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_name',
        'date_time',
        'type',
        'spray_density',
        'plan_description',
        'user_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public static function store($request, $id = null)
    {

        $plans = $request->only([
            'plan_name',
            'date_time',
            'type',
            'spray_density',
            'plan_description',
            'user_id',
        ]);

        if ($id) {
            $plan = self::find($id);
            if (!$plan) {
                return response()->json(['error' => 'Record not found'], 404);
            }
            $plan->update($plans);
        } else {
            $plan = self::create($plans);
            $id = $plan->$id;
        }

        return response()->json(['success' => true, 'data' => $plan], 200);
    }
    // Relation to user
    public function user(){
        return $this->belongsTo(User::class);
    } 
    
    //plan has many locations
    public function drones():HasMany{
        return $this->hasMany(Drone::class);
    }

    // plan has many instruction 
     public function instructions():HasMany
     {
         return $this->hasMany(Instruction::class);
    }
}

