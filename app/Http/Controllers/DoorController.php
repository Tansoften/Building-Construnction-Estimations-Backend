<?php

namespace App\Http\Controllers;

use App\Models\Door;
use App\Models\Building;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class DoorController extends Controller
{
    private function validator($data){
        return Validator::make($data,[
                'width'=>'required|numeric|gt:0',
                'length'=>'required|numeric|gt:0',
                'count'=>'required|numeric|gt:0'
            ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($buidingId)
    {
        $building = Building::find($buidingId);
        if(!$building){
            return response()->json([
                "message" => "No building is found.",
            ],200); 
        }
        $doors = $building->doors;
        if(!$doors->isEmpty()){
            return response()->json([
                "message" => "Doors(s) retrieved successfully",
                "body" => $doors
            ],200);
        }
        return response()->json([
            "message" => "No Door is found.",
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $buidingId)
    {
        $building = Building::find($buidingId);
        if(!$building){
            return response()->json([
                "message" => "No building found.",
            ],200); 
        }
        $validate = $this->validator($request->all());
        if($validate->errors()->isEmpty()){
            //Create the ressource
           $door =  Door::create([
                'user_id'=>1,
                'building_id' => $buidingId,
                'width' => $request->width,
                'length' => $request->length,
                'count' => $request->count
           ]);

           return response()->json([
            'message' => "Door created successfully",
            'body' => $door
           ],201);
        }
        return response()->json([
            'message' => "Your inputs has errors",
            'error' => $validate->errors()
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Door  $door
     * @return \Illuminate\Http\Response
     */
    public function show(Door $door, $doorId)
    {
        $door = Door::find($doorId);
        if(!$door){
            return response()->json([
                "message" => "No door is found.",
            ],200); 
        }
        return response()->json([
            "message" => "Door retrieved successfully",
            "body" => $door
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Door  $door
     * @return \Illuminate\Http\Response
     */
    public function edit(Door $door)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Door  $door
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $doorId)
    {
        $door = Door::find($doorId);
        if(!$door){
            return response()->json([
                "message" => "No Door is found.",
            ],200); 
        }
        $validate = $this->validator($request->all());
        if($validate->errors()->isEmpty()){
            $door->update([
                'width' => $request->width,
                'length' => $request->length,
                'count' => $request->count
            ]);
            return response()->json([
                'message' => "Door updated successfully",
                'body' => $door
            ],200);
        }
        return response()->json([
            'message' => "Your inputs has errors",
            'error' => $validate->errors()
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Door  $door
     * @return \Illuminate\Http\Response
     */
    public function destroy(Door $door)
    {
        //
    }
}
