<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CalegController;
use App\Http\Controllers\Api\RekapController;

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

//Resgister
Route::post('/register', [AuthController::class, 'register']);

//login
Route::post('/login', [AuthController::class, 'login']);

//logout
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

//create caleg
Route::post('/create-caleg', [CalegController::class, 'createCaleg'])->middleware('auth:sanctum');

//post rekap desa jbs
Route::post('/rekap-jbs', [RekapController::class, 'rekapJbs'])->middleware('auth:sanctum');

//post rekap desa Sonuo
Route::post('/rekap-sonuo', [RekapController::class, 'rekapSonuo'])->middleware('auth:sanctum');


// //Resgister
// Route::post('/register', [AuthController::class, 'register']);

// //login
// Route::post('/login', [AuthController::class, 'login']);
