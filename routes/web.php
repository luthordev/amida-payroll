<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\SalaryController;

Route::get('/', function () {
    return view('dashboard.index');
});

//Route::middleware(['isAdmin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    
    Route::get('/dashboard/employee', [EmployeeController::class, 'index']);
    Route::get('/dashboard/employee/add', [EmployeeController::class, 'add']);
    Route::post('/dashboard/employee/adding', [EmployeeController::class, 'store'])->name('employee.add');
    Route::get('/dashboard/employee/edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::patch('/dashboard/employee/update/{id}', [EmployeeController::class, 'update'])->name('employee.update');
    Route::get('/dashboard/employee/delete/{id}', [EmployeeController::class, 'delete'])->name('employee.delete');
    
    Route::get('/dashboard/position', [PositionController::class, 'index']);
    Route::get('/dashboard/position/add', [PositionController::class, 'add']);
    Route::post('/dashboard/position/adding', [PositionController::class, 'store'])->name('position.add');
    Route::get('/dashboard/position/edit/{id}', [PositionController::class, 'edit'])->name('position.edit');
    Route::patch('/dashboard/position/update/{id}', [PositionController::class, 'update'])->name('position.update');
    Route::get('/dashboard/position/delete/{id}', [PositionController::class, 'delete'])->name('position.delete');
    
    Route::get('/dashboard/division', [DivisionController::class, 'index']);
    Route::get('/dashboard/division/add', [DivisionController::class, 'add']);
    Route::post('/dashboard/division/adding', [DivisionController::class, 'store'])->name('division.add');
    Route::get('/dashboard/division/edit/{id}', [DivisionController::class, 'edit'])->name('division.edit');
    Route::patch('/dashboard/division/update/{id}', [DivisionController::class, 'update'])->name('division.update');
    Route::get('/dashboard/division/delete/{id}', [DivisionController::class, 'delete'])->name('division.delete');
    
    Route::get('/dashboard/salary', [SalaryController::class, 'index']);
    Route::get('/dashboard/salary/pay/{id}', [SalaryController::class, 'pay'])->name('salary.pay');
    Route::post('/dashboard/salary/adding', [SalaryController::class, 'store'])->name('salary.add');
    
    Route::get('/dashboard/slip', [PrintController::class, 'index']);
    Route::get('/dashboard/print/{month}/{id}', [PrintController::class, 'print'])->name('print');
//});