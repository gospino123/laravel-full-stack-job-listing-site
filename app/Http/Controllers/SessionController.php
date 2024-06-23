<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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
        if (! Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credentials do not match.'
            ]);
        }
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
