<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PetaController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MapController::class, 'index']);
Route::get('/shp-to-geojson/{kategoriPetaId}', [MapController::class, 'shpToGeojson'])->name('shptogeojson');
Route::get('/edit-dbf', [MapController::class, 'dbf_reader'])->name('dbf');
Route::get('/add-dbf', [MapController::class, 'dbf_add_column'])->name('dbf.add');
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


Route::group(['prefix' => 'admin/dokumen'], function () {
    Route::get('/{slug}', [DokumenController::class, 'index'])->name('admin.dokumen.index');
    Route::get('/tambah', [DokumenController::class, 'create'])->name('admin.dokumen.create');
    Route::post('/simpan', [DokumenController::class, 'store'])->name('admin.dokumen.store');
});
Route::group(['prefix' => 'admin'], function () {

    //kategori
    Route::get('/kategori-peta', [PetaController::class, 'index'])->name('admin.peta.kategori.index');
    Route::get('/kategori-peta/tambah', [PetaController::class, 'petaKategoriCreate'])->name('admin.peta.kategori.create');
    Route::get('/kategori-peta/{kategoriId}', [PetaController::class, 'petaKategoriShow'])->name('admin.peta.kategori.show');
    Route::post('/kategori-peta/simpan', [PetaController::class, 'petaKategoriStore'])->name('admin.peta.kategori.store');

    //peta
    Route::get('/kategori-peta/{id}/peta/tambah', [PetaController::class, 'petaCreate'])->name('admin.peta.create');
    Route::post('/kategori-peta/{id}/peta/simpan', [PetaController::class, 'petaStore'])->name('admin.peta.store');
    Route::get('/kategori-peta/{petaKategoriId}/peta/{petaId}', [PetaController::class, 'petaShow'])->name('admin.peta.show');
    Route::get('/peta/{petaId}/random-color', [PetaController::class, 'randomColor'])->name('admin.peta.random.color');
});
// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
