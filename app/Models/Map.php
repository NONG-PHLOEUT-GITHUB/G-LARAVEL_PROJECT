<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'area_type',
        'area',
        'description',
        'location_id',
        'drone_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public static function store($request , $id = null){
       $maps = $request->only([
            'name',
            'area_type',
            'area',
            'description',
            'location_id',
            'drone_id',
       ]);

       $maps = self::updateOrCreate(['id' => $id],$maps);
       return $maps;
    }
}
