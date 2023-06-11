<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PerbandinganKriteriaController;
use App\Http\Controllers\PerbandinganAlternatifController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AtletController;
use App\Http\Controllers\DataAtletController;
use App\Models\PerbandinganKriteria;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('kriteria',KriteriaController::class);
Route::resource('produk',ProdukController::class);
Route::resource('alternatif',AlternatifController::class);
Route::resource('perbandingankriteria',PerbandinganKriteriaController::class);
Route::resource('perbandinganalternatif',PerbandinganAlternatifController::class);
Route::resource('atlet',AtletController::class);
Route::resource('dataatlet',DataAtletController::class);

