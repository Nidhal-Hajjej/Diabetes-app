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
                                $my_array = ['first', 'second'];
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
                        {{-- <div class="pagination">
                            {{ $doctors->links('pagination::bootstrap-5') }}
                        </div> --}}
                        <div class="pagination">
                            <ol class="pagination justify-content-center">
                                <!-- Previous Page Link -->
                                @if ($doctors->onFirstPage())
                                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                        <span class="page-link" aria-hidden="true">&lsaquo;</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $doctors->previousPageUrl() }}" rel="prev"
                                            aria-label="@lang('pagination.previous')">&lsaquo;</a>
                                    </li>
                                @endif

                                <!-- Pagination Elements -->
                                @for ($i = 1; $i <= $doctors->lastPage(); $i++)
                                    <li class="page-item {{ $doctors->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $doctors->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                <!-- Next Page Link -->
                                @if ($doctors->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $doctors->nextPageUrl() }}" rel="next"
                                            aria-label="@lang('pagination.next')">&rsaquo;</a>
                                    </li>
                                @else
                                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                                        <span class="page-link" aria-hidden="true">&rsaquo;</span>
                                    </li>
                                @endif
                            </ol>
                            <div style="padding-left:15px" class="text-center mt-3">
                                <br> Showing {{ $doctors->firstItem() }} to {{ $doctors->lastItem() }} of
                                {{ $doctors->total() }} results
                            </div>
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
        
    <div class="second-section">
        <div class="second-text">
            <h1 style="color: rgb(255, 255, 255)">Managing Diabetes is difficult.</h1>
            <h2>Our app makes it easy.</h2>
            <form action="/chatbot">
                <button type="submit" class="ai-button">
                    ChatBot
                </button>
            </form>
            <form action="/diet">
                <button type="submit" class="ai-button">
                    Diet Generation System
                </button>
            </form>
            {{-- {{/if}} --}}
        </div>

        <div class="hero-image">
            <lottie-player id="hero-lottie" src="https://assets5.lottiefiles.com/packages/lf20_8q9oPD.json"
                background="transparent" speed="1" loop autoplay></lottie-player>
        </div>
    </div>
    </section>

    {{-- {{else}}

    {{> loggedOut}}

    {{/if}} --}}
@endsection
