<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaslonController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\SonuoController;
use App\Http\Controllers\JambusarangController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
     return view('pages.auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('home', function () {
        return view('pages.modules-calendar');
    })->name('home');

    Route::resource('user', UserController::class);
    Route::resource('paslon', PaslonController::class );
    Route::resource('lokasi', LokasiController::class );
    Route::resource('sonuo', SonuoController::class );
    Route::resource('jambusarang', JambusarangController::class );

});

Route::get('/modules-calendar', function () {
    return view('pages.modules-calendar', ['type_menu' => 'modules']);
});
Route::get('/modules-chartjs', function () {
    return view('pages.modules-chartjs', ['type_menu' => 'modules']);
});

// Route::put('/lokasi{id}', 'LokasiController@updateEnum')->name('update.enum');

// Route::get('/login', function () {
//     return view('pages.auth.login');
// })->name('login');

// Route::get('/register', function () {
//     return view('pages.auth.register');
// })->name('register');

// Route::get('/users', function () {
//     return view('pages.users.index');
// });
