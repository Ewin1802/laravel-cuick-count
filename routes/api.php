<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Dapil2Controller;
use App\Http\Controllers\Api\RekapDapil2Controller;
use App\Http\Controllers\Api\UpdateDesaController;

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

//Desa Sonuo
Route::apiResource('sonuo', \App\Http\Controllers\Api\dapil2\PaslonSonuoController::class)->middleware('auth:sanctum'); //get paslon sonuo
Route::post('/updatesonuo', [UpdateDesaController::class, 'updatesonuo'])->middleware('auth:sanctum'); //update data suara paslon di desa sonuo

//create caleg
Route::post('/create-dapil2', [Dapil2Controller::class, 'createPaslon'])->middleware('auth:sanctum');

//post rekap desa jbs
Route::post('/rekap-jbs', [RekapDapil2Controller::class, 'rekapJbs'])->middleware('auth:sanctum');

//post rekap desa Sonuo
Route::post('/rekap-sonuo', [RekapDapil2Controller::class, 'rekapSonuo'])->middleware('auth:sanctum');

//post rekap desa Langi
Route::post('/rekap-langi', [RekapDapil2Controller::class, 'rekapLangi'])->middleware('auth:sanctum');

//post rekap desa Iyok
Route::post('/rekap-iyok', [RekapDapil2Controller::class, 'rekapIyok'])->middleware('auth:sanctum');

//post rekap desa Bolangitang
Route::post('/rekap-bolit', [RekapDapil2Controller::class, 'rekapBolit'])->middleware('auth:sanctum');


// //Resgister
// Route::post('/register', [AuthController::class, 'register']);

// //login
// Route::post('/login', [AuthController::class, 'login']);
