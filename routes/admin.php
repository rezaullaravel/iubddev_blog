<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;




Route::middleware(['admin'])->prefix('admin')->group(function () {
  //category route
   Route::get('/category-list',[CategoryController::class,'index'])->name('admin.category.index');
   Route::get('/category-create',[CategoryController::class,'create'])->name('admin.category.create');
   Route::post('/category-store',[CategoryController::class,'store'])->name('admin.category.store');
   Route::get('/category-edit/{id}',[CategoryController::class,'edit'])->name('admin.category.edit');
   Route::post('/category-update',[CategoryController::class,'update'])->name('admin.category.update');
   Route::get('/category-delete/{id}',[CategoryController::class,'delete'])->name('admin.category.delete');
});

