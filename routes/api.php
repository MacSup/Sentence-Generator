<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdverbController;
use App\Http\Controllers\AdjectiveController;
use App\Http\Controllers\SituationController;
use App\Http\Controllers\ObjectiveController;
use App\Http\Controllers\SolutionController;
use App\Http\Controllers\SentenceController;
use App\Http\Controllers\ComplementController;

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

Route::get('/adverbs/random/{number}', [AdverbController::class, 'random']);
Route::get('/adjectives/random/{number}', [AdjectiveController::class, 'random']);
Route::get('/situations/random/{number}', [SituationController::class, 'random']);
Route::get('/objectives/random/{number}', [ObjectiveController::class, 'random']);
Route::get('/solutions/random/{number}', [SolutionController::class, 'random']);

Route::apiResource('/sentences', SentenceController::class)->except(['show', 'update', 'destroy']);
Route::get('/sentences/{id}', [SentenceController::class, 'show']);
Route::get('/sentences/{id}/download', [SentenceController::class, 'download']);
