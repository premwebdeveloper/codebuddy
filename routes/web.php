<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function() {
    // Route::resource('categories', CategoryController::class);
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/users', [App\Http\Controllers\AdminController::class, 'users'])->name('admin.users');
    Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories');
    Route::get('/category-create', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
    Route::post('/category-store', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('/user_dashboard', [App\Http\Controllers\UserController::class, 'index'])->name('user-dashboard');
});