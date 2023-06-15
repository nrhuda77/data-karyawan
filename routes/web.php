<?php
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\KaryawanController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::resource('/dash', dashController::class)->middleware('auth');
Route::resource('/absen', AbsenController::class)->middleware('auth');
Route::resource('/karyawan', KaryawanController::class)->middleware('auth');
Route::post('/absen/absen_excel', [AbsenController::class,'import_excel'])->middleware('auth');
Route::post('/karyawan/karyawan_excel', [KaryawanController::class,'import_excel'])->middleware('auth');
Route::get('/edit-absen/{id}', [AbsenController::class, 'ajax_edit_absen'])->middleware('auth');
Route::get('/edit/{id}', [KaryawanController::class, 'ajax_edit_karyawan'])->middleware('auth');
Route::put('/absensi',[AbsenController::class, 'update'])->middleware('auth');
Route::put('/karyawans',[KaryawanController::class, 'update'])->middleware('auth');


