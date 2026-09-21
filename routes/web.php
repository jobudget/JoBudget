<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\SavingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FinancialGoalController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
});


/*
|--------------------------------------------------------------------------
| Admin Login
|--------------------------------------------------------------------------
|
| This must NOT be inside the auth middleware.
|
*/

Route::get('/admin/login', [AdminController::class, 'login'])
    ->name('admin.login');

Route::post('/admin/login', [AdminController::class, 'authenticate'])
    ->name('admin.authenticate');

Route::get('/admin', [AdminController::class, 'dashboard'])
    ->name('admin.dashboard');

Route::post('/admin/logout', [AdminController::class, 'logout'])
    ->name('admin.logout');


/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');


    // Income
    Route::resource('income', IncomeController::class);


    // Expenses
    Route::resource('expense', ExpenseController::class);


    // Savings
    Route::resource('saving', SavingController::class);

    


    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');


    // Goals
    Route::resource('goals', FinancialGoalController::class)
        ->names('goal');

});


/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';