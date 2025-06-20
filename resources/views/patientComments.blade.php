@extends('layouts.main')

@section('content')
    <script src="/scripts/backToTop.js"></script>

    <div class="page-heading-1">
        <h1>Most Recent Patient Comments</h1>
    </div>

    <ul>
    {{-- {{#each data}} --}}
        <div class="clinician-message">
            <a class="clinician-message-link" href="/clinician/manage-patient/
            {{-- {{this.id}} --}}
            ">
            <div class='clinician-message-header'>
                <div class='clinician-message-header-sender'>
                    <h4>Patient
                        {{-- {{this.patient}} --}}
                    </h4>
                </div> 
                <div class='clinician-message-header-time'>
                    Recorded on 
                    {{-- {{this.date}} --}}
                </div>
            </div>      

            <div class='clinician-message-body'>
                {{-- {{#if (eqBcg this.type)}} --}}
                <h3>Blood Glucose Level: 
                    {{-- {{this.value}} --}}
                </h3>
                {{-- {{/if}}     --}}
                {{-- {{#if (eqWeight this.type)}} --}}
                <h3>Weight: 
                    {{-- {{this.value}} --}}
                </h3>
                {{-- {{/if}}  --}}
                {{-- {{#if (eqInsulin this.type)}} --}}
                <h3>Insulin: 
                    {{-- {{this.value}} --}}
                </h3>
                {{-- {{/if}}  --}}
                {{-- {{#if (eqExercise this.type)}} --}}
                <h3>Exercise: 
                    {{-- {{this.value}} --}}
                </h3>
                {{-- {{/if}} --}}
                <p>
                    {{-- {{this.comment}} --}}
                </p>
            </div>
            </a>
        </div>

    {{-- {{/each}} --}}
    </ul>

    <button id="back-to-top-btn" title="Go to top"><img src="/images/icons/top.svg" style="width: 30px; height: 30px;" alt="back to top button"></button>
@endsection