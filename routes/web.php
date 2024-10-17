<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/home',[HomeController::class,'index'])->name('dashboard');

// Route::get('/admin',[HomeController::class,'admin'])->middleware('admin');

Route::get('/start-quiz', [QuestionController::class,'show'])->middleware('user');
Route::get('/submit-answer', [QuestionController::class,'submit'])->middleware('user');
Route::post('/answer', [QuestionController::class,'onSubmit'])->middleware('user');

Route::post('/question',[QuestionController::class,'store']);
Route::patch('/question/{question}',[QuestionController::class,'update']);
Route::delete('/question/{question}',[QuestionController::class,'destroy']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
