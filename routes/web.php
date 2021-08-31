<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\Admin\DashboardController;


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
Route::get('/shp-to-geojson', [MapController::class, 'shpToGeojson'])->name('shptogeojson');
Route::get('/edit-dbf', [MapController::class, 'dbf_reader'])->name('dbf');
Route::get('/add-dbf', [MapController::class, 'dbf_add_column'])->name('dbf.add');
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


Route::group(['prefix' => 'admin/dokumen'], function () {
    Route::get('/{slug}', [DokumenController::class, 'index'])->name('admin.dokumen.index');
    Route::get('/tambah', [DokumenController::class, 'create'])->name('admin.dokumen.create');
    Route::post('/simpan', [DokumenController::class, 'store'])->name('admin.dokumen.store');
});
// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');