<?php

use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/request', function () {
        return view('pages.request_pasien');
    })->name('request');

    Route::get('/request-expired', function () {
        return view('pages.request_expired');
    })->name('request_expired');

    Route::get('/detail-request-pasien', function () {
        return view('pages.detail_request');
    })->name('detail_request');

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

    Route::resource('/pasien', PasienController::class);
});

require __DIR__ . '/auth.php';
