<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home', [
        'greeting' => 'HI',
        'jobs' => Job::all()
    ]);
});

Route::get('/jobs', function () {
    // Use eager loading 'with'
    
    // Use cursorPaginate for best performance but bad URL, use case could be infinite scrolling
    // $jobs = Job::with('employer')->cursorPaginate(3);
    $jobs = Job::with('employer')->simplePaginate(3);
    
    return view('jobs.index', 
        [ 'jobs' => $jobs,
    ]);
});

// Be careful with hierarchy - wildcards (/jobs/{id}) should go towards the bottom
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id) {
    
    $job = Job::find($id);

    if (! $job) {
        abort(404);
    }

    return view('jobs.show', ['job' => $job]);
});

Route::post('/jobs', function() {
    dd('hello world');
});

Route::get('/contact', function () {
    return view('contact');
});