<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;


Route::get('/login',[AuthController::class,'loginForm'])->name('login');
Route::post('/login',[AuthController::class,'postLogin'])->name('login');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');


//admin dashboard



//admin all route
Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard',[AuthController::class,'adminDashboard'])->name('admin.dashboard');
});

//user all route
Route::middleware(['user'])->group(function () {
    Route::get('/user/dashboard',[AuthController::class,'userDashboard'])->name('user.dashboard');
});

