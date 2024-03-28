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
//Desa DalapuliBarat - PINOGALUMAN
Route::apiResource('dalapulibarat', \App\Http\Controllers\Api\dapil1\PaslonDalapulibaratController::class)->middleware('auth:sanctum');
Route::put('/updatedalapulibarat', [UpdateDesaDapil1Controller::class, 'updatedalapulibarat'])->middleware('auth:sanctum');
Route::put('/rekap-dalapulibarat', [RekapDapil1Controller::class, 'rekapDalapulibarat'])->middleware('auth:sanctum');
//Desa DalapuliTimur - PINOGALUMAN
Route::apiResource('dalapulitimur', \App\Http\Controllers\Api\dapil1\PaslonDalapulitimurController::class)->middleware('auth:sanctum');
Route::put('/updatedalapulitimur', [UpdateDesaDapil1Controller::class, 'updatedalapulitimur'])->middleware('auth:sanctum');
Route::put('/rekap-dalapulitimur', [RekapDapil1Controller::class, 'rekapDalapulitimur'])->middleware('auth:sanctum');
//Desa Dengi - PINOGALUMAN
Route::apiResource('dengi', \App\Http\Controllers\Api\dapil1\PaslonDengiController::class)->middleware('auth:sanctum');
Route::put('/updatedengi', [UpdateDesaDapil1Controller::class, 'updatedengi'])->middleware('auth:sanctum');
Route::put('/rekap-dengi', [RekapDapil1Controller::class, 'rekapDengi'])->middleware('auth:sanctum');
//Desa Duini - PINOGALUMAN
Route::apiResource('duini', \App\Http\Controllers\Api\dapil1\PaslonDuiniController::class)->middleware('auth:sanctum');
Route::put('/updateduini', [UpdateDesaDapil1Controller::class, 'updateduini'])->middleware('auth:sanctum');
Route::put('/rekap-duini', [RekapDapil1Controller::class, 'rekapDuini'])->middleware('auth:sanctum');
//Desa Komus Satu - PINOGALUMAN
Route::apiResource('komussatu', \App\Http\Controllers\Api\dapil1\PaslonKomussatuController::class)->middleware('auth:sanctum');
Route::put('/updatekomussatu', [UpdateDesaDapil1Controller::class, 'updatekomussatu'])->middleware('auth:sanctum');
Route::put('/rekap-komussatu', [RekapDapil1Controller::class, 'rekapKomussatu'])->middleware('auth:sanctum');
//Desa Padango - PINOGALUMAN
Route::apiResource('padango', \App\Http\Controllers\Api\dapil1\PaslonPadangoController::class)->middleware('auth:sanctum');
Route::put('/updatepadango', [UpdateDesaDapil1Controller::class, 'updatepadango'])->middleware('auth:sanctum');
Route::put('/rekap-padango', [RekapDapil1Controller::class, 'rekapPadango'])->middleware('auth:sanctum');
//Desa Tanjung Sidupa - PINOGALUMAN
Route::apiResource('tanjungsidupa', \App\Http\Controllers\Api\dapil1\PaslonTanjungsidupaController::class)->middleware('auth:sanctum');
Route::put('/updatetanjungsidupa', [UpdateDesaDapil1Controller::class, 'updatetanjungsidupa'])->middleware('auth:sanctum');
Route::put('/rekap-tanjungsidupa', [RekapDapil1Controller::class, 'rekapTanjungsidupa'])->middleware('auth:sanctum');
//Desa Tombulang Pantai - PINOGALUMAN
Route::apiResource('tombulangpantai', \App\Http\Controllers\Api\dapil1\PaslonTombulangpantaiController::class)->middleware('auth:sanctum');
Route::put('/updatetombulangpantai', [UpdateDesaDapil1Controller::class, 'updatetombulangpantai'])->middleware('auth:sanctum');
Route::put('/rekap-tombulangpantai', [RekapDapil1Controller::class, 'rekapTombulangpantai'])->middleware('auth:sanctum');
//Desa Tombulang Timur - PINOGALUMAN
Route::apiResource('tombulangtimur', \App\Http\Controllers\Api\dapil1\PaslonTombulangtimurController::class)->middleware('auth:sanctum');
Route::put('/updatetombulangtimur', [UpdateDesaDapil1Controller::class, 'updatetombulangtimur'])->middleware('auth:sanctum');
Route::put('/rekap-tombulangtimur', [RekapDapil1Controller::class, 'rekapTombulangtimur'])->middleware('auth:sanctum');
//Desa Tombulang - PINOGALUMAN
Route::apiResource('tombulang', \App\Http\Controllers\Api\dapil1\PaslonTombulangController::class)->middleware('auth:sanctum');
Route::put('/updatetombulang', [UpdateDesaDapil1Controller::class, 'updatetombulang'])->middleware('auth:sanctum');
Route::put('/rekap-tombulang', [RekapDapil1Controller::class, 'rekapTombulang'])->middleware('auth:sanctum');
//Desa Tuntulow - PINOGALUMAN
Route::apiResource('tuntulow', \App\Http\Controllers\Api\dapil1\PaslonTuntulowController::class)->middleware('auth:sanctum');
Route::put('/updatetuntulow', [UpdateDesaDapil1Controller::class, 'updatetuntulow'])->middleware('auth:sanctum');
Route::put('/rekap-tuntulow', [RekapDapil1Controller::class, 'rekapTuntulow'])->middleware('auth:sanctum');
//Desa Tuntung - PINOGALUMAN
Route::apiResource('tuntung', \App\Http\Controllers\Api\dapil1\PaslonTuntungController::class)->middleware('auth:sanctum');
Route::put('/updatetuntung', [UpdateDesaDapil1Controller::class, 'updatetuntung'])->middleware('auth:sanctum');
Route::put('/rekap-tuntung', [RekapDapil1Controller::class, 'rekapTuntung'])->middleware('auth:sanctum');
//Desa Tuntung Timur - PINOGALUMAN
Route::apiResource('tuntungtimur', \App\Http\Controllers\Api\dapil1\PaslonTuntungtimurController::class)->middleware('auth:sanctum');
Route::put('/updatetuntungtimur', [UpdateDesaDapil1Controller::class, 'updatetuntungtimur'])->middleware('auth:sanctum');
Route::put('/rekap-tuntungtimur', [RekapDapil1Controller::class, 'rekapTuntungtimur'])->middleware('auth:sanctum');
//Desa Tontulow Utara - PINOGALUMAN
Route::apiResource('tontulowutara', \App\Http\Controllers\Api\dapil1\PaslonTontulowutaraController::class)->middleware('auth:sanctum');
Route::put('/updatetontulowutara', [UpdateDesaDapil1Controller::class, 'updatetontulowutara'])->middleware('auth:sanctum');
Route::put('/rekap-tontulowutara', [RekapDapil1Controller::class, 'rekapTontulowutara'])->middleware('auth:sanctum');
//Desa Batu Tajam - PINOGALUMAN
Route::apiResource('batutajam', \App\Http\Controllers\Api\dapil1\PaslonBatutajamController::class)->middleware('auth:sanctum');
Route::put('/updatebatutajam', [UpdateDesaDapil1Controller::class, 'updatebatutajam'])->middleware('auth:sanctum');
Route::put('/rekap-batutajam', [RekapDapil1Controller::class, 'rekapBatutajam'])->middleware('auth:sanctum');
//Desa Buko - PINOGALUMAN
Route::apiResource('buko', \App\Http\Controllers\Api\dapil1\PaslonBukoController::class)->middleware('auth:sanctum');
Route::put('/updatebuko', [UpdateDesaDapil1Controller::class, 'updatebuko'])->middleware('auth:sanctum');
Route::put('/rekap-buko', [RekapDapil1Controller::class, 'rekapBuko'])->middleware('auth:sanctum');
//Desa Buko Selatan - PINOGALUMAN
Route::apiResource('bukoselatan', \App\Http\Controllers\Api\dapil1\PaslonBukoselatanController::class)->middleware('auth:sanctum');
Route::put('/updatebukoselatan', [UpdateDesaDapil1Controller::class, 'updatebukoselatan'])->middleware('auth:sanctum');
Route::put('/rekap-bukoselatan', [RekapDapil1Controller::class, 'rekapBukoselatan'])->middleware('auth:sanctum');
//Desa Buko Utara - PINOGALUMAN
Route::apiResource('bukoutara', \App\Http\Controllers\Api\dapil1\PaslonBukoutaraController::class)->middleware('auth:sanctum');
Route::put('/updatebukoutara', [UpdateDesaDapil1Controller::class, 'updatebukoutara'])->middleware('auth:sanctum');
Route::put('/rekap-bukoutara', [RekapDapil1Controller::class, 'rekapBukoutara'])->middleware('auth:sanctum');
//Desa Busato - PINOGALUMAN
Route::apiResource('busato', \App\Http\Controllers\Api\dapil1\PaslonBusatoController::class)->middleware('auth:sanctum');
Route::put('/updatebusato', [UpdateDesaDapil1Controller::class, 'updatebusato'])->middleware('auth:sanctum');
Route::put('/rekap-busato', [RekapDapil1Controller::class, 'rekapBusato'])->middleware('auth:sanctum');
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
