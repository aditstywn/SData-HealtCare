<?php

use App\Http\Controllers\PasienController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\RequestPasienController;
use Illuminate\Support\Facades\Route;

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
        return redirect()->route('pasien.index');
    });

    Route::resource('/pasien', PasienController::class);
    Route::resource('/rekam-medis', RekamMedisController::class);
    Route::resource('/request-pasien', RequestPasienController::class);
});

// Route::get('/request', function () {
//     return view('pages.request_pasien');
// })->name('request');

Route::get('/request-expired', function () {
    return view('pages.request_expired');
})->name('request_expired');

// Route::get('/detail-request-pasien', function () {
//     return view('pages.detail_request');
// })->name('detail_request');
// Route::get('/register', function () {
//     return view('pages.auth.register');
// })->name('register');


// Route::get('/home', function () {
//     return view('pages.dashboard');
// })->name('home');

// Route::get('/input', function () {
//     return view('pages.input_pasien');
// })->name('input');


// Route::get('/detail-pasien', function () {
//     return view('pages.detail_pasien');
// })->name('detail');


// Route::get('/update', function () {
//     return view('pages.update_user');
// });

// Route::resource('/pasien', PasienController::class);
// Route::resource('/rekam-medis', RekamMedisController::class);
