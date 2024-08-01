<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\HobbyController;

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
Route::get('/student/{student}/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::put('/student/{student}', [StudentController::class, 'update'])->name('student.update');
Route::delete('/student/{student}', [StudentController::class, 'destroy'])->name('student.destroy');
Route::get('/{student}/softdelete',[StudentController::class, 'softdelete'])->name('student.softdelete');
Route::get('/student/history',[StudentController::class, 'history'])->name('student.history');
Route::put('/student/restore/{student}',[StudentController::class, 'restore'])->name('student.restore');
Route::delete('/student/{student}', [StudentController::class, 'forceDelete'])->name('student.forceDelete');


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
Route::get('/siswa/{siswa}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::put('/siswa/{siswa}', [SiswaController::class, 'update'])->name('siswa.update');
Route::delete('/siswa/{siswa}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
Route::get('/softdelete/{siswa}',[SiswaController::class, 'softdelete'])->name('siswa.softdelete');
Route::get('/siswa/history',[SiswaController::class, 'history'])->name('siswa.history');
Route::put('/siswa/restore/{siswa}',[SiswaController::class, 'restore'])->name('siswa.restore');
Route::delete('/siswa/{siswa}', [SiswaController::class, 'forceDelete'])->name('siswa.forceDelete');



Route::get('/murid', function () {
    return view('/murid/index',);
});

Route::get('/murid', [MuridController::class, 'index'])->name('murid.index');
Route::get('/murid/create', [MuridController::class, 'create'])->name('murid.create');
Route::post('/murid', [MuridController::class, 'store'])->name('murid.store');
Route::get('/murid/{murid}/edit', [MuridController::class, 'edit'])->name('murid.edit');
Route::put('/murid/{murid}', [MuridController::class, 'update'])->name('murid.update');
Route::delete('/murid/{murid}', [MuridController::class, 'destroy'])->name('murid.destroy');
Route::get('/murid/softdelete/{murid}',[MuridController::class, 'softdelete'])->name('murid.softdelete');
Route::get('/murid/history',[MuridController::class, 'history'])->name('murid.history');
Route::put('/murid/restore/{murid}',[MuridController::class, 'restore'])->name('murid.restore');
Route::delete('/murid/{murid}', [MuridController::class, 'forceDelete'])->name('murid.forceDelete');


Route::get('/hobby', [HobbyController::class, 'hobby'])->name('hobby.hobby');
Route::get('/hobby/create', [HobbyController::class, 'create'])->name('hobby.create');
Route::post('/hobby', [HobbyController::class, 'store'])->name('hobby.store');
Route::delete('/hobby/{hobby}', [HobbyController::class, 'destroy'])->name('hobby.destroy');