<?php

namespace App\Http\Controllers;

use App\Http\Resources\InstructionResource;
use App\Models\Instruction;
use Illuminate\Http\Request;

class InstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instruction =Instruction::all();
        $instruction = InstructionResource::collection($instruction);
        return response()->json(['success'=>true, 'data'=>$instruction],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $instruction = Instruction::store($request);
        return $instruction;
        // return response()->json(['success' =>true, 'data' => $instruction],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $instruction = Instruction::find($id);
        return response()->json(['success' =>true, 'data' => $instruction],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $instruction = Instruction::store($request,$id);
        return $instruction;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $instruction =Instruction::find($id);
        $instruction->delete();
        return response()->json(['success' =>true, 'message' => 'Data delete successfully'],200);
    }
}
