<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    $jobs = Job::all();

    /* return view('home', [
        'greeting' => 'HI',
    ]);*/

    dd($jobs[1]->title);
});

Route::get('/jobs', function () {
    return view('jobs', 
        [ 'jobs' => Job::all()
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    
    $job = Job::find($id);

    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});