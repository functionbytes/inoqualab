<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dependencies\ConfigurationsController;
use App\Http\Controllers\Dependencies\DashboardController;
use App\Http\Controllers\Dependencies\PetitionsController;
use App\Http\Controllers\Dependencies\TracingsController;
use App\Http\Controllers\Dependencies\UsersController;

Route::group(['prefix' => 'dependencie', 'middleware' => ['auth']], function () {

    Route::get('/', [DashboardController::class, 'dashboard'])->name('dependencie.dashboard');
    Route::get('/home', [DashboardController::class, 'dashboard'])->name('dependencie.home');

    Route::group(['prefix' => 'configurations'], function () {
        Route::get('/', [ConfigurationsController::class, 'index'])->name('dependencie.configurations');
        Route::post('/update', [ConfigurationsController::class, 'update'])->name('dependencie.configurations.update');
        Route::get('/edit/{token}', [ConfigurationsController::class, 'edit'])->name('dependencie.configurations.edit');
    });

    Route::group(['prefix' => 'users'], function () {
        Route::post('/update/{token}', [UsersController::class, 'update'])->name('dependencie.users.update');
        Route::get('/edit/{token}', [UsersController::class, 'edit'])->name('dependencie.users.edit');
    });

    Route::group(['prefix' => 'petitions'], function () {

        Route::get('/', [PetitionsController::class, 'index'])->name('dependencie.petitions');
        Route::post('/store', [PetitionsController::class, 'store'])->name('dependencie.petitions.store');
        Route::post('/update/{token}', [PetitionsController::class, 'update'])->name('dependencie.petitions.update');
        Route::get('/edit/{token}', [PetitionsController::class, 'edit'])->name('dependencie.petitions.edit');
        Route::get('/view/{token}', [PetitionsController::class, 'view'])->name('dependencie.petitions.view');
        Route::get('/tracing/{token}', [PetitionsController::class, 'tracing'])->name('dependencie.petitions.tracing');
        Route::get('/report/{token}', [PetitionsController::class, 'report'])->name('dependencie.petitions.report');
        Route::get('/destroy/{token}', [PetitionsController::class, 'destroy'])->name('dependencie.petitions.destroy');
        Route::get('/tracing/destroy/{slack}', [TracingsController::class, 'destroy'])->name('dependencie.tracings.destroy');

        Route::post('/search', [PetitionsController::class, 'search'])->name('dependencie.petitions.search');
        Route::post('/actions', [PetitionsController::class, 'actions'])->name('dependencie.petitions.actions');
        Route::post('/filters', [PetitionsController::class, 'filters'])->name('dependencie.petitions.filters');
        Route::post('/search', [PetitionsController::class, 'search'])->name('dependencie.petitions.update');

        Route::post('/tracing/store', [TracingsController::class, 'store'])->name('dependencie.tracings.store');
        Route::post('/search/actions', [PetitionsController::class, 'searchActions'])->name('dependencie.petitions.search.actions');

    });

});