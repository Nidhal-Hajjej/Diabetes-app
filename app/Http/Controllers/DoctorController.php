<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $doctor = Doctor::where("id", 1);
        $user = Auth::user();
        $name = $user->name;
        // $doctor = Doctor::where('first_name', $name)->get();
        $patients = Patient::where("doctor_id", 11)->get()->toArray();
        // dd($patients);
        // return view("clinicianDashboard", compact('patients'));
        return view("clinicianDashboard", compact('name', 'patients'));
    }


//     public function clinicianDashboard()
// {
//     // $user = Auth::user();
//     // return view('clinicianDashboard', ['firstName' => $user->first_name, 'lastName' => $user->last_name]);
//     $user = Auth::user();
//     $first_name = $user->first_name; // Assuming that the first name is stored in the "firstName" column of the "users" table
//     return view("clinicianDashboard", compact('first_name'));
// }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function isDoctor($email, $password)
    {
        $doctor = Doctor::where('email', $email)->first();

        if ($doctor && Hash::check($password, $doctor->password)) {
            return true;
        }

        return false;
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
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
