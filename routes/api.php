<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CreatePaslonDapil1Controller;
use App\Http\Controllers\Api\CreatePaslonDapil2Controller;
use App\Http\Controllers\Api\CreatePaslonDapil3Controller;
use App\Http\Controllers\Api\RekapDapil1Controller;
use App\Http\Controllers\Api\RekapDapil2Controller;
use App\Http\Controllers\Api\RekapDapil3Controller;
use App\Http\Controllers\Api\UpdateDesaDapil1Controller;
use App\Http\Controllers\Api\UpdateDesaDapil2Controller;
use App\Http\Controllers\Api\UpdateDesaDapil3Controller;
use App\Http\Controllers\Api\RekapTotalDapil1Controller;
use App\Http\Controllers\Api\RekapTotalDapil2Controller;
use App\Http\Controllers\Api\RekapTotalDapil3Controller;
use App\Http\Controllers\Api\RekapKeseluruhanController;

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

//Paslon
Route::apiResource('paslons', \App\Http\Controllers\Api\PaslonController::class)->middleware('auth:sanctum');

//create caleg dapil 1
Route::post('/create-dapil1', [CreatePaslonDapil1Controller::class, 'createPaslon'])->middleware('auth:sanctum');

//create caleg dapil 2
Route::post('/create-dapil2', [CreatePaslonDapil2Controller::class, 'createPaslon'])->middleware('auth:sanctum');

//create caleg dapil 3
Route::post('/create-dapil3', [CreatePaslonDapil3Controller::class, 'createPaslon'])->middleware('auth:sanctum');


//=====================DAPIL I ---- SHOW ALL & UPDATE DATA
//Desa Kayuogu - PINOGALUMAN
Route::apiResource('kayuogu', \App\Http\Controllers\Api\dapil1\PaslonKayuoguController::class)->middleware('auth:sanctum');
Route::put('/updatekayuogu', [UpdateDesaDapil1Controller::class, 'updatekayuogu'])->middleware('auth:sanctum');
Route::put('/rekap-kayuogu', [RekapDapil1Controller::class, 'rekapKayuogu'])->middleware('auth:sanctum');
//Desa BatuBantayo - PINOGALUMAN
Route::apiResource('batubantayo', \App\Http\Controllers\Api\dapil1\PaslonBatuBantayoController::class)->middleware('auth:sanctum');
Route::put('/updatebatubantayo', [UpdateDesaDapil1Controller::class, 'updatebatubantayo'])->middleware('auth:sanctum');
Route::put('/rekap-batubantayo', [RekapDapil1Controller::class, 'rekapBatubantayo'])->middleware('auth:sanctum');
//Desa Dalapuli - PINOGALUMAN
Route::apiResource('dalapuli', \App\Http\Controllers\Api\dapil1\PaslonDalapuliController::class)->middleware('auth:sanctum');
Route::put('/updatedalapuli', [UpdateDesaDapil1Controller::class, 'updatedalapuli'])->middleware('auth:sanctum');
Route::put('/rekap-dalapuli', [RekapDapil1Controller::class, 'rekapDalapuli'])->middleware('auth:sanctum');
//Desa Bigo - KAIDIPANG
Route::apiResource('bigo', \App\Http\Controllers\Api\dapil1\PaslonBigoController::class)->middleware('auth:sanctum');
Route::put('/updatebigo', [UpdateDesaDapil1Controller::class, 'updatebigo'])->middleware('auth:sanctum');
Route::put('/rekap-bigo', [RekapDapil1Controller::class, 'rekapBigo'])->middleware('auth:sanctum');


