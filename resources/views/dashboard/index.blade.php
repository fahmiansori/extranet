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
            {x:'2016-12-01', y:20},
            {x:'2016-12-02', y:10},
            {x:'2016-12-03', y:10},
            {x:'2016-12-04', y:10},
            {x:'2016-12-05', y:10},
            {x:'2016-12-06', y:10},
            {x:'2016-12-07', y:10},
            {x:'2016-12-08', y:10},
            {x:'2016-12-09', y:10},
            {x:'2016-12-10', y:10},
            {x:'2016-12-11', y:10},
            {x:'2016-12-12', y:10},
            {x:'2016-12-13', y:10},
            {x:'2016-12-14', y:10},
            {x:'2016-12-15', y:10},
            {x:'2016-12-16', y:10},
            {x:'2016-12-17', y:10},
            {x:'2016-12-18', y:10},
            {x:'2016-12-19', y:10},
            {x:'2016-12-20', y:10},
            {x:'2016-12-21', y:10},
            {x:'2016-12-22', y:10},
            {x:'2016-12-23', y:10},
            {x:'2016-12-24', y:10},
            {x:'2016-12-25', y:10},
            {x:'2016-12-26', y:10},
            {x:'2016-12-27', y:10},
            {x:'2016-12-28', y:10},
            {x:'2016-12-29', y:10},
            {x:'2016-12-30', y:10},
            ];
        let ctx = $('#myChart');
        let myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                datasets: [{
                    label: 'Data',
                    data: data_myChart,
                    borderColor: '#000',
                    borderWidth: 1
                }]
            },
            options: {
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
