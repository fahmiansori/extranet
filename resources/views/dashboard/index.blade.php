@extends('template.template_1')
@section('head')
@endsection
@section('title_top', (isset($title_top))? $title_top:'')
@section('title_page', (isset($title_page))? $title_page:'')

@section('content')
    <div>
        <canvas id="myChart" width="400" height="150"></canvas>
    </div>
@endsection

@section('js')
    <script src="{{ asset('libs/moment/moment.min.js') }}"></script>
    <script src="{{ asset('libs/chartjs/chart.min.js') }}"></script>

    <script>
        let data_myChart = [
            20,10,73,41,83,41,90
        ];
        let data_ = {
            labels: [
                '2016-12-01',
                '2016-12-02',
                '2016-12-03',
                '2016-12-04',
                '2016-12-05',
                '2016-12-06',
                '2016-12-07',
            ],
            datasets: [
                {
                    label: 'Total Booking',
                    data: data_myChart,
                    borderColor: '#000',
                    backgroundColor: '#00abdf',
                    borderWidth: 1
                },
                {
                    label: 'Booking Success',
                    data: data_myChart,
                    borderColor: '#000',
                    backgroundColor: '#abdf',
                    borderWidth: 1
                },
                {
                    label: 'Booking Cancel',
                    data: data_myChart,
                    borderColor: '#000',
                    backgroundColor: '#c9ccc3',
                    borderWidth: 1
                }
            ]
        };
        let ctx = $('#myChart');
        let myChart = new Chart(ctx, {
            type: 'bar',
            data: data_,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                        title: {
                            display: true,
                            text: 'Legend Title',
                        }
                }
            }
        });
    </script>
@endsection
