<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator($data)
    {
        // return Validator::make($data, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);

        return Validator::make($data,[
            'first_name' => 'required|max:30|alpha|regex:/^[A-Z]/',
            'last_name'=> 'required|max:30|alpha|regex:/^[A-Z]/',
            'gender' => 'required|max:1|alpha|regex:/^[M,F]/',
            'phone' => 'required|numeric|digits:10|unique:users,phone',
            'email' => 'required|email|unique:users,email',
            'password' =>'required|min:6',
            //'confirm_password' => 'required|same:password'
              
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(Request $request)
    {
        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);



        $validator = $this->validator($request->all());
        if($validator -> errors() -> isEmpty()){  
            $user = User::create([
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'gender'=>$request->gender,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'password'=> Hash::make($request->password)
            ]);
                return  response()->json(
                    [
                        'message' => 'User Registered successful'
                    ],200
                );
            
        }
        return response()->json(
            [
                'error' =>$validator -> errors()
            ],200
        );
    }
}
