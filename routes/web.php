<?php

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
})->name('login');

Route::get('/register', function () {
    return view('pages.auth.register');
})->name('register');

Route::get('/home', function () {
    return view('pages.dashboard');
})->name('home');

Route::get('/input', function () {
    return view('pages.input_pasien');
})->name('input');

Route::get('/request', function () {
    return view('pages.request_pasien');
})->name('request');
Route::get('/request-expired', function () {
    return view('pages.request_expired');
})->name('request_expired');

Route::get('/detail-pasien', function () {
    return view('pages.detail_pasien');
})->name('detail');

Route::get('/detail-request-pasien', function () {
    return view('pages.detail_request');
})->name('detail_request');

Route::get('/update', function () {
    return view('pages.update_user');
})->name('update');
