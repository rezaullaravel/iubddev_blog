<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\LanguageSettingController;



//home page
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/blog-details/{id}/{slug}',[HomeController::class,'blogDetails'])->name('blog.details');
Route::get('/category-blog/{category_id}/{slug}',[HomeController::class,'categoryWiseBlogs'])->name('categorywiseBlog');


//blog search
Route::get('/blog-search',[HomeController::class,'blogSearch'])->name('blog.search');


//language set
Route::get('/set-bangla',[LanguageSettingController::class,'setBangla'])->name('set.bangla');
Route::get('/set-english',[LanguageSettingController::class,'setEnglish'])->name('set.english');

