<?php

use App\Http\Controllers\ExchangeController;
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

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ExchangeController::class, 'create'])->name('create');
    Route::delete('/dashboard/{id}', [ExchangeController::class, 'destroy']);
    Route::get('/show', [ExchangeController::class, 'show'])->name('show');
    Route::get('/show/{id}', [ExchangeController::class, 'details']);
    Route::post('/exchange', [ExchangeController::class, 'store'])->name('store');
    Route::get('/user', [UserController::class, 'edit'])->name('edit');
    Route::put('/user/update', [UserController::class, 'update']);
});

Route::get('/', [UserController::class, 'index'])->name('index');
Route::get('/signup', [UserController::class, 'signup'])->name('signup');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/auth', [UserController::class, 'auth'])->name('auth');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
