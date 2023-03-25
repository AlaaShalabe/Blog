<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RigesterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
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


Route::get('/', [PostController::class, 'index'])->name('welcome');
Route::prefix('category')->group(function () {
    Route::get('/index', [CategoryController::class, 'index'])->name('categories');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/show/{category}', [CategoryController::class, 'show'])->name('category.show');
    Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/update/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/delete/{category}', [CategoryController::class, 'destory'])->name('category.destory');
});

Route::prefix('user')->group(function () {
    Route::get('/signUp', [RigesterController::class, 'signUp'])->name('signUp');
    Route::post('/rigester', [RigesterController::class, 'rigester'])->name('rigester');
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/storeLogin', [LoginController::class, 'storeLogin'])->name('storeLogin');
    Route::post('/logOut', [LoginController::class, 'logOut'])->name('logOut');
});

Route::prefix('tag')->group(function () {
    Route::get('/index', [TagController::class, 'index'])->name('tags');
    Route::get('/create', [TagController::class, 'create'])->name('tag.create');
    Route::post('/store', [TagController::class, 'store'])->name('tag.store');
    Route::get('/show/{tag}', [TagController::class, 'show'])->name('tag.show');
    Route::get('/edit/{tag}', [TagController::class, 'edit'])->name('tag.edit');
    Route::put('/update/{tag}', [TagController::class, 'update'])->name('tag.update');
    Route::delete('/delete/{tag}', [TagController::class, 'destory'])->name('tag.destory');
});

Route::prefix('post')->group(function () {
    Route::get('/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/show/{post}', [PostController::class, 'show'])->name('post.show');
    Route::get('/edit/{post}', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/update/{post}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/delete/{post}', [PostController::class, 'destory'])->name('post.destory');
});
