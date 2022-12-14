<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
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



Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware(['guest'])->group(function () {
    //register
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register',[RegisterController::class, 'store']);
    //login
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login',[LoginController::class, 'login']);
    
});

Route::middleware(['auth'])->group(function () {
    //logout
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
    //dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::resource('posts', PostController::class)->except(['create']);


