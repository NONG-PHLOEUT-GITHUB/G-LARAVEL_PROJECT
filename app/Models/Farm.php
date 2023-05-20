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
    ];
    public static function store($request , $id = null){
        $farm = $request->only([
         'farm_name',
         'description',
         'user_id',
        ]);
 
        $farm = self::updateOrCreate(['id'=> $id],$farm);
        return $farm;
    }


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function map(){
        return $this->belongsTo(Map::class);
    }
}
