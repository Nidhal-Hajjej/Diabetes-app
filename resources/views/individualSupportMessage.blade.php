@extends('layouts.main')

@section('content')

    <script src="../scripts/supportMessages.js"></script>
    <script src="../scripts/closeFlash.js"></script>

    {{-- {{#if loggedIn}} --}}

    {{-- {{> flashSuccess}}
    {{> flashError}}

    {{>patientDrilldown}} --}}

    <section class="individual-msg-section flex-column-center">
    <div class="support-message-main flex-column-center">

        <div class="message-patient-heading">
            <h3>Current Support Message</h3>
        </div>

        <div class="current-support-message flex-column-center">
            <div class="msg-bubble msg-bubble-left">
                <h3>Dr. 
                    {{-- {{clinician.first_name}} --}}
                </h3>
                {{-- {{#if message}} --}}
                    {{-- <p>{{message}}</p> --}}
                {{-- {{/if}} --}}
            </div>
        </div>

        <div class="message-patient-heading">
            <h3>Update Support Message</h3>
        </div>

        <div class="compose-support-message">
            <form action="" class="flex-column-center" method="post">
                <input type="text" id="hidden-support-msg-receiver" name="recipientId" value=
                {{-- {{patient._id}}  --}}
                required>
                <label for="support-msg">Message</label>
                <textarea name="supportMsg" id="support-msg" cols="30" rows="10" placeholder="Enter Message Here" required></textarea>
                <button type="submit">Send</button>
            </form>
        </div>

    </div>
    </section>

    {{-- 
    {{else}}

    {{> loggedOut}}

    {{/if}} --}}
@endsection

