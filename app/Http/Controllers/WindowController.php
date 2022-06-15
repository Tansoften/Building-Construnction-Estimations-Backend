<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Window;
use App\Models\Building;
use Illuminate\Http\Request;

class WindowController extends Controller
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
    public function index($buildingId)
    {
        $building = Building::find($buildingId);
        if(!$building){
            return response()->json([
                "message" => "No building found.",
            ],200); 
        }
        $windows = $building->windows;
        if(!$windows->isEmpty()){
            return response()->json([
                "message" => "Window(s) retrieved successfully",
                "body" => $windows
            ],200);
        }
        return response()->json([
            "message" => "No Window is found.",
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
    public function store(Request $request, $buildingId)
    {
        $building = Building::find($buildingId);
        if(!$building){
            return response()->json([
                "message" => "No building found.",
            ],200); 
        }
        $validate = $this->validator($request->all());
        if($validate->errors()->isEmpty()){
            //Create the ressource
           $window =  Window::create([
                'user_id'=>1,
                'building_id' => $buildingId,
                'width' => $request->width,
                'length' => $request->length,
                'count' => $request->count
           ]);

           return response()->json([
            'message' => "Window created successfully",
            'body' => $window
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
     * @param  \App\Models\Window  $window
     * @return \Illuminate\Http\Response
     */
    public function show(Window $window, $windowId)
    {
        $window = Window::find($windowId);
        if(!$window){
            return response()->json([
                "message" => "No Window is found.",
            ],200); 
        }
        return response()->json([
            "message" => "Window retrieved successfully",
            "body" => $window
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Window  $window
     * @return \Illuminate\Http\Response
     */
    public function edit(Window $window)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Window  $window
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $windowId)
    {
        $window = Window::find($windowId);
        if(!$window){
            return response()->json([
                "message" => "No Window is found.",
            ],200); 
        }
        $validate = $this->validator($request->all());
        if($validate->errors()->isEmpty()){
            $window->update([
                'width' => $request->width,
                'length' => $request->length,
                'count' => $request->count
            ]);
            return response()->json([
                'message' => "Window updated successfully",
                'body' => $window
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
     * @param  \App\Models\Window  $window
     * @return \Illuminate\Http\Response
     */
    public function destroy(Window $window)
    {
        //
    }
}
