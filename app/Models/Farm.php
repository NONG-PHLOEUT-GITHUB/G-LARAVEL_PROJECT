<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    use HasFactory;
    protected $fillable = [
        'farm_name',
        'description',
        'user_id',
        'map_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    
    public static function store($request, $id = null)
    {

        $farms = $request->only([
            'farm_name',
            'description',
            'user_id',
            'map_id',
       ]);

        if ($id) {
            $farm = self::find($id);
            if (!$farm) {
                return response()->json(['error' => 'Record not found'], 404);
            }
            $farm->update($farms);
        } else {
            $farm = self::create($farms);
            $id = $farm->$id;
        }

        return response()->json(['success' => true, 'data' => $farm], 200);
    }
    // Relation to user
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Relation to map
    public function map()
    {
        return $this->belongsTo(Map::class);
    }
}
