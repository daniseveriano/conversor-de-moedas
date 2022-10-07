<?php

use App\Http\Controllers\ExchangeController;
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

Route::get('/historic', [ExchangeController::class, 'index']);

Route::get('/', [ExchangeController::class, 'create']);

Route::post('/exchange', [ExchangeController::class, 'store']);
