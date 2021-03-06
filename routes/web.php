<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\DokumenKategoriController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PetaController;
use App\Http\Controllers\Admin\SurveyController;
use App\Http\Controllers\TkprdKegiatanController;


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

Route::get('/dokumen/kategori/{slug}', [WebController::class, 'index'])->name('web.dokumen');
Route::get('/tkprd', [TkprdController::class, 'index'])->name('web.tkprd');

Route::group(['prefix' => 'admin/dokumen'], function () {
    //kategori dokumen
    Route::get('/kategori', [DokumenKategoriController::class, 'index'])->name('admin.dokumen.kategori.index');
    Route::get('/kategori/tambah', [DokumenKategoriController::class, 'create'])->name('admin.dokumen.kategori.create');
    Route::post('/kategori/simpan', [DokumenKategoriController::class, 'store'])->name('admin.dokumen.kategori.store');

    //kategori
    Route::get('/kategori/{dokumenKategoriId}', [DokumenController::class, 'index'])->name('admin.dokumen.index');
    Route::get('/kategori/{dokumenKategoriId}/tambah', [DokumenController::class, 'create'])->name('admin.dokumen.create');
    Route::post('/kategori/{dokumenKategoriId}/simpan', [DokumenController::class, 'store'])->name('admin.dokumen.store');
});



Route::group(['prefix' => 'admin/tkprd'], function () {
    //TKPRD Kegiatan
    Route::get('/', [TkprdKegiatanController::class, 'index'])->name('admin.tkprd.kegiatan.index');
    Route::get('/tambah', [TkprdKegiatanController::class, 'create'])->name('admin.tkprd.kegiatan.create');
    Route::post('/simpan', [TkprdKegiatanController::class, 'store'])->name('admin.tkprd.kegiatan.store');
    Route::get('/{id}/kelola', [TkprdKegiatanController::class, 'kelola'])->name('admin.tkprd.kegiatan.kelola');
    Route::get('/{id}/edit', [TkprdKegiatanController::class, 'edit'])->name('admin.tkprd.kegiatan.edit');
    Route::post('/{id}/update', [TkprdKegiatanController::class, 'update'])->name('admin.tkprd.kegiatan.update');
    Route::get('/{id}/hapus', [TkprdKegiatanController::class, 'delete'])->name('admin.tkprd.kegiatan.delete');

    //API untuk get data survey
    Route::get('/{kegiatanId}/kelola/survey', [TkprdKegiatanController::class, 'surveyIndex'])->name('admin.tkprd.kegiatan.survey.index');
    Route::get('/{kegiatanId}/kelola/survey/{surveyId}/get', [TkprdKegiatanController::class, 'surveyGet'])->name('admin.tkprd.kegiatan.survey.get');
    Route::post('/{kegiatanId}/kelola/survey/simpan', [TkprdKegiatanController::class, 'surveyStore'])->name('admin.tkprd.kegiatan.survey.store');
    Route::post('/{kegiatanId}/kelola/survey/{surveyId}/update', [TkprdKegiatanController::class, 'surveyUpdate'])->name('admin.tkprd.kegiatan.survey.update');
    Route::get('/kelola/survey/{surveyId}/delete', [TkprdKegiatanController::class, 'surveyDelete'])->name('admin.tkprd.kegiatan.survey.delete');

    Route::get('/{kegiatanId}/kelola/survey/{surveyId}', [TkprdKegiatanController::class, 'surveyKelolaIndex'])->name('admin.tkprd.kegiatan.survey.kelola.index');
    Route::get('/{kegiatanId}/kelola/survey/{surveyId}/kategori/{fileKategori}', [TkprdKegiatanController::class, 'surveyKelolaGet'])->name('admin.tkprd.kegiatan.survey.kelola.get');
    Route::post('/{kegiatanId}/kelola/survey/{surveyId}/simpan', [TkprdKegiatanController::class, 'surveyKelolaStore'])->name('admin.tkprd.kegiatan.survey.kelola.store');
    Route::get('/kelola/survey/file/{fileId}hapus', [TkprdKegiatanController::class, 'surveyKelolaDelete'])->name('admin.tkprd.kegiatan.survey.kelola.delete');
});




Route::group(['prefix' => 'admin/survey'], function () {
    //Survey
    Route::get('/', [SurveyController::class, 'index'])->name('admin.survey.index');
    Route::get('/tambah', [SurveyController::class, 'create'])->name('admin.survey.create');
    Route::post('/simpan', [SurveyController::class, 'store'])->name('admin.survey.store');
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