<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\UserController;
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

Route::get('/', [LoginController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::resource('/documentation', DocumentationController::class)->middleware('auth');
Route::resource('/event', EventController::class)->middleware('auth');
Route::resource('/contact', ContactController::class)->middleware('auth');
Route::resource('/mitra', MitraController::class)->middleware('auth');
Route::resource('/user', UserController::class)->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::post('/login_auth', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
