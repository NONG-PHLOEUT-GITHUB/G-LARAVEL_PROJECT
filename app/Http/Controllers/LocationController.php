<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
    {
        $location = Location::store($request);

        return response()->json(['status' =>'success', 'location' => $location],202);
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
