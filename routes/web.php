<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::middleware(['auth'])->group(function () {
Route::get('/articles',[ArticleController::class,'index']);
Route::get('/articles/{id}',[ArticleController::class,'show']);
Route::get('/articles-create',[ArticleController::class,'create']);
Route::post('/articles-store',[ArticleController::class,'store']);

// Like Controller
Route::get('/like/{article_id}/{user_id}',[LikeController::class,'like']);
Route::get('/dislike/{article_id}/{user_id}',[LikeController::class,'dislike']);

});
