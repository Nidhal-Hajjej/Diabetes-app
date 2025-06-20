@extends('layouts.main')

@section('content')
    <script src="/scripts/closeFlash.js"></script>
    {{-- {{#if loggedIn}} --}}
    {{-- {{> flashSuccess}}
    {{> flashError}}


    {{>patientDrilldown}} --}}

    <div class="page-heading-1">
        <h1>
            Manage patient requirements and thresholds
        </h1>
    </div>

    <form action='' method="post"  class="flex-column-center">
        {{-- <input type="text" id="hidden-id-receiver" name="patientId" required value="{{patient._id}}"> --}}

        <table class="clinician-table-styled"> 
            <thead>
                <tr>
                    <th></th>
                    <th>Record</th>
                    <th>minimum</th>
                    <th>maximum</th>
                </tr>
            </thead>
            <tbody>
                {{-- <tr>
                    <th><input type="checkbox" id="bcg" name="bcg"{{#if patient.measurements.bcg}}checked="checked"{{/if}}></th>
                    <th>Blood Glucose Level (nmol/L)</th>
                    <th>
                        <input type="number" step="0.01" id="minbcg" name="minbcg" min="0" value="{{patient.measurements.bcg.minimum}}" >
                    </th>
                    <th>
                        <input type="number" step="0.01" id="maxbcg" name="maxbcg" min="0" value="{{patient.measurements.bcg.maximum}}">
                    </th>
                </tr>
                <tr>
                    <th><input type="checkbox" id="weight" name="weight" {{#if patient.measurements.weight}}checked="checked"{{/if}}></th>
                    <th>Weight(kg)</th>
                    <th>
                        <input type="number" id="minweight" step="0.01" name="minweight" min="0" value="{{patient.measurements.weight.minimum}}">
                    </th>
                    <th>
                        <input type="number" id="maxweight" step="0.01" name="maxweight" min="0" value="{{patient.measurements.weight.maximum}}">
                    </th>
                </tr>
                <tr>
                    <th><input type="checkbox" id="dose" name="insulin" {{#if patient.measurements.insulin}}checked="checked"{{/if}}></th>
                    <th>Insulin (dose(s))</th>
                    <th>
                        <input type="number" id="mindose" name="mindose" min="0" value="{{patient.measurements.insulin.minimum}}">
                    </th>
                    <th>
                        <input type="number" id="maxdose" name="maxdose" min="0" value="{{patient.measurements.insulin.maximum}}">
                </th>
                </tr>
                <tr>
                    <th><input type="checkbox" id="step" name="exercise" {{#if patient.measurements.exercise}}checked="checked"{{/if}}></th>
                    <th>Exercise(steps)</th>
                    <th>
                        <input type="number" id="minsteps" name="minsteps" min="0" value="{{patient.measurements.exercise.minimum}}">
                    </th>
                    <th>
                        <input type="number" id="maxsteps" name="maxsteps" min="0" value="{{patient.measurements.exercise.maximum}}">
                    </th>
                </tr> --}}

            </tbody>
        </table>

        <button type="submit">Submit</button>
    {{-- {{!-- <button><a href="/clinician/manage-patient/{{this.patient._id}}" Style="color:white;">Save</a></button>  --}}
    </form>


    {{-- {{else}}

    {{> loggedOut}}

    {{/if}} --}}
@endsection