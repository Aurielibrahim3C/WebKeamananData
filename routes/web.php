<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TempatPklController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\RegistrasiPklController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\JenjangController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardControllerController;



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

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');



Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth') // Menambahkan middleware 'auth' ke route dashboard
    ->name('dashboard');

//RUANGAN DATA
Route::resource('/ruangan', RuanganController::class);

//JENJANG DATA
Route::resource('/jenjang', JenjangController::class);

//JURUSAN DATA
Route::resource('/jurusan', JurusanController::class);

//JABATAN DATA
Route::resource('/jabatan', JabatanController::class);

//PRODI
Route::resource('/prodi', ProdiController::class);

//SESI

Route::resource('/sesi', SesiController::class);

//GOLONGAN


Route::resource('/golongan', GolonganController::class);

//MAHASISWA



// Mahasiswa routes
Route::resource('/mahasiswa', MahasiswaController::class);


//USERS ADATA
Route::resource('/users', UserController::class);

//ROLE
Route::resource('/roles', RoleController::class);

//DOSEN
Route::resource('/dosens    ', DosenController::class);

//Tempat PKL

Route::resource('/tempat_pkl', TempatPklController::class);

//Registrasi PKL

Route::resource('/registrasi_pkl', RegistrasiPklController::class);
