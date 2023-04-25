<?php

namespace App\Http\Controllers;

use App\Models\Measurement;
use App\Http\Requests\StoremeasurementRequest;
use App\Http\Requests\UpdatemeasurementRequest;

class MeasurementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $measurements = Measurement::latest()->paginate(10);

        return view('patientOverview', compact('measurements'))->name("index");
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
     * @param  \App\Http\Requests\StoremeasurementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoremeasurementRequest $request)
    {

        $request->validate([
            'bloodLevel'=> 'required',
            'exercise'=> 'required',
            'weight'=> 'required',
            'insulinDoses'=> 'required',
        ]);

        Measurement::create($request->all());

        return redirect()->route('measurements.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function show(measurement $measurement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function edit(measurement $measurement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatemeasurementRequest  $request
     * @param  \App\Models\measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatemeasurementRequest $request, measurement $measurement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function destroy(measurement $measurement)
    {
        //
    }
}
