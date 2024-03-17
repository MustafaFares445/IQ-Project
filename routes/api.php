<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:sanctum')->group(function (){
    Route::resource('/question', App\Http\Controllers\QuestionController::class)->only('index', 'store');

    Route::get('/type' , [\App\Http\Controllers\TypeController::class , 'index']);

    Route::resource('/score', App\Http\Controllers\ScoreController::class)->only('index' , 'store');

    Route::get('/time' , \App\Http\Controllers\TimeController::class);

    Route::delete('/logout', [App\Http\Controllers\AuthController::class , 'logout']);
});

Route::post('/register', [App\Http\Controllers\AuthController::class , 'register']);
Route::post('/login', [App\Http\Controllers\AuthController::class , 'login']);

Route::post('/question', [\App\Http\Controllers\Admin\QuestionController::class , 'store'])->name('question.store');
