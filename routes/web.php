<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\SavingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FinancialGoalController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Income
    Route::resource('income', IncomeController::class);

    // Expenses
    Route::resource('expense', ExpenseController::class);
    Route::resource('saving', SavingController::class);

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::resource('goals', FinancialGoalController::class)
    ->names('goal');
});

require __DIR__.'/auth.php';