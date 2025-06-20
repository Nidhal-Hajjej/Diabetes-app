@extends('layouts.main')

@section('content')
    <script src="../scripts/supportMessages.js"></script>
    <script src="../scripts/closeFlash.js"></script>

    {{-- {{> flashSuccess}}
    {{> flashError}} --}}

    <div class="page-heading-1">
        <h1>Messages</h1>
        <hr class="divider">
        <h2>
            View and update support messages for individual patients.
            Click on a patient's name to begin.
        </h2>
        <hr class="divider">
    </div>

    {{-- <input type="hidden" id="sp-hidden" value="{{json messages}}" > --}}

    <section class="support-message-section flex-row-center">
        <div class="support-message-patient-list">
            <div class="message-patient-heading">
                <h3>Patients</h3>
            </div>
            
            @foreach ($patients as $patient)
            <div class="message-patient-contact">
                {{ $patient->first_name}}
            </div>
            @endforeach
            
            {{-- {{#each messages}} --}}
            {{-- <div class="message-patient-contact"> --}}
                {{-- <p>{{@key}}</p> --}}
            {{-- </div> --}}
            {{-- {{/each}} --}}
        
        </div>
        <div class="support-message-main flex-column-center">

            <div class="message-patient-heading">
                <h3>Current Support Message</h3>
            </div>

            <div class="current-support-message flex-column-center">
                <p id="msg-recipient">Select a patient to view and update messages.</p>
                <div class="msg-bubble msg-bubble-left">
                    <h3>Dr.
                         {{-- {{clinician.name}} --}}
                        </h3>
                </div>
            </div>

            <div class="message-patient-heading">
                <h3>Update Support Message</h3>
            </div>

            <div class="compose-support-message">
                <form action="/clinician/messages" class="flex-column-center" method="post">
                    <label for="recipient">Receiver</label>
                    <input type="text" id="support-msg-receiver" name="recipient" readonly required>
                    <input type="text" id="hidden-support-msg-receiver" name="recipientId" required>
                    <label for="support-msg">Message</label>
                    <textarea name="supportMsg" id="support-msg" cols="30" rows="10" placeholder="Enter Message Here" required></textarea>
                    <button type="submit">Send</button>
                </form>
            </div>

        </div>
    </section>

@endsection