<?php

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


Route::get('/users',[UserController::class, 'index']);
Route::post('/users',[UserController::class, 'store']);
Route::get('/users/{id}',[UserController::class, 'show']);
Route::put('/users/{id}',[UserController::class, 'update']);
Route::delete('/users/{id}',[UserController::class, 'destroy']);


Route::get('/farms',[FarmController::class, 'index']);
Route::post('/farms',[FarmController::class, 'store']);
Route::get('/farms/{id}',[FarmController::class, 'show']);
Route::put('/farms/{id}',[FarmController::class, 'update']);
Route::delete('/farms/{id}',[FarmController::class, 'destroy']);


// Route::resource('/drone',DroneController::class);
Route::get('/drone',[DroneController::class, 'index']);
Route::get('/drone/{id}',[DroneController::class, 'show']);
Route::post('/drone',[DroneController::class, 'store']);
Route::put('/drone/{id}',[DroneController::class, 'update']);
Route::delete('/drone/{id}',[DroneController::class, 'destroy']);

// location
Route::get('/location',[LocationController::class, 'index']);
Route::get('/location/{id}',[LocationController::class, 'show']);
Route::post('/location',[LocationController::class, 'store']);
Route::put('/location/{id}',[LocationController::class, 'update']);
Route::delete('/location/{id}',[LocationController::class, 'destroy']);

// plan
Route::put('/plans/{id}',[PlanController::class,'update']);
Route::post('/plans',[PlanController::class,'store']);
Route::get('/plans',[PlanController::class,'index']);
Route::get('/plans/{planname}',[PlanController::class,'show']);

// map //
Route::post('/maps',[MapController::class,'store']);
Route::get('/maps',[MapController::class,'index']);
Route::get('/maps/{id}',[MapController::class,'show']);