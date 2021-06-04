@extends('template.template_1')
@section('head')
    <link href="{{ asset('libs/tempusdominus-datepicker/tempusdominus-bootstrap-4.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/fontawesome-free-5.15.3-web/css/all.min.css') }}" rel="stylesheet">
@endsection
@section('title_top', (isset($title_top))? $title_top:'')
@section('title_page', (isset($title_page))? $title_page:'')

@section('content')
    <div>
        <div class="row m-1">
            <div class="col_left col-lg-2">
                <div class="text-end">
                    <label for="hotel_select" class="col-form-label">Hotel :</label>
                </div>
            </div>

            <div class="col_right col-lg-4">
                <div class="row g-2 align-items-center">
                    <div class="col-lg-8">
                        <select name="hotel_select" id="hotel_select" class="form-select" aria-label="Choose">
                            <option value="">.:: Choose ::.</option>
                            @foreach($data_hotel as $key)
                                <option value="{{ $key->id }}">{{ $key->text }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col" id="loading_hotel" style="display:none;">
                        <div class="spinner-border text-red" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="row m-1">
            <div class="col_left col-lg-2">
                <div class="text-end">
                    <label for="date_range_start" class="col-form-label">Date Range :</label>
                </div>
            </div>

            <div class="col_right col-lg-7">
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <div class="form-group">
                            <div class="input-group date" id="datetimepicker_1_1" data-target-input="nearest">
                                <input type="text" name="date_range_start" id="date_range_start" class="form-control datetimepicker-input" data-target="#datetimepicker_1_1" aria-describedby="">
                                <div class="input-group-append input-group-text" data-target="#datetimepicker_1_1" data-toggle="datetimepicker">
                                    <div class=""><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-auto">
                        <label for="date_range_end" class="col-form-label">To</label>
                    </div>

                    <div class="col-auto">
                        <div class="form-group">
                            <div class="input-group date" id="datetimepicker_1_2" data-target-input="nearest">
                                <input type="text" name="date_range_end" id="date_range_end" class="form-control datetimepicker-input" data-target="#datetimepicker_1_2" aria-describedby="">
                                <div class="input-group-append input-group-text" data-target="#datetimepicker_1_2" data-toggle="datetimepicker">
                                    <div class=""><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                            text: 'Report Booking',
                        }
                }
            }
        });
    </script>

    <script src="{{ asset('libs/moment/moment.min.js') }}"></script>
    <script src="{{ asset('libs/tempusdominus-datepicker/tempusdominus-bootstrap-4.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#datetimepicker_1_1').datetimepicker({
                format: 'DD-MM-YYYY'
            });
            $('#datetimepicker_1_2').datetimepicker({
                format: 'DD-MM-YYYY',
                useCurrent: false
            });
            $("#datetimepicker_1_1").on("change.datetimepicker", function (e) {
                $('#datetimepicker_1_2').datetimepicker('minDate', e.date);
            });
            $("#datetimepicker_1_2").on("change.datetimepicker", function (e) {
                $('#datetimepicker_1_1').datetimepicker('maxDate', e.date);
            });
        });
    </script>
@endsection
