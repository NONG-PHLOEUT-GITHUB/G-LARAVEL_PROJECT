<?php

namespace App\Http\Controllers;

use App\Http\Requests\DroneRequest;
use App\Models\Drone;
use Illuminate\Http\Request;

class DroneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // dd(1);
        $drone = Drone::all();
        return $drone;

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DroneRequest $request)
    {
        // dd(2);
        $drone = Drone::store($request);
        return response()->json(['success create'=>true, 'data'=>$drone],200);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // dd(3);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DroneRequest $request, string $id)
    {
        //
        // dd(4);
        $drone = Drone::store($request, $id);
        return response()->json(['success create'=>true, 'data'=>$drone],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $drone = Drone::find($id);
        $drone->delete();

        return "has been delete.";
    }
}
