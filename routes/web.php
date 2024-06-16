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
    // get() will get ALL records, so you would want to limit this
    // Lazy loading has risk of n+1 and sometimes ppl disable at start of project
    $jobs = Job::with('employer')->get();
    
    return view('jobs', 
        [ 'jobs' => $jobs,
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    
    $job = Job::find($id);

    if (! $job) {
        abort(404);
    }

    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});