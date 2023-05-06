<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RigesterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\App;
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
Route::get('contact', [ContactController::class, 'create'])->name('contact');
Route::post('contact/create', [ContactController::class, 'store'])->name('contact.store');
Route::prefix('category')->middleware('auth')->group(function () {
    Route::get('/index', [CategoryController::class, 'index'])->name('categories');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/show/{category}', [CategoryController::class, 'show'])->name('category.show')->withoutMiddleware('auth');
    Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/update/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/delete/{category}', [CategoryController::class, 'destory'])->name('category.destory');
});

Route::prefix('user')->group(function () {
    Route::get('users', [UserController::class, 'index'])->name('users');
    Route::get('/signUp', [RigesterController::class, 'signUp'])->name('signUp');
    Route::post('/rigester', [RigesterController::class, 'rigester'])->name('rigester');
    Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
    Route::post('/storeLogin', [LoginController::class, 'storeLogin'])->name('storeLogin')->middleware('guest');
    Route::post('/logOut', [LoginController::class, 'logOut'])->name('logOut');
});

Route::prefix('tag')->middleware('auth')->group(function () {
    Route::get('/index', [TagController::class, 'index'])->name('tags');
    Route::get('/create', [TagController::class, 'create'])->name('tag.create');
    Route::post('/store', [TagController::class, 'store'])->name('tag.store');
    Route::get('/show/{tag}', [TagController::class, 'show'])->name('tag.show')->withoutMiddleware('auth');
    Route::get('/edit/{tag}', [TagController::class, 'edit'])->name('tag.edit');
    Route::put('/update/{tag}', [TagController::class, 'update'])->name('tag.update');
    Route::delete('/delete/{tag}', [TagController::class, 'destory'])->name('tag.destory');
});

Route::prefix('post')->middleware('auth')->group(function () {
    Route::get('/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/show/{post}', [PostController::class, 'show'])->name('post.show')->withoutMiddleware('auth');
    Route::get('/edit/{post}', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/update/{post}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/delete/{post}', [PostController::class, 'destory'])->name('post.destory');
});

Route::prefix('comment')->middleware('auth')->group(function () {
    Route::post('/store/{post}', [CommentController::class, 'store'])->name('comment.store');
    Route::delete('/delete/{comment}', [CommentController::class, 'destory'])->name('comment.destory');
});
Route::get('/lang/{local}', [LocalizationController::class, 'langChainge']);



Route::get('/lang/{id}', function($id){
    return view('post.show',['id'=>$id]);
});
