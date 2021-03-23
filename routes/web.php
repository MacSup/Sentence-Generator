<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WebController;

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


Route::get('/', [WebController::class, 'home']);
Route::get('/generator', [WebController::class, 'generator']);

Route::get('images/{image}', [WebController::class, 'images']);
Route::get('videos/{video}', [WebController::class, 'videos']);
