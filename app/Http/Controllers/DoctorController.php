<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Measurement;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $doctor_id = session('id');
        $user = Auth::user();
        $name = $user->name;
        // $patients = Patient::where("doctor_id", $doctor_id)->get()->toArray();

        //$measurements = DB::table('patients')
        // ->where('doctor_id', $doctor_id)
        // ->select('patients.id', 'patients.first_name', 'patients.last_name', DB::raw('COALESCE(measurements.bloodLevel, "N/A") as bloodLevel'), DB::raw('COALESCE(measurements.exercise, "N/A") as exercise'), DB::raw('COALESCE(measurements.weight, "N/A") as weight'), DB::raw('COALESCE(measurements.insulinDoses, "N/A") as insulinDoses'))
        // ->leftJoin('measurements', function ($join) {
        //     $join->on('patients.id', '=', 'measurements.patient_id')
        //         ->whereIn('measurements.created_at', function ($query) {
        //             $query->select(DB::raw('MAX(created_at)'))
        //                 ->from('measurements')
        //                 ->groupBy('patient_id');
        //         });
        // })
        // ->get();
        $measurements = DB::table('measurements')
                ->join('patients', 'measurements.patient_id', '=', 'patients.id')
                ->where('patients.doctor_id', $doctor_id)
                ->select('measurements.*', 'patients.first_name')
                ->whereIn('measurements.id', function ($query) {
                    $query->selectRaw('MAX(id)')
                          ->from('measurements')
                          ->groupBy('patient_id');
                })
                ->get();
        // dd($measurements);

        return view("clinicianDashboard", compact('name', 'measurements'));
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
