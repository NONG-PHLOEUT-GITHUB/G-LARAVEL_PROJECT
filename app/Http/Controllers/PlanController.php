<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
    {
        $plans = Plan::store($request);
        return response()->json(['status' =>'success', 'plans' => $plans],202);
    }

    /**
     * Display the specified resource.
     */
    public function show($planname)
    {
        // dd($planname);
        // $plan = Plan::find($id);
        // $plan = new ShowPlaneRescource($plan);
        // return response()->json(['status' =>'success', 'plan' => $plan],202);
        // $plan = Plan::all();
        $plan = Plan::where('plan_name', $planname)->first();
        
        if (!$plan) {
            abort(404, 'Plan not found');
        return response()->json(['plan not found' => $plan],404);

        }
        return $plan;
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $plans = Plan::store($request, $id);
        return response()->json(['status' =>'success', 'plans' => $plans],202);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $plans = Plan::find($id);
        $plans->delete();

        return response()->json(['delete success'=>true, 'data'=>$plans],200);
        
    }
}