//=====================DAPIL II ---- SHOW ALL & UPDATE DATA
//Desa Sonuo
Route::apiResource('sonuo', \App\Http\Controllers\Api\dapil2\PaslonSonuoController::class)->middleware('auth:sanctum'); //get paslon sonuo
Route::put('/updatesonuo', [UpdateDesaDapil2Controller::class, 'updatesonuo'])->middleware('auth:sanctum'); //update data suara paslon di desa sonuo
Route::put('/rekap-sonuo', [RekapDapil2Controller::class, 'rekapSonuo'])->middleware('auth:sanctum');
//Desa Langi
Route::apiResource('langi', \App\Http\Controllers\Api\dapil2\PaslonLangiController::class)->middleware('auth:sanctum');
Route::put('/updatelangi', [UpdateDesaDapil2Controller::class, 'updatelangi'])->middleware('auth:sanctum');
Route::put('/rekap-langi', [RekapDapil2Controller::class, 'rekapLangi'])->middleware('auth:sanctum');
//Desa Jambusarang
Route::apiResource('jambusarang', \App\Http\Controllers\Api\dapil2\PaslonJambusarangController::class)->middleware('auth:sanctum');
Route::put('/updatejbs', [UpdateDesaDapil2Controller::class, 'updatejbs'])->middleware('auth:sanctum');
Route::put('/rekap-jbs', [RekapDapil2Controller::class, 'rekapJbs'])->middleware('auth:sanctum');
//Desa Iyok
Route::apiResource('iyok', \App\Http\Controllers\Api\dapil2\PaslonIyokController::class)->middleware('auth:sanctum');
Route::put('/updateiyok', [UpdateDesaDapil2Controller::class, 'updateiyok'])->middleware('auth:sanctum');
Route::put('/rekap-iyok', [RekapDapil2Controller::class, 'rekapIyok'])->middleware('auth:sanctum');
//Desa Bolangitang
Route::apiResource('bolangitang', \App\Http\Controllers\Api\dapil2\PaslonBolangitangController::class)->middleware('auth:sanctum');
Route::put('/updatebolangitang', [UpdateDesaDapil2Controller::class, 'updatebolangitang'])->middleware('auth:sanctum');
Route::put('/rekap-bolit', [RekapDapil2Controller::class, 'rekapBolit'])->middleware('auth:sanctum');

//=====================DAPIL III ---- SHOW ALL & UPDATE DATA
//Desa Kuhanga - BINTAUNA
Route::apiResource('kuhanga', \App\Http\Controllers\Api\dapil3\PaslonKuhangaController::class)->middleware('auth:sanctum'); //get paslon sonuo
Route::put('/updatekuhanga', [UpdateDesaDapil3Controller::class, 'updatekuhanga'])->middleware('auth:sanctum'); //update data suara paslon di desa sonuo
Route::put('/rekap-kuhanga', [RekapDapil3Controller::class, 'rekapKuhanga'])->middleware('auth:sanctum');
//Desa Busisingo - SANGKUB
Route::apiResource('busisingo', \App\Http\Controllers\Api\dapil3\PaslonBusisingoController::class)->middleware('auth:sanctum');
Route::put('/updatebusisingo', [UpdateDesaDapil3Controller::class, 'updatebusisingo'])->middleware('auth:sanctum');
Route::put('/rekap-busisingo', [RekapDapil3Controller::class, 'rekapBusisingo'])->middleware('auth:sanctum');


//put rekap total DAPIL I
Route::put('/rekap-totaldapil1', [RekapTotalDapil1Controller::class, 'rekaptotaldapil1'])->middleware('auth:sanctum');
//put rekap total DAPIL II
Route::put('/rekap-totaldapil2', [RekapTotalDapil2Controller::class, 'rekaptotaldapil2'])->middleware('auth:sanctum');
//put rekap total DAPIL III
Route::put('/rekap-totaldapil3', [RekapTotalDapil3Controller::class, 'rekaptotaldapil3'])->middleware('auth:sanctum');

//put rekap total DAPIL III
Route::put('/rekap-all', [RekapKeseluruhanController::class, 'rekapAll'])->middleware('auth:sanctum');


// //Resgister
// Route::post('/register', [AuthController::class, 'register']);

// //login
// Route::post('/login', [AuthController::class, 'login']);
