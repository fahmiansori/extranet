@extends('template.template_1')
@section('head')
    <link href="{{ asset('libs/tempusdominus-datepicker/tempusdominus-bootstrap-4.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/fontawesome-free-5.15.3-web/css/all.min.css') }}" rel="stylesheet">
    <style>
        .swal-wide{
            width:850px !important;
        }
        .swal2-actions {
            z-index: 0 !important;
        }
    </style>
@endsection
@section('title_top', (isset($title_top))? $title_top:'')
@section('title_page', (isset($title_page))? $title_page:'')

@section('content')
    {{ csrf_field() }}

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
                                    <label for="room_select" class="col-form-label">Room :</label>
                                </div>
                            </div>

                            <div class="col_right col-lg-4">
                                <div class="row g-2 align-items-center">
                                    <div class="col-lg-8">
                                        <select name="room_select" id="room_select" class="form-select" aria-label="Choose">
                                        </select>
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

                        <div class="row m-1">
                            <div class="col_left col-lg-2">
                            </div>

                            <div class="col_right col-lg-7">
                                <div class="d-grid gap-2 d-md-flex mr-5">
                                    <button class="btn button-red" type="button" id="btn_search_room_rates">Search</button>
                                    <button class="btn btn-primary" type="button" id="btn_search_room_rates_new">Add New</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="row">
                            <div class="col_left col-lg-6">
                                <div class="row justify-content-start">
                                    <div class="col-2">
                                        <select name="perPage_room_rates" id="perPage_room_rates" class="form-select form-select-sm" aria-label="Choose">
                                            <option value="10">10</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col_right col-lg-6">
                                <div class="row justify-content-end">
                                    <div class="col-6">
                                        <input type="text" name="q_room_rates_q" id="q_room_rates_q" class="form-control form-control-sm" placeholder="Search here">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <table class="table table-striped table-hover table-bordered border-dark">
                            <thead>
                                <tr>
                                    <th scope="col" class="align-middle text-center">#</th>
                                    <th scope="col" class="align-middle text-center">Date</th>
                                    <th scope="col" class="align-middle text-center">Price</th>
                                    <th scope="col" class="align-middle text-center">Selling Price</th>
                                    <th scope="col" class="align-middle text-center">Extrabed</th>
                                    <th scope="col" class="align-middle text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody id="room_rates">
                            </tbody>
                        </table>
                    </div>

                    <div id="data_room_rates_paging">
                        <div class="row">
                            <div class="col_left col-lg-6">
                                Total data : <strong><span id="total_room_rates">-</span></strong>
                            </div>

                            <div class="col_left col-lg-6">
                                <nav aria-label="">
                                    <ul class="pagination justify-content-end" id="data_room_rates_paging_pages">
                                    </ul>
                                </nav>
                            </div>
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
                        <div class="row m-1">
                            <div class="col_left col-lg-2">
                                <div class="text-end">
                                    <label for="hotel_select_3" class="col-form-label">Hotel :</label>
                                </div>
                            </div>

                            <div class="col_right col-lg-4">
                                <div class="row g-2 align-items-center">
                                    <div class="col-lg-8">
                                        <select name="hotel_select_3" id="hotel_select_3" class="form-select" aria-label="Choose">
                                            <option value="">.:: Choose ::.</option>
                                            @foreach($data_hotel as $key)
                                                <option value="{{ $key->id }}">{{ $key->text }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col" id="loading_hotel_3" style="display:none;">
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
                                    <label for="room_select_2" class="col-form-label">Room :</label>
                                </div>
                            </div>

                            <div class="col_right col-lg-4">
                                <div class="row g-2 align-items-center">
                                    <div class="col-lg-8">
                                        <select name="room_select_2" id="room_select_2" class="form-select" aria-label="Choose">
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row m-1">
                            <div class="col_left col-lg-2">
                                <div class="text-end">
                                    <label for="date_range_start_3" class="col-form-label">Date Range :</label>
                                </div>
                            </div>

                            <div class="col_right col-lg-7">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <div class="form-group">
                                            <div class="input-group date" id="datetimepicker_3_1" data-target-input="nearest">
                                                <input type="text" name="date_range_start_3" id="date_range_start_3" class="form-control datetimepicker-input" data-target="#datetimepicker_3_1" aria-describedby="">
                                                <div class="input-group-append input-group-text" data-target="#datetimepicker_3_1" data-toggle="datetimepicker">
                                                    <div class=""><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <label for="date_range_end_3" class="col-form-label">To</label>
                                    </div>

                                    <div class="col-auto">
                                        <div class="form-group">
                                            <div class="input-group date" id="datetimepicker_3_2" data-target-input="nearest">
                                                <input type="text" name="date_range_end_3" id="date_range_end_3" class="form-control datetimepicker-input" data-target="#datetimepicker_3_2" aria-describedby="">
                                                <div class="input-group-append input-group-text" data-target="#datetimepicker_3_2" data-toggle="datetimepicker">
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
                                    <button class="btn button-red" type="button" id="btn_view_booking_list">View</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="row">
                            <div class="col_left col-lg-6">
                                <div class="row justify-content-start">
                                    <div class="col-2">
                                        <select name="perPage_booking_list" id="perPage_booking_list" class="form-select form-select-sm" aria-label="Choose">
                                            <option value="10">10</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col_right col-lg-6">
                                <div class="row justify-content-end">
                                    <div class="col-6">
                                        <input type="text" name="q_booking_list" id="q_booking_list" class="form-control form-control-sm" placeholder="Search here">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <table class="table table-striped table-hover table-bordered border-dark">
                            <thead>
                                <tr>
                                    <th scope="col" class="align-middle text-center">#</th>
                                    <th scope="col" class="align-middle text-center">Code</th>
                                    <th scope="col" class="align-middle text-center">Booking</th>
                                    <th scope="col" class="align-middle text-center">Date</th>
                                    <th scope="col" class="align-middle text-center">Customer</th>
                                    <th scope="col" class="align-middle text-center">Contact</th>
                                    <th scope="col" class="align-middle text-center">Room</th>
                                    <th scope="col" class="align-middle text-center">Detail Booking</th>
                                    <th scope="col" class="align-middle text-center">Grand Total</th>
                                    <th scope="col" class="align-middle text-center">Grand Total Selling</th>
                                    <th scope="col" class="align-middle text-center">Status</th>
                                </tr>
                            </thead>

                            <tbody id="booking_list">
                            </tbody>
                        </table>
                    </div>

                    <div id="data_booking_list_paging">
                        <div class="row">
                            <div class="col_left col-lg-6">
                                Total data : <strong><span id="total_booking_list">-</span></strong>
                            </div>

                            <div class="col_left col-lg-6">
                                <nav aria-label="">
                                    <ul class="pagination justify-content-end" id="data_booking_list_paging_pages">
                                    </ul>
                                </nav>
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
    <script src="{{ asset('libs/sweetalert2/sweetalert2.all.min.js') }}"></script>

    <script type="text/javascript">
        let dateFrom_booking_list = moment().format('L');
        let dateTo_booking_list = moment().add(7,'d').format('L');

        $(function () {
            $('#datetimepicker_3_1').datetimepicker({
                format: 'DD-MM-YYYY',
                defaultDate: dateFrom_booking_list
            });
            $('#datetimepicker_3_2').datetimepicker({
                format: 'DD-MM-YYYY',
                defaultDate: dateTo_booking_list,
                useCurrent: false
            });
            $("#datetimepicker_3_1").on("change.datetimepicker", function (e) {
                $('#datetimepicker_3_2').datetimepicker('minDate', e.date);
            });
            $("#datetimepicker_3_2").on("change.datetimepicker", function (e) {
                $('#datetimepicker_3_1').datetimepicker('maxDate', e.date);
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

    <!-- Room Rate -->
    <script>
        let route_detail_hotel_rooms = '{{ route('hotel.detail.rooms') }}';
        let route_detail_hotel_rooms_rate = '{{ route('hotel.detail.rooms.rates') }}';
        let route_detail_hotel_rooms_rate_detail = '{{ route('hotel.detail.rooms.rates-detail') }}';
        let route_detail_hotel_rooms_rate_delete = '{{ route('hotel.detail.rooms.rates-delete') }}';
        let route_detail_hotel_rooms_rate_save = '{{ route('hotel.detail.rooms.rates-save') }}';

        let total_data_per_page = 1000;
        let total_data_per_page_rate = 10;

        let dateFrom = moment().format('DD-MM-YYYY');
        let dateTo = moment().add(7,'d').format('DD-MM-YYYY');
    </script>

    <script>
        let clearRooms = function(){
            $('#room_select').html('');
        }
        let showLoadingHotel = function(){
            $('#loading_hotel_2').show();
        }
        let hideLoadingHotel = function(){
            $('#loading_hotel_2').hide();
        }
        let setHotelRooms = function (data){
            if(data.status == 'success'){
                let total_data = data.total;
                if(total_data > 0){
                    $.each(data.data, function(i, e){
                        let html_ = `
                            <option value="`+ e.id +`"> `+ e.kamar +` </option>
                        `;

                        $(html_).hide().appendTo('#room_select').fadeIn(300);
                    });
                }else{
                    let html_ = `
                        <option value=""> -- No data -- </option>
                    `;

                    $(html_).hide().appendTo('#room_select').fadeIn(300);
                }
            }else{
                clearRooms();
            }
        }
        let getHotelRooms = function (page_ = 1, perPage_ = 0, q_ = '', sortBy_ = ''){
            clearRooms();
            showLoadingHotel();
            let hotel_id = $('#hotel_select_2').val();

            let q = (q_)? q_:'';
            let sortBy = (sortBy_)? sortBy_:'price-desc';
            let page = page_;
            let perPage = (perPage_ == 0)? total_data_per_page:10;

            let queryString = '?q='+ q +'&sortBy='+ sortBy +'&page='+ page +'&perPage='+ perPage +'';

            if(hotel_id){
                $.ajax({
                    url: route_detail_hotel_rooms +'/'+ hotel_id +''+ queryString,
                    type:'GET',
                    success: function(data) {
                        setHotelRooms(data);
                    }
                }).always(function() {
                    hideLoadingHotel();
                })
                .fail(function() {
                    alert('server error');
                });
            }else{
                hideLoadingHotel();
            }
        }



        let clearRoomRates = function(){
            $('#room_rates').html('');
        }
        let loading_el = `
            <div class="spinner-border text-light spinner-border-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        `;
        let btn_search_room_rates_caption = $('#btn_search_room_rates').html();
        let showLoadingRoomRates = function(){
            $('#btn_search_room_rates').prop('disabled', true);
            $('#btn_search_room_rates').html(loading_el);
        }
        let hideLoadingRoomRates = function(){
            $('#btn_search_room_rates').prop('disabled', false);
            $('#btn_search_room_rates').html(btn_search_room_rates_caption);
        }

        let paginationRoomRates = function(total_data, page_, perPage_){
            $('#data_room_rates_paging').hide();
            $('#data_room_rates_paging_pages').html('');

            if(total_data > 0){
                $('#data_room_rates_paging').show();

                let total_page = Math.ceil(total_data/perPage_);
                let html_ = '';

                let current_page = page_;

                if(current_page > 1){
                    html_ +=`
                        <li class="page-item">
                            <a class="page-link page-link-room-rates" href="?page=`+ (current_page-1) +`" data-page="`+ (current_page-1) +`" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    `;
                }

                let showPage = 0;
                for(page = 1; page <= total_page; page++)
                {
                        if (((page >= current_page - 3) && (page <= current_page + 3)) || (page == 1) || (page == total_page))
                        {
                            if ((showPage == 1) && (page != 2)){
                                html_ += `
                                    <li class="page-item disabled disabled1"><a class="page-link page-link-room-rates disabled" href="javascript:void(0);">...</a></li>
                                `;
                            }

                            if ((showPage != (total_page - 1)) && (page == total_page)){
                                html_ += `
                                    <li class="page-item disabled disabled2"><a class="page-link page-link-room-rates disabled" href="javascript:void(0);">...</a></li>
                                `;
                            }

                            if (page == current_page){
                                html_ += `
                                    <li class="page-item active"><a class="page-link page-link-room-rates disabled" href="javascript:void(0);">`+ page +`</a></li>
                                `;
                            }
                            else {
                                html_ += `
                                    <li class="page-item"><a class="page-link page-link-room-rates" href="?page=`+ page +`" data-page="`+ page +`">`+ page +`</a></li>
                                `;
                            }

                            showPage = page;
                        }
                }


                if (current_page < total_page){
                    html_ += `
                        <li class="page-item">
                            <a class="page-link page-link-room-rates" href="?page=`+ (current_page+1) +`" data-page="`+ (current_page+1) +`" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    `;
                }

                $('#data_room_rates_paging_pages').html(html_);
            }
        }
        let setRoomRates = function (data, page, perPage){
            if(data.status == 'success'){
                let total_data = data.total;
                $('#total_room_rates').html(total_data);

                paginationRoomRates(total_data, page, perPage);
                if(total_data > 0){
                    let number = 0;
                    let num = page * perPage;

                    $.each(data.data, function(i, e){
                        number++;
                        let no_data = (number + num - perPage);

                        let extrabed = `No`;
                        if(e.status_extrabed == 1){
                            extrabed = `Yes`;
                        }
                        let actions = `
                            <div>
                                <a href="javascript:void(0);" data-room_rates_id="`+ e.id +`" class="btn btn-sm btn-success edit_room_rates" title="Edit"><i class="fa fa-pencil-alt"></i></a>
                                <a href="javascript:void(0);" data-room_rates_id="`+ e.id +`" class="ml-1 btn btn-sm btn-danger delete_room_rates" title="Delete"><i class="fa fa-trash"></i></a>
                            </div>
                        `;
                        let html_ = `
                            <tr>
                                <th scope="row" class="text-center">`+ no_data +`</th>
                                <td>`+ e.tanggal +`</td>
                                <td class="text-end">`+ e.harga +`</td>
                                <td class="text-end">`+ e.harga_selling +`</td>
                                <td class="text-center">`+ extrabed +`</td>
                                <td class="text-center">`+ actions +`</td>
                            </tr>
                        `;

                        $(html_).hide().appendTo('#room_rates').fadeIn(300);
                    });
                }else{
                    let html_ = `
                        <tr>
                            <th class="align-middle text-center text-danger" colspan="6">
                                -- No data --
                            </th>
                        </tr>
                    `;

                    $(html_).hide().appendTo('#room_rates').fadeIn(300);
                }
            }else{
                clearRoomRates();
            }
        }
        let getRoomRates = function (page_ = 1){
            clearRoomRates();
            showLoadingRoomRates();
            let room_id = $('#room_select').val();

            let q = $('#q_room_rates_q').val();
            let start_date = $('#date_range_start_2').val();
            let end_date = $('#date_range_end_2').val();
            let page = page_;
            let perPage = ($('#perPage_room_rates').val())? $('#perPage_room_rates').val():total_data_per_page_rate;

            let _token = $("input[name='_token']").val();
            let data_send = {_token:_token,
                id_kamar:room_id,
                q:q,
                start_date:start_date,
                end_date:end_date,
                page:page,
                perPage:perPage,
            };


            if(room_id){
                $.ajax({
                    url: route_detail_hotel_rooms_rate,
                    type:'POST',
                    data: data_send,
                    success: function(data) {
                        setRoomRates(data, page, perPage);
                    }
                }).always(function() {
                    hideLoadingRoomRates();
                })
                .fail(function() {
                    alert('server error');
                });
            }else{
                hideLoadingRoomRates();
                alert('Invalid room ID!');
            }
        }

        let deleteRoomRates = function (room_rates_id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    let _token = $("input[name='_token']").val();
                    let data_send = {_token:_token,
                        room_rates_id:room_rates_id,
                    };

                    if(room_rates_id){
                        $.ajax({
                            url: route_detail_hotel_rooms_rate_delete,
                            type:'POST',
                            data: data_send,
                            success: function(data) {
                                if($.isEmptyObject(data.error)){
                                    if(data.status == 'success'){
                                        $('.message-success').html(data.message);
                                        $('.message-success').show();
                                    }else{
                                        $('.message-failed').html(data.message);
                                        $('.message-failed').show();
                                    }
                                }else{
                                    printErrorMsg(data.error);
                                }
                                /*
                                if(data.status == 'success'){
                                    Swal.fire(
                                        'Deleted!',
                                        'Your data has been deleted. ',
                                        'success'
                                    )
                                }else{
                                    Swal.fire(
                                        'Failed!',
                                        'Failed to delete data. ' + data.message,
                                        'error'
                                    )
                                }
                                */
                            }
                        }).always(function() {
                            document.getElementById('nav_bar').scrollIntoView({block: 'start', behavior: 'smooth'});
                            setTimeout(function(){
                                $('.print-error-msg').hide();
                                $('.message-success').hide();
                                $('.message-failed').hide();
                            },4000);

                            getRoomRates();
                        })
                        .fail(function() {
                            alert('server error');
                        });
                    }else{
                        alert('Invalid room rate ID!');
                    }
                }
            });
        }

        let disableSaveButton = function(){
            $('.swal2-confirm').prop('disable', true);
        };
        let enableSaveButton = function(){
            $('.swal2-confirm').prop('disable', false);
        };
        let saveRoomRates = function(el){
            disableSaveButton();
            let id_hotel = $('#hotel_select_2').val();
            let el_caption = el.html();
            el.html(loading_el);

            let form_type = $('#form_type').val();
            let id_kamar = $('#room_select').val();
            let tanggal_kamar = $('#tanggal_kamar').val();
            let harga = $('#form_price').val();
            let room_rates_id = $('#form_room_rates_id').val();

            let _token = $("input[name='_token']").val();
            let data_send = {_token:_token,
                room_rates_id:room_rates_id,
                form_type:form_type,
                id_hotel:id_hotel,
                id_kamar:id_kamar,
                tanggal_kamar:tanggal_kamar,
                harga:harga,
            };

            if(id_hotel && id_kamar){
                $.ajax({
                    url: route_detail_hotel_rooms_rate_save,
                    type:'POST',
                    data: data_send,
                    success: function(data) {
                        if($.isEmptyObject(data.error)){
                            if(data.status == 'success'){
                                $('.message-success').html(data.message);
                                $('.message-success').show();

                                getRoomRates();
                            }else{
                                $('.message-failed').html(data.message);
                                $('.message-failed').show();
                            }
                        }else{
                            printErrorMsg(data.error);
                        }
                    }
                }).always(function() {
                    document.getElementById('nav_bar').scrollIntoView({block: 'start', behavior: 'smooth'});
                    setTimeout(function(){
                        $('.print-error-msg').hide();
                        $('.message-success').hide();
                        $('.message-failed').hide();
                    },4000);

                    enableSaveButton();
                    el.html(el_caption);
                })
                .fail(function() {
                    alert('server error');
                });
            }else{
                enableSaveButton();
                el.html(el_caption);
                alert('Invalid hotel ID or room ID!');
            }
        }

        let editRoomRates = function(el){
            let hotel_id = $('#hotel_select_2').val();
            let room_rates_id = el.data('room_rates_id');
            let room_rates_id_caption = el.html();
            el.html(loading_el);

            if(room_rates_id){
                $.ajax({
                    url: route_detail_hotel_rooms_rate_detail +'/'+ room_rates_id,
                    type:'GET',
                    success: function(data) {
                        if(data.status == 'success'){
                            Swal.fire({
                                title: '<strong>Edit Room Rate</strong>',
                                html:
                                    `
                                        <input type="hidden" name="form_type" id="form_type" value="edit">
                                        <input type="hidden" name="form_hotel_id" id="form_hotel_id" value="`+ hotel_id +`">
                                        <input type="hidden" name="form_room_rates_id" id="form_room_rates_id" value="`+ room_rates_id +`">
                                        <input type="hidden" name="tanggal_kamar" id="tanggal_kamar" value="">
                                        <div class="row m-1">
                                            <div class="col_left col-lg-4">
                                                <div class="text-end">
                                                    <label for="form_price" class="col-form-label">Price :</label>
                                                </div>
                                            </div>

                                            <div class="col_right col-lg-8">
                                                <div class="row g-2 align-items-center">
                                                    <div class="col-lg-8">
                                                        <input type="text" name="form_price" id="form_price" class="form-control" value="`+ data.data.harga +`">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    `,
                                //customClass: 'swal-wide',
                                showCloseButton: true,
                                showCancelButton: true,
                                focusConfirm: false,
                                confirmButtonText:
                                    'Save',
                                cancelButtonText:
                                    'Cancel',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    saveRoomRates(el);
                                }
                            });
                        }else{
                            alert(data.message);
                        }
                    }
                }).always(function() {
                    el.html(room_rates_id_caption);
                })
                .fail(function() {
                    alert('server error');
                });
            }else{
                alert('Invalid room rate ID![2]');
            }
        }

        let newRoomRates = function(el){
            let hotel_id = $('#hotel_select_2').val();
            let id_kamar = $('#room_select').val();

            let err = '';
            if(!hotel_id){
                err += 'Please select hotel. ';
            }
            if(!id_kamar){
                err += 'Please select room. ';
            }
            if(err){
                alert(err);
                return;
            }

            Swal.fire({
                title: '<strong>New Room Rate</strong>',
                html:
                    `
                        <input type="hidden" name="form_type" id="form_type" value="new">
                        <input type="hidden" name="form_hotel_id" id="form_hotel_id" value="`+ hotel_id +`">
                        <input type="hidden" name="form_room_rates_id" id="form_room_rates_id" value="">
                        <div class="row m-1">
                            <div class="col_left col-lg-4">
                                <div class="text-end">
                                    <label for="tanggal_kamar" class="col-form-label">Date :</label>
                                </div>
                            </div>

                            <div class="col_right col-lg-8">
                                <div class="row g-2 align-items-center">
                                    <div class="col-lg-10">
                                        <div class="form-group">
                                            <div class="input-group date datetimepicker_tanggal_kamar" id="datetimepicker_tanggal_kamar" data-target-input="nearest">
                                                <input type="text" name="tanggal_kamar" id="tanggal_kamar" class="form-control datetimepicker-input" data-target="#datetimepicker_tanggal_kamar" aria-describedby="">
                                                <div class="input-group-append input-group-text" data-target="#datetimepicker_tanggal_kamar" data-toggle="datetimepicker">
                                                    <div class=""><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row m-1">
                            <div class="col_left col-lg-4">
                                <div class="text-end">
                                    <label for="form_price" class="col-form-label">Price :</label>
                                </div>
                            </div>

                            <div class="col_right col-lg-8">
                                <div class="row g-2 align-items-center">
                                    <div class="col-lg-10">
                                        <input type="text" name="form_price" id="form_price" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    `,
                //customClass: 'swal-wide',
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText:
                    'Save',
                cancelButtonText:
                    'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    saveRoomRates(el);
                }
            });

            $(function () {
                $('.datetimepicker_tanggal_kamar').datetimepicker({
                    format: 'DD-MM-YYYY',
                    widgetPositioning: {
                        horizontal: 'right'
                        //vertical: 'top'
                    }
                });
            });
        }

        $(document).ready(function(){
            $('#date_range_start_2').val(dateFrom);
            $('#date_range_end_2').val(dateTo);

            $('#hotel_select_2').on('change', function(){
                getHotelRooms();
            });

            $('#perPage_room_rates').on('change', function(){
                getRoomRates();
            });
            $('#q_room_rates_q').on('change', function(){
                getRoomRates();
            });
            $('#btn_search_room_rates').on('click', function(){
                getRoomRates();
            });
            $('body').on('click', '.page-item a.page-link-room-rates', function(e) {
                e.preventDefault();

                if($(this).hasClass("disabled")){
                    // console.log('has class disabled');
                    return ;
                }

                let page = $(this).data('page');
                getRoomRates(page);
            });

            $('body').on('click', '.delete_room_rates', function(e) {
                e.preventDefault();

                let room_rates_id = $(this).data('room_rates_id');
                deleteRoomRates(room_rates_id);
            });

            $('body').on('click', '.edit_room_rates', function(e) {
                e.preventDefault();

                editRoomRates($(this));
            });

            $('#btn_search_room_rates_new').on('click', function(){
                newRoomRates($(this));
            });
        });
    </script>

    <!-- Booking List -->
    <script>
        let route_booking_list = '{{ route('booking.list') }}';
    </script>

    <script>
        let clearRooms2 = function(){
            $('#room_select_2').html('');
        }
        let showLoadingHotel2 = function(){
            $('#loading_hotel_3').show();
        }
        let hideLoadingHotel2 = function(){
            $('#loading_hotel_3').hide();
        }
        let setHotelRooms2 = function (data){
            if(data.status == 'success'){
                let total_data = data.total;
                if(total_data > 0){
                    let html_1 = `
                        <option value=""> -- Choose -- </option>
                    `;

                    $(html_1).hide().appendTo('#room_select_2').fadeIn(300);
                    $.each(data.data, function(i, e){
                        let html_ = `
                            <option value="`+ e.id +`"> `+ e.kamar +` </option>
                        `;

                        $(html_).hide().appendTo('#room_select_2').fadeIn(300);
                    });
                }else{
                    let html_ = `
                        <option value=""> -- No data -- </option>
                    `;

                    $(html_).hide().appendTo('#room_select_2').fadeIn(300);
                }
            }else{
                clearRooms2();
            }
        }
        let getHotelRooms2 = function (page_ = 1, perPage_ = 0, q_ = '', sortBy_ = ''){
            clearRooms2();
            showLoadingHotel2();
            let hotel_id = $('#hotel_select_3').val();

            let q = (q_)? q_:'';
            let sortBy = (sortBy_)? sortBy_:'price-desc';
            let page = page_;
            let perPage = (perPage_ == 0)? total_data_per_page:10;

            let queryString = '?q='+ q +'&sortBy='+ sortBy +'&page='+ page +'&perPage='+ perPage +'';

            if(hotel_id){
                $.ajax({
                    url: route_detail_hotel_rooms +'/'+ hotel_id +''+ queryString,
                    type:'GET',
                    success: function(data) {
                        setHotelRooms2(data);
                    }
                }).always(function() {
                    hideLoadingHotel2();
                })
                .fail(function() {
                    alert('server error');
                });
            }else{
                hideLoadingHotel2();
            }
        }


        let clear_BookingList = function(){
            $('#booking_list').html('');
        }
        let loading_el2 = `
            <div class="spinner-border text-light spinner-border-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        `;
        let btn_view_booking_list_caption = $('#btn_view_booking_list').html();
        let showLoading_BookingList = function(){
            $('#btn_view_booking_list').prop('disabled', true);
            $('#btn_view_booking_list').html(loading_el2);
        }
        let hideLoading_BookingList = function(){
            $('#btn_view_booking_list').prop('disabled', false);
            $('#btn_view_booking_list').html(btn_view_booking_list_caption);
        }

        let pagination_BookingList = function(total_data, page_, perPage_){
            $('#data_booking_list_paging').hide();
            $('#data_booking_list_paging_pages').html('');

            if(total_data > 0){
                $('#data_booking_list_paging').show();

                let total_page = Math.ceil(total_data/perPage_);
                let html_ = '';

                let current_page = page_;

                if(current_page > 1){
                    html_ +=`
                        <li class="page-item">
                            <a class="page-link page-link-booking-list" href="?page=`+ (current_page-1) +`" data-page="`+ (current_page-1) +`" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    `;
                }

                let showPage = 0;
                for(page = 1; page <= total_page; page++)
                {
                        if (((page >= current_page - 3) && (page <= current_page + 3)) || (page == 1) || (page == total_page))
                        {
                            if ((showPage == 1) && (page != 2)){
                                html_ += `
                                    <li class="page-item disabled disabled1"><a class="page-link page-link-booking-list disabled" href="javascript:void(0);">...</a></li>
                                `;
                            }

                            if ((showPage != (total_page - 1)) && (page == total_page)){
                                html_ += `
                                    <li class="page-item disabled disabled2"><a class="page-link page-link-booking-list disabled" href="javascript:void(0);">...</a></li>
                                `;
                            }

                            if (page == current_page){
                                html_ += `
                                    <li class="page-item active"><a class="page-link page-link-booking-list disabled" href="javascript:void(0);">`+ page +`</a></li>
                                `;
                            }
                            else {
                                html_ += `
                                    <li class="page-item"><a class="page-link page-link-booking-list" href="?page=`+ page +`" data-page="`+ page +`">`+ page +`</a></li>
                                `;
                            }

                            showPage = page;
                        }
                }


                if (current_page < total_page){
                    html_ += `
                        <li class="page-item">
                            <a class="page-link page-link-booking-list" href="?page=`+ (current_page+1) +`" data-page="`+ (current_page+1) +`" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    `;
                }

                $('#data_booking_list_paging_pages').html(html_);
            }
        }
        let set_BookingList = function (data, page, perPage){
            if(data.status == 'success'){
                let total_data = data.total;
                $('#total_booking_list').html(total_data);

                pagination_BookingList(total_data, page, perPage);
                if(total_data > 0){
                    let number = 0;
                    let num = page * perPage;

                    $.each(data.data, function(i, e){
                        number++;
                        let no_data = (number + num - perPage);
                        /*
                                <th scope="col" class="align-middle text-center">#</th>
                                    <th scope="col" class="align-middle text-center">Code</th>
                                    <th scope="col" class="align-middle text-center">Booking</th>
                                    <th scope="col" class="align-middle text-center">Date</th>
                                    <th scope="col" class="align-middle text-center">Customer</th>
                                    <th scope="col" class="align-middle text-center">Room</th>
                                    <th scope="col" class="align-middle text-center">Grand Total</th>
                                    <th scope="col" class="align-middle text-center">Status</th>

                                    "kode": "INV20210412-000002",
                                    "booking": "",
                                    "tanggal": "12-04-2021",
                                    "email": "hendrawanagus15@gmail.com",
                                    "nama_pemesan": "agus hendrawan",
                                    "no_telepon": "085247488493",
                                    "kamar": "Deluxe Room",
                                    "checkin": "12-04-2021",
                                    "checkout": "13-04-2021",
                                    "jumlah_tamu": 1,
                                    "jumlah_kamar": 1,
                                    "grandtotal": "300,000",
                                    "grandtotal_selling": "0",
                                    "status_transaksi": "menunggu"
                        */

                        let status = '<span class="badge bg-warning">Waiting</span>';
                        if(e.status_transaksi == ''){
                            status = '-';
                        }

                        let contact = `
                            - Email : `+ e.email +`<br>
                            - Phone : `+ e.no_telepon +`<br>
                        `;
                        let detail_booking = `
                            - Check In : `+ e.checkin +`<br>
                            - Check Out : `+ e.checkout +`<br>
                            - Guest : `+ e.jumlah_tamu +`<br>
                            - Total Room : `+ e.jumlah_kamar +`<br>
                        `;

                        let html_ = `
                            <tr>
                                <th scope="row" class="text-center">`+ no_data +`</th>
                                <td>`+ e.kode +`</td>
                                <td>`+ e.booking +`</td>
                                <td class="text-center">`+ e.tanggal +`</td>
                                <td>`+ e.nama_pemesan +`</td>
                                <td>`+ contact +`</td>
                                <td>`+ e.kamar +`</td>
                                <td>`+ detail_booking +`</td>
                                <td class="text-end">`+ e.grandtotal +`</td>
                                <td class="text-end">`+ e.grandtotal_selling +`</td>
                                <td class="text-center">`+ status +`</td>
                            </tr>
                        `;

                        $(html_).hide().appendTo('#booking_list').fadeIn(300);
                    });
                }else{
                    let html_ = `
                        <tr>
                            <th class="align-middle text-center text-danger" colspan="11">
                                -- No data --
                            </th>
                        </tr>
                    `;

                    $(html_).hide().appendTo('#booking_list').fadeIn(300);
                }
            }else{
                clear_BookingList();
            }
        }
        let get_BookingList = function (page_ = 1){
            clear_BookingList();
            showLoading_BookingList();
            let room_id = $('#room_select_2').val();
            let id_hotel = $('#hotel_select_3').val();

            let q = $('#q_booking_list').val();
            let start_date = $('#date_range_start_3').val();
            let end_date = $('#date_range_end_3').val();
            let page = page_;
            let perPage = ($('#perPage_booking_list').val())? $('#perPage_booking_list').val():total_data_per_page_rate;

            let _token = $("input[name='_token']").val();

            let data_send = {_token:_token,
                id_hotel:id_hotel,
                id_kamar:room_id,
                q:q,
                start_date:start_date,
                end_date:end_date,
                page:page,
                perPage:perPage,
            };


            if(id_hotel){
                $.ajax({
                    url: route_booking_list,
                    type:'POST',
                    data: data_send,
                    success: function(data) {
                        set_BookingList(data, page, perPage);
                    }
                }).always(function() {
                    hideLoading_BookingList();
                })
                .fail(function() {
                    alert('server error');
                });
            }else{
                hideLoading_BookingList();
                alert('Please select a hotel!');
            }
        }
    </script>

    <script>
        $(document).ready(function(){
            $('#hotel_select_3').on('change', function(){
                getHotelRooms2();
            });

            $('#perPage_booking_list').on('change', function(){
                get_BookingList();
            });
            $('#q_booking_list').on('change', function(){
                get_BookingList();
            });
            $('#btn_view_booking_list').on('click', function(){
                get_BookingList();
            });
            $('body').on('click', '.page-item a.page-link-booking-list', function(e) {
                e.preventDefault();

                if($(this).hasClass("disabled")){
                    // console.log('has class disabled');
                    return ;
                }

                let page = $(this).data('page');
                get_BookingList(page);
            });
        });
    </script>
@endsection
