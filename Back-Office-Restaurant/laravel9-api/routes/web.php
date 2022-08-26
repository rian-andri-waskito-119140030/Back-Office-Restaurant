<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ControllerMenu;
use App\Http\Controllers\Api\ControllerPesanan;
use App\Http\Controllers\Api\ControllerPesananSelesai;
use App\Http\Controllers\Api\ControllerLaporanMasuk;
use App\Http\Controllers\Api\ControllerFeedback;
use App\Http\Controllers\Api\ControllerDiskon;
use App\Http\Controllers\Api\ControllerKategori;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\Api\TampilPesananController;
use App\Http\Controllers\Api\ControllerRincian;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Auth;

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

Route::get('laporan-masuk', [ControllerLaporanMasuk::class, 'index']);
Route::get('menu/delete', [ControllerMenu::class, 'delete'])->name('menu.delete');
Route::get('laporanmasuk/delete', [ControllerLaporanMasuk::class, 'delete'])->name('laporanmasuk.delete');
// Route::get('menu', [ControllerMenu::class, 'index'])->name('menu.index');
Route::resource('menu', ControllerMenu::class);
Route::resource('pesananselesai', ControllerPesananSelesai::class);
//Route::post('menu', [ControllerMenu::class,'destroy'])->name('menu.destroy');
Route::resource('pesanan', ControllerPesanan::class);
Route::resource('laporanmasuk', ControllerLaporanMasuk::class);
Route::resource('feedback-pesanan', ControllerFeedback::class);
Route::resource('diskon', ControllerDiskon::class);
Route::resource('kategori', ControllerKategori::class);
Route::get('edit-pesanan/{id_pesanan}', [ControllerPesanan::class, 'edit']);
Route::put('update-status/{id_pesanan}', [ControllerPesanan::class, 'update']);
Route::get('pesanan-datang', [ControllerPesanan::class, 'index']);
Route::get('diskon-menu', [ControllerDiskon::class, 'index'])->name('diskon-menu.index');
Route::get('feedback-menu', [ControllerFeedback::class, 'index'])->name('feedback-menu.index');
Route::get('tampil-diskon', [ControllerDiskon::class, 'tampildiskon'])->name('tampil-diskon.tampildiskon');
//Route::get('', [ControllerPesanan::class, 'index']);
Route::get('pesanan-selesai', [ControllerPesananSelesai::class, 'index']);
Route::get('pesananselesai', [ControllerPesananSelesai::class, 'detail'])->name('pesananselesai.detail');
Route::get('tampil-pesanan-selesai/{id_pesanan}', [ControllerPesananSelesai::class, 'tampil']);
Route::get('laporanmasuk', [ControllerLaporanMasuk::class, 'index']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
//Route::get('login', [CustomAuthController::class, 'dashboard'])->name('login');
Route::post('login', ['as' => 'login', 'uses' => [CustomAuthController::class, 'customLogin']]);
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::resource('menu_dipesan', TampilPesananController::class);
Route::get('menu_dipesan/{$id_pesanan}', [TampilPesananController::class, 'tampilpesanan'])->name('menu_dipesan.tampilpesanan');
Route::resource('rincian', ControllerRincian::class);
Route::get('rincian/{$id_feedback}', [ControllerRincian::class, 'rincian'])->name('rincian.rincian');
Route::get('menureservasi', [ControllerMenu::class, 'index'])->name('menureservasi.index');
Route::get('report', [ControllerLaporanMasuk::class, 'index'])->name('report.index');
//Route::get('show-feedback', [ControllerRincian::class, 'show'])->name('show-feedback');
Route::get('/', function () {
    return view('login');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/beranda', function () {
    return view('beranda');
})->middleware('auth');
Route::get('/menu', function () {
    return view('menu');
})->middleware('auth');
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
})->middleware('auth');
Route::get('/pesanan', function () {
    return view('pesanan');
})->middleware('auth');
Route::get('/laporan', function () {
    return view('laporan');
})->middleware('auth');
Route::get('/laporanmasuk', function () {
    return view('laporanmasuk');
})->middleware('auth');
Route::get('/feedback', function () {
    return view('feedback');
})->middleware('auth');
Route::get('/editlaporan', function () {
    return view('editlaporan');
});
Route::get('/unduhlaporan', function () {
    return view('unduhlaporan');
});
Route::get('/diskon', function () {
    return view('diskon');
});
Route::get('/tampildiskon', function () {
    return view('tampildiskon');
});
Route::get('/detail_pesanan', function () {
    return view('detail_pesanan');
})->middleware('auth');
Route::get('/rincian', function () {
    return view('rincian');
});
