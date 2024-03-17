<?php

use App\Http\Controllers\Admin\ChoiceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\Admin\QuestionController::class , 'index'])->name('home');
Route::get('/question/{question}', [\App\Http\Controllers\Admin\QuestionController::class , 'show'])->name('question.show');
Route::get('/question/{question}/edit', [\App\Http\Controllers\Admin\QuestionController::class , 'edit'])->name('question.edit');
Route::post('/question', [\App\Http\Controllers\Admin\QuestionController::class , 'store'])->name('question.store');
Route::put('/question/{question}', [\App\Http\Controllers\Admin\QuestionController::class , 'update'])->name('question.update');
Route::delete('/question/{question}', [\App\Http\Controllers\Admin\QuestionController::class , 'destroy'])->name('question.destroy');

////******************************////////
Route::get('/choice/{id}', [\App\Http\Controllers\Admin\ChoiceController::class , 'index'])->name('choice.index');
Route::delete('/choice/{choice}', [ChoiceController::class, 'destroy'])->name('choice.destroy');
Route::post('/choice/', [ChoiceController::class, 'store'])->name('choice.store');
