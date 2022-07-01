<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ControllerMenu;
use App\Http\Controllers\Api\ControllerTiketPesanan;
use App\Http\Controllers\Api\ControllerPesanan;
use App\Http\Controllers\Api\ControllerPesananSelesai;

//posts

Route::get('/menu/showtype',[ControllerMenu::class, 'showtype']);
Route::apiResource('/menu', ControllerMenu::class);
Route::get('/tiketpesanan/showticket',[ControllerTiketPesanan::class, 'showticket']);
Route::get('/tiketpesanan/show',[ControllerTiketPesanan::class, 'show']);
Route::apiResource('/tiketpesanan', ControllerTiketPesanan::class);
Route::apiResource('/pesananselesai', ControllerPesananSelesai::class);
Route::get('/pesananselesai/show',[ControllerPesananSelesai::class, 'show']);
Route::apiResource('/pesanan', ControllerPesanan::class);
Route::get('/pesanan/show/{id_pesanan}',[ControllerPesanan::class, 'show']);
Route::post('pesanan/edit/{id_pesanan}', [ControllerPesanan::class, 'edit']);

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
//posts

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
