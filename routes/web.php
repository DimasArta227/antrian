<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\PensiunanController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardContoller;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
route::post('/register/simpan', [RegisterController::class, 'register'])->name('register.post')->middleware('guest');;

// End Register

// Login
Route::get('/', [LoginController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/actionlogin', [LoginController::class, 'actionlogin'])->name('login.post')->middleware('guest');
Route::get('/logout', [LoginController::class, 'actionlogout'])->middleware('auth');
// End Login

Route::middleware('auth')->group(function () {

    route::get('/dashboard', [DashboardContoller::class, 'index']);

    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    route::get('/user/tambah', [UserController::class, 'create']);
    route::post('/user/simpan', [UserController::class, 'store']);
    route::get('/user/{id}/show', [UserController::class, 'show']);
    route::post('/user/{id}/update', [UserController::class, 'update']);
    route::get('/user/{id}/delete', [UserController::class, 'destroy']);

    route::get('/pensiunan', [PensiunanController::class, 'index']);
    route::get('/pensiunan/tambah-pelanggan', [PensiunanController::class, 'createPelanggan']);
    route::get('/pensiunan/tambah-admin', [PensiunanController::class, 'createAdmin']);
    route::post('/pensiunan/simpan', [PensiunanController::class, 'store']);
    route::get('/pensiunan/{id}/show', [PensiunanController::class, 'show']);
    route::post('/pensiunan/{id}/update', [PensiunanController::class, 'update']);
    route::get('/pensiunan/{id}/delete', [PensiunanController::class, 'destroy']);

    route::get('/antrian', [AntrianController::class, 'index']);
    route::get('/antrian/tambah', [AntrianController::class, 'create']);
    route::get('/antrian/simpan-pelanggan', [AntrianController::class, 'storePelanggan']);
    route::post('/antrian/simpan-admin', [AntrianController::class, 'storeAdmin']);
    route::get('/antrian/{id}/show', [AntrianController::class, 'show']);
    route::get('/antrian/{id}/update', [AntrianController::class, 'update']);
    route::get('/antrian/{id}/delete', [AntrianController::class, 'destroy']);
    Route::get('/antrian/{id}/cetak', [AntrianController::class, 'cetak']);

});