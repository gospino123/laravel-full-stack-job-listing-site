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

// Show
Route::get('/jobs/{id}', function ($id) {
    
    $job = Job::findOrFail($id);

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
Route::get('/jobs/{id}/edit', function ($id) {
    
    $job = Job::find($id);

    if (! $job) {
        abort(404);
    }

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
    
    $job = Job::find($id);

    if (! $job) {
        abort(404);
    }

});

Route::get('/contact', function () {
    return view('contact');
});