<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

\Illuminate\Support\Facades\Auth::routes();

Route::get('/', function(){
    return redirect('/login');
})->name('home');

Route::prefix('user')->name('user.')->middleware('auth')->group(function(){
    Route::view('dashboard', 'user.dashboard')->name('dashboard');
    Route::resource('staffs', \App\Http\Controllers\StaffController::class);
    Route::resource('users', \App\Http\Controllers\UserController::class);

    Route::resource('types', \App\Http\Controllers\ProductTypeController::class);
    Route::resource('models', \App\Http\Controllers\ProductModelController::class);
    Route::resource('makes', \App\Http\Controllers\MakeController::class);
    Route::resource('colours', \App\Http\Controllers\ColourController::class);
    Route::resource('storages', \App\Http\Controllers\ProductStorageController::class);
    Route::resource('conditions', \App\Http\Controllers\ConditionController::class);
    Route::resource('locations', \App\Http\Controllers\LocationController::class);

    Route::resource('products', \App\Http\Controllers\ProductController::class);
});

