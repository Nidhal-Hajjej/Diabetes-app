@extends('layouts.main')

@section('content')
    <script src="../scripts/loader.js"></script>

    <div class="page-heading-1">
        <h1>Dashboard</h1>
    </div>

    <section id="patient-dashboard">
        <section id="patient-dashboard-content">

            <div id="patient-details">
                <img src="\images\male-profile.jpg">
                <p> Name : {{ $name }}

                </p>
                {{-- <p><b>Screen Name:</b> {{singlePatient.screen_name}}</p> --}}
                <p><b>DOB:</b>
                    {{-- {{dob}} --}}
                </p>
                {{-- <p><b>Bio:</b> {{singlePatient.bio}}</p> --}}
                <button><a href="account" style="color: white;">Account settings</a></button>
                {{-- {{#if (gte singlePatient.engagement_rate 80)}} --}}
                <div class="patient-badge">
                    <lottie-player id="trophyLottie" src="../images/lottie/trophy.json" autoplay loop>"></lottie-player>
                    <p>80%+</p>
                </div>
                {{-- {{/if}} --}}
            </div>

            <div class="patient-card">
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
                    <a href="/record">Record measurements</a>
                </div>
            </div>

            <div class="patient-card">
                <div class="patient-card-label">
                    <h3>Messages</h3>
                </div>
                <div class="patient-card-content">
                    <div class="msg-bubble msg-bubble-left">*
                        <br>
                        <i>- Dr.
                            {{-- {{clinician.first_name}} --}}
                        </i>
                    </div>
                </div>
            </div>

            <div class="patient-card">
                <div class="patient-card-label">
                    <h3>Leaderboard</h3>
                </div>
                <div class="patient-card-content">
                    <table class="leaderboard">
                        <tr>
                            <th>
                                <p>Position</p>
                            </th>
                            <th>
                                <p>Name</p>
                            </th>
                            <th>
                                <p>Engagement Rate</p>
                            </th>
                        </tr>
                        <tr id="first">
                            <td>1</td>
                            {{-- <td>{{entry.0.screen_name}}</td> --}}
                            {{-- <td>{{entry.0.engagement_rate}}%</td> --}}
                        </tr>
                        <tr id="second">
                            <td>2</td>
                            {{-- <td>{{entry.1.screen_name}}</td> --}}
                            {{-- <td>{{entry.1.engagement_rate}}%</td> --}}
                        </tr>
                        <tr id="third">
                            <td>3</td>
                            {{-- <td>{{entry.2.screen_name}}</td> --}}
                            {{-- <td>{{entry.2.engagement_rate}}%</td> --}}
                        </tr>
                        <tr id="fourth">
                            <td>4</td>
                            {{-- <td>{{entry.3.screen_name}}</td> --}}
                            {{-- <td>{{entry.3.engagement_rate}}%</td> --}}
                        </tr>
                        <tr id="fifth">
                            <td>5</td>
                            {{-- <td>{{entry.4.screen_name}}</td> --}}
                            {{-- <td>{{entry.4.engagement_rate}}%</td> --}}
                        </tr>
                    </table>
                </div>
            </div>
        </section>
    </section>

    {{-- {{else}}

    {{> loggedOut}}

    {{/if}} --}}
@endsection
