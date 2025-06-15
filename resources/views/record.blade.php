@extends('layouts.main')

@section('content')
    <div class="page-heading-1">
        <h1>Record</h1>
        <hr class="divider">
        <h2>
            Hello,
            {{-- {{singlePatient.first_name}}.  --}}
            It's now 
            {{-- {{currentTime}}. --}}
        </h2>
        <h2>
            In this page, you can record your health data. The data
            that you are required to enter is listed below.
        </h2>
        <hr class="divider">
    </div>


    <div class="requirement-section">
        <div class="checklist-container">
            <h3>Today's required measurements</h3>
            <div class="requirement-checklist-item">
                <p>blood glucose level</p>
                <img src="../images/icons/checked-2.svg" alt="circle">
            </div>
            <div class="requirement-checklist-item">
                <p>weight</p>
                <img src="../images/icons/checked-2.svg" alt="circle">
            </div>
            <div class="requirement-checklist-item">
                <p>exercise</p>
                <img src="../images/icons/checked-2.svg" alt="circle">
            </div>
            <div class="requirement-checklist-item">
                <p>insulin doses</p>
                <img src="../images/icons/checked-2.svg" alt="circle">
            </div>
        </div>
    </div>

    {{-- <div class="reminder-section">
        <div>
            <div class="reminder-heading">
                <img src="../images/icons/smiley.svg" alt="smiley">
                <h3>Good Job!</h3>
            </div>

            <div class="reminder-text">
                <p>
                    You have recorded all your measurements today.
                </p>
                <br>
                <span>
                    Click <a href="/patient/dashboard">here</a> to return to dashboard.
                </span>
                <p>
                </p>
            </div>
        </div>
    </div> --}}

    <div class="record-container">
        <h2>Input your measurements for today</h2>
        <div class="record-form">
            <form action="/storeMeasurements" method="post">
                @csrf
                <div class="type-input">
                    <input type="text" name="bloodLevel" value="bloodLevel" readonly>
                </div>
                <span class="label">Blood Glucose Level</span>
                <div class="record-input">
                    <input name="bloodLevel" type="number" min=0 step=0.1 placeholder="Enter Blood Glucose Level"
                        id="bloodLevel" required>
                </div>
                <br>
                <div class="type-input">
                    <input type="text" name="weight" value="weight" readonly>
                </div>
                <span class="label">Weight</span>
                <div class="record-input">
                    <input name="weight" type="number" min=40 step=1 placeholder="Enter Weight" id="weight" required>
                </div>
                <br>
                <div class="type-input">
                    <input type="text" name="insulinDoses" value="insulinDoses" readonly>
                </div>
                <span class="label">Insulin Doses</span>
                <div class="record-input">
                    <input name="insulinDoses" type="number" min=0 step=1
                        onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Enter Insulin doses"
                        id="insulinDoses" required>
                </div>
                <br>
                <div class="type-input">
                    <input type="text" name="exercise" value="exercise" readonly>
                </div>
                <span class="label">Number Of Steps</span>
                <div class="record-input">
                    <input name="exercise" type="number" min=0 step=1 placeholder="Enter number of steps" id="exercise"
                        required>
                </div>
                <br>
                <button class="record-button" id="bcg-btn">Submit</button>
            </form>
        </div>
    </div>

    <button id="back-to-top-btn" title="Go to top"><img src="/images/icons/top.svg" style="width: 30px; height: 30px;"
            alt="back to top button"></button>
@endsection
