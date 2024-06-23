<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create() {
        return view('auth.login');
    }
    public function store() {
        // validate form
        // attempt to log in user
        // regenerate session token
        // redirect to jobs
    }
    public function destroy() {
        Auth::logout();
        return redirect('/');
    }
}
