<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;

Route::view('/', 'home', ['greeting' => 'Hi hi']);
Route::view('/contact', 'contact');

Route::controller(JobController::class)->group(function() {
  Route::get('/jobs', 'index');
  Route::get('/jobs/create', 'create');
  
  Route::post('/jobs', 'store')
    ->middleware('auth');

  Route::get('/jobs/{job}', 'show');
  
  Route::get('/jobs/{job}/edit', 'edit')
    ->middleware('auth')
    ->can('edit-job', 'job');

  Route::patch('/jobs/{job}', 'update');

  Route::delete('/jobs/{job}', 'destroy');
});

// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);