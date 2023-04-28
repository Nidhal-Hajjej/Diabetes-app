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

                    <button id="bcg-toggle" class="active-toggle">Blood Glucose Level</button>

                    <button id="insulin-toggle" class="inactive-toggle">Insulin</button>

                    <button id="weight-toggle" class="inactive-toggle">Weight</button>

                    <button id="exercise-toggle" class="inactive-toggle">Exercise</button>

                </div>
                <canvas id="myChart" height="250px" width="700px"></canvas>


                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                <script type="text/javascript">
                    fetch('/api/getChartData/7/bloodLevel', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                        })
                        .then(response => response.json())
                        .then(response_data => {
                            //console.log(response_data);
                            var labels = response_data.labels;
                            var users = response_data.data;

                            const data = {
                                labels: labels,
                                datasets: [{
                                    label: '',
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
                            //myChart.destroy();
                        })

                        .catch(error => {
                            console.error(error);
                        });

                    function getChartData(id, attribut) {
                        fetch(`/api/getChartData/${id}/${attribut}`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                            })
                            .then(response => response.json())
                            .then(response_data => {
                                console.log(response_data);
                                var labels = response_data.labels;
                                var users = response_data.data;

                                const data = {
                                    labels: labels,
                                    datasets: [{
                                        label: '',
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

                            })
                            .catch(error => {
                                console.error(error);
                            });
                    }
                </script>

            </div>


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
