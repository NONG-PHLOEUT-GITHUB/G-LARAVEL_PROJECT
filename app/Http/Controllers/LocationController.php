<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationRequest;
use App\Http\Resources\LocationRescource;
use App\Http\Resources\ShowLocationRescource;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $location = Location::all();
        $location = LocationRescource::collection($location);
        return response()->json(['status' =>'success', 'location' => $location],202);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocationRequest $request)
    {
        $location = Location::store($request);

        return $location;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $location = Location::find($id);
        $location = new ShowLocationRescource($location);
        return response()->json(['status' =>'success', 'location' => $location],202);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LocationRequest $request, string $id)
    {
        $location = Location::store($request, $id);
        return response()->json(['success create'=>true, 'data'=>$location],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $location = Location::find($id);
        $location->delete();
        return response()->json(['delete success'=>true, 'data'=>$location],200);
    }
}
