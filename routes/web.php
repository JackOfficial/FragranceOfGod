<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\FocusAreaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/focus-areas', [FocusAreaController::class, 'index'])->name('focus-areas.index');
Route::get('/focus-areas/{slug}', [FocusAreaController::class, 'show'])->name('focus-areas.show');