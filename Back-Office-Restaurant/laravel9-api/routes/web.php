<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ControllerMenu;
use App\Http\Controllers\Api\ControllerPesanan;
use App\Http\Controllers\Api\ControllerPesananSelesai;
use App\Http\Controllers\Api\ControllerLaporanMasuk;
use App\Http\Controllers\Api\ControllerFeedback;
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

Route::get('menu/delete', [ControllerMenu::class, 'delete'])->name('menu.delete');
// Route::get('menu', [ControllerMenu::class, 'index'])->name('menu.index');
Route::resource('menu', ControllerMenu::class);
Route::resource('pesananselesai', ControllerPesananSelesai::class);
//Route::post('menu', [ControllerMenu::class,'destroy'])->name('menu.destroy');
Route::resource('pesanan', ControllerPesanan::class);
Route::resource('laporanmasuk', ControllerLaporanMasuk::class);
Route::resource('feedback-menu', ControllerFeedback::class);
Route::get('edit-pesanan/{id_pesanan}', [ControllerPesanan::class, 'edit']);
Route::put('update-status/{id_pesanan}', [ControllerPesanan::class, 'update']);
Route::get('pesanan-datang', [ControllerPesanan::class, 'index']);
Route::get('', [ControllerPesanan::class, 'index']);
Route::get('pesanan-selesai', [ControllerPesananSelesai::class, 'index']);
Route::get('laporanmasuk', [ControllerLaporanMasuk::class, 'index']);
Route::get('/', function () {
    return view('beranda');
});
Route::get('/beranda', function () {
    return view('beranda');
});
Route::get('/menu', function () {
    return view('menu');
});
Route::get('/tambahmenu', function () {
    return view('tambahmenu');
});
Route::get('edit', function () {
    return view('edit');
});
Route::get('action', function () {
    return view('action');
});
Route::get('hapus', function () {
    return view('hapus');
});
Route::get('/kitchendisplay', function () {
    return view('Kitchendisplay');
});
Route::get('/pesanan', function () {
    return view('pesanan');
});
Route::get('/laporan', function () {
    return view('laporan');
});
Route::get('/laporanmasuk', function () {
    return view('laporanmasuk');
});
Route::get('/feedback', function () {
    return view('feedback');
});
