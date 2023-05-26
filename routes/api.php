<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DroneController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\InstructionController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MapController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\returnSelf;

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


Route::post('/register',[AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

// Route::post('/users',[UserController::class, 'store']);

Route::middleware(['auth:sanctum'])->group(function(){
    Route::post('/drones',function(){
        return "create a new drone";
        Route::post('/logout',[AuthenticationController::class, 'logout']);
    });
    
    // user
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
    Route::post('/plans',[PlanController::class,'store']);
    Route::put('/plans/{id}',[PlanController::class,'update']);
    Route::delete('/plans/{id}',[PlanController::class,'destroy']);

    //map
    Route::post('/maps',[MapController::class,'store']);
    Route::put('/maps/{id}',[MapController::class,'update']);
    Route::delete('/maps/{id}',[MapController::class,'destroy']);
    /// insstructions
    Route::post('/instructions',[InstructionController::class, 'store']);
    Route::put('/instructions/{id}',[InstructionController::class, 'update']);
    Route::delete('/instructions/{id}',[InstructionController::class, 'destroy']);

});

//Users //###################################################

Route::get('/users',[UserController::class, 'index']);
Route::get('/users/{id}',[UserController::class, 'show']);

Route::get('/farms',[FarmController::class, 'index']);
Route::get('/farms/{id}',[FarmController::class, 'show']);

// drones //###################################################

Route::get('/drones',[DroneController::class, 'index']);
Route::get('/drones/{id}',[DroneController::class, 'show']);

Route::get('/locations',[LocationController::class, 'index']);
Route::get('/locations/{id}',[LocationController::class, 'show']);

// plan
Route::get('/plans',[PlanController::class,'index']);
Route::get('/plans/{id}',[PlanController::class,'show']);
Route::get('/plans_name/{planname}',[PlanController::class,'showPlanName']);

// map //###################################################

Route::get('/maps/{id}',[MapController::class,'show']);
Route::get('/maps',[MapController::class,'index']);
Route::get('/maps/map_name/farm_id',[MapController::class,'show']);

// Map //###################################################

Route::get('/download_map_images/{mapName}/{farmId}',  [MapController::class,'downloadMapImage']);
Route::delete('/delete_map_images/{mapName}/{farmId}',  [MapController::class,'deleteMapImage']);
Route::post('/post_map_images/{mapName}/{farmId}',  [MapController::class,'addMapImage']);



//instructions
Route::get('/instructions',[InstructionController::class, 'index']);
Route::get('/instructions/{id}',[InstructionController::class, 'show']);

