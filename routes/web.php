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

// Index
Route::get('/jobs', function () {
    // Use eager loading 'with'
    
    // Use cursorPaginate for best performance but bad URL, use case could be infinite scrolling
    // $jobs = Job::with('employer')->cursorPaginate(3);
    $jobs = Job::with('employer')->latest()->simplePaginate(3);
    
    return view('jobs.index', 
        [ 'jobs' => $jobs,
    ]);
});

// Be careful with hierarchy - wildcards (/jobs/{id}) should go towards the bottom
// Create
Route::get('/jobs/create', function () {
    return view('jobs.create');
});


/*
Different ways to use Laravel's convention to get the right item
1. Match wildcard {example} with argument ( $example) - and maybe usage below in the function block
2. Use type, like the instance of a Job noted as (Job $job)
3. Then, you don't have to use the findOrFail part
Route::get('posts/{post:slug}');
Route::get('posts/{post:id}');
Route::get('posts/{post}');
*/

// Show
Route::get('/jobs/{job}', function (Job $job) {
    return view('jobs.show', ['job' => $job,]);
});

// Store
Route::post('/jobs', function() {
    // dd(request()->all());

    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
        // laravel.com/docs/validation
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);

    return redirect('/jobs');
});

// Edit
Route::get('/jobs/{job}/edit', function (Job $job) {
    return view('jobs.edit', ['job' => $job,]);
});

// Update
Route::patch('/jobs/{id}', function ($id) {
    // Validate
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);
    // Authorize (on hold...)
    // Update job
    $job = Job::findOrFail($id);
    $job->title = request('title');
    $job->salary = request('salary');
    /*
    OR 
    $job->update([
        'title' => request('title');
        'salary' => request('salary');
    ])
    */
    // Persist
    $job->save();
    // Redirect
    return redirect('/jobs/' . $job->id);

});

// Destroy
Route::delete('/jobs/{id}', function ($id) {
    // authorize (on hold...)
    // delete job
    // redirect

    /*
    $job = Job::findOrFail($id);
    $job->delete();
    OR
    */
    Job::findOrFail($id)->delete();

    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});