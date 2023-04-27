@extends('layouts.main')

@section('content')
    {{-- {{#if loggedIn}}
    {{> flashSuccess}}
    {{> flashError}}

    {{> patientDrilldown}} --}}

    {{-- {{!-- all data code: has charts, and table with filters to filter the data --}} --}}
    {{-- <input type="hidden" id="pd-dates" value="{{json groupedByDate}}" > --}}
    <div class="overview-container">
        <section class="data-table flex-column-center">
            <div class="chart-toggle-container">
                <h3>Filter chart by</h3>
                <div class="chart-toggles">
                    {{-- {{#if (isIn "bcg" required)}} --}}
                    <button id="bcg-toggle" class="active-toggle">Blood Glucose Level</button>
                    {{-- {{/if}} --}}
                    {{-- {{#if (isIn "insulin" required)}} --}}
                    <button id="insulin-toggle" class="inactive-toggle">Insulin</button>
                    {{-- {{/if}} --}}
                    {{-- {{#if (isIn "weight" required)}} --}}
                    <button id="weight-toggle" class="inactive-toggle">Weight</button>
                    {{-- {{/if}} --}}
                    {{-- {{#if (isIn "exercise" required)}} --}}
                    <button id="exercise-toggle" class="inactive-toggle">Exercise</button>
                    {{-- {{/if}} --}}
                </div>
                <canvas id="myChart" height="100px"></canvas>


                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                <script type="text/javascript">
                    var labels = {{ Js::from($labels) }};
                    var users = {{ Js::from($data) }};

                    const data = {
                        labels: labels,
                        datasets: [{
                            label: 'My First dataset',
                            backgroundColor: 'rgb(255, 99, 132)',
                            borderColor: 'rgb(255, 99, 132)',
                            data: users,
                        }]
                    };

                    const config = {
                        type: 'line',
                        data: data,
                        options: {}
                    };

                    const myChart = new Chart(
                        document.getElementById('myChart'),
                        config
                    );
                </script>

            </div>

            {{-- <section class="patient-chart-section">
                <div id="patient-chart-container"></div>
            </section> --}}

            {{-- <h1>All Data</h1>

            <br>
            <div class="patient-data-filters">
                <select name="search-filter" id="search-filter">
                    <option value="">Filter By</option>
                    <option value="measurement">Measurement</option>
                    <option value="value">Value</option>
                    <option value="comment">Comment</option>
                    <option value="time">Time</option>
                </select>
                <input type="text" id="pd-search-input" onkeyup="search()" placeholder="Search for measurements.">
            </div> --}}
            {{-- BECH NE7I MEASUREMENTS MEN PATIENT OVERVIEW --}}
            {{-- <div class="patient-data-container">
                <table id="patient-data-table">
                    <tr class="patient-data-header">
                        <th>Measurement</th>
                        <th>Value</th>
                        <th>Comment</th>
                        <th>Time Recorded</th>
                    </tr>
                    @foreach ($measurements as $measurement)
                        <tr class="patient-data-row">
                            <td>Blood Glucose Level</td>
                            <td>{{ $measurement->bloodLevel }} nmol/L</td>
                            <td>Weight</td>
                            <td>{{ $measurement->weight }} kg</td>
                            <td>Insulin Doses</td>
                            <td>{{ $measurement->insulinDoses }} dose(s)</td>
                            <td>Exercise</td>
                            <td>{{ $measurement->exercise }} steps</td>
                            <td> - </td>
                            <td><img src="/images/icons/note.svg" alt="note-pen" id="copy-to-note"></td>
                        </tr>
                    @endforeach
                </table>
            </div> --}}
        </section>

        <section class="patient-notes flex-column-center">
            <div class="notes-table">
                <h1>Notes</h1>
                <br>
                {{-- {{#each notes}} --}}
                @foreach ($notes as $note)
                    <div class="note-container {{ $note->color }}">
                        <p>{{ $note->comment }}</p>
                        <br>
                        <p>{{ $note->date }}</p>
                        {{-- <img src="/images/icons/close-note.svg" alt="close-button" class="note-del-btn">
                        <form action="/clinician/manage-patient/{{$note->patientId}}/delete-note" method="post" class="note-del-form">
                            <input type="hidden" value={{$note->patientId}} name="pid">
                            <input type="hidden" value=
                                {{-- {{this._id}}  --}}
                        {{-- name="nid"> --}}
                        {{-- {{!-- <button type="submit" style="display: none;"></button> --}}
                        {{-- </form>  --}}
                        <form action="{{ route('notes.destroy', $note->id) }}" method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                    </div>
                @endforeach
                {{-- {{/each}} --}}
            </div>

            <div class="note-input-container">
                <div class="note-options flex-row-center">
                    <div id="dark-yellow" class="note-option dark-yellow note-selected-option"></div>
                    <div id="light-yellow" class="note-option light-yellow"></div>
                    <div id="dark-pink" class="note-option dark-pink"></div>
                    <div id="light-pink" class="note-option light-pink"></div>
                </div>
                <form action="{{ route('notes.store') }}" method="post">
                    @csrf
                    {{-- <form action="/clinician/manage-patient/{{patient._id}}/add-note" method="post">   --}}
                    <input type="hidden" value=name="pid">
                    {{-- <input type="hidden" value={{patient._id}} name="pid"> --}}
                    <input type="hidden" name="notecolor" id="note-color" value="dark-yellow">
                    <div class="comment-input">
                        <textarea name="comment" id="comment" cols="30" rows="5" placeholder="Enter note here" required></textarea>
                    </div>
                    <button class="record-button">Add note</button>
                </form>
            </div>

            <div class="info">
                <img src="/images/icons/info.svg" alt="info-sign">
                <span class="info-text">
                    Click on the note icon beside a measurement to copy to notes instantly.
                </span>
            </div>
        </section>
    </div>

    <button id="back-to-top-btn" title="Go to top"><img src="/images/icons/top.svg" style="width: 30px; height: 30px;"
            alt="back to top button"></button>

    {{-- {{else}}

    {{> loggedOut}}

    {{/if}} --}}
@endsection
