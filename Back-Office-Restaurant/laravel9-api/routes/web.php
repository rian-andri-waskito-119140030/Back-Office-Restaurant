<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ControllerMenu;
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
Route::get('menu/delete', [ControllerMenu::class,'delete'])->name('menu.delete');
// Route::get('menu', [ControllerMenu::class, 'index'])->name('menu.index');
Route::resource('menu', ControllerMenu::class);
//Route::post('menu', [ControllerMenu::class,'destroy'])->name('menu.destroy');
Route::get('/', function () {
    return view('welcome');
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