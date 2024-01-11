<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
     return redirect('/articles');
});


Route::resource('articles', ArticleController::class);
// Route::get('articles.filter', [ArticleController::class , 'filter'])->name('articles.filter');

Route::resource('categories', CategoryController::class);



// Route::get('/articles', [ArticleController::class,'index'])->name('articles');


// Route::get('/create-article', [ArticleController::class,'create'])->name('create-article');

// Route::get('/create-category', [CategoryController::class,'create'])->name('create-category');

// Route::post('/store-article' , [ArticleController::class,'store'])->name('store-article');

// Route::post('/store-category' , [CategoryController::class,'store'])->name('store-category');


