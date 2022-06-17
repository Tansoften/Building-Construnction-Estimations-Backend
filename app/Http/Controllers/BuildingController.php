<?php

namespace App\Http\Controllers;
use App\Models\Building;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BuildingController extends Controller
{

    private function validator($data){
        return Validator::make($data,[
                'width'=>'required|numeric|gt:0',
                'length'=>'required|numeric|gt:0',
                'height'=>'required|numeric|gt:0'
            ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $buidings = $user->buildings;
        if(!$buidings->isEmpty()){
            return response()->json([
                "message" => "Building(s) retrieved successfully",
                "body" => $buidings
            ],200);
        }
        return response()->json([
            "message" => "No building found.",
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
    public function store(Request $request)
    {
        $validate = $this->validator($request->all());
        if($validate->errors()->isEmpty()){
            //Create the ressource
           $building =  Building::create([
                'user_id' => Auth::user()->id,
                'width' => $request->width,
                'length' => $request->length,
                'height' => $request->height,
           ]);
           return response()->json([
            'message' => "build created successfully",
            'body' => $building
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
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function show(Building $building, $buildingId)
    {
        $building = Building::find($buildingId);
        if(!$building){
            return response()->json([
                "message" => "No building found.",
            ],200); 
        }
        return response()->json([
            "message" => "Building retrieved successfully",
            "body" => $building
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function edit(Building $building)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $buildingId)
    {
        $building = Building::find($buildingId);
        if(!$building){
            return response()->json([
                "message" => "No building found.",
            ],200); 
        }
        $validate = $this->validator($request->all());
        if($validate->errors()->isEmpty()){
            $building->update([
                'width' => $request->width,
                'height' => $request->height,
                'length' => $request->length
            ]);
            return response()->json([
                'message' => "Building updated successfully",
                'body' => $building
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
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function destroy(Building $building)
    {
        //
    }
}
