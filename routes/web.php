<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [UserController::class, 'loginView'])->name('loginrollback')->middleware('guest'); //cek di middleware.authenticate
Route::post('/login', [UserController::class, 'loginLauncher']);
Route::post('/logout', [UserController::class, 'logout']);



Route::get('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/register', [UserController::class, 'store']);


Route::get('/home', [HomeController::class, 'index'])->middleware('auth');
