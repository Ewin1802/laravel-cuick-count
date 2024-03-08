<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Dapil2Controller;
use App\Http\Controllers\Api\RekapDapil2Controller;
use App\Http\Controllers\Api\UpdateDesaController;
use App\Http\Controllers\Api\RekapTotalDapil2Controller;

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
Route::post('/create-dapil2', [Dapil2Controller::class, 'createPaslon'])->middleware('auth:sanctum');

//Desa Sonuo
Route::apiResource('sonuo', \App\Http\Controllers\Api\dapil2\PaslonSonuoController::class)->middleware('auth:sanctum'); //get paslon sonuo
Route::put('/updatesonuo', [UpdateDesaController::class, 'updatesonuo'])->middleware('auth:sanctum'); //update data suara paslon di desa sonuo

//Desa Langi
Route::apiResource('langi', \App\Http\Controllers\Api\dapil2\PaslonLangiController::class)->middleware('auth:sanctum');
Route::put('/updatelangi', [UpdateDesaController::class, 'updatelangi'])->middleware('auth:sanctum');

//Desa Jambusarang
Route::apiResource('jambusarang', \App\Http\Controllers\Api\dapil2\PaslonJambusarangController::class)->middleware('auth:sanctum');
Route::put('/updatejbs', [UpdateDesaController::class, 'updatejbs'])->middleware('auth:sanctum');

//Desa Iyok
Route::apiResource('iyok', \App\Http\Controllers\Api\dapil2\PaslonIyokController::class)->middleware('auth:sanctum');
Route::put('/updateiyok', [UpdateDesaController::class, 'updateiyok'])->middleware('auth:sanctum');

//Desa Bolangitang
Route::apiResource('bolangitang', \App\Http\Controllers\Api\dapil2\PaslonBolangitangController::class)->middleware('auth:sanctum');
Route::put('/updatebolangitang', [UpdateDesaController::class, 'updatebolangitang'])->middleware('auth:sanctum');


//post rekap desa Sonuo
Route::put('/rekap-sonuo', [RekapDapil2Controller::class, 'rekapSonuo'])->middleware('auth:sanctum');

//post rekap desa jbs
Route::post('/rekap-jbs', [RekapDapil2Controller::class, 'rekapJbs'])->middleware('auth:sanctum');

//post rekap desa Langi
Route::post('/rekap-langi', [RekapDapil2Controller::class, 'rekapLangi'])->middleware('auth:sanctum');

//post rekap desa Iyok
Route::post('/rekap-iyok', [RekapDapil2Controller::class, 'rekapIyok'])->middleware('auth:sanctum');

//post rekap desa Bolangitang
Route::post('/rekap-bolit', [RekapDapil2Controller::class, 'rekapBolit'])->middleware('auth:sanctum');



//put rekap total
Route::put('/rekap-totaldapil2', [RekapTotalDapil2Controller::class, 'rekaptotaldapil2'])->middleware('auth:sanctum');

// //Resgister
// Route::post('/register', [AuthController::class, 'register']);

// //login
// Route::post('/login', [AuthController::class, 'login']);
