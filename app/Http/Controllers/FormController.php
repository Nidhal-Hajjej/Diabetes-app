<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class FormController extends Controller
{
    public function processForm(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',

]);

        // if ($validatedData->fails()) {
        //     return redirect()->back()->withErrors($validatedData)->withInput();
        // }

        $role = ($request->has('patientSignup')) ? 'patient' : 'doctor';

        // // Save the form data to the database
        $user = new User();
        $user->name = $validatedData['first_name'] . ' ' . $validatedData['last_name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        if ($role === 'patient') {
            // Save data to the patients table
            $patient = new Patient();
            $patient->first_name = $validatedData['first_name'];
            $patient->last_name = $validatedData['last_name'];
            $patient->email = $validatedData['email'];
            $patient->password = Hash::make($validatedData['password']);
            $patient->screen_name = '';
            $patient->dob = '';
            $patient->bio = '';
            $patient->engagement_rate = 0;
            $patient->clinicianId = '';
            $patient->supportMessage = '';
            $patient->measurements = null;
            $patient->save();
        } else {
            // Save data to the doctors table
            $doctor = new Doctor();
            $doctor->first_name = $validatedData['first_name'];
            $doctor->last_name = $validatedData['last_name'];
            $doctor->email = $validatedData['email'];
            $doctor->password = Hash::make($validatedData['password']);
            $doctor->screen_name = null;
            $doctor->dob = null;
            $doctor->save();
        }

        // Redirect back to the form with a success message
        return redirect('/login')->with('success', 'Form submitted successfully!');

    }




}
