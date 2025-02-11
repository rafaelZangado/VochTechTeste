<?php

use App\Http\Controllers\AuditController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\EconomicGroupController;
use \App\Http\Controllers\FlagController;
use \App\Http\Controllers\UnitController;
use \App\Http\Controllers\EmployeeController;
use \App\Http\Controllers\AuthController;
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
Route::get('/login', function () {
    return view('welcome');
});

Route::get('/create', function () {
    return view('create');
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::middleware('auth')->group(function () {
    Route::resource('groups', EconomicGroupController::class);
    Route::resource('flags', FlagController::class);
    Route::resource('units', UnitController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('audits', AuditController::class);
});
