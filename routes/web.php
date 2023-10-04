<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\RuanganPoadcastController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('layouts.user');
})->name('user');

Route::controller(DashboardController::class)->middleware('auth','verified')->prefix('/dashboard')->group(function(){
    Route::get('/', 'index')->name('dashboard');
});

Route::controller(RuanganPoadcastController::class)->middleware('auth','verified')->prefix('/ruangan_poadcast')->group(function(){
    Route::get('/', 'index')->name('ruanganPoadcast');
    Route::get('/create', 'create')->name('ruanganPoadcast.create');
    Route::post('/', 'store')->name('ruanganPoadcast.store');
    Route::get('/{ruanganPoadcast}/edit', 'edit')->name('ruanganPoadcast.edit');
    Route::patch('/{ruanganPoadcast}/update', 'update')->name('ruanganPoadcast.update');
    Route::delete('/{ruanganPoadcast}/delete', 'delete')->name('ruanganPoadcast.delete');
});

Route::controller(ProgramStudiController::class)->middleware('auth','verified')->prefix('/program_studi')->group(function(){
    Route::get('/', 'index')->name('programStudi');
    Route::post('/', 'store')->name('programStudi.store');
    Route::get('/{programStudi:kode}/edit', 'edit')->name('programStudi.edit');
    Route::patch('/update', 'update')->name('programStudi.update');
    Route::delete('/{programStudi:kode}/delete', 'delete')->name('programStudi.delete');
});

Route::controller(OperatorController::class)->middleware('auth','verified')->prefix('/operator')->group(function(){
    Route::get('/', 'index')->name('operator');
});

Route::controller(PermissionController::class)->middleware('auth','verified')->prefix('/permission')->group(function(){
    Route::get('/', 'index')->name('permission');
    Route::post('/', 'store')->name('permission.store');
    Route::get('/{permission}/edit', 'edit')->name('permission.edit');
    Route::patch('/update', 'update')->name('permission.update');
    Route::delete('/{permission}/delete', 'delete')->name('permission.delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
