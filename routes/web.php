<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();


Route::resource('/',LandingPageController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('dashboard',AdminController::class);

Route::resource('pendaftaran',PendaftaranController::class);
Route::get('pendaftaran/status/{id}', [App\Http\Controllers\PendaftaranController::class, 'status'])->name('pendaftaran/status/{id}');
Route::get('pendaftaran/pdf/{id}', [App\Http\Controllers\PendaftaranController::class, 'cetak_pdf'])->name('pendaftaran.laporan');
// Route::get('pendaftaran/pdf/{id}', ['as' => 'pendaftaran.laporan', 'uses' => 'PendaftaranController@cetak_pdf']);


Route::resource('profil',ProfilController::class);
Route::resource('guru',GuruController::class);
Route::resource('siswa',SiswaController::class);

