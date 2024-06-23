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
        $attributes = request()->validate([
            'email' => ['email', 'required'],
            'password' => ['required']
        ]);
        // attempt to log in user
        Auth::attempt($attributes);
        // regenerate session token
        request()->session()->regenerate();
        // redirect to jobs
        return redirect('/jobs');
    }
    public function destroy() {
        Auth::logout();
        return redirect('/');
    }
}
