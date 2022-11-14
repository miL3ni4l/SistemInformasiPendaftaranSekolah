<?php

use App\Http\Controllers\ApiKategoriProdukController;
use App\Http\Controllers\ApiProdukController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



// ApiPRodukController
Route::apiResource('produk', ApiProdukController::class);
Route::apiResource('kategori', ApiKategoriProdukController::class);

