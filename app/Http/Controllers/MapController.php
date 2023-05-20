<?php

namespace App\Http\Controllers;

use App\Http\Resources\ShowMapRescource;
use App\Models\Map;
use Illuminate\Http\Request;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $maps = Map::all();
        return response()->json(['status' =>'success', 'maps' => $maps],202);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $map = Map::store($request);
        return response()->json(['success create'=>true, 'data'=>$map],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $maps = Map::find($id);
        $maps = new ShowMapRescource($maps);
        return response()->json(['status' =>'success', 'maps' => $maps],202);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $map = Map::store($request, $id);
        return response()->json(['success create'=>true, 'data'=>$map],200);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $map = Map::find($id);
        $map->delete();
        return response()->json(['delete success'=>true, 'data'=>$map],200);
        
    }
}
