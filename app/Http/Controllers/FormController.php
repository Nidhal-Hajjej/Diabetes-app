<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    public function processForm(Request $request)
{
    // Validate the form data
    $validatedData = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
    ])->validate();

    $role = ($request->has('patientSignup')) ? 'patient' : 'doctor';

    // Save the form data to the database
    $user = new User;
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->password = Hash::make($validatedData['password']);
    $user->save();

    if ($role === 'patient') {
        // Save data to the patients table
        $patient = new Patient;
        $patient->name = $validatedData['name'];
        $patient->screen_name = ''; // Set screen_name to an empty string
        $patient->dob = ''; // Set dob to an empty string
        $patient->bio = ''; // Set bio to an empty string
        $patient->engagement_rate = 0; // Set engagement_rate to 0
        $patient->clinicianId = ''; // Set clinicianId to an empty string
        $patient->supportMessage = ''; // Set supportMessage to an empty string
        $patient->measurements = null; // Set measurements to null
        $patient->save();
    } else {
        // Save data to the doctors table
        $doctor = new Doctor;
        $doctor->name = $validatedData['name'];
        $doctor->screen_name = null; // Set screen_name to null
        $doctor->dob = null; // Set dob to null
        $doctor->patients = null; // Set patients to null
        $doctor->save();
    }

    // Redirect back to the form with a success message
    return redirect('/login')->with('success', 'Form submitted successfully!');
}


}
