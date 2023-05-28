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
    public function show($id)
    {
        $drone = Drone::find($id);
        $drone = new ShowDroneRescource($drone);
        return response()->json(['status' => 'success', 'maps' => $drone], 202);
    }

    public function getDoneId(string $drone_id){
        $drone_id= Drone::where('drone_id', $drone_id)->first();

        if(!$drone_id) {
            return response()->json(['status' =>'drone id does not exist'], 404);
        }
            $drone_id = new ShowDroneRescource($drone_id);
            return response()->json(['status' =>'success', 'data' => $drone_id],202);
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
        $drone->delete();
        return response()->json(['delete success'=>true, 'data'=>$drone],200);
        
    }

    public function showLocation($id , $location_id)
    {
    
        $drone = Drone::where('id', $id)
            ->whereHas('locations', function ($query) use ($location_id) {
                $query->where('id', $location_id);
            })->with('locations')->first();

        if ($drone === null) {
            return response()->json(['message' => 'No map found.'], 404);
        }else{
            $location = $drone->locations->first();
            $longitude = $location->longitude;
            $latitude =  $location->latitude;   
        
            return response()->json(['status' => 'success','data'=>[
                'location_id' => $location_id,
                'latitude' =>$latitude,
                'longitude' =>$longitude,
            ]], 202);
        }
    
    }
    public function updateInstruction($drone_id)
    {
        $drone = Drone::where('id', $drone_id)->first();

        $instruction = $drone->instructions();
        $instruction->update([
            'tak_off'=>request('tak_off'),
            'landing'=>request('landing'),
            'return_back'=>request('return_back'),
            'recharnge'=>request('recharnge'),
            'drone_id'=>request('drone_id'),
            'plan_id'=>request('plan_id'),
        ]);

        return $instruction->get();
    }
}
