<?php

<<<<<<< HEAD
use App\Http\Controllers\UserController;
=======
<<<<<<< HEAD
use App\Http\Controllers\DroneController;
=======
use App\Http\Controllers\PlanController;
>>>>>>> d26ec0550adbb1876fc6a0dc62d3100e496a5507
>>>>>>> f80ef16def7e24479209b37bdf83fbffdf543ca5
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

<<<<<<< HEAD
Route::get('/users',[UserController::class, 'index']);
Route::post('/users',[UserController::class, 'store']);
=======
<<<<<<< HEAD
// Route::resource('/drone',DroneController::class);
Route::get('/drone',[DroneController::class, 'index']);
// Route::get('/drone{id}',[DroneController::class, 'show']);
Route::post('/drone',[DroneController::class, 'store']);
Route::put('/drone{id}',[DroneController::class, 'update']);
Route::delete('/drone{id}',[DroneController::class, 'destroy']);

=======
























>>>>>>> d26ec0550adbb1876fc6a0dc62d3100e496a5507
>>>>>>> f80ef16def7e24479209b37bdf83fbffdf543ca5
