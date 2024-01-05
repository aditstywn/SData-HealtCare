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
    Route::get('/request-pasien-search', [RequestPasienController::class, 'searchCustom'])->name('request-pasien.search');

    Route::get('/request-expired', [RekamMedisController::class, 'expiredIndex'])->name('request_expired');
    Route::put('/request-expired/{id}', [RekamMedisController::class, 'expiredUpdate'])->name('request_expired.edit');
});

// Route::get('/request-expired', function () {
//     return view('pages.request_expired');
// })->name('request_expired');
