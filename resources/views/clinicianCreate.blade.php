@extends('layouts.main')


@section('content')
    <div class="clinician-dashboard" style="margin-bottom:20px; ">
        <div class="clinician-info-container" style="margin-right : 100px;">
            <div class="clinician-info">
                {{-- <h1>Hello, Dr.{{user.first_name}}</h1> --}}
                {{-- <h2>{{date}}</h2> --}}
                <br>
                {{-- <p>You are currently incharge of {{numPatients}} patients.</p> --}}
                <p>Welcome Dr. {{ $name }} </p>
                <div>
                    <lottie-player id="clinician-lottie" src="https://assets6.lottiefiles.com/packages/lf20_ibbakwps.json"
                        background="transparent" speed="1" loop autoplay></lottie-player>
                </div>
                <button type="clinician-button" id="clinician-button"><a href="/clinician/create">Add New
                        Patient</a></button>
                <button type="clinician-button" id="clinician-button"><a href="/clinicianAccount">Manage Your
                        Account</a></button>
            </div>
        </div>

        <div class="patient-card ">
            <div class="patient-card-label">
                <h3>Leaderboard</h3>
            </div>
            <div class="patient-card-content">
                <table class="leaderboard" style="width:300px;">
                    <tr>
                        <th style="padding-right: 0.5 em">
                            <p>Position</p>
                        </th>
                        <th>
                            <p>patient_id</p>
                        </th>
                        <th>
                            <p>Date of Birth</p>
                        </th>
                        <th>
                            <p>Accept/Deny</p>
                        </th>

                    </tr>
                    @php($position = 1)
                    @foreach ($invitations as $invitation)
                        <?php
                        $my_array = ['first', 'second', 'third', 'fourth', 'fifth'];
                        $random_key = array_rand($my_array);
                        $random_value = $my_array[$random_key];
                        $i = 0;
                        ?>
                        <tr id={{ $random_value }}>
                            <td>{{ $position }}</td>
                            <td>{{ $invitation->patient_id }}</td>
                            <td>{{ $invitation->dob }}</td>
                            <form action="{{ route('invitation.accept', $invitation->id) }}" method="POST">
                                @csrf
                                <td><button type="submit">Accept</button></td>
                            </form>
                            <form action="{{ route('invitation.deny', $invitation->id) }}" method="POST">
                                @csrf
                                <td><button type="submit">Deny</button></td>
                            </form>
                        </tr>
                        @php($position++)
                    @endforeach

                </table>
            </div>




        </div>
    </div>
@endsection
