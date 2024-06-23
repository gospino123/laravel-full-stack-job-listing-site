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
        dd(request()->all());
    }
    public function destroy() {
        Auth::logout();
        return redirect('/');
    }
}
