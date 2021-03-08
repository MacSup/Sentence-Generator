<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdverbController;
use App\Http\Controllers\AdjectiveController;
use App\Http\Controllers\SituationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/adverbs/random', [AdverbController::class, 'random']);
Route::get('/adjectives/random', [AdjectiveController::class, 'random']);
Route::get('/situations/random', [SituationController::class, 'random']);
