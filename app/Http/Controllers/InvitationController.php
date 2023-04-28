<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Http\Requests\StoreInvitationRequest;
use App\Http\Requests\UpdateInvitationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;




class InvitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $doctor_id = session('id');
        $user = Auth::user();
        $name = $user->name;
        $invitations = DB::table('invitations')
        ->join('patients', 'invitations.patient_id', '=', 'patients.id')
        ->where('invitations.doctor_id', $doctor_id)
        ->select('invitations.patient_id', 'patients.dob', 'patients.bio')
        ->get();
        
        return view("clinicianCreate", compact('name', 'invitations'));

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

    public function accept(Invitation $invitation)
{
    $patient = Patient::find($invitation->patient_id);
    $patient->doctor_id = auth()->user()->id; // Set the doctor_id to the currently authenticated user's ID
    $patient->save();

    $invitation->delete(); // Delete the invitation since it has been accepted
    return redirect()->back()->with('success', 'Invitation accepted successfully!');
}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInvitationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvitationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function show(Invitation $invitation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function edit(Invitation $invitation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInvitationRequest  $request
     * @param  \App\Models\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInvitationRequest $request, Invitation $invitation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invitation $invitation)
    {
        //
    }
}
