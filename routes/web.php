<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
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
    Route::get('admin/project', [ProjectController::class, 'getProject'])->name('admin.project');
    Route::post('admin/project/Create', [ProjectController::class, 'getProjectForm'])->name('admin.add.project');
    Route::get('admin/project/{id}', [ProjectController::class, 'getProjectEdit'])->name('admin.project.edit');
    Route::post('admin/project/{id}', [ProjectController::class, 'getProjectUpdate'])->name('admin.project.update');
    Route::get('admin/project/delete/{id}', [ProjectController::class, 'getProjectDelete'])->name('admin.project.delete');
});

Route::middleware(['auth', 'role:Manager'])->group(function () {
    Route::get('manager/dashboard', [HomeController::class, 'index'])->name('manager.dashboard');
    Route::get('manager/task', [TaskController::class, 'getTask'])->name('manage.task');
    Route::post('manager/task/Assign', [TaskController::class, 'getTaskAssign'])->name('manage.task.assign');
    Route::get('manager/task/{id}', [TaskController::class, 'getTaskEdit'])->name('manage.task.edit');
    Route::get('manager/task/delete/{id}', [TaskController::class, 'getTaskDelete'])->name('manage.task.delete');
    Route::post('manager/task/{id}', [TaskController::class, 'getTaskUpdate'])->name('manage.task.update');
});

Route::middleware(['auth', 'role:Employee'])->group(function () {
    Route::get('employee/dashboard', [HomeController::class, 'index'])->name('employee.dashboard');
});
