<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\AdminYonetim;
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


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->prefix("yonetim")->group(function(){

    Route::get('/',[AdminYonetim::class,'home'])->name('home');
Route::get('/moduller',[ModuleController::class,"index"])->name('moduller');
Route::post('/modul-ekle',[ModuleController::class,"modulekle"])->name('modul-ekle');
Route::get('/liste/{modul}',[AdminYonetim::class,"liste"])->name('liste');
Route::get('/ekle/{modul}',[AdminYonetim::class,"ekle"])->name('ekle');
Route::post('/ekle-post/{modul}',[AdminYonetim::class,"eklePost"])->name('eklePost');
Route::get('/duzenle/{modul}/{id}',[AdminYonetim::class,"duzenle"])->name('duzenle');
Route::post('/duzenle-post/{modul}/{id}',[AdminYonetim::class,"duzenlePost"])->name('duzenlePost');
Route::get('/sil/{modul}/{id}',[AdminYonetim::class,"sil"])->name('sil');
Route::get('/durum/{modul}/{id}',[AdminYonetim::class,"durum"])->name('durum');
Route::get('/ayarlar',[AdminYonetim::class,"ayarlar"])->name('ayarlar');
Route::post('/ayarPost',[AdminYonetim::class,"ayarPost"])->name('ayarPost');


});
