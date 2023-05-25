<?php

namespace App\Http\Controllers;

use App\Http\Requests\FarmRequest;
use App\Http\Resources\FarmResource;
use App\Models\Farm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FarmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $farms =Farm::all();
        $farms = FarmResource::collection($farms);
        return response()->json(['success'=>true, 'data'=>$farms],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FarmRequest $request)
    {
        $farm = Farm::store($request);
        return $farm;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $farm = Farm::find($id);
        return response()->json(['success' =>true, 'data' => $farm],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FarmRequest $request, string $id)
    {
        $farm = Farm::store($request,$id);
        return response()->json(['success' =>true, 'data' => $farm],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $farm = Farm::find($id);
        $farm->delete();
        return response()->json(['success' =>true, 'message' => 'Data delete successfully'],200);
    }
}
