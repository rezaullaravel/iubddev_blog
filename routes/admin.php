<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CategoryController;




Route::middleware(['admin'])->prefix('admin')->group(function () {
  //category route
   Route::get('/category-list',[CategoryController::class,'index'])->name('admin.category.index');
   Route::get('/category-create',[CategoryController::class,'create'])->name('admin.category.create');
   Route::post('/category-store',[CategoryController::class,'store'])->name('admin.category.store');
   Route::get('/category-edit/{id}',[CategoryController::class,'edit'])->name('admin.category.edit');
   Route::post('/category-update',[CategoryController::class,'update'])->name('admin.category.update');
   Route::get('/category-delete/{id}',[CategoryController::class,'delete'])->name('admin.category.delete');

   //blog
   Route::get('/blog-list',[BlogController::class,'index'])->name('admin.blog.index');
   Route::get('/blog-create',[BlogController::class,'create'])->name('admin.blog.create');
   Route::post('/blog-store',[BlogController::class,'store'])->name('admin.blog.store');
   Route::get('/blog-edit/{id}',[BlogController::class,'edit'])->name('admin.blog.edit');
   Route::post('/blog-update/{id}',[BlogController::class,'update'])->name('admin.blog.update');
   Route::get('/blog-delete/{id}',[BlogController::class,'delete'])->name('admin.blog.delete');
   //for ck editor
   Route::post('/ckeditor/upload', [BlogController::class, 'uploadCkeditor'])->name('ckeditor.upload');

   //site setting
   Route::get('/site-setting',[SettingController::class,'index'])->name('admin.site.setting');
   Route::post('/site-setting-update/{id}',[SettingController::class,'update'])->name('admin.site-setting.update');
});


//404 page
Route::get('/{any}', function () {
    return view('welcome'); // 404 page
})->where('any', '.*');
