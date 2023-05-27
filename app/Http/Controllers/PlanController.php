<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlanRequest;
use App\Http\Resources\PlanResource;
use App\Http\Resources\ShowPlaneRescource;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plans = Plan::all();
        $plans = PlanResource::collection($plans);
        return response()->json(['status' =>'success', 'plans' => $plans]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlanRequest $request)
    {
        $plans = Plan::store($request);
        return $plans;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $plan = Plan::find($id);
        if(!$plan){
            return response()->json(['message' => 'The record with ID ' . $id . ' was not found.'], 404);
        }
        $plan = new ShowPlaneRescource($plan);
        return response()->json(['status' =>'success', 'plan' => $plan],202);
  
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PlanRequest $request, $id)
    {
        $plans = Plan::store($request, $id);
        return response()->json(['status' =>'success', 'plans' => $plans],202);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $plan = Plan::find($id);
        if(!$plan){
            return response()->json(['message' => 'The record with ID ' . $id . ' was not found.'], 404);
        }
        $plan->delete();

        return response()->json(['delete success'=>true, 'data'=>$plan],200);
        
    }

    public function getPlanName($plan_name){

        $plan = Plan::where('plan_name', $plan_name)->with('instructions')->first();
       
        if (!$plan) {
            return response()->json(['plan not found' => $plan],404);
        }
        return response()->json(['success'=>true, 'data'=>$plan],200);
    }
}
