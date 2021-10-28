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
});

