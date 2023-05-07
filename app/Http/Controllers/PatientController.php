<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Measurement;
use App\Models\Invitation;
use App\Models\Note;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        $name = $user->name;
        $patient_id = session('id');

        $doctor_id= Patient::where('id', $patient_id)->value('doctor_id');
        $doctor = Doctor::where('id', $doctor_id)->first();

        $patient = Patient::where('id', $patient_id)->first();

        $measurement = Measurement::where('patient_id', $patient_id)
                    ->whereDate('created_at', Carbon::today())
                    ->first();

        $note = Note::where('patient_id', $patient_id)->latest('created_at')->first();

        $doctors = Doctor::paginate(5);
        $test = Invitation::where('patient_id', $patient_id)
        ->first();
        $existense = false;
        if($test) {
            $existense = true;
        }
        return view("patientDashboard", compact('name', 'doctor_id', 'doctor', 'patient', 'doctors', 'measurement', 'existense'));
    }
    public function updatePassword(Request $request)
    {
        $user = auth()->user();
        $validatedData = $request->validate([
            'curr_pw' => 'required|string|min:8',
            'new_pw' => 'required|string|min:8',
            'confirm_new_pw' => 'required|string|min:8|same:new_pw',
        ]);

        if (Hash::check($validatedData['curr_pw'], $user->password)) {
            $user->password = Hash::make($validatedData['new_pw']);
            $user->save();
            return redirect('/account')->with('success', 'Password updated successfully!');
        } else {
            return redirect('/account')->with('error', 'Current password is incorrect!');
        }
    }



    /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'supportMessage' => 'required|max:255'
        ]);

        Patient::whereId($id)->update($validatedData);

        return redirect()->back()->with('success', 'Support message was successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
