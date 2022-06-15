<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () 
{
    //user
    Route::get('/user', function (Request $request)
        {
            return response()->json([
                'user' => $request->user()
            ]);    
        }
    );



});

Route::post('/register',[RegisterController::class,'create']);
Route::post('login',[LoginController::class,'authenticate']);
