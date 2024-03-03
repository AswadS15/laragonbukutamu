<?php

use App\Models\Pesan;
use App\Models\Ulasan;
use App\Models\Upload;
use App\Models\Pengunjung;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\TujuanController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelayananController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\downloadTujuanController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home.index');
// });

// Route::get('/downloadDetailDataPelayanan', function () {
//     return view('downloadPdf/viewDetail');
// });
Route::resource('/', PengunjungController::class);
Route::post('/cekpengunjung', [PengunjungController::class, 'cekpengunjung'])->name('cekpengunjung');


Route::middleware(['auth', 'AdminPimpinan'])->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('dataPengunjung', PelayananController::class);
    Route::resource('dataPelayanan', TujuanController::class);
    Route::delete('deletedimg/{id}', [UploadController::class, 'deleteImage'])->name('deleteimg');
    Route::post('/dataPelayanan/{id}/upload', [UploadController::class, 'uploadGambar'])->name('upload');
    Route::get('/downloadDataPelayanan', [downloadTujuanController::class, 'downloadDataPelayanan'])->name('downloadDataPelayanan');
    Route::get('/viewPdf', [downloadTujuanController::class, 'index'])->name('viewPdef');
    Route::post('/export-DataPengunjung', [downloadTujuanController::class, 'exportDataPengunjung'])->name('exportDataPengunjung');
    Route::resource('divisi', DivisiController::class);
    Route::resource('users', UserController::class);
    Route::post('send-whatsapp', [UserController::class, 'sendwhatsapp'])->name('send-whatsapp');
    Route::get('profile/{id}', [UserController::class, 'profileshow'])->name('profileshow');
    Route::post('addprofile/{id}', [UserController::class, 'addprofile'])->name('addprofile');
    Route::delete('hapusprofil/{id}', [UserController::class, 'hapusprofil'])->name('hapusprofil');
    Route::get('/change-password/{id}', [UserController::class, 'showChangeForm'])->name('change-password-show');
    Route::post('/change-password', [UserController::class, 'update'])->name('change-password');
    Route::get('/editProfile/{id}', [UserController::class, 'editProfile'])->name('editProfile');
    Route::post('/updateProfile}', [UserController::class, 'updateProfile'])->name('updateProfile');
});


Route::get('/getDetailDataPelayanan/{id}', [downloadTujuanController::class, 'getDetailDataPelayanan'])->name('getDetailDataPelayanan');
Route::get('/downloadDetailDataPelayanan/{id}', [downloadTujuanController::class, 'downloadDetailDataPelayanan'])->name('downloadDetailDataPelayanan');
// PDF DATA PENGUNJUNG
Route::get('/getPengunjung', [downloadTujuanController::class, 'getPengunjung'])->name('getPengunjung');
Route::get('/downloadPengunjung', [downloadTujuanController::class, 'downloadPengunjung'])->name('downloadPengunjung');
// PDF DATA PELAYANAN
Route::get('/getPelayanan', [downloadTujuanController::class, 'getPelayanan'])->name('getPelayanan');
Route::get('/downloadPelayanan', [downloadTujuanController::class, 'downloadPelayanan'])->name('downloadPelayanan');
// pdf report
Route::get('/downloadRepord', [DashboardController::class, 'report'])->name('downloadReport');


Route::get('downloadImg/{id}', [UploadController::class, 'downloadImg'])->name('downloadImg/{id}');
Route::middleware('guest')->group(function () {
    Route::get('/ambil/{hp}', [Pengunjung::class, 'ambil'])->name('ambil');
    Route::post('showPelayanan', [PelayananController::class, 'showPelayanan'])->name('showPelayanan');
    Route::get('isiPelayanan/{id}', [PelayananController::class, 'isiPelayanan'])->name('isiPelayanan');
});
// Pengunjung Quest
Route::get('ulasan', [UlasanController::class, 'index']);
Route::any('showulasan', [UlasanController::class, 'showUlasan'])->name('showulasan');
Route::post('simpan_ulasan/{id}', [UlasanController::class, 'simpanUlasan'])->name('simpan_ulasan');





require __DIR__ . '/auth.php';
