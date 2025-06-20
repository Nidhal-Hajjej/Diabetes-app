@extends('layouts.main')

@section('content')
    <script src="../scripts/patientAccount.js"></script>
    <script src="../scripts/patientTheme.js"></script>
    <script src="../scripts/closeFlash.js"></script>

    {{-- {{> flashSuccess}}
    {{> flashError}} --}}

    <div class="page-heading-1">
        <h1>My Account</h1>
    </div>

    {{-- {{!-- https://codepen.io/markcaron/pen/MvGRYV --}} --}}

    <div class="patient-account-section">
        <div class="patient-account-dashboard">
            <div class="tabset">
                <!-- Basix Details -->
                {{-- {{!-- onclick="window.location='/patient/account/details';" --}} --}}
                <input type="radio" name="tabset" id="tab1" aria-controls="account-details" checked>
                <label for="tab1">Basic Details</label>
                <!--Change Password -->
                <input type="radio" name="tabset" id="tab2" aria-controls="change-password">
                <label for="tab2">Change Password</label>
                <!-- Change Theme -->
                <input type="radio" name="tabset" id="tab3" aria-controls="change-theme">
                <label for="tab3">Change Theme</label>
                <div class="tab-panels">
                    <section id="account-details" class="tab-panel">
                        <h2>Basic Details</h2>
                        <h3>Screen Name</h3>
                        {{-- <p>{{singlePatient.screen_name}}</p> --}}
                        <h3>Last Name</h3>
                        {{-- <p>{{singlePatient.last_name}}</p> --}}
                        <h3>First Name</h3>
                        {{-- <p>{{singlePatient.first_name}}</p> --}}
                        <h3>Age</h3>
                        {{-- <p>{{age}}</p> --}}
                        <h3>Bio</h3>
                        {{-- <p>{{singlePatient.bio}}</p> --}}
                    </section>
                    <section id="change-password" class="tab-panel">
                        <h2>Change Password</h2>
                        <form action="{{ route('updatePassword') }}" class="change-pw-form" method="post">
                            @csrf
                            <div class="input-box">
                                <span class="label">Current Password</span>
                                <div class="input">
                                    <input type="password" placeholder="Enter current password" id="opw"
                                        name="curr_pw" required>
                                </div>
                            </div>

                            <div class="input-box">
                                <span class="label">New Password</span>
                                <div class="input">
                                    <input type="password" placeholder="Enter new Password" id="npw" name="new_pw"
                                        minlength="8" required>
                                </div>
                            </div>

                            <div class="input-box">
                                <span class="label">Confirm New Password</span>
                                <div class="input">
                                    <input type="password" placeholder="Confirm new Password" id="cpw"
                                        name="confirm_new_pw" minlength="8" required>
                                </div>
                            </div>
                            <button type="submit" id="change-pw-btn">Submit</button>
                        </form>
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                    </section>

                    {{-- {{!-- add template to radio button checked  --}} --}}
                    <section id="change-theme" class="tab-panel">
                        <form id="theme-form" action="/patient/account/change-theme" method="post">
                            <h2>Change Theme</h2>
                            <div class="theme-container">
                                <label class="theme">
                                    <input type="radio" id="default-theme" name="theme" value="default">
                                    <img
                                        src="https://media.istockphoto.com/photos/blue-gradient-soft-background-picture-id1093513194?k=20&m=1093513194&s=170667a&w=0&h=Te14UkjvQeBBii6b2eD9GQcslk0NazN3LoNXl7BPDQg=">
                                    <h3>Default</h3>
                                </label>
                                <label class="theme">
                                    <input type="radio" id="dark-theme" name="theme" value="dark">
                                    <img
                                        src="https://images.unsplash.com/photo-1515462277126-2dd0c162007a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8ZGFyayUyMHRoZW1lfGVufDB8fDB8fA%3D%3D&w=1000&q=80">
                                    <h3>Dark</h3>
                                </label>
                                <label class="theme">
                                    <input type="radio" id="matrix-theme" name="theme" value="matrix">
                                    <img src="https://wallpaperaccess.com/full/683992.jpg">
                                    <h3>Matrix</h3>
                                </label>
                                <label class="theme">
                                    <input type="radio" id="spring-theme" name="theme" value="spring">
                                    <img
                                        src="https://www.nj.com/resizer/LZ0Y3O0GrmrSsOw4MYbrEYh-ypg=/1280x0/smart/cloudfront-us-east-1.images.arcpublishing.com/advancelocal/A7TFEUUSRJBAZHOCLPWPMXAM2E.jpg">
                                    <h3>Spring</h3>
                                </label>
                            </div>
                            <div class="theme-text-container">
                                <h2>Your Current Theme</h2>
                                {{-- <h2>{{theme}}</h2> --}}
                                <h2>Selected Theme</h2>
                                <h2 id="selected-theme">-</h2>
                                <button>Apply</button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
