<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function create() {
        return view('auth.register');
    }
    // Validation - Laravel's Password
    // can put this in service provider if used everywhere in app
    // 'password' => ['required', Password::min(8)->letters()->numbers()->symbols()->mixedCase()->max(32)],
    // 'confirmed' - follow conventions with '_confirmation'
    public function store() {
        // validate
        $validatedAttributes = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', Password::default(), 'confirmed'],
        ]);
        // create user in database
        $user = User::create($validatedAttributes);
        // log in user
        Auth::login($user);
        // redirect user to dashboard/homepage
        return redirect('/jobs');
    }
}
