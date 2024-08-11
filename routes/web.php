<?php

use App\Http\Controllers\HomeController;
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

Route::get('login',[HomeController::class,'login'])->name('login');
Route::post('login',[HomeController::class,'Authlogin'])->name('Authlogin');
Route::get('signup',[HomeController::class,'signup'])->name('signup');
Route::post('signup',[HomeController::class,'register'])->name('register');
Route::post('logout', [HomeController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:Manager'])->group(function () {
    Route::get('manager/dashboard', [HomeController::class, 'index'])->name('manager.dashboard');
});

Route::middleware(['auth', 'role:Employee'])->group(function () {
    Route::get('employee/dashboard', [HomeController::class, 'index'])->name('employee.dashboard');
});
