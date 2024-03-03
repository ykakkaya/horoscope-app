<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HoroscopController;
use App\Http\Controllers\Admin\CommentController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/index',[CategoryController::class,'index'])->name('category.index');
Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
Route::post('/category/update',[CategoryController::class,'update'])->name('category.update');
Route::get('/category/destroy/{id}',[CategoryController::class,'destroy'])->name('category.destroy');

Route::get('/horoscop/index',[HoroscopController::class,'index'])->name('horoscop.index');
Route::get('/horoscop/create',[HoroscopController::class,'create'])->name('horoscop.create');
Route::post('/horoscope/store',[HoroscopController::class,'store'])->name('horoscop.store');
Route::get('/horoscop/edit/{id}',[HoroscopController::class,'edit'])->name('horoscop.edit');
Route::post('/horoscope/update',[HoroscopController::class,'update'])->name('horoscop.update');
Route::get('/horoscop/destroy/{id}',[HoroscopController::class,'destroy'])->name('horoscop.destroy');

Route::get('/comment/index',[CommentController::class,'index'])->name('comment.index');
Route::get('/comment/edit/{id}',[CommentController::class,'edit'])->name('comment.edit');
Route::post('/comment/update',[CommentController::class,'update'])->name('comment.update');
Route::get('/comment/destroy/{id}',[CommentController::class,'destroy'])->name('comment.destroy');

require __DIR__.'/auth.php';
