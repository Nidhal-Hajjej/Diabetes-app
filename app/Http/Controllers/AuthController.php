<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }

    public function showLoginForm()
    {
        // check if the user is logged in
    $loggedIn = Auth::check();

    // render the login page with the loggedIn variable
    // return view('login', ['loggedIn' => $loggedIn]);
    return view('login', compact('loggedIn'));    
}

    
    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    // if (Auth::attempt($credentials)) {
    //     session(['loggedIn' => true]);
    //     return redirect()->intended('/');
    // }
    // $loggedIn = Auth::check();

    // Validate the user's login credentials
    // $request->validate([
    //     'email' => 'required|email',
    //     'password' => 'required',
    // ]);

    // Check if the email exists in the patients table
    $patient = Patient::where('email', $request->email)->first();

    if ($patient && Hash::check($request->password, $patient->password)) {
        if (Auth::attempt($credentials)) {
            session(['loggedIn' => true]);
            session(['userType' => 'patient']);
            
        }
        // Authentication was successful for patient
        return redirect('/patientDashboard');
    }

    // Check if the email exists in the doctors table
    $doctor = Doctor::where('email', $request->email)->first();

    if ($doctor && Hash::check($request->password, $doctor->password)) {
        if (Auth::attempt($credentials)) {
            session(['loggedIn' => true]);
            session(['userType' => 'doctor']);
            
        }
        // Authentication was successful for doctor
        return redirect('/doc');
    }

    // Authentication failed
    return back()->withErrors(['email' => 'Invalid email or password']);
}

// public function logout()
// {
//     session()->forget('loggedIn');
//     Auth::logout();

//     return redirect()->route('login');
// }
public function logout(Request $request) {
    // Auth::logout();
    // $request->session()->invalidate();
    // $request->session()->regenerateToken();
    // return redirect()->route('login');
    session()->forget('loggedIn');
    session()->forget('userType');
    Auth::logout();
    session()->flush();
    return redirect('/login');
}


}