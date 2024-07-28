<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;

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
    return view('/student/index',);
});

Route::get('/', [StudentController::class, 'index'])->name('student.index');
Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
Route::post('/student', [StudentController::class, 'store'])->name('student.store');
Route::get('/student/{student}', [StudentController::class, 'show'])->name('student.show');
Route::get('/student/{student}/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::put('/student/{student}', [StudentController::class, 'update'])->name('student.update');
Route::delete('/student/{student}', [StudentController::class, 'destroy'])->name('student.destroy');

Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan.index');
Route::get('/jurusan/create', [JurusanController::class, 'create'])->name('jurusan.create');
Route::post('/jurusan', [JurusanController::class, 'store'])->name('jurusan.store');
Route::get('/jurusan/{jurusan}', [JurusanController::class, 'show'])->name('jurusan.show');

Route::get('/siswa', function () {
    return view('/siswa/index',);
});

Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
Route::get('/siswa/{siswa}', [SiswaController::class, 'show'])->name('siswa.show');
Route::get('/siswa/{siswa}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::put('/siswa/{siswa}', [SiswaController::class, 'update'])->name('siswa.update');
Route::delete('/siswa/{siswa}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

Route::get('/role', function () {
    return view('/role/role',);
});

Route::get('/role', [UserController::class, 'index'])->name('role.index');
Route::get('/role/create', [UserController::class, 'create'])->name('role.create');
Route::post('/role', [UserController::class, 'store'])->name('role.store');