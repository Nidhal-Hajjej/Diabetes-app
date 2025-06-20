@extends('layouts.main')

@section('content')
    <script src="../scripts/closeFlash.js"></script>
    <script src="../scripts/clinicianAccount.js"></script>

    {{-- {{> flashSuccess}}
    {{> flashError}} --}}

    <div class="page-heading-1">
        <h1>My Account</h1>
    </div>

    <section class="what-is-diabetes">
        <h2>Change Password</h2>
        <form action="/clinician/account/change-password" class="change-pw-form" method="post">
            <div class="input-box">
                <span class="label">Current Password</span>
                <div class="input">
                    <input type="password" placeholder="Enter current password" id="opw" name="curr_pw" required>
                </div>
            </div>

            <div class="input-box">
                <span class="label">New Password</span>
                <div class="input">
                <input type="password" placeholder="Enter new Password" id="npw" name="new_pw" minlength="8">
                </div>
            </div>

            <div class="input-box">
                <span class="label">Confirm New Password</span>
                <div class="input">
                <input type="password" placeholder="Confirm new Password" id="cpw" name="confirm_new_pw" minlength="8" required>
                </div>
            </div>
            <button type="submit" id="change-pw-btn">Submit</button>
        </form>
    </section>
@endsection