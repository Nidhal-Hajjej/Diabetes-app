@extends('layouts.main')

@section('content')
    <script>
        function saveDoctor(doctor_id) {
            fetch(`/api/sendDoctorInvitation/${doctor_id}/{{ session('id') }}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    // body: JSON.stringify({
                    //     name: 'John Doe',
                    //     email: 'john@example.com'
                    // })
                })
                .then(response => response.json())
                .then(data => location.reload())
                .catch(error => console.error(error));
        }
    </script>

    <div class="page-heading-1">
        <h1>Dashboard</h1>
    </div>

    <section id="patient-dashboard">
        <section id="patient-dashboard-content">

            <div id="patient-details">
                <img src="\images\male-profile.jpg">
                <p> Name : <b> {{ session('name') }} </b> </p>
                <br>
                <p>
                    DOB: <b> {{ session('dob') }}</b>
                </p>
                <button><a href="account" style="color: white;">Account settings</a></button>
                <div class="patient-badge">
                    <lottie-player id="trophyLottie" src="../images/lottie/trophy.json" autoplay loop>"></lottie-player>
                    <p></p>
                </div>
            </div>

            <div class="patient-card">
                @if ($measurement === null)
                    <div class="patient-card-label">
                        <h3>Reminders</h3>
                    </div>
                    <div class="patient-card-content">
                        <p>G'Day, {{ $name }},
                            Today you need to:</p>
                        <ul>
                            <br>
                            <li>Enter your blood glucose level</li>
                            <br>
                            <li>Enter your weight</li>
                            <br>
                            <li>Enter step count</li>
                            <br>
                            <li>Enter your insulin doses</li>
                            <br>
                        </ul>
                        <a href="/patientRecord">Record measurements</a>
                    </div>
                @endif
            </div>

            @if (!$doctor_id)
                <div class="patient-card">
                    <div class="patient-card-label">
                        <h3>Welcome 🙋‍♂️</h3>
                    </div>
                    <div class="patient-card-content">
                        {{-- <div class="msg-bubble msg-bubble-left">
                            <i>- Dr.</i>
                        </div> --}}
                        <div class="msg-bubble msg-bubble-left">
                            <p> <i> Hello {{ session('name') }} </i></p>
                            <br>
                            <p> Here you will get a message from your doctor 🩺.</p>
                        </div>
                    </div>
                </div>
                <div class="patient-card">
                    <div class="patient-card-label">
                        <h3>Doctors</h3>
                    </div>
                    <div class="patient-card-content" width='100px'>
                        <table class="leaderboard">
                            <tr>
                                {{-- <th>
                                    <p>Position</p>
                                </th> --}}
                                <th style="margin: 25px 50px;">
                                    <p>Name</p>
                                </th>
                                <th>
                                    <p>Email</p>
                                </th>
                                <th>

                                </th>
                            </tr>
                            @foreach ($doctors as $doctor)
                                <?php
                                $my_array = ['first', 'second', 'third', 'fourth', 'fifth'];
                                $random_key = array_rand($my_array);
                                $random_value = $my_array[$random_key];
                                $i = 0;
                                ?>

                                <tr id={{ $random_value }}>
                                    <td>{{ $doctor->first_name }} </td>
                                    <td>{{ $doctor->email }}</td>
                                    @if (!$existense)
                                        <td><button onclick="saveDoctor({{ $doctor->id }})">Send</button></td>
                                    @endif

                                </tr>
                            @endforeach
                        </table>
                        <div class="">
                            {{ $doctors->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            @else
                <div class="patient-card">
                    <div class="patient-card-label">
                        <h3>Messages</h3>
                    </div>
                    <div class="patient-card-content-mbadla">
                        <div class="msg-bubble msg-bubble-left">
                            <i>- Dr.{{ $doctor->first_name }} {{ $doctor->last_name }}</i>
                        </div>
                        @if ($patient->supportMessage !== null)
                            <div class="msg-bubble">
                                <p>{{ $patient->supportMessage }}</p>
                                <br>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="patient-card">
                    <div class="patient-card-label">
                        <h3>My Doctor</h3>
                    </div>
                    <div class="patient-card-content" style="width:28em">
                        <table class="leaderboard">
                            <tr>
                                <th style="padding-right: 0.5em">
                                    <p> Name </p>
                                </th>
                                <th style="padding-right: 0.5em">
                                    <p> Date Of Birth </p>
                                </th>
                                <th style="padding-right: 0.5em">
                                    <p> Email </p>
                                </th>
                            </tr>
                            <tr>
                                <td> {{ $doctor->first_name }} {{ $doctor->last_name }}</td>
                                <td> {{ $doctor->dob }} </td>
                                <td> {{ $doctor->email }} </td>
                            </tr>
                        </table>
                    </div>
                </div>
            @endif
        </section>
    </section>

    {{-- {{else}}

    {{> loggedOut}}

    {{/if}} --}}
@endsection
