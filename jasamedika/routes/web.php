<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\PasienController;

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


Route::middleware(['guest'])->group(function(){
    Route::get('/',[SesiController::class, 'index'])->name('login');
    Route::post('/',[SesiController::class, 'login']);
});
Route::middleware(['auth'])->group(function(){
    Route::get('/admin',[AdminController::class, 'index']);
    Route::get('/admin/admin',[AdminController::class, 'admin'])->middleware('userAkses:admin');
    Route::get('/kelurahan',[KelurahanController::class, 'index'])->middleware('userAkses:admin');
    Route::get('/kelurahan/create',[KelurahanController::class, 'create'])->middleware('userAkses:admin');
    Route::post('/kelurahan/store',[KelurahanController::class, 'store'])->middleware('userAkses:admin');
    Route::get('/kelurahan/edit/{id}',[KelurahanController::class, 'edit'])->middleware('userAkses:admin');
    Route::put('/kelurahan/update/{id}',[KelurahanController::class, 'update'])->middleware('userAkses:admin');
    Route::get('/kelurahan/show/{id}',[KelurahanController::class, 'show'])->middleware('userAkses:admin');
    Route::delete('/kelurahan/{id}',[KelurahanController::class, 'delete'])->middleware('userAkses:admin');
    
    Route::get('/admin/operator',[AdminController::class, 'operator'])->middleware('userAkses:operator');
    Route::get('/pasien',[PasienController::class, 'index'])->middleware('userAkses:operator');
    Route::get('/pasien/create',[PasienController::class, 'create'])->middleware('userAkses:operator');
    Route::post('/pasien/store',[PasienController::class, 'store'])->middleware('userAkses:operator');
    Route::get('/pasien/edit/{id}',[PasienController::class, 'edit'])->middleware('userAkses:operator');
    Route::put('/pasien/update/{id}',[PasienController::class, 'update'])->middleware('userAkses:operator');
    Route::get('/pasien/show/{id}',[PasienController::class, 'show'])->middleware('userAkses:operator');
    Route::delete('/pasien/{id}',[PasienController::class, 'delete'])->middleware('userAkses:operator');
    
    Route::get('/logout',[SesiController::class, 'logout']);
});

