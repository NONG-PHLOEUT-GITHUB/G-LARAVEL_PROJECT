<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
    use HasFactory;
    
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'take_off',
        'landing',
        'return_back',
        'recharge',
        'drone_id',
        'plan_id',
        'user_id',
    ];
    public static function store($request, $id = null)
    {
        $instructions = $request->only([
            'take_off',
            'landing',
            'return_back',
            'recharge',
            'drone_id',
            'plan_id',
            'user_id',
    ]);

    if ($id) {
        $instruction = self::find($id);
            if (!$instruction) {
                return response()->json(['error' => 'Record not found'], 404);
            }
            $instruction->update($instructions);
        } else {
            $instruction = self::create($instructions);
            $id = $instruction->$id;
    }

    return response()->json(['success' => true, 'data' => $instruction], 200);
    }
    // Relation to drone
    public function drone()
    {
        return $this->belongsTo(Drone::class);
    }

    // Relation to plan
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    // Relation to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
