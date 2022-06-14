<?php
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\DoorController;
use App\Http\Controllers\WindowController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('buildings')->group(function(){
        Route::get('/',[BuildingController::class, 'index']);
        Route::post('/new',[BuildingController::class, 'store']);
        Route::get('/view/{buildingId}',[BuildingController::class, 'show']);
        Route::put('/update/{buildingId}',[BuildingController::class, 'update']);


});
        //Doors
        Route::prefix('doors')->group(function(){
            Route::get('/building/{buildingId}',[DoorController::class,'index']);
            Route::post('/building/{buildingId}/new',[DoorController::class,'store']);
            Route::get('/view/{doorId}',[DoorController::class,'show']);
            Route::put('/update/{doorId}',[DoorController::class,'update']);
        });

        //Windows
        Route::prefix('windows')->group(function(){
            Route::get('/building/{buildingId}',[WindowController::class,'index']);
            Route::post('/building/{buildingId}/new',[WindowController::class,'store']);
            Route::get('/view/{windowId}',[WindowController::class,'show']);
            Route::put('/update/{windowId}',[WindowController::class,'update']);
        });


Route::fallback(function(){
    return response()->json(
        [
            'message' => 'Resource does not exist.',
        ], 404
    );
}
);
