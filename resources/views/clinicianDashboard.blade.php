@extends('layouts.main')

@section('content')
    <div class="clinician-dashboard">
        <div class="clinician-info-container">
            <div class="clinician-info">
                <br>
                <p>Welcome Dr. {{ $name }} </p>
                <div>
                    <lottie-player id="clinician-lottie" src="https://assets6.lottiefiles.com/packages/lf20_ibbakwps.json"
                        background="transparent" speed="1" loop autoplay></lottie-player>
                </div>
                <button type="clinician-button" id="clinician-button"><a href="/addNewPatient">Add New Patient</a></button>
                <button type="clinician-button" id="clinician-button"><a href="/clinicianAccount">Manage Your
                        Account</a></button>
            </div>
        </div>

        <div class="clinician-table-container">
            <table class="clinician-table-styled">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Blood Glucose(nmol/L)</th>
                        <th>Weight(Kg)</th>
                        <th>Doses of Insulin</th>
                        <th>Step Count</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($measurements as $measurement)
                        <tr style="cursor:pointer;" onclick="location.href='/notes/{{ $measurement->patient_id }}';">
                            <th>{{ $measurement->first_name }}</th>
                            <th>{{ $measurement->bloodLevel }}</th>
                            <th>{{ $measurement->weight }}</th>
                            <th>{{ $measurement->insulinDoses }}</th>
                            <th>{{ $measurement->exercise }}</th>
                        </tr>
                    @endforeach

                </tbody>
            </table>

            <div class="info">
                {{-- <img src="../images/icons/info.svg" alt="info-sign">
                <span class="info-text">
                    Greyed-out fields: non-required measurements.
                </span> --}}
            </div>

        </div>
    </div>
@endsection
