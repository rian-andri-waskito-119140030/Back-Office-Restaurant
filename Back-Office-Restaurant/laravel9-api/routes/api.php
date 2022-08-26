<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ControllerMenu;
use App\Http\Controllers\Api\ControllerTiketPesanan;
use App\Http\Controllers\Api\ControllerPesanan;
use App\Http\Controllers\Api\ControllerPesananSelesai;
use App\Http\Controllers\Api\ControllerLaporanMasuk;
use App\Http\Controllers\Api\ControllerTotalHarga;
use App\Http\Controllers\Api\UjiMenuController;
use App\Http\Controllers\Api\UjiKitchenDisplayController;
use App\Http\Controllers\Api\UjiRiwayatPesananController;
use App\Http\Controllers\Api\UjiLaporanMasukController;
use App\Http\Controllers\Api\UjiFeedbackController;
//posts

Route::get('/menu/showtypemakanan', [ControllerMenu::class, 'showTypeMakanan']);
Route::get('/menu/showtypeminuman', [ControllerMenu::class, 'showTypeMinuman']);
Route::get('/menu/show', [ControllerMenu::class, 'show']);
Route::get('/menu/showbyid/{id_menu}', [ControllerMenu::class, 'showbyid']);
Route::post('/menu/update/{id_menu}', [ControllerMenu::class, 'update']);
Route::apiResource('/menu', ControllerMenu::class);
Route::get('/tiketpesanan/showticket', [ControllerTiketPesanan::class, 'showticket']);
Route::get('/tiketpesanan/show', [ControllerTiketPesanan::class, 'show']);
Route::apiResource('/tiketpesanan', ControllerTiketPesanan::class);
Route::apiResource('/pesananselesai', ControllerPesananSelesai::class);
Route::get('/pesananselesai/show', [ControllerPesananSelesai::class, 'show']);
Route::apiResource('/pesanan', ControllerPesanan::class);
Route::get('/pesanan/index', [ControllerPesanan::class, 'index']);
Route::get('/pesanan/show/{id_pesanan}', [ControllerPesanan::class, 'show']);
Route::post('pesanan/edit/{id_pesanan}', [ControllerPesanan::class, 'edit']);
Route::apiResource('/laporanmasuk', ControllerLaporanMasuk::class);
Route::post('/laporanmasuk/store', [ControllerLaporanMasuk::class, 'store']);
Route::get('/laporanmasuk/show/{id_laporan_masuk}', [ControllerLaporanMasuk::class, 'show']);
Route::post('/laporanmasuk/edit/{id_laporan_masuk}', [ControllerLaporanMasuk::class, 'edit']);
Route::get('/totalharga/showharga', [ControllerTotalHarga::class, 'showharga']);
Route::apiResource('/totalharga', ControllerTotalHarga::class);
Route::apiResource('/ujimenu', UjiMenuController::class);
Route::apiResource('/ujikitchendisplay', UjiKitchenDisplayController::class);
Route::apiResource('/ujiriwayatpesanan', UjiRiwayatPesananController::class);
Route::apiResource('/ujilaporanmasuk', UjiLaporanMasukController::class);
Route::apiResource('/ujifeedback', UjiFeedbackController::class);
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
