<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;

// Create dummy route for testing
Route::get('test', function() {
  dispatch(function() {
    logger('hello from the queue');
  });
  return 'Done';
});

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
    ->can('edit', 'job');
    // Using policy ->can('method-name', 'corresponding-model');

  Route::patch('/jobs/{job}', 'update')
    ->middleware('auth')
    ->can('edit', 'job');

  Route::delete('/jobs/{job}', 'destroy')
    ->middleware('auth')
    ->can('edit', 'job');
});

// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

// Notes:
/*
Decision Paralysis
 -Authorization in Routes or Controller?
 -Gate facade or Policy?
It always depends
 -Simple? Gate
 -Complex? Policy
*/