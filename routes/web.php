<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

//Blog route
Route::get('/blog', [BlogController::class, 'index']) -> name('blog');
Route::get('/blog/add', [BlogController::class, 'add']);
Route::post('/blog/create', [BlogController::class, 'create']);
Route::get('/blog/{id}/detail', [BlogController::class, 'show']);
Route::get('/blog/{id}/edit', [BlogController::class, 'edit']);
Route::patch('/blog/{id}/update', [BlogController::class, 'update']);
Route::get('/blog/{id}/delete', [BlogController::class, 'delete']);

//mahasiswa route
Route::get('/mahasiswa', [MahasiswaController::class, 'index']) -> name('mahasiswa');
Route::get('/mahasiswa/add', [MahasiswaController::class, 'add']);
Route::post('/mahasiswa/create', [MahasiswaController::class, 'create']);
Route::get('/mahasiswa/{id}/detail', [MahasiswaController::class, 'show']);
Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit']);
Route::patch('/mahasiswa/{id}/update', [MahasiswaController::class, 'update']);
Route::get('/mahasiswa/{id}/delete', [MahasiswaController::class, 'delete']);

//karywan route
Route::get('/karyawan', [KaryawanController::class, 'index']) -> name('karyawan');
Route::get('/karyawan/add', [KaryawanController::class, 'add']);
Route::post('/karyawan/create', [KaryawanController::class, 'create']);
Route::get('/karyawan/{id}/detail', [KaryawanController::class, 'show']);
Route::get('/karyawan/{id}/edit', [KaryawanController::class, 'edit']);
Route::patch('/karyawan/{id}/update', [KaryawanController::class, 'update']);
Route::get('/karyawan/{id}/delete', [KaryawanController::class, 'delete']);

//dosen route
Route::get('/dosen', [DosenController::class, 'index']) -> name('dosen');
Route::get('/dosen/add', [DosenController::class, 'add']);
Route::post('/dosen/create', [DosenController::class, 'create']);
Route::get('/dosen/{id}/detail', [DosenController::class, 'show']);
Route::get('/dosen/{id}/edit', [DosenController::class, 'edit']);
Route::patch('/dosen/{id}/update', [DosenController::class, 'update']);
Route::get('/dosen/{id}/delete', [DosenController::class, 'delete']);