<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentApiController;
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
    return view('welcome');
});

Route::get('/student/create', [StudentController::class, 'create'])->name('createStudentForm');
Route::post('/student/create', [StudentController::class, 'store'])->name('createStudent');
Route::get('/students', [StudentController::class, 'list'])->name('listStudents');
Route::get('/student/detail/{id}', [StudentController::class, 'detail'])->name('detailStudent');
Route::get('student/delete/{id}', [StudentController::class, 'delete'])->name('deleteStudent');
Route::get('/student/edit/{id}', [StudentController::class, 'editform'])->name('editformStudent');
Route::put('/student/create', [StudentController::class, 'update'])->name('updateStudent');

Route::get('/api/students',[StudentApiController::class, 'index']);
