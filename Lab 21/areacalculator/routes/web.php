<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaCalculatorController;

Route::get('/calculator', [AreaCalculatorController::class, 'showCalculatorForm']);
Route::post('/calculate', [AreaCalculatorController::class, 'calculateArea']);

