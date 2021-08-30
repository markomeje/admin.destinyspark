<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{DashboardController, ArticlesController};

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

Route::get('/', [DashboardController::class, 'index']);

Route::prefix('articles')->group(function () {
	Route::get('', [ArticlesController::class, 'index']);
	Route::post('/image/upload/{id}', [ArticlesController::class, 'image']);
	Route::post('/status/{id}', [ArticlesController::class, 'status']);
});

