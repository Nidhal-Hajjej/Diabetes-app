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
        return view('login');
    }

    public function login(Request $request)
    {
        // Validate the user's login credentials
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Check if the email exists in the patients table
        $patient = Patient::where('email', $request->email)->first();

        if ($patient && Hash::check($request->password, $patient->password)) {
            // Authentication was successful for patient
            return redirect('/patientDashboard');
        }

        // Check if the email exists in the doctors table
        $doctor = Doctor::where('email', $request->email)->first();

        if ($doctor && Hash::check($request->password, $doctor->password)) {
            // Authentication was successful for doctor
            return redirect('/doc');
        }

        // Authentication failed
        return back()->withErrors(['email' => 'Invalid email or password']);
    }
}
