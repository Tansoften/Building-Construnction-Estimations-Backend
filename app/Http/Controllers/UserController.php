<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function validator($data)
    {
        return Validator::make($data,[
            'first_name' => 'required|max:30|alpha|regex:/^[A-Z]/',
            'last_name'=> 'required|max:30|alpha|regex:/^[A-Z]/',
            'gender' => 'required|max:1|alpha|regex:/^[M,F]/',
            'phone' => 'required|numeric|digits:10|unique:users',
            'email' => 'required|email|unique:users',             
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::user();
        return response()->json([
            "message" => "User retrieved successfully",
            "body" => $user
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $validator = $this->validator($request->all()); 
        if($validator->errors()->isEmpty()){
            $user->update([
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'gender'=>$request->gender,
                'phone'=>$request->phone,
                'email'=>$request->email,
            ]);
            return response()->json([
                "message" => "User updated successfully",
                "body" => $user
            ],200);
        }
        return response()->json([
            "message" => "Check your inputs",
            "error" => $validator->errors()
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
    public function changepassword(Request $request){
        $user = Auth::user();
        $validator = Validator::make($request->all(),[
                'password' =>'required',
                'new_password' => 'required',
                'confirm_password' => 'required|same:new_password'
        ]);
        if($validator->errors()->isEmpty()){
            if(Hash::check($request->password, $user->password)){
                if(Hash::check($request->new_password,$user->password)){
                    return response([
                        "error" => 'old and new password must not match.'
                    ],200);
                }
                $user->update([
                        "password" => Hash::make($request->new_password)
                ]);  
                    return response([
                        'message' => 'password changed successfully.'
                    ],200);
            }
            return response([
                'error' => 'Incorrect password.'
            ],200);            
        }

        return response([
            "message" => "Check your inputs",
           "error" => $validator -> errors()
        ],200);

    }
}
