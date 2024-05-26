<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'greeting' => 'HI',
    ]);
});

Route::get('/jobs', function () {
    return view('jobs', [ 'jobs' => [
        [
            'title' => 'Director',
            'salary' => '60,000',
        ],
        [
            'title' => 'Programmer',
            'salary' => '10,000',
        ],
        [
            'title' => 'Teacher',
            'salary' => '40,000',
        ],
    ]
    ]);
});

Route::get('/contact', function () {
    return view('contact');
});