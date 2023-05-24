<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DroneController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MapController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function(){
    // Route::post('/drones',function(){
    //     return "create a new drone";
    // });
    Route::post('/logout',[AuthenticationController::class, 'logout']);

    // user
    Route::post('/users',[UserController::class, 'store']);
    Route::put('/users/{id}',[UserController::class, 'update']);
    Route::delete('/users/{id}',[UserController::class, 'destroy']);

    //farm
    Route::post('/farms',[FarmController::class, 'store']);
    Route::put('/farms/{id}',[FarmController::class, 'update']);
    Route::delete('/farms/{id}',[FarmController::class, 'destroy']);

    // drone
    Route::post('/drones',[DroneController::class, 'store']);
    Route::put('/drones/{id}',[DroneController::class, 'update']);
    Route::delete('/drones/{id}',[DroneController::class, 'destroy']);

    // location
    Route::post('/locations',[LocationController::class, 'store']);
    Route::put('/locations/{id}',[LocationController::class, 'update']);
    Route::delete('/locations/{id}',[LocationController::class, 'destroy']);

    // plan
    Route::put('/plans/{id}',[PlanController::class,'update']);
    Route::post('/plans',[PlanController::class,'store']);

    //map
    Route::post('/maps',[MapController::class,'store']);
    Route::put('/maps/{id}',[MapController::class,'update']);
    Route::delete('/maps/{id}',[MapController::class,'destroy']);

});

//Users
Route::get('/users',[UserController::class, 'index']);
Route::get('/users/{id}',[UserController::class, 'show']);
// Route::post('/users',[UserController::class, 'store']);
// Route::put('/users/{id}',[UserController::class, 'update']);
// Route::delete('/users/{id}',[UserController::class, 'destroy']);

//Farms
Route::get('/farms',[FarmController::class, 'index']);
Route::get('/farms/{id}',[FarmController::class, 'show']);
// Route::post('/farms',[FarmController::class, 'store']);
// Route::put('/farms/{id}',[FarmController::class, 'update']);
// Route::delete('/farms/{id}',[FarmController::class, 'destroy']);


Route::get('/drones/{id}/{location}', [DroneController::class, 'showLocation']);



// Route::resource('/drone',DroneController::class);
Route::get('/drones',[DroneController::class, 'index']);
Route::get('/drones/{id}',[DroneController::class, 'show']);
// Route::post('/drones',[DroneController::class, 'store']);
// Route::put('/drones/{id}',[DroneController::class, 'update']);
// Route::delete('/drones/{id}',[DroneController::class, 'destroy']);

// location
Route::get('/locations',[LocationController::class, 'index']);
Route::get('/locations/{id}',[LocationController::class, 'show']);
// Route::post('/locations',[LocationController::class, 'store']);
// Route::put('/locations/{id}',[LocationController::class, 'update']);
// Route::delete('/locations/{id}',[LocationController::class, 'destroy']);

// plan
// Route::put('/plans/{id}',[PlanController::class,'update']);
// Route::post('/plans',[PlanController::class,'store']);
Route::get('/plans',[PlanController::class,'index']);
Route::get('/plans/{planname}',[PlanController::class,'showPlanName']);
Route::get('/plans/{id}',[PlanController::class,'show']);

// map //
Route::get('/maps/{id}',[MapController::class,'show']);
Route::get('/maps',[MapController::class,'index']);
Route::get('/maps/map_name/farm_id',[MapController::class,'show']);
// Route::post('/maps',[MapController::class,'store']);
// Route::put('/maps/{id}',[MapController::class,'update']);
// Route::delete('/maps/{id}',[MapController::class,'destroy']);


// Map controller
Route::get('/download_maps/{mapName}/{farmId}',  [MapController::class,'downloadMapPhoto']);
Route::delete('/delete_maps/{mapName}/{farmId}',  [MapController::class,'deleteMapPhoto']);

Route::post('/login', [AuthenticationController::class, 'login']);
// Route::post('/logout', [AuthenticationController::class, 'logout']);

