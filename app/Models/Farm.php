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
    
    public static function store($request , $id = null){
        $farm = $request->only([
         'farm_name',
         'description',
         'user_id',
         'map_id',
        ]);
 
        $farm = self::updateOrCreate(['id'=> $id],$farm);
        return $farm;
    }


    public function user(){
        return $this->belongsTo(User::class);
    }

    //relation to map
    public function map()
     {
         return $this->belongsTo(Map::class);
     }
}
