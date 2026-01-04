<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DonateController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FocusAreaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\VolunteerController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'home'])->middleware('auth');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/focus-areas', [FocusAreaController::class, 'index'])->name('focus-areas.index');
Route::get('/focus-areas/{slug}', [FocusAreaController::class, 'show'])->name('focus-areas.show');
Route::get('/stories', [StoryController::class, 'index'])->name('stories.index');
Route::get('/stories/{slug}', [StoryController::class, 'show'])->name('stories.show');
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{slug}', [BlogController::class, 'show'])->name('blogs.show');
Route::get('/events', [EventController::class, 'index']);
Route::get('/events/{slug}', [EventController::class, 'show']);
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{slug}', [ProjectController::class, 'show']);
Route::get('/donate', [DonateController::class, 'index'])->name('donate.index');
Route::post('/donate/process', [DonateController::class, 'process'])->name('donate.process');
Route::get('/donate/callback', [DonateController::class, 'callback'])->name('donate.callback');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
Route::get('/volunteers', [VolunteerController::class, 'index'])->name('volunteers.index');
Route::get('/volunteers/signup', [VolunteerController::class, 'signup'])->name('volunteers.signup');
Route::post('/volunteers/signup', [VolunteerController::class, 'submit'])->name('volunteers.submit');
Route::get('/programs', [ProgramController::class, 'index'])->name('programs.index');
Route::get('/programs/{slug}', [ProgramController::class, 'show'])->name('programs.show');

// Social login routes
Route::get('/auth/redirect/{provider}', [SocialLoginController::class, 'redirect']);
Route::get('/auth/callback/{provider}', [SocialLoginController::class, 'callback']);

// Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
  Route::get('/dashboard', fn () => view('admin.dashboard'));
});

// Authenticated Users
Route::middleware(['auth', 'permission:manage users'])->group(function () {
    // Route::get('/users', [UserController::class, 'index']);
});
