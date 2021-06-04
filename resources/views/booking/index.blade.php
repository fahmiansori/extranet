@extends('template.template_1')
@section('head')
    <link href="{{ asset('libs/tempusdominus-datepicker/tempusdominus-bootstrap-4.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/fontawesome-free-5.15.3-web/css/all.min.css') }}" rel="stylesheet">
@endsection
@section('title_top', (isset($title_top))? $title_top:'')
@section('title_page', (isset($title_page))? $title_page:'')

@section('content')
    <div class="align-items-start">
        <div class="nav nav-tabs me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="tab_1" data-bs-toggle="pill" href="#tab_1_content" role="tab" aria-controls="tab_1_content" aria-selected="true">Booking</a>
            <a class="nav-link" id="tab_2" data-bs-toggle="pill" href="#tab_2_content" role="tab" aria-controls="tab_2_content" aria-selected="false">Tariff</a>
            <a class="nav-link" id="tab_3" data-bs-toggle="pill" href="#tab_3_content" role="tab" aria-controls="tab_3_content" aria-selected="false">Room Rate</a>
            <a class="nav-link" id="tab_4" data-bs-toggle="pill" href="#tab_4_content" role="tab" aria-controls="tab_4_content" aria-selected="false">Booking List</a>
        </div>

        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active " id="tab_1_content" role="tabpanel" aria-labelledby="tab_1">
                <div class="alert alert-secondary p-1" role="alert">
                    <strong>
                        Booking Information
                    </strong>
                </div>

                <div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div>
                                [room images]
                            </div>
                        </div>

                        <div class="col-lg-9">
                            <div class="row m-1">
                                <div class="col_left col-lg-5">
                                    <div class="text-end">
                                        <label for="name" class="col-form-label">Name :</label>
                                    </div>
                                </div>

                                <div class="col_right col-lg-7">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-lg-6">
                                            <input type="text" name="name" id="name" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-1">
                                <div class="col_left col-lg-5">
                                    <div class="text-end">
                                        <label for="id_booking" class="col-form-label">ID Booking :</label>
                                    </div>
                                </div>

                                <div class="col_right col-lg-7">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-lg-6">
                                            <input type="text" name="id_booking" id="id_booking" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-1">
                                <div class="col_left col-lg-5">
                                    <div class="text-end">
                                        <label for="night_of_stay" class="col-form-label">Night of Stay :</label>
                                    </div>
                                </div>

                                <div class="col_right col-lg-7">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-lg-6">
                                            <select name="night_of_stay" id="night_of_stay" class="form-select" aria-label="Choose" placeholder="Choose">
                                                <option value="1">1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-1">
                                <div class="col_left col-lg-5">
                                    <div class="text-end">
                                        <label for="room_type" class="col-form-label">Room Type :</label>
                                    </div>
                                </div>

                                <div class="col_right col-lg-7">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-lg-6">
                                            <input type="text" name="room_type" id="room_type" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-1">
                                <div class="col_left col-lg-5">
                                    <div class="text-end">
                                        <label for="number_of_room" class="col-form-label">Number of Room :</label>
                                    </div>
                                </div>

                                <div class="col_right col-lg-7">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-lg-6">
                                            <select name="number_of_room" id="number_of_room" class="form-select" aria-label="Choose" placeholder="Choose">
                                                <option value="1">1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-1">
                                <div class="col_left col-lg-5">
                                    <div class="text-end">
                                        <label for="room_rate" class="col-form-label">Room Rate :</label>
                                    </div>
                                </div>

                                <div class="col_right col-lg-7">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-lg-6">
                                            <input type="text" name="room_rate" id="room_rate" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="tab_2_content" role="tabpanel" aria-labelledby="tab_2">
                <div>
                    <div class="alert alert-secondary p-1" role="alert">
                        <strong>
                            Load Tariff
                        </strong>
                    </div>

                    <div>
                        <div class="row m-1">
                            <div class="col_left col-lg-5">
                                <div class="text-end">
                                    <label for="load_tariff_mode" class="col-form-label">Load Tariff Mode :</label>
                                </div>
                            </div>

                            <div class="col_right col-lg-7">
                                <div class="row g-2 align-items-center">
                                    <div class="col-lg-6">
                                        <select name="load_tariff_mode" id="load_tariff_mode" class="form-select" aria-label="Choose" placeholder="Choose">
                                            <option value="1">1</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row m-1">
                            <div class="col_left col-lg-5">
                                <div class="text-end">
                                    <label for="room_type_2" class="col-form-label">Room Type :</label>
                                </div>
                            </div>

                            <div class="col_right col-lg-7">
                                <div class="row g-2 align-items-center">
                                    <div class="col-lg-6">
                                        <input type="text" name="room_type_2" id="room_type_2" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row m-1">
                            <div class="col_left col-lg-5">
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
                            <div class="col_left col-lg-5">
                                <div class="text-end">
                                    <label for="day_of_week" class="col-form-label">Day of Week :</label>
                                </div>
                            </div>

                            <div class="col_right col-lg-7">
                                <div class="row g-2 align-items-center">
                                    <div class="col-lg-6">
                                        <input type="text" name="day_of_week" id="day_of_week" class="form-control" value="All Day">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="alert alert-secondary p-1" role="alert">
                        <strong>
                            Room Rate Section
                        </strong>
                    </div>

                    <div>
                        <div class="row m-1">
                            <div class="col_left col-lg-5">
                                <div class="text-end">
                                    <label for="single_guest_rate" class="col-form-label">Single Guest Rate :</label>
                                </div>
                            </div>

                            <div class="col_right col-lg-7">
                                <div class="row g-2 align-items-center">
                                    <div class="col-lg-6">
                                        <input type="text" name="single_guest_rate" id="single_guest_rate" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row m-1">
                            <div class="col_left col-lg-5">
                                <div class="text-end">
                                    <label for="regular_rate" class="col-form-label">Regular Rate :</label>
                                </div>
                            </div>

                            <div class="col_right col-lg-7">
                                <div class="row g-2 align-items-center">
                                    <div class="col-lg-6">
                                        <input type="text" name="regular_rate" id="regular_rate" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row m-1">
                            <div class="col_left col-lg-5">
                                <div class="text-end">
                                    <label for="extra_bed" class="col-form-label">Extra Bed :</label>
                                </div>
                            </div>

                            <div class="col_right col-lg-7">
                                <div class="row g-2 align-items-center">
                                    <div class="col-lg-6">
                                        <input type="text" name="extra_bed" id="extra_bed" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row m-1">
                            <div class="col_left col-lg-8">
                            </div>

                            <div class="col_right col-lg-2">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end mr-5">
                                    <button class="btn btn-sm btn-secondary me-md-2" type="button" id="cancel">Cancel</button>
                                    <button class="btn btn-sm button-red" type="button" id="save">Save</button>
                                </div>
                            </div>

                            <div class="col_right col-lg-2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="tab_3_content" role="tabpanel" aria-labelledby="tab_3">
                <div>
                    <div class="alert alert-secondary p-1" role="alert">
                        <strong>
                            Room Rate
                        </strong>
                    </div>

                    <div>
                        <div class="row m-1">
                            <div class="col_left col-lg-2">
                                <div class="text-end">
                                    <label for="hotel_select_2" class="col-form-label">Hotel :</label>
                                </div>
                            </div>

                            <div class="col_right col-lg-4">
                                <div class="row g-2 align-items-center">
                                    <div class="col-lg-8">
                                        <select name="hotel_select_2" id="hotel_select_2" class="form-select" aria-label="Choose">
                                            <option value="">.:: Choose ::.</option>
                                            @foreach($data_hotel as $key)
                                                <option value="{{ $key->id }}">{{ $key->text }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col" id="loading_hotel_2" style="display:none;">
                                        <div class="spinner-border text-red" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row m-1">
                            <div class="col_left col-lg-2">
                                <div class="text-end">
                                    <label for="date_range_start_2" class="col-form-label">Date Range :</label>
                                </div>
                            </div>

                            <div class="col_right col-lg-7">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <div class="form-group">
                                            <div class="input-group date" id="datetimepicker_2_1" data-target-input="nearest">
                                                <input type="text" name="date_range_start_2" id="date_range_start_2" class="form-control datetimepicker-input" data-target="#datetimepicker_2_1" aria-describedby="">
                                                <div class="input-group-append input-group-text" data-target="#datetimepicker_2_1" data-toggle="datetimepicker">
                                                    <div class=""><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <label for="date_range_end_2" class="col-form-label">To</label>
                                    </div>

                                    <div class="col-auto">
                                        <div class="form-group">
                                            <div class="input-group date" id="datetimepicker_2_2" data-target-input="nearest">
                                                <input type="text" name="date_range_end_2" id="date_range_end_2" class="form-control datetimepicker-input" data-target="#datetimepicker_2_2" aria-describedby="">
                                                <div class="input-group-append input-group-text" data-target="#datetimepicker_2_2" data-toggle="datetimepicker">
                                                    <div class=""><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5">
                        <table class="table table-striped table-hover table-bordered border-dark">
                            <thead>
                                <tr>
                                    <th scope="col" rowspan="2" class="align-middle text-center">#</th>
                                    <th scope="col" rowspan="2" class="align-middle text-center">Room Name</th>
                                    <th scope="col" rowspan="2" class="align-middle text-center">Day & Date</th>
                                    <th scope="col" colspan="2" class="align-middle text-center">Single</th>
                                    <th scope="col" colspan="2" class="align-middle text-center">Regular</th>
                                    <th scope="col" rowspan="2" class="align-middle text-center">Extra Bed</th>
                                    <th scope="col" rowspan="2" class="align-middle text-center">No Promotion</th>
                                </tr>
                                <tr>
                                    <th scope="col" class="align-middle text-center">Rate You Will Receive (Single)</th>
                                    <th scope="col" class="align-middle text-center">Selling Rate at Travelsya</th>
                                    <th scope="col" class="align-middle text-center">Rate You Will Receive (Single)</th>
                                    <th scope="col" class="align-middle text-center">Selling Rate at Travelsya</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                    <td>
                                        <div class="text-center">
                                            <input class="form-check-input" type="checkbox" value="" id="" name="">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Mark</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                    <td>
                                        <div class="text-center">
                                            <input class="form-check-input" type="checkbox" value="" id="" name="">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Mark</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                    <td>
                                        <div class="text-center">
                                            <input class="form-check-input" type="checkbox" value="" id="" name="">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="row m-1">
                        <div class="col_left col-lg-9">
                        </div>

                        <div class="col_right col-lg-2">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mr-5">
                                <button class="btn btn-sm btn-secondary me-md-2" type="button" id="cancel_2">Cancel</button>
                                <button class="btn btn-sm button-red" type="button" id="save_2">Save</button>
                            </div>
                        </div>

                        <div class="col_right col-lg-1">
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="tab_4_content" role="tabpanel" aria-labelledby="tab_4">
                <div>
                    <div class="alert alert-secondary p-1" role="alert">
                        <strong>
                            Booking List
                        </strong>
                    </div>

                    <div>
                        <div class="row g-3">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="hotel_name" class="form-label">Hotel Name</label>
                                    <input type="text" name="hotel_name" id="hotel_name" class="form-control" placeholder="">
                                </div>
                            </div>

                            <div class="col">
                                <div class="mb-3">
                                    <label for="hotel_group" class="form-label">Hotel Group</label>
                                    <input type="text" name="hotel_group" id="hotel_group" class="form-control" placeholder="">
                                </div>
                            </div>

                            <div class="col">
                                <div class="mb-3">
                                    <label for="hotel_group" class="form-label">Booking ID</label>
                                    <input type="text" name="hotel_group" id="hotel_group" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="check_in_start_date" class="form-label">Check In Start Date</label>
                                    <input type="text" name="check_in_start_date" id="check_in_start_date" class="form-control" placeholder="">
                                </div>
                            </div>

                            <div class="col">
                                <div class="mb-3">
                                    <label for="check_in_end_date" class="form-label">Check In End Date</label>
                                    <input type="text" name="check_in_end_date" id="check_in_end_date" class="form-control" placeholder="">
                                </div>
                            </div>

                            <div class="col">
                                <div class="mb-3">
                                    <label for="check_out_start_date" class="form-label">Check Out Start Date</label>
                                    <input type="text" name="check_out_start_date" id="check_out_start_date" class="form-control" placeholder="">
                                </div>
                            </div>

                            <div class="col">
                                <div class="mb-3">
                                    <label for="check_out_end_date" class="form-label">Check Out End Date</label>
                                    <input type="text" name="check_out_end_date" id="check_out_end_date" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-3">
                                <div class="mb-3">
                                    <label for="booking_start_date" class="form-label">Booking Start Date</label>
                                    <input type="text" name="booking_start_date" id="booking_start_date" class="form-control" placeholder="">
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="mb-3">
                                    <label for="booking_end_date" class="form-label">Booking End Date</label>
                                    <input type="text" name="booking_end_date" id="booking_end_date" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5">
                        <div class="row g-3">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="">
                                </div>
                            </div>

                            <div class="col">
                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="">
                                </div>
                            </div>

                            <div class="col">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="">
                                </div>
                            </div>

                            <div class="col-1">
                                <div class="mt-3">
                                    <button type="button" id="" class="btn button-red mt-3">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('libs/moment/moment.min.js') }}"></script>
    <script src="{{ asset('libs/tempusdominus-datepicker/tempusdominus-bootstrap-4.js') }}"></script>

    <script type="text/javascript">
        $(function () {
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


            $('#datetimepicker_2_1').datetimepicker({
                format: 'DD-MM-YYYY'
            });
            $('#datetimepicker_2_2').datetimepicker({
                format: 'DD-MM-YYYY',
                useCurrent: false
            });
            $("#datetimepicker_2_1").on("change.datetimepicker", function (e) {
                $('#datetimepicker_2_2').datetimepicker('minDate', e.date);
            });
            $("#datetimepicker_2_2").on("change.datetimepicker", function (e) {
                $('#datetimepicker_2_1').datetimepicker('maxDate', e.date);
            });
        });
    </script>
@endsection
