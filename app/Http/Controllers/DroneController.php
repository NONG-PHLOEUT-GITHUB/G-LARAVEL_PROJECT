<?php

namespace App\Http\Controllers;

use App\Http\Requests\DroneRequest;
use App\Http\Resources\DroneResource;
use App\Models\Drone;
use Illuminate\Http\Request;

class DroneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drone = Drone::all();
        return $drone;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DroneRequest $request)
    {
        $drone = Drone::store($request);
        return response()->json(['success create'=>true, 'data'=>$drone],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $drone = Drone::find($id);
        $drone = new DroneResource($drone);
        return response()->json(['status' =>'success', 'plan' => $drone],202);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DroneRequest $request, $id)
    {
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

        return response()->json(['delete success'=>true, 'data'=>$drone],200);
        
    }
}
