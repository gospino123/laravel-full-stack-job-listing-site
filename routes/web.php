<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

class Jobs {
    public static function all(): array {
        return [
            [
                'title' => 'Director',
                'salary' => '60,000',
                'id' => 1,
            ],
            [
                'title' => 'Programmer',
                'salary' => '10,000',
                'id' => 2,
            ],
            [
                'title' => 'Teacher',
                'salary' => '40,000',
                'id' => 3,
            ],
        ];
    }
}

Route::get('/', function () {
    return view('home', [
        'greeting' => 'HI',
    ]);
});

Route::get('/jobs', function () {
    return view('jobs', 
        [ 'jobs' => Jobs::all()
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    
    $job = Arr::first(Jobs::all(), fn($job) => $job['id'] == $id);

    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});