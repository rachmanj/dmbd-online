<?php

use App\Http\Controllers\BreakdownController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WoDataController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');

    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('templates.welcome');
    });

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/data', [UserController::class, 'data'])->name('data');
        Route::put('/activate/{id}', [UserController::class, 'activate'])->name('activate');
        Route::put('/deactivate/{id}', [UserController::class, 'deactivate'])->name('deactivate');
        Route::put('/roles-update/{id}', [UserController::class, 'roles_user_update'])->name('roles_user_update');
        Route::resource('/', UserController::class);
    });

    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);

    Route::prefix('wo-data')->name('wo-data.')->group(function () {
        Route::get('/data', [WoDataController::class, 'data'])->name('data');
        Route::get('/', [WoDataController::class, 'index'])->name('index');
        Route::post('/upload', [WoDataController::class, 'upload'])->name('upload');
        Route::get('/truncate', [WoDataController::class, 'truncate'])->name('truncate');
        Route::get('/{id}', [WoDataController::class, 'show'])->name('show');
    });

    Route::prefix('breakdowns')->name('breakdowns.')->group(function () {
        Route::get('/data', [BreakdownController::class, 'data'])->name('data');
        Route::put('/{id}/update-status', [BreakdownController::class, 'update_status'])->name('update_status');
    });
    Route::resource('breakdowns', BreakdownController::class);

    Route::prefix('history')->name('history.')->group(function () {
        Route::get('/data', [HistoryController::class, 'data'])->name('data');
        Route::get('/', [HistoryController::class, 'index'])->name('index');
        Route::get('/{id}/show', [HistoryController::class, 'show'])->name('show');
    });

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
    });
});
