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
Route::post('/adverbs/contribute', [AdverbController::class, 'contribute']);

Route::get('/adjectives/random/{number}', [AdjectiveController::class, 'random']);
Route::post('/adjectives/contribute', [AdjectiveController::class, 'contribute']);

Route::get('/situations/random/{number}', [SituationController::class, 'random']);
Route::post('/situations/contribute', [SituationController::class, 'contribute']);

Route::get('/objectives/random/{number}', [ObjectiveController::class, 'random']);
Route::post('/objectives/contribute', [ObjectiveController::class, 'contribute']);

Route::get('/solutions/random/{number}', [SolutionController::class, 'random']);
Route::post('/solutions/contribute', [SolutionController::class, 'contribute']);

Route::apiResource('/sentences', SentenceController::class)->except(['show', 'update', 'destroy']);
Route::get('/sentences/{id}', [SentenceController::class, 'show']);
Route::get('/sentences/{id}/download', [SentenceController::class, 'download']);
