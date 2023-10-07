<?php

use App\Http\Controllers\employeeController;
use App\Http\Controllers\employeeApiController;
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

Route::get('/employee/create', [employeeController::class, 'create'])->name('createemployeeForm');
Route::post('/employee/create', [employeeController::class, 'store'])->name('createemployee');
Route::get('/employees', [employeeController::class, 'list'])->name('listemployees');
Route::get('/employee/detail/{id}', [employeeController::class, 'detail'])->name('detailemployee');
Route::get('employee/delete/{id}', [employeeController::class, 'delete'])->name('deleteemployee');
Route::get('/employee/edit/{id}', [employeeController::class, 'editform'])->name('editformemployee');
Route::put('/employee/create', [employeeController::class, 'update'])->name('updateemployee');

Route::get('/api/employees',[employeeApiController::class, 'index']);
