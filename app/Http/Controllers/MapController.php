<?php

namespace App\Http\Controllers;

use App\Http\Requests\MapRequest;
use App\Http\Resources\ShowMapRescource;
use App\Models\Farm;
use App\Models\Map;
use Illuminate\Http\Request;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $maps = Map::all();
        return response()->json(['status' => 'success', 'maps' => $maps], 202);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MapRequest $request)
    {
        $map = Map::store($request);
        return $map;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $maps = Map::find($id);
        $maps = new ShowMapRescource($maps);
        return response()->json(['status' => 'success', 'maps' => $maps], 202);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MapRequest $request, string $id)
    {
        $map = Map::store($request, $id);
        return $map;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $map = Map::find($id);
        $map->delete();
        return response()->json(['delete success' => true, 'data' => $map], 200);
    }



    public function downloadMapImage($mapName, $farmId)
    {
        // delete specific farm id because in map has many farm 
        $map = Map::where('name', $mapName)
            ->whereHas('farms', function ($query) use ($farmId) {
                $query->where('id', $farmId);
            })
            ->with(['farms' => function ($query) use ($farmId) {
                $query->where('id', $farmId);
            }])
            ->first();

        if ($map === null) {
            return response()->json(['message' => 'No map found.'], 404);
        } else {
            return response()->json(['status' => 'success', 'maps' => $map->image], 202);
        }
    }


    /// as a farmer want to delete request by map name and farm id
    public function deleteMapImage($mapName, $farmId)
    {
        // delete specific farm id because in map has many farm 
        $map = Map::where('name', $mapName)
            ->whereHas('farms', function ($query) use ($farmId) {
                $query->where('id', $farmId);
            })
            ->with(['farms' => function ($query) use ($farmId) {
                $query->where('id', $farmId);
            }])
            ->first();

        if ($map === null) {
            return response()->json(['message' => 'No map found.'], 404);
        } else {
            $map->image = null;
            $map->save();
            return response()->json(['message' => 'image has been deleted.', 'data' => $map]);
        }
    }


    ///as drone add new image on map and farm id
    public function addMapImage(Request $request, $mapName, $farmId)
    {
        $map = Map::where('name', $mapName)
            ->whereHas('farms', function ($query) use ($farmId) {
                $query->where('id', $farmId);
            })->with(['farms' => function ($query) use ($farmId) {
                $query->where('id', $farmId);
            }])
            ->first();

        if (!$map) {
            return response()->json(['message' => 'Map not found'], 404);
        }

        $map->image = $request->input('image');
        $map->save();

        return response()->json(['message' => 'Image added successfully', 'data' => $map], 200);
    }
}
