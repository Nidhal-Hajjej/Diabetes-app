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
                    ->select('invitations.id', 'patients.first_name', 'patients.last_name', 'patients.dob', 'patients.bio')
                    ->get();

        // $invitations = Invitation::all();
        // dd($invitations);
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

    public function accept(Request $request, Invitation $invitation)
    {
        // Add the doctor ID to the patient table
        $patient = Patient::find($invitation->patient_id);
        $patient->doctor_id = $invitation->doctor_id;
        $patient->save();

        // Delete the invitation
        $invitation->delete();

        return redirect()->back()->with('success', 'Invitation accepted');
    }

    public function deny(Request $request, Invitation $invitation)
    {
        $invitation->delete();
        return redirect()->back()->with('success', 'Invitation denied');
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
    public function sendDoctorInvitation($doctor_id, $patient_id)
    {
        $test = Invitation::where('doctor_id', $doctor_id)
        ->where('patient_id', $patient_id)
        ->first();
        if(!$test) {
            $invitation = new Invitation();
            $invitation->patient_id = $patient_id;
            $invitation->doctor_id = $doctor_id;
            $invitation->save();
            return response()->json(['message' => 'invitation sent successfully'], 200);
        } else {
            return response()->json(['message' => 'invitation already sent'], 400);
        }

    }
}
