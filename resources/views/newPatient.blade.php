@extends('layouts.main')

@section('content')

    <script src="../scripts/createPatient.js"></script>
    <script src="../scripts/closeFlash.js"></script>

    {{-- {{> flashError}} --}}

    <div class="page-heading-1">
        <h1>Create New Patient</h1>
    </div>

    <section class="create-patient-section">
        <form action="/clinician/create" method="POST">
            <div class="create-patient-container">
                <h3>Enter Patient Details</h3>

                <div class="create-patient-container-row">
                    <div class="create-patient-field">
                    <label for="first_name"><p>First Name</p></label>
                    <input type="text" placeholder="First name" name="first_name" 
                    pattern="^[a-zA-Z]+$" 
                    oninvalid="this.setCustomValidity('must be letters only ')"
                    onchange="try{setCustomValidity('')}catch(e){}" required />
                </div>
                <div class="create-patient-field">
                    <label for="last_name"><p>Last Name</p></label>
                    <input type="text" placeholder="Last name" name="last_name" 
                    pattern="^[a-zA-Z]+$"
                    oninvalid="this.setCustomValidity('must be letters only ')"
                    onchange="try{setCustomValidity('')}catch(e){}" required />
                </div>
                </div>
                
                <div class="create-patient-container-row">
                    <div class="create-patient-field">
                        <label for="screen_name"><p>Screen Name</p></label>
                        <input type="text" placeholder="Screen Name" name="screen_name" 
                        pattern="[a-zA-Z0-9_-\.]+" 
                        required />
                    </div>
                    <div class="create-patient-field">
                        <label for="dob"><p>Date Of Birth</p></label>
                        <input type="date" placeholder="DOB" name="dob" required />
                    </div>
                </div>

                
                
                <div class="create-patient-field">
                    <label for="bio"><p>Text Bio</p></label>
                    <textarea type="text" placeholder="Enter a short bio" name="bio" required></textarea>
                </div>

                <div class="create-patient-container-row">
                    <div class="create-patient-field">
                        <label for="email"><p>Email Address</p></label>
                        <input type="email"  placeholder="email" name="email" 
                        {{-- {{!-- pattern="[a-z0-9._%+-]+[a-z0-9.-]+\.[a-z]{2,}$"  --}} --}}
                        title="must be a valid email address" 
                        oninvalid="this.setCustomValidity('must be a valid email address ')"
                    onchange="try{setCustomValidity('')}catch(e){}" required>
                    </div>
                    <div class="create-patient-field">
                        <label for="password"><p>Password</p></label>
                        <input type="password" placeholder="password" name="password" 
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                            title="must contain at least one number and one uppercase, lowercase letter, and be at least 8 characters"
                            oninvalid="this.setCustomValidity('must have at least one number and one uppercase and lowercase letter, and atleast 8 characters')"
                                onchange="try{setCustomValidity('')}catch(e){}" required>
                    </div>
                </div>

                <h3>Enter Patient Required Measurements</h3>

                <div class="create-patient-checkbox">
                    <label for="bcg"><p>Blood Glucose Level</p></label>
                    <input type="checkbox" id="recordBCG" name="bcg" value="bcg">
                </div>

                <div class="threshold-container" id="bcg-threshold">
                    <p>Set Threshold Values</p>
                    <div class="create-patient-field-req">		
                        <div class="create-patient-field">
                            <label for="BCGmin"><p>Minimum</p></label>
                            <input type="number" step="0.01" min="0" placeholder="minimum" name="bcgmin" />
                        </div>

                        <div class="create-patient-field">
                            <label for="BCGmax"><p>Maximum</p></label>
                            <input type="number" step="0.01" min="0" placeholder="maximum" name="bcgmax" />
                        </div>
                    </div>
                </div>


                <div class="create-patient-checkbox">
                    <label for="weight"><p>Weight</p></label>
                    <input type="checkbox" id="recordWeight" name="weight" value="weight">
                </div>

                <div class="threshold-container" id="weight-threshold">
                    <p>Set Threshold Values</p>
                    <div class="create-patient-field-req">		
                        <div class="create-patient-field">
                            <label for="weightmin"><p>Minimum</p></label>
                            <input type="number" step="0.01" min="0" placeholder="minimum" name="weightmin" />
                        </div>

                        <div class="create-patient-field">
                            <label for="weightmax"><p>Maximum</p></label>
                            <input type="number" step="0.01" min="0" placeholder="maximum" name="weightmax" />
                        </div>
                    </div>
                </div>

                <div class="create-patient-checkbox">
                    <label for="insulin"><p>Insulin</p></label>
                    <input type="checkbox" id="recordInsulin" name="insulin" value="insulin">
                </div>

                <div class="threshold-container" id="insulin-threshold">
                    <p>Set Threshold Values</p>
                    <div class="create-patient-field-req">		
                        <div class="create-patient-field">
                            <label for="insulinmin"><p>Minimum</p></label>
                            <input type="number" min="0" placeholder="minimum" name="insulinmin" />
                        </div>

                        <div class="create-patient-field">
                            <label for="insulinmax"><p>Maximum</p></label>
                            <input type="number" min="0" placeholder="maximum" name="insulinmax" />
                        </div>
                    </div>
                </div>

                <div class="create-patient-checkbox">
                    <label for="exercise"><p>Exercise</p></label>
                    <input type="checkbox" id="recordExercise" name="exercise" value="exercise">
                </div>

                <div class="threshold-container" id="exercise-threshold">
                    <p>Set Threshold Values</p>
                    <div class="create-patient-field-req">		
                        <div class="create-patient-field">
                            <label for="exercisemin"><p>Minimum</p></label>
                            <input type="number" min="0" placeholder="minimum" name="exercisemin" />
                        </div>

                        <div class="create-patient-field">
                            <label for="exercisemax"><p>Maximum</p></label>
                            <input type="number" min="0" placeholder="maximum" name="exercisemax" />
                        </div>
                    </div>
                </div>
                <button type="submit">Submit</button>
            </div>
        </form>
        
    </section>
@endsection

