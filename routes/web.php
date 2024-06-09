<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Models\Action;

Route::get('/', function () {
    return view('home', [
        'greeting' => 'HI',
        'jobs' => Job::all()
    ]);
});

Route::get('/actions', function () {
    return view('actions', 
        [ 'actions' => Action::all()
        ]    
    );
});

Route::get('/jobs', function () {
    return view('jobs', 
        [ 'jobs' => Job::all()
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