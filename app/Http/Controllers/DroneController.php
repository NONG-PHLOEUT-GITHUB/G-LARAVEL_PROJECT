<?php

namespace App\Http\Controllers;

use App\Http\Requests\DroneRequest;
use App\Http\Resources\DroneLocationResource;
use App\Http\Resources\DroneResource;
use App\Http\Resources\ShowDroneRescource;
use App\Models\Drone;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DroneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drone = Drone::all();
        return response()->json(['Get success'=>true, 'data'=>$drone],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DroneRequest $request)
    {
     
        $drone = Drone::store($request);
        return $drone;

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $drone = Drone::find($id);
        if(!$drone){
            return response()->json(['message' => 'The record with ID ' . $id . ' was not found.'], 404);
        }
        $drone = new ShowDroneRescource($drone);  
        return response()->json(['status' =>'success', 'data' => $drone],202);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DroneRequest $request, $id)
    {
        $drone = Drone::store($request, $id);
        return $drone;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $drone = Drone::find($id);
        if(!$drone){
            return response()->json(['message' => 'The record with ID ' . $id . ' was not found.'], 404);
        }
        $drone->delete();
        return response()->json(['delete success'=>true, 'data'=>$drone],200);
        
    }

    public function showLocation($drone_id , $location_id)
    {
    
        $drone = Drone::where('id', $drone_id)
            ->whereHas('locations', function ($query) use ($location_id) {
                $query->where('id', $location_id);
            })->with('locations')->first();

        if ($drone === null) {
            return response()->json(['message' => 'The record with ID ' . $drone_id .' or '.$location_id. ' was not found.'], 404);
        }else{
            $location = $drone->locations->first();
            $longitude = $location->longitude;
            $latitude =  $location->latitude;   
        
            return response()->json(['message' => 'success','data'=>[
                'location_id' => $location_id,
                'latitude' =>$latitude,
                'longitude' =>$longitude,
            ]], 202);
        }
    
    }
  
    public function updateInstruction($drone_id, Request $request)
    {
       
        $drone = Drone::where('id', $drone_id)->with('instructions')->first();
        $last_instruction = $drone->instructions()->latest()->first();
        
        if(!$last_instruction)
        {
            return response()->json(['message' => 'drone id found.'], 404);
        }else{
            $last_instruction->update([
                'take_off' => $request->input('take_off'),
                'landing' => $request->input('landing'),
                'return_back' => $request->input('return_back'),
                'recharge' => $request->input('recharge'),
                'drone_id' => $request->input('drone_id'),
                'plan_id' => $request->input('plan_id'),
            ]);
      
        }
     
       
        return response()->json(['Update successfully' => true,'data'=> $last_instruction], 202);
    }
}
