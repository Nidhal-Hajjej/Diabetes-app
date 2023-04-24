<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }

    public function showLoginForm()
    {
        return view('login');
    }
    
    public function login(Request $request)
    {
        // Validate the user's login credentials
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            // Authentication was successful
            return redirect()->intended('/welcome');
        } else {
            // Authentication failed
            return back()->withErrors(['email' => 'Invalid email or password']);
        }
    }
}