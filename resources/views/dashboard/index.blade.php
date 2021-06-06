@extends('template.template_1')
@section('head')
    <link href="{{ asset('libs/tempusdominus-datepicker/tempusdominus-bootstrap-4.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/fontawesome-free-5.15.3-web/css/all.min.css') }}" rel="stylesheet">
@endsection
@section('title_top', (isset($title_top))? $title_top:'')
@section('title_page', (isset($title_page))? $title_page:'')

@section('content')
    {{ csrf_field() }}

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

        <div class="row m-1">
            <div class="col_left col-lg-2">
            </div>

            <div class="col_right col-lg-7">
                <div class="d-grid gap-2 d-md-flex mr-5">
                    <button class="btn button-red" type="button" id="btn_view_chart">View</button>
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
    /*
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
    */
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

    <script>
        let route_get_report_chart_data = '{{ route('dashboard.get-report-chart-data') }}';
        let myChart = null;
        let dateFrom = moment().format('DD-MM-YYYY'); // .subtract(7,'d')
        let dateTo = moment().add(7,'d').format('DD-MM-YYYY');
    </script>
    <script>
        let clearCanvas = function(){
            if(myChart){
                myChart.destroy();
            }
        }

        let setReportChart = function(data){
            if(data.status != 'success'){
                alert(data.message);
                return;
            }

            let data_label_myChart = [];
            let data_myChart_booking = [];
            let data_myChart_sukses = [];
            let data_myChart_batal = [];

            $.each(data.data, function(i, e){
                data_label_myChart.push(e.label);
                data_myChart_booking.push(e.booking);
                data_myChart_sukses.push(e.sukses);
                data_myChart_batal.push(e.batal);
            });

            let data_ = {
                labels: data_label_myChart,
                datasets: [
                    {
                        label: 'Total Booking',
                        data: data_myChart_booking,
                        borderColor: '#000',
                        backgroundColor: '#00abdf',
                        borderWidth: 1
                    },
                    {
                        label: 'Booking Success',
                        data: data_myChart_sukses,
                        borderColor: '#000',
                        backgroundColor: '#abdf',
                        borderWidth: 1
                    },
                    {
                        label: 'Booking Cancel',
                        data: data_myChart_batal,
                        borderColor: '#000',
                        backgroundColor: '#c9ccc3',
                        borderWidth: 1
                    }
                ]
            };

            let ctx = $('#myChart');
            myChart = new Chart(ctx, {
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
        };

        let loading_el = `
            <div class="spinner-border text-light spinner-border-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        `;
        let btn_show_report = $('#btn_view_chart').html();
        let showLoadingReport = function(){
            $('#btn_view_chart').prop('disabled', true);
            $('#btn_view_chart').html(loading_el);
        }
        let hideLoadingReport = function(){
            $('#btn_view_chart').prop('disabled', false);
            $('#btn_view_chart').html(btn_show_report);
        }

        let showReport = function(el){
            showLoadingReport();
            clearCanvas();

            let hotel_select = $('#hotel_select').val();
            let date_range_start = $('#date_range_start').val();
            let date_range_end = $('#date_range_end').val();

            if(!hotel_select){
                alert('Please select a hotel.');
                hideLoadingReport();
                return;
            }

            let _token = $("input[name='_token']").val();
            let data_send = {_token:_token,
                id_hotel:hotel_select,
                start_date:date_range_start,
                end_date:date_range_end,
            };

            $.ajax({
                url: route_get_report_chart_data,
                type:'POST',
                data: data_send,
                success: function(data) {
                    setReportChart(data);
                }
            }).always(function() {
                hideLoadingReport();
            })
            .fail(function() {
                alert('server error');
            });
        };

        $(document).ready(function(){
            $('#btn_view_chart').on('click', function(){
                showReport($(this));
            });

            $('#date_range_start').val(dateFrom);
            $('#date_range_end').val(dateTo);
        });
    </script>
@endsection
