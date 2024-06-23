<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    public function create() {
        return view('auth.register');
    }
    public function store() {
        // validate
        // create user in database
        // log in user
        // redirect user to dashboard/homepage
    }
}
