@extends('template.template_1')
@section('title_top', 'Hotel')
@section('head')
    <style>
        #ul { list-style-type: none; margin: 0px; padding: 0px; }
        #ul li {
            padding-top: 65px;
            float: left;
            /* width: 210px; */ height: 210px;
            background-position: center center;
            background-repeat: no-repeat; border: 1px solid #ccc;
            background-color: #f0f0f0;
            margin: 0 10px 10px 0;
        }
        #ul li span {
            display: none; background-color: rgba(0,0,0,0.5);
            color: #555; text-align: center;
            margin: 0px 15px 10px 15px; color: #fff;
            border-radius: 5px;
            padding: 3px; cursor: pointer;
        }
        #ul li:hover span { display: block; }
        #ul li:hover span:hover { background-color: rgba(0,0,0,1); }

        #ul li.selected { border: 2px solid #000; }


        #ul_room_photos { list-style-type: none; margin: 0px; padding: 0px; }
        #ul_room_photos li {
            padding-top: 65px;
            float: left;
            /* width: 210px; */ height: 210px;
            background-position: center center;
            background-repeat: no-repeat; border: 1px solid #ccc;
            background-color: #f0f0f0;
            margin: 0 10px 10px 0;
        }
        #ul_room_photos li span {
            display: none; background-color: rgba(0,0,0,0.5);
            color: #555; text-align: center;
            margin: 0px 15px 10px 15px; color: #fff;
            border-radius: 5px;
            padding: 3px; cursor: pointer;
        }
        #ul_room_photos li:hover span { display: block; }
        #ul_room_photos li:hover span:hover { background-color: rgba(0,0,0,1); }

        #ul_room_photos li.selected { border: 2px solid #000; }
    </style>
@endsection
@section('title_page', 'Hotel')

@section('content')
    {{ csrf_field() }}

    <div class="align-items-start">
        <div class="nav nav-tabs me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="tab_1" data-bs-toggle="pill" href="#tab_1_content" role="tab" aria-controls="tab_1_content" aria-selected="true">Hotel Information</a>
            <a class="nav-link" id="tab_3" data-bs-toggle="pill" href="#tab_3_content" role="tab" aria-controls="tab_3_content" aria-selected="false">Hotel Photos</a>
            <a class="nav-link" id="tab_2" data-bs-toggle="pill" href="#tab_2_content" role="tab" aria-controls="tab_2_content" aria-selected="false">Hotel Room Data</a>
            <a class="nav-link" id="tab_4" data-bs-toggle="pill" href="#tab_4_content" role="tab" aria-controls="tab_4_content" aria-selected="false">Room Form</a>
            <a class="nav-link" id="tab_5" data-bs-toggle="pill" href="#tab_5_content" role="tab" aria-controls="tab_5_content" aria-selected="false" style="display:none;">Room Photo</a>
        </div>

        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active " id="tab_1_content" role="tabpanel" aria-labelledby="tab_1">
                <div class="alert alert-secondary p-1" role="alert">
                    <strong>
                        Hotel Information
                    </strong>
                </div>

                <div>
                    <div class="row m-1">
                        <div class="col_left col-lg-1">
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
                    <input type="hidden" name="hotel_id" id="hotel_id">
                    <div class="row m-1">
                        <div class="col_left col-lg-5">
                            <div class="text-end">
                                <label for="hotel_name" class="col-form-label">Hotel Name :</label>
                            </div>
                        </div>

                        <div class="col_right col-lg-7">
                            <div class="row g-2 align-items-center">
                                <div class="col-lg-6">
                                    <input type="text" name="hotel_name" id="hotel_name" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row m-1">
                        <div class="col_left col-lg-5">
                            <div class="text-end">
                                <label for="star_rating" class="col-form-label">Star Rating :</label>
                            </div>
                        </div>

                        <div class="col_right col-lg-7">
                            <div class="row g-2 align-items-center">
                                <div class="col-lg-6">
                                    <select name="star_rating" id="star_rating" class="form-select" aria-label="Choose">
                                        <option value=""></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row m-1">
                        <div class="col_left col-lg-5">
                            <div class="text-end">
                                <label for="hotel_address" class="col-form-label">Hotel Address :</label>
                            </div>
                        </div>

                        <div class="col_right col-lg-7">
                            <div class="row g-2 align-items-center">
                                <div class="col-lg-6">
                                    <textarea name="hotel_address" id="hotel_address" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row m-1">
                        <div class="col_left col-lg-5">
                            <div class="text-end">
                                <label for="hotel_contact" class="col-form-label">Hotel Contact :</label>
                            </div>
                        </div>

                        <div class="col_right col-lg-7">
                            <div class="row g-2 align-items-center">
                                <div class="col-lg-6">
                                    <input type="number" name="hotel_contact" id="hotel_contact" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row m-1">
                        <div class="col_left col-lg-5">
                            <div class="text-end">
                                <label for="check_in" class="col-form-label">Check In :</label>
                            </div>
                        </div>

                        <div class="col_right col-lg-7">
                            <div class="row g-2 align-items-center">
                                <div class="col-lg-6">
                                    <input type="time" name="check_in" id="check_in" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row m-1">
                        <div class="col_left col-lg-5">
                            <div class="text-end">
                                <label for="check_out" class="col-form-label">Check Out :</label>
                            </div>
                        </div>

                        <div class="col_right col-lg-7">
                            <div class="row g-2 align-items-center">
                                <div class="col-lg-6">
                                    <input type="time" name="check_out" id="check_out" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row m-1">
                        <div class="col_left col-lg-5">
                            <div class="text-end">
                                <label for="email" class="col-form-label">Email :</label>
                            </div>
                        </div>

                        <div class="col_right col-lg-7">
                            <div class="row g-2 align-items-center">
                                <div class="col-lg-6">
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row m-1">
                        <div class="col_left col-lg-5">
                            <div class="text-end">
                                <label for="website" class="col-form-label">Website :</label>
                            </div>
                        </div>

                        <div class="col_right col-lg-7">
                            <div class="row g-2 align-items-center">
                                <div class="col-lg-6">
                                    <input type="text" name="website" id="website" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row m-1">
                        <div class="col_left col-lg-5">
                            <div class="text-end">
                                <label for="status" class="col-form-label">Status :</label>
                            </div>
                        </div>

                        <div class="col_right col-lg-7">
                            <div class="row g-2 align-items-center">
                                <div class="col-lg-6">
                                    <select name="status" id="status" class="form-select" aria-label="Choose">
                                        <option value=""></option>
                                        <option value="aktif">Aktif</option>
                                        <option value="tidak aktif">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row m-1" style="display:none;">
                        <div class="col_left col-lg-5">
                            <div class="text-end">
                                <label for="hotel_facility" class="col-form-label">Hotel Facility :</label>
                            </div>
                        </div>

                        <div class="col_right col-lg-7">
                            <div class="row g-2 align-items-center">
                                <div class="col-lg-6">
                                    <input type="text" name="hotel_facility" id="hotel_facility" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row m-1">
                        <div class="col_left col-lg-5">
                            <div class="text-end">
                                <label for="selling_rate" class="col-form-label">Selling Rate (%) :</label>
                            </div>
                        </div>

                        <div class="col_right col-lg-7">
                            <div class="row g-2 align-items-center">
                                <div class="col-lg-6">
                                    <input type="text" name="selling_rate" id="selling_rate" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row m-1 mt-4">
                        <div class="col_left col-lg-5">
                        </div>

                        <div class="col_right col-lg-7">
                            <div class="d-grid gap-2 d-md-flex mr-5">
                                <button class="btn btn-secondary me-md-2" type="button" id="cancel" disabled>Cancel</button>
                                <button class="btn button-red" type="button" id="save" disabled>Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="tab_3_content" role="tabpanel" aria-labelledby="tab_3">
                <div class="alert alert-secondary p-1" role="alert">
                    <strong>
                        Hotel Photos
                    </strong>
                </div>

                <div>
                    <div class="row m-1">
                        <div class="col_left col-lg-1">
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
                </div>

                <div class="m-3">
                    <div id="hotel_photos">
                        <ul id="ul">
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="text-center text-danger" id="no_hotel_photos" style="display:none;">
                        -- No Photo --
                    </div>

                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>

                <div class="alert alert-secondary p-1" role="alert">
                    <strong>
                        Upload Photos
                    </strong>
                </div>

                <div>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <input type="file" accept="image/*" onchange="loadFile(event)" name="hotel_image" id="hotel_image" class="form-control">
                        </div>

                        <div class="col-lg-1">
                            <button class="btn btn-primary" id="btn_hotel_photo_upload">Upload</button>
                        </div>

                        <div class="col" id="loading_hotel_photo_upload" style="display:none;">
                            <div class="spinner-border text-red" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-5">
                            <div class="alert alert-secondary p-1" role="alert">
                                Image Preview
                            </div>

                            <div class="text-center">
                                <img id="image_preview" style="max-width:600px;">
                            </div>
                        </div>

                        <div class="col-lg-7">
                            <div class="alert alert-secondary p-1" role="alert">
                                Photo Attributes
                            </div>

                            <div>
                                <div class="row m-1">
                                    <div class="col_left col-lg-4">
                                        <div class="text-end">
                                            <label for="photo_flag" class="col-form-label">Photo Flag :</label>
                                        </div>
                                    </div>

                                    <div class="col_right col-lg-8">
                                        <div class="row g-2 align-items-center">
                                            <div class="col-lg-6">
                                                <select name="photo_flag" id="photo_flag" class="form-select" aria-label="Choose">
                                                    <option value="0">-</option>
                                                    <option value="1">Primary</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-1" style="display:none;">
                                    <div class="col_left col-lg-4">
                                        <div class="text-end">
                                            <label for="category" class="col-form-label">Category :</label>
                                        </div>
                                    </div>

                                    <div class="col_right col-lg-8">
                                        <div class="row g-2 align-items-center">
                                            <div class="col-lg-6">
                                                <select name="category" id="category" class="form-select" aria-label="Choose">
                                                    <option selected>Open this select menu</option>
                                                    <option value="1">One</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-1" style="display:none;">
                                    <div class="col_left col-lg-4">
                                        <div class="text-end">
                                            <label for="room_type" class="col-form-label">Room Type :</label>
                                        </div>
                                    </div>

                                    <div class="col_right col-lg-8">
                                        <div class="row g-2 align-items-center">
                                            <div class="col-lg-6">
                                                <select name="room_type" id="room_type" class="form-select" aria-label="Choose">
                                                    <option selected>Open this select menu</option>
                                                    <option value="1">One</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-1" style="display:none;">
                                    <div class="col_left col-lg-4">
                                        <div class="text-end">
                                            <label for="number_of_room" class="col-form-label">Number of Room :</label>
                                        </div>
                                    </div>

                                    <div class="col_right col-lg-8">
                                        <div class="row g-2 align-items-center">
                                            <div class="col-lg-6">
                                                <select name="number_of_room" id="number_of_room" class="form-select" aria-label="Choose">
                                                    <option selected>Open this select menu</option>
                                                    <option value="1">One</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="tab_2_content" role="tabpanel" aria-labelledby="tab_2">
                <div class="alert alert-secondary p-1" role="alert">
                    <strong>
                        Room Data
                    </strong>
                </div>

                <div>
                    <div class="row m-1">
                        <div class="col_left col-lg-1">
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
                                            <option value="{{ $key->id }}" data-selling_rate="{{ $key->selling_rate }}">{{ $key->text }}</option>
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
                </div>

                <div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">Room Name</th>
                                <th scope="col" class="text-center">Default Price</th>
                                <th scope="col" class="text-center">Facility</th>
                                <th scope="col" class="text-center">Extrabeds</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody id="rooms">
                        </tbody>
                    </table>
                </div>

                <div id="data_rooms_paging">
                    <nav aria-label="">
                        <ul class="pagination justify-content-center" id="data_rooms_paging_pages">
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="tab-pane fade" id="tab_4_content" role="tabpanel" aria-labelledby="tab_4">
                <div class="alert alert-secondary p-1" role="alert">
                    <strong>
                        Room Form <span id="room_form_type">New</span>
                    </strong>
                </div>

                <div class="mb-3" id="room_hotel">
                    <div class="row m-1">
                        <div class="col_left col-lg-1">
                            <div class="text-end">
                                <label for="hotel_select_4" class="col-form-label">Hotel :</label>
                            </div>
                        </div>

                        <div class="col_right col-lg-4">
                            <div class="row g-2 align-items-center">
                                <div class="col-lg-8">
                                    <select name="hotel_select_4" id="hotel_select_4" class="form-select" aria-label="Choose">
                                        <option value="">.:: Choose ::.</option>
                                        @foreach($data_hotel as $key)
                                            <option value="{{ $key->id }}" data-selling_rate="{{ $key->selling_rate }}">{{ $key->text }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col" id="loading_hotel_4" style="display:none;">
                                    <div class="spinner-border text-red" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3" id="room_edit_loading" style="display:none;">
                    <div class="spinner-border text-red" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>

                <div>
                    <div>
                        <div class="alert alert-secondary p-1" role="alert">
                            <strong>
                                Room Information
                            </strong>
                        </div>

                        <div>
                            <input type="hidden" name="room_id" id="room_id" value="">
                            <input type="hidden" name="selling_rate_room" id="selling_rate_room" value="">

                            <div class="row m-1">
                                <div class="col_left col-lg-5">
                                    <div class="text-end">
                                        <label for="room_name" class="col-form-label">Room Name :</label>
                                    </div>
                                </div>

                                <div class="col_right col-lg-7">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-lg-6">
                                            <input type="text" name="room_name" id="room_name" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-1">
                                <div class="col_left col-lg-5">
                                    <div class="text-end">
                                        <label for="room_price" class="col-form-label">Room Price :</label>
                                    </div>
                                </div>

                                <div class="col_right col-lg-7">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-lg-6">
                                            <input type="number" name="room_price" id="room_price" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-1">
                                <div class="col_left col-lg-5">
                                    <div class="text-end">
                                        <label for="room_selling_price" class="col-form-label">Room Selling Price :</label>
                                    </div>
                                </div>

                                <div class="col_right col-lg-7">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-lg-6">
                                            <input type="text" name="room_selling_price" id="room_selling_price" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-1">
                                <div class="col_left col-lg-5">
                                    <div class="text-end">
                                        <label for="number_of_rooms" class="col-form-label">Number of Rooms :</label>
                                    </div>
                                </div>

                                <div class="col_right col-lg-7">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-lg-6">
                                            <input type="text" name="number_of_rooms" id="number_of_rooms" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--
                            <div class="row m-1">
                                <div class="col_left col-lg-5">
                                    <div class="text-end">
                                        <label for="caption" class="col-form-label">Caption :</label>
                                    </div>
                                </div>

                                <div class="col_right col-lg-7">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-lg-6">
                                            <input type="text" name="caption" id="caption" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-1">
                                <div class="col_left col-lg-5">
                                    <div class="text-end">
                                        <label for="room_description" class="col-form-label">Room Description :</label>
                                    </div>
                                </div>

                                <div class="col_right col-lg-7">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-lg-6">
                                            <input type="text" name="room_description" id="room_description" class="form-control">
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
                                            <select name="room_type" id="room_type" class="form-select" aria-label="Choose">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-1">
                                <div class="col_left col-lg-5">
                                    <div class="text-end">
                                        <label for="bed_type" class="col-form-label">Bed Type :</label>
                                    </div>
                                </div>

                                <div class="col_right col-lg-7">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-lg-6">
                                            <select name="bed_type" id="bed_type" class="form-select" aria-label="Choose">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            --}}
                        </div>
                    </div>

                    <div>
                        <div class="alert alert-secondary p-1 mt-5" role="alert">
                            <strong>
                                Room Size
                            </strong>
                        </div>

                        <div>
                            <div class="row m-1">
                                <div class="col_left col-lg-5">
                                    <div class="text-end">
                                        <label for="room_size" class="col-form-label">Size :</label>
                                    </div>
                                </div>

                                <div class="col_right col-lg-7">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-lg-6">
                                            <input type="text" name="room_size" id="room_size" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--
                            <div class="row m-1">
                                <div class="col_left col-lg-5">
                                    <div class="text-end">
                                        <label for="size_unit" class="col-form-label">Size Unit :</label>
                                    </div>
                                </div>

                                <div class="col_right col-lg-7">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-lg-6">
                                            <select name="size_unit" id="size_unit" class="form-select" aria-label="Choose">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            --}}
                        </div>
                    </div>

                    <div>
                        <div class="alert alert-secondary p-1 mt-5" role="alert">
                            <strong>
                                Room Occupancy Policyize
                            </strong>
                        </div>

                        <div>
                            <div class="row m-1">
                                <div class="col_left col-lg-5">
                                    <div class="text-end">
                                        <label for="max_occupancy" class="col-form-label">Max Occupancy :</label>
                                    </div>
                                </div>

                                <div class="col_right col-lg-7">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-lg-6">
                                            <input type="number" name="max_occupancy" id="max_occupancy" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--
                            <div class="row m-1">
                                <div class="col_left col-lg-5">
                                    <div class="text-end">
                                        <label for="max_child_occupancy" class="col-form-label">Max Child Occupancy :</label>
                                    </div>
                                </div>

                                <div class="col_right col-lg-7">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-lg-6">
                                            <input type="text" name="max_child_occupancy" id="max_child_occupancy" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-1">
                                <div class="col_left col-lg-5">
                                    <div class="text-end">
                                        <label for="max_infant_occupancy" class="col-form-label">Max Infant Occupancy :</label>
                                    </div>
                                </div>

                                <div class="col_right col-lg-7">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-lg-6">
                                            <input type="text" name="max_infant_occupancy" id="max_infant_occupancy" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            --}}

                            <div class="row m-1">
                                <div class="col_left col-lg-5">
                                    <div class="text-end">
                                        <label for="max_extra_beds" class="col-form-label">Max Extra Beds :</label>
                                    </div>
                                </div>

                                <div class="col_right col-lg-7">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-lg-6">
                                            <input type="number" name="max_extra_beds" id="max_extra_beds" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-1">
                                <div class="col_left col-lg-5">
                                    <div class="text-end">
                                        <label for="extra_bed_price" class="col-form-label">Extra Bed Price :</label>
                                    </div>
                                </div>

                                <div class="col_right col-lg-7">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-lg-6">
                                            <input type="number" name="extra_bed_price" id="extra_bed_price" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-1">
                                <div class="col_left col-lg-5">
                                    <div class="text-end">
                                        <label for="extra_bed_selling_price" class="col-form-label">Extra Bed Selling Price :</label>
                                    </div>
                                </div>

                                <div class="col_right col-lg-7">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-lg-6">
                                            <input type="text" name="extra_bed_selling_price" id="extra_bed_selling_price" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="alert alert-secondary p-1 mt-5" role="alert">
                            <strong>
                                Room Additional Information
                            </strong>
                        </div>

                        <div>
                            <div class="row m-1">
                                <div class="col_left col-lg-5">
                                    <div class="text-end">
                                        <label for="breakfast_included" class="col-form-label">Breakfast Included :</label>
                                    </div>
                                </div>

                                <div class="col_right col-lg-7">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-lg-6">
                                            <label class="col-form-label">
                                                <input class="form-check-input" id="breakfast_included" name="breakfast_included" type="checkbox" value="true">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-1">
                                <div class="col_left col-lg-5">
                                    <div class="text-end">
                                        <label for="wifi_included" class="col-form-label">Wifi Included :</label>
                                    </div>
                                </div>

                                <div class="col_right col-lg-7">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-lg-6">
                                            <label class="col-form-label">
                                                <input class="form-check-input" id="wifi_included" name="wifi_included" type="checkbox" value="true">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--
                            <div class="row m-1">
                                <div class="col_left col-lg-5">
                                    <div class="text-end">
                                        <label for="view" class="col-form-label">View :</label>
                                    </div>
                                </div>

                                <div class="col_right col-lg-7">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-lg-6">
                                            <input type="text" name="view" id="view" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-1">
                                <div class="col_left col-lg-5">
                                    <div class="text-end">
                                        <label for="has_terrace" class="col-form-label">Has Terrace :</label>
                                    </div>
                                </div>

                                <div class="col_right col-lg-7">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-lg-6">
                                            <label class="col-form-label">
                                                <input class="form-check-input" id="has_terrace" name="has_terrace" type="checkbox" value="true">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-1">
                                <div class="col_left col-lg-5">
                                    <div class="text-end">
                                        <label for="day_use_room" class="col-form-label">Day Use Room :</label>
                                    </div>
                                </div>

                                <div class="col_right col-lg-7">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-lg-6">
                                            <label class="col-form-label">
                                                <input class="form-check-input" id="day_use_room" name="day_use_room" type="checkbox" value="true">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            --}}

                            <div class="row m-1">
                                <div class="col_left col-lg-5">
                                </div>

                                <div class="col_right col-lg-7">
                                    <div class="d-grid gap-2 d-md-flex mr-5">
                                        <button class="btn btn-secondary me-md-2" type="button" id="cancel_room">Cancel</button>
                                        <button class="btn button-red" type="button" id="save_room">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="tab_5_content" role="tabpanel" aria-labelledby="tab_5">
                <div class="float-end mt-3 mb-3">
                    <a class="btn btn-sm btn-danger" id="back_to_rooms" href="javascript:void(0);">Back</a>
                </div>
                <div class="clearfix"></div>

                <div class="alert alert-secondary p-1" role="alert">
                    <strong>
                        Room <span id="room_name_caption">-</span> Photos
                    </strong>
                </div>

                <input type="hidden" name="room_photos_room_id" id="room_photos_room_id" value="">

                <div class="mb-3" id="room_photos_loading" style="display:none;">
                    <div class="spinner-border text-red" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>

                <div class="m-3">
                    <div id="room_photos">
                        <ul id="ul_room_photos">
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="text-center text-danger" id="no_room_photos" style="display:none;">
                        -- No Photo --
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>

                <div class="alert alert-secondary p-1" role="alert">
                    <strong>
                        Upload Photos
                    </strong>
                </div>

                <div>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <input type="file" accept="image/*" onchange="loadFileRoom(event)" name="room_photos_image" id="room_photos_image" class="form-control">
                        </div>

                        <div class="col-lg-1">
                            <button class="btn btn-primary" id="btn_room_photos_upload">Upload</button>
                        </div>

                        <div class="col" id="loading_room_photos_upload" style="display:none;">
                            <div class="spinner-border text-red" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-5">
                            <div class="alert alert-secondary p-1" role="alert">
                                Image Preview
                            </div>

                            <div class="text-center">
                                <img id="image_preview_room_photos" style="max-width:600px;">
                            </div>
                        </div>

                        <div class="col-lg-7">
                            <div class="alert alert-secondary p-1" role="alert">
                                Photo Attributes
                            </div>

                            <div>
                                <div class="row m-1">
                                    <div class="col_left col-lg-4">
                                        <div class="text-end">
                                            <label for="room_photos_flag" class="col-form-label">Photo Flag :</label>
                                        </div>
                                    </div>

                                    <div class="col_right col-lg-8">
                                        <div class="row g-2 align-items-center">
                                            <div class="col-lg-6">
                                                <select name="room_photos_flag" id="room_photos_flag" class="form-select" aria-label="Choose">
                                                    <option value="0">-</option>
                                                    <option value="1">Primary</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let loadFile = function(event) {
            var image_preview = document.getElementById('image_preview');
            image_preview.src = URL.createObjectURL(event.target.files[0]);
            image_preview.onload = function() {
                URL.revokeObjectURL(image_preview.src) // free memory
            }
        };

        let loadFileRoom = function(event) {
            var image_preview = document.getElementById('image_preview_room_photos');
            image_preview.src = URL.createObjectURL(event.target.files[0]);
            image_preview.onload = function() {
                URL.revokeObjectURL(image_preview.src) // free memory
            }
        };
    </script>
@endsection

@section('js')
    <script>
        let route_detail_hotel = '{{ route('hotel.detail') }}';
        let route_update_detail_hotel = '{{ route('hotel.update') }}';
    </script>

    <!-- Hotel Information -->
    <script>
        function clearInput(){
            $('#hotel_id').val('');
            $('#hotel_name').val('');
            $('#star_rating').val('');
            $('#hotel_address').val('');
            $('#hotel_contact').val('');
            $('#check_in').val('');
            $('#check_out').val('');
            $('#email').val('');
            $('#website').val('');
            $('#status').val('');
            $('#hotel_facility').val('');
            $('#selling_rate').val('');

            $('#hotel_select').val('');

            setTimeout(function(){
                $('.print-error-msg').hide();
                $('.message-success').hide();
                $('.message-failed').hide();
            },2000);
            disableSaveButton();
        }

        let showLoadingHotel = function(){
            $('#loading_hotel').show();
        }
        let hideLoadingHotel = function(){
            $('#loading_hotel').hide();
        }

        function setHotelDetail(data){
            data = JSON.parse(data);

            if(data.status == 'success'){
                let hotel_id = data.data.id;
                let hotel_name = data.data.nama_hotel;
                let star_rating = data.data.bintang;
                let hotel_address = data.data.alamat_hotel;
                let hotel_contact = data.data.telpon;
                let check_in = data.data.checkIn;
                let check_out = data.data.checkOut;
                let email = data.data.email;
                let website = data.data.website;
                let status = data.data.status;
                let selling_rate = data.data.selling_rate;
                let hotel_facility = '';

                $('#hotel_id').val(hotel_id);
                $('#hotel_name').val(hotel_name);
                $('#star_rating').val(star_rating);
                $('#hotel_address').val(hotel_address);
                $('#hotel_contact').val(hotel_contact);
                $('#check_in').val(check_in);
                $('#check_out').val(check_out);
                $('#email').val(email);
                $('#website').val(website);
                $('#status').val(status);
                $('#selling_rate').val(selling_rate);
                $('#hotel_facility').val('');
                enableSaveButton();
            }else{
                clearInput();
            }
        }

        function loadHotelData(){
            showLoadingHotel();
            let hotel_id = $('#hotel_select').val();

            if(hotel_id){
                $.ajax({
                    url: route_detail_hotel +'/'+ hotel_id,
                    type:'GET',
                    success: function(data) {
                        setHotelDetail(data);
                    }
                }).always(function() {
                    hideLoadingHotel();
                })
                .fail(function() {
                    alert('server error');
                });
            }else{
                hideLoadingHotel();
                clearInput();
            }
        }

        let loading_el = `
            <div class="spinner-border spinner-border-sm text-light" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        `;
        let save_button_caption = $('#save').text();
        let disableSaveButton = function(){
            $('#cancel').prop('disabled', true);
            $('#save').prop('disabled', true);
        }
        let enableSaveButton = function(){
            $('#cancel').prop('disabled', false);
            $('#save').prop('disabled', false);
            $('#save').html(save_button_caption);
        }
        function saveDetail(){
            disableSaveButton();
            $('#save').html(loading_el);

            let hotel_id = $('#hotel_id').val();
            let hotel_name = $('#hotel_name').val();
            let star_rating = $('#star_rating').val();
            let hotel_address = $('#hotel_address').val();
            let hotel_contact = $('#hotel_contact').val();
            let selling_rate = $('#selling_rate').val();
            let hotel_facility = $('#hotel_facility').val();
            let check_in = $('#check_in').val();
            let check_out = $('#check_out').val();
            let email = $('#email').val();
            let website = $('#website').val();
            let status = $('#status').val();

            let _token = $("input[name='_token']").val();
            let data_send = {_token:_token,
                hotel_id:hotel_id,
                hotel_name:hotel_name,
                star_rating:star_rating,
                hotel_address:hotel_address,
                hotel_contact:hotel_contact,
                selling_rate:selling_rate,
                hotel_facility:hotel_facility,
                check_in:check_in,
                check_out:check_out,
                email:email,
                website:website,
                status:status,
            };
            $.ajax({
                url: route_update_detail_hotel,
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
                }
            }).always(function() {
                // clearInput();
                document.getElementById('nav_bar').scrollIntoView({block: 'start', behavior: 'smooth'});
                setTimeout(function(){
                    $('.print-error-msg').hide();
                    $('.message-success').hide();
                    $('.message-failed').hide();
                },4000);

                $('#save').html(save_button_caption);
            })
            .fail(function() {
                enableSaveButton();
                alert('server error');
            });
        }

        $(document).ready(function(){
            $('#hotel_select').on('change', function(){
                loadHotelData();
            });

            $('#save').on('click', function(){
                saveDetail();
            });

            $('#cancel').on('click', function(){
                clearInput();
            });
        });
    </script>

    <!-- Hotel Photos -->
    <script>
        let route_detail_hotel_photo = '{{ route('hotel.detail.photo') }}';
        let route_detail_hotel_photo_upload = '{{ route('hotel.detail.photo-upload') }}';
        let route_detail_hotel_photo_delete = '{{ route('hotel.detail.photo-delete') }}';
        let route_detail_hotel_photo_update_primary = '{{ route('hotel.detail.photo-update-primary') }}';
    </script>

    <script>
        function clearPhoto(){
            $('#ul').html('');
        }
        function clearPhotoInput(){
            $('#hotel_image').val('');
            unloadImage();
        }

        let showLoadingHotelPhoto = function(){
            $('#loading_hotel_2').show();
        }
        let hideLoadingHotelPhoto = function(){
            $('#loading_hotel_2').hide();
        }
        let showLoadingHotelPhotoUpload = function(){
            $('#loading_hotel_photo_upload').show();
            $('#btn_hotel_photo_upload').prop('disabled', true);
        }
        let hideLoadingHotelPhotoUpload = function(){
            $('#loading_hotel_photo_upload').hide();
            $('#btn_hotel_photo_upload').prop('disabled', false);
        }

        function addHotelImageToElement(img_, id_, flag_utama_){
            let primary_ = ``;
            if(flag_utama_ == 1){
                primary_ = `<span class="" style="background:#df0005;">PRIMARY</span>`;
            }else{
                primary_ = `<span data-photo_id="`+ id_ +`">Set as Primary</span>`;
            }

            let html_ = `
                <li style="background-image: url(`+ img_ +`);background-size: contain; background-repeat: no-repeat;" class="aimg col-lg-3" data-photo_id="`+ id_ +`">
                    `+ primary_ +`
                    <span data-photo_id="`+ id_ +`">DELETE</span>
                </li>
            `;

            $(html_).hide().appendTo('#ul').fadeIn(300);
        }

        function setHotelDetailPhoto(data){
            if(data.status == 'success'){
                if(data.data.length > 0){
                    $.each(data.data, function(i, e){
                        addHotelImageToElement(e.gambar, e.id, e.flag_utama);
                    });
                }else{
                    $('#no_hotel_photos').show();
                }
            }else{
                clearPhoto();
            }
        }

        function loadHotelPhotoData(){
            clearPhoto();
            showLoadingHotelPhoto();
            $('#no_hotel_photos').hide();
            let hotel_id = $('#hotel_select_2').val();

            if(hotel_id){
                $.ajax({
                    url: route_detail_hotel_photo +'/'+ hotel_id,
                    type:'GET',
                    success: function(data) {
                        setHotelDetailPhoto(data);
                    }
                }).always(function() {
                    hideLoadingHotelPhoto();
                })
                .fail(function() {
                    alert('server error');
                });
            }else{
                hideLoadingHotelPhoto();
            }
        }

        function uploadPhoto(){
            showLoadingHotelPhotoUpload();

            let id_hotel = $('#hotel_select_2').val();
            let flag_utama = $('#photo_flag').val();
            let image_hotel = $('#hotel_image').prop('files')[0];

            let _token = $("input[name='_token']").val();
            var data_send = new FormData();
            data_send.append('_token', _token);
            data_send.append('id_hotel', id_hotel);
            data_send.append('flag_utama', flag_utama);
            data_send.append('image_hotel', image_hotel);

            $.ajax({
                url: route_detail_hotel_photo_upload,
                type:'POST',
                data: data_send,
                cache: false,
                contentType: false,
                processData: false,
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
                }
            }).always(function() {
                document.getElementById('nav_bar').scrollIntoView({block: 'start', behavior: 'smooth'});
                setTimeout(function(){
                    $('.print-error-msg').hide();
                    $('.message-success').hide();
                    $('.message-failed').hide();
                    clearPhotoInput();
                },4000);

                loadHotelPhotoData();
                hideLoadingHotelPhotoUpload();
            })
            .fail(function() {
                alert('server error');
            });
        }

        function deletePhoto(el_){
            showLoadingHotelPhoto();
            let data_photo_id = el_.data('photo_id');

            if(data_photo_id){
                $.ajax({
                    url: route_detail_hotel_photo_delete +'/'+ data_photo_id,
                    type:'GET',
                    success: function(data) {
                        if($.isEmptyObject(data.error)){
                            if(data.status == 'success'){
                                $('.message-success').html(data.message);
                                $('.message-success').show();

                                el_.parent().fadeOut(300, function(){
                                    el_.remove();
                                });
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

                    loadHotelPhotoData();
                    hideLoadingHotelPhoto();
                })
                .fail(function() {
                    alert('server error');
                });
            }else{
                hideLoadingHotelPhoto();
            }
        }

        function updatePrimaryPhoto(el_){
            showLoadingHotelPhoto();
            let data_photo_id = el_.data('photo_id');

            if(data_photo_id){
                $.ajax({
                    url: route_detail_hotel_photo_update_primary +'/'+ data_photo_id,
                    type:'GET',
                    success: function(data) {
                        if($.isEmptyObject(data.error)){
                            if(data.status == 'success'){
                                $('.message-success').html(data.message);
                                $('.message-success').show();

                                el_.parent().fadeOut(300, function(){
                                    el_.remove();
                                });
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

                    loadHotelPhotoData();
                    hideLoadingHotelPhoto();
                })
                .fail(function() {
                    alert('server error');
                });
            }else{
                hideLoadingHotelPhoto();
            }
        }

        function unloadImage(){
            var image_preview = document.getElementById('image_preview');
            image_preview.src = '';
            image_preview.onload = function() {
                URL.revokeObjectURL(image_preview.src) // free memory
            }
        }

        $(document).ready(function(){
            $('#hotel_select_2').on('change', function(){
                loadHotelPhotoData();
            });

            $('#ul').on('click','li span:first-child',
                function(){
                    updatePrimaryPhoto($(this));

                    if($(this).parent().hasClass('selected')) {
                        $(this).parent().removeClass('selected');
                    }
                    else { $(this).parent().addClass('selected'); }
                }
            );

            $('#ul').on('click','li span:nth-child(2)',
                function(){
                    deletePhoto($(this));
                }
            );

            $('#btn_hotel_photo_upload').on('click', function(){
                uploadPhoto();
            });
        });
    </script>

    <!-- Hotel Rooms -->
    <script>
        let route_detail_hotel_rooms = '{{ route('hotel.detail.rooms') }}';
        let route_detail_hotel_room_detail = '{{ route('hotel.detail.rooms.detail') }}';
        let route_detail_hotel_room_setinactive = '{{ route('hotel.detail.rooms.set-inactive') }}';
        let route_detail_hotel_room_setactive = '{{ route('hotel.detail.rooms.set-active') }}';
        let route_detail_hotel_room_save = '{{ route('hotel.detail.rooms.save') }}';

        let total_data_per_page = 10;
    </script>

    <script>
        let clearRooms = function(){
            $('#rooms').html('');
        }

        let showLoadingHotelRooms = function(){
            $('#loading_hotel_3').show();
        }
        let hideLoadingHotelRooms = function(){
            $('#loading_hotel_3').hide();
        }

        let paginationRoom = function(total_data, page_, perPage_){
            $('#data_rooms_paging').hide();
            $('#data_rooms_paging_pages').html('');

            if(total_data > 0){
                $('#data_rooms_paging').show();

                let total_page = Math.ceil(total_data/perPage_);
                let html_ = '';

                let current_page = page_;

                if(current_page > 1){
                    html_ +=`
                        <li class="page-item">
                            <a class="page-link" href="?page=`+ (current_page-1) +`" data-page="`+ (current_page-1) +`" aria-label="Previous">
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
                                    <li class="page-item disabled disabled1"><a class="page-link disabled" href="javascript:void(0);">...</a></li>
                                `;
                            }

                            if ((showPage != (total_page - 1)) && (page == total_page)){
                                html_ += `
                                    <li class="page-item disabled disabled2"><a class="page-link disabled" href="javascript:void(0);">...</a></li>
                                `;
                            }

                            if (page == current_page){
                                html_ += `
                                    <li class="page-item active"><a class="page-link disabled" href="javascript:void(0);">`+ page +`</a></li>
                                `;
                            }
                            else {
                                html_ += `
                                    <li class="page-item"><a class="page-link" href="?page=`+ page +`" data-page="`+ page +`">`+ page +`</a></li>
                                `;
                            }

                            showPage = page;
                        }
                }


                if (current_page < total_page){
                    html_ += `
                        <li class="page-item">
                            <a class="page-link" href="?page=`+ (current_page+1) +`" data-page="`+ (current_page+1) +`" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    `;
                }

                $('#data_rooms_paging_pages').html(html_);
            }
        }
        let addHotelRoomsToElement = function (data_, num = 1){
            let sarapan = '';
            let wifi = '';
            if(data_.sarapan && data_.sarapan == 1){
                sarapan = '- Sarapan <br>';
            }
            if(data_.wifi && data_.wifi == 1){
                wifi = '- Wifi <br>';
            }

            let extrabeds = '';
            if(data_.status_extrabed && data_.status_extrabed == 1){
                extrabeds = `
                - Maks Extrabed `+ data_.maks_extrabed +` <br>
                - Harga `+ data_.harga_extrabed +` <br>
                - Harga selling `+ data_.harga_extrabed_selling +`
                `;
            }

            let actions = `
                <div class="edit_div" id="edit_div_`+ data_.id +`">
                    <a href="javascript:void(0)" class="rooms_edit btn btn-sm btn-secondary" data-room_id="`+ data_.id +`">Edit</a> <br>
                </div>
            `;

            actions += `
                <div class="photos_div" id="photos_div_`+ data_.id +`">
                    <a href="javascript:void(0)" class="rooms_photos_show btn btn-sm btn-warning mt-1" data-room_id="`+ data_.id +`" data-room_name="`+ data_.kamar +`">Photos</a> <br>
                </div>
            `;
            if(data_.status == 'aktif'){
                actions += `
                    <div class="set_inactive_div" id="set_inactive_div_`+ data_.id +`">
                        <a href="javascript:void(0)" class="rooms_set_inactive btn btn-sm btn-danger mt-1" data-room_id="`+ data_.id +`">Set Inactive</a> <br>
                    </div>
                `;
            }
            if(data_.status == 'tidak aktif'){
                actions += `
                    <div class="set_active_div" id="set_active_div_`+ data_.id +`">
                        <a href="javascript:void(0)" class="rooms_set_active btn btn-sm btn-success mt-1" data-room_id="`+ data_.id +`">Set Active</a> <br>
                    </div>
                `;
            }

            let html_ = `
                <tr>
                    <th scope="row" class="text-center">`+ num +`</th>
                    <td>`+ data_.kamar +`</td>
                    <td>
                        - Harga `+ data_.harga_default +` <br>
                        - Harga selling `+ data_.harga_selling +`
                    </td>
                    <td>
                        - `+ data_.maks_orang +` maks orang <br>
                        `+ sarapan +`
                        `+ wifi +`
                        - Ukuran `+ data_.ukuran +`
                    </td>
                    <td>
                        `+ extrabeds +`
                    </td>
                    <td class="text-center">
                        `+ actions +`
                    </td>
                </tr>
            `;

            $(html_).hide().appendTo('#rooms').fadeIn(300);
        }
        let setHotelDetailRooms = function (data, page, perPage){
            if(data.status == 'success'){
                let total_data = data.total; // for paging

                paginationRoom(total_data, page, perPage);
                if(total_data > 0){
                    let number = 0;
                    let num = page * perPage;
                    $.each(data.data, function(i, e){
                        number++;

                        addHotelRoomsToElement(e, (number + num - perPage));
                    });
                }else{
                    let html_ = `
                        <tr>
                            <th scope="row" colspan="6" class="text-center text-danger">
                                No data!
                            </th>
                        </tr>
                    `;

                    $(html_).hide().appendTo('#rooms').fadeIn(300);
                }
            }else{
                clearRooms();
            }
        }

        let getHotelRooms = function (page_ = 1, perPage_ = 0, q_ = '', sortBy_ = ''){
            clearRooms();
            showLoadingHotelRooms();
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
                        setHotelDetailRooms(data, page, perPage);
                    }
                }).always(function() {
                    hideLoadingHotelRooms();
                })
                .fail(function() {
                    alert('server error');
                });
            }else{
                hideLoadingHotelRooms();
            }
        }

        let clearInputRoom = function(){
            $('#hotel_select_4').val('');
            $('#room_id').val('');
            $('#selling_rate_room').val('');
            $('#room_name').val('');
            $('#room_price').val('');
            $('#room_selling_price').val('');
            $('#number_of_rooms').val('');
            $('#room_size').val('');
            $('#max_occupancy').val('');
            $('#max_extra_beds').val('');
            $('#extra_bed_price').val('');
            $('#extra_bed_selling_price').val('');
            $('#breakfast_included').prop('checked', false);
            $('#wifi_included').prop('checked', false);
        }

        let loading_el_2 = `
            <div class="spinner-border text-red" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        `;
        let loading_el_3 = `
            <div class="spinner-border text-light spinner-border-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        `;

        let setInactiveRoom = function(el){
            let room_id = el.data('room_id');
            let div_html = el.closest('div').html();
            let div_container = el.closest('div');
            div_container.html(loading_el_2);

            let set_active_el =  `
                <div class="set_active_div" id="set_active_div_`+ room_id +`">
                    <a href="javascript:void(0)" class="rooms_set_active btn btn-sm btn-success mt-1" data-room_id="`+ room_id +`">Set Active</a> <br>
                </div>
            `;

            if(room_id){
                $.ajax({
                    url: route_detail_hotel_room_setinactive +'/'+ room_id,
                    type:'GET',
                    success: function(data) {
                        if($.isEmptyObject(data.error)){
                            if(data.status == 'success'){
                                $('.message-success').html(data.message);
                                $('.message-success').show();

                                div_container.html(set_active_el);
                            }else{
                                $('.message-failed').html(data.message);
                                $('.message-failed').show();

                                div_container.html(div_html);
                            }
                        }else{
                            printErrorMsg(data.error);

                            div_container.html(div_html);
                        }
                    }
                }).always(function() {
                    document.getElementById('nav_bar').scrollIntoView({block: 'start', behavior: 'smooth'});
                    setTimeout(function(){
                        $('.print-error-msg').hide();
                        $('.message-success').hide();
                        $('.message-failed').hide();
                    },4000);
                })
                .fail(function() {
                    alert('server error');
                    div_container.html(div_html);
                });
            }else{
                div_container.html(div_html);
            }
        }

        let setActiveRoom = function(el){
            let room_id = el.data('room_id');
            let div_html = el.closest('div').html();
            let div_container = el.closest('div');
            div_container.html(loading_el_2);

            let set_active_el =  `
                <div class="set_inactive_div" id="set_inactive_div_`+ room_id +`">
                    <a href="javascript:void(0)" class="rooms_set_inactive btn btn-sm btn-danger mt-1" data-room_id="`+ room_id +`">Set Inactive</a> <br>
                </div>
            `;

            if(room_id){
                $.ajax({
                    url: route_detail_hotel_room_setactive +'/'+ room_id,
                    type:'GET',
                    success: function(data) {
                        if($.isEmptyObject(data.error)){
                            if(data.status == 'success'){
                                $('.message-success').html(data.message);
                                $('.message-success').show();

                                div_container.html(set_active_el);
                            }else{
                                $('.message-failed').html(data.message);
                                $('.message-failed').show();

                                div_container.html(div_html);
                            }
                        }else{
                            printErrorMsg(data.error);

                            div_container.html(div_html);
                        }
                    }
                }).always(function() {
                    document.getElementById('nav_bar').scrollIntoView({block: 'start', behavior: 'smooth'});
                    setTimeout(function(){
                        $('.print-error-msg').hide();
                        $('.message-success').hide();
                        $('.message-failed').hide();
                    },4000);
                })
                .fail(function() {
                    alert('server error');
                    div_container.html(div_html);
                });
            }else{
                div_container.html(div_html);
            }
        }

        let save_button_caption_2 = $('#save_room').text();
        let disableSaveRoomButton = function(){
            $('#cancel_room').prop('disabled', true);
            $('#save_room').prop('disabled', true);
        }
        let enableSaveRoomButton = function(){
            $('#cancel_room').prop('disabled', false);
            $('#save_room').prop('disabled', false);
            $('#save_room').html(save_button_caption);
        }
        let saveRoom = function (){
            disableSaveRoomButton();
            $('#save_room').html(loading_el_3);

            let hotel_id = $('#hotel_select_4').val();
            let room_id = $('#room_id').val();
            let room_name = $('#room_name').val();
            let room_price = $('#room_price').val();
            let room_selling_price = $('#room_selling_price').val();
            let number_of_room = $('#number_of_rooms').val();
            let room_size = $('#room_size').val();
            let max_occupancy = $('#max_occupancy').val();
            let max_extra_beds = $('#max_extra_beds').val();
            let extra_bed_price = $('#extra_bed_price').val();
            let extra_bed_selling_price = $('#extra_bed_selling_price').val();
            let breakfast_included = $('#breakfast_included').is(':checked')? 1:0;
            let wifi_included = $('#wifi_included').is(':checked')? 1:0;

            if(!hotel_id && !room_id){
                alert('Please select a hotel!');
                enableSaveRoomButton();
                return;
            }

            let _token = $("input[name='_token']").val();
            let data_send = {_token:_token,
                hotel_id:hotel_id,
                room_id:room_id,
                room_name:room_name,
                room_price:room_price,
                room_selling_price:room_selling_price,
                number_of_room:number_of_room,
                room_size:room_size,
                max_occupancy:max_occupancy,
                max_extra_beds:max_extra_beds,
                extra_bed_price:extra_bed_price,
                extra_bed_selling_price:extra_bed_selling_price,
                breakfast_included:breakfast_included,
                wifi_included:wifi_included,
            };
            $.ajax({
                url: route_detail_hotel_room_save,
                type:'POST',
                data: data_send,
                success: function(data) {
                    if($.isEmptyObject(data.error)){
                        if(data.status == 'success'){
                            $('.message-success').html(data.message);
                            $('.message-success').show();

                            if(room_id){
                                $('[href="#tab_2_content"]').tab('show');
                                getHotelRooms();
                                showRoomHotelSelect();
                            }

                            clearInputRoom();
                            $('#room_form_type').html('New');
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

                enableSaveRoomButton();
                $('#save').html(save_button_caption_2);
            })
            .fail(function() {
                alert('server error');
            });
        }

        let showRoomHotelSelect = function(){
            $('#room_hotel').show();
        }
        let hideRoomHotelSelect = function(){
            $('#room_hotel').hide();
        }
        let showRoomHotelEditLoading = function(){
            $('#room_edit_loading').show();
        }
        let hideRoomHotelEditLoading = function(){
            $('#room_edit_loading').hide();
        }
        let setHotelDetailRoom = function(data){
            if(data.status == 'success'){
                let harga_default = data.data.harga_default;
                harga_default = harga_default.replace(/\D/g,'');
                let harga_selling = data.data.harga_selling;
                harga_selling = harga_selling.replace(/\D/g,'');

                let harga_extrabed = data.data.harga_extrabed;
                harga_extrabed = harga_extrabed.replace(/\D/g,'');
                let harga_extrabed_selling = data.data.harga_extrabed_selling;
                harga_extrabed_selling = harga_extrabed_selling.replace(/\D/g,'');

                $('#room_id').val(data.data.id);
                $('#room_name').val(data.data.kamar);
                $('#room_price').val(harga_default);
                $('#room_selling_price').val(harga_selling);
                $('#number_of_rooms').val(data.data.jumlah);
                $('#room_size').val(data.data.ukuran);
                $('#max_occupancy').val(data.data.maks_orang);
                $('#max_extra_beds').val(data.data.maks_extrabed);
                $('#extra_bed_price').val(harga_extrabed);
                $('#extra_bed_selling_price').val(harga_extrabed_selling);
                let is_breakfast_include = (data.data.sarapan && data.data.sarapan == 1)? true:false;
                $('#breakfast_included').prop('checked', is_breakfast_include);
                let is_wifi_include = (data.data.wifi && data.data.wifi == 1)? true:false;
                $('#wifi_included').prop('checked', is_wifi_include);
            }else{
                showRoomHotelSelect();

                $('[href="#tab_2_content"]').tab('show');
            }
        }
        let editRoom = function(el){
            let room_id = el.data('room_id');

            let selling_rate = $('#hotel_select_3').find(':selected').data('selling_rate');
            $('#selling_rate_room').val(selling_rate);

            $('[href="#tab_4_content"]').tab('show');
            $('#room_form_type').html('Edit');
            showRoomHotelEditLoading();
            hideRoomHotelSelect();

            if(room_id){
                $.ajax({
                    url: route_detail_hotel_room_detail +'/'+ room_id,
                    type:'GET',
                    success: function(data) {
                        setHotelDetailRoom(data);
                    }
                }).always(function() {
                    hideRoomHotelEditLoading();
                })
                .fail(function() {
                    $('[href="#tab_2_content"]').tab('show');

                    alert('server error');
                });
            }else{
                hideRoomHotelEditLoading();
                $('#room_form_type').html('New');
                $('[href="#tab_2_content"]').tab('show');
            }
        }

        let showRoomPhotos = function(el){
            let room_id = el.data('room_id');
            let room_name = el.data('room_name');

            if(room_id){
                $('[href="#tab_5_content"]').tab('show');
                $('#room_name_caption').html(room_name);
                $('#room_photos_room_id').val(room_id);

                loadRoomPhotoData();
            }else{
                alert('Invalid room id!');
            }
        }

        $(document).ready(function(){
            $('#hotel_select_3').on('change', function(){
                getHotelRooms();
            });

            $('body').on('click', '.page-item a', function(e) {
                e.preventDefault();

                if($(this).hasClass("disabled")){
                    // console.log('has class disabled');
                    return ;
                }

                let page = $(this).data('page');
                getHotelRooms(page);

                // var url = $(this).attr('href');
                // window.history.pushState("", "", url);
            });

            $('#rooms').on('click', '.rooms_edit', function(){
                editRoom($(this));
            });

            $('#rooms').on('click', '.rooms_photos_show', function(){
                showRoomPhotos($(this));
            });

            $('#rooms').on('click', '.rooms_set_inactive', function(){
                setInactiveRoom($(this));
            });

            $('#rooms').on('click', '.rooms_set_active', function(){
                setActiveRoom($(this));
            });

            $('#hotel_select_4').on('change', function(){
                let selling_rate = $(this).find(':selected').data('selling_rate');

                $('#selling_rate_room').val(selling_rate);
            });

            $('#room_price').on('keyup change', function(){
                let val_ = parseFloat($(this).val());
                let selling_rate = parseFloat($('#selling_rate_room').val());
                let total_price = val_ + (val_ * (selling_rate/100));
                if(total_price > 0){}else{
                    total_price = 0;
                }

                $('#room_selling_price').val(total_price);
            });
            $('#extra_bed_price').on('keyup change', function(){
                let val_ = parseFloat($(this).val());
                let selling_rate = parseFloat($('#selling_rate_room').val());
                let total_price = val_ + (val_ * (selling_rate/100));
                if(total_price > 0){}else{
                    total_price = 0;
                }

                $('#extra_bed_selling_price').val(total_price);
            });

            $('#cancel_room').on('click', function(){
                clearInputRoom();
                showRoomHotelSelect();
                $('#room_form_type').html('New');
            })
            $('#save_room').on('click', function(){
                saveRoom();
            })
        });
    </script>

    <!-- Hotel Rooms Photos -->
    <script>
        let route_detail_room_photos = '{{ route('hotel.detail.rooms.photo') }}';
        let route_detail_room_photos_upload = '{{ route('hotel.detail.rooms.photo-upload') }}';
        let route_detail_room_photos_delete = '{{ route('hotel.detail.rooms.photo-delete') }}';
        let route_detail_room_photos_update_primary = '{{ route('hotel.detail.rooms.photo-update-primary') }}';
    </script>

    <script>
        function clearPhotoRoom(){
            $('#ul_room_photos').html('');
        }
        function clearPhotoRoomInput(){
            // $('#room_name_caption').html('');
            // $('#room_photos_room_id').val('');
            $('#room_photos_image').val('');
            unloadImageRoom();
        }

        let showLoadingRoomPhoto = function(){
            $('#room_photos_loading').show();
        }
        let hideLoadingRoomPhoto = function(){
            $('#room_photos_loading').hide();
        }
        let showLoadingRoomPhotoUpload = function(){
            $('#loading_room_photos_upload').show();
            $('#btn_room_photos_upload').prop('disabled', true);
        }
        let hideLoadingRoomPhotoUpload = function(){
            $('#loading_room_photos_upload').hide();
            $('#btn_room_photos_upload').prop('disabled', false);
        }

        function addRoomImageToElement(img_, id_, flag_utama_){
            let primary_ = ``;
            if(flag_utama_ == 1){
                primary_ = `<span class="" style="background:#df0005;">PRIMARY</span>`;
            }else{
                primary_ = `<span data-photo_id="`+ id_ +`">Set as Primary</span>`;
            }

            let html_ = `
                <li style="background-image: url(`+ img_ +`);background-size: contain; background-repeat: no-repeat;" class="aimg col-lg-3" data-photo_id="`+ id_ +`">
                    `+ primary_ +`
                    <span data-photo_id="`+ id_ +`">DELETE</span>
                </li>
            `;

            $(html_).hide().appendTo('#ul_room_photos').fadeIn(300);
        }

        function setRoomDetailPhoto(data){
            if(data.status == 'success'){
                if(data.data.length > 0){
                    $.each(data.data, function(i, e){
                        addRoomImageToElement(e.gambar, e.id, e.flag_utama);
                    });
                }else{
                    $('#no_room_photos').show();
                }
            }else{
                clearPhotoRoom();
            }
        }

        function loadRoomPhotoData(){
            clearPhotoRoom();
            showLoadingRoomPhoto();
            $('#no_room_photos').hide();

            let room_id = $('#room_photos_room_id').val();

            if(room_id){
                $.ajax({
                    url: route_detail_room_photos +'/'+ room_id,
                    type:'GET',
                    success: function(data) {
                        setRoomDetailPhoto(data);
                    }
                }).always(function() {
                    hideLoadingRoomPhoto();
                })
                .fail(function() {
                    alert('server error');
                });
            }else{
                hideLoadingRoomPhoto();
                $('[href="#tab_2_content"]').tab('show');
                alert('Room ID not set!');
            }
        }

        function uploadRoomPhoto(){
            showLoadingRoomPhotoUpload();

            let room_id = $('#room_photos_room_id').val();
            let flag_utama = $('#room_photos_flag').val();
            let image_room_photos = $('#room_photos_image').prop('files')[0];

            let _token = $("input[name='_token']").val();
            var data_send = new FormData();
            data_send.append('_token', _token);
            data_send.append('room_id', room_id);
            data_send.append('flag_utama', flag_utama);
            data_send.append('image_room_photos', image_room_photos);

            $.ajax({
                url: route_detail_room_photos_upload,
                type:'POST',
                data: data_send,
                cache: false,
                contentType: false,
                processData: false,
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
                }
            }).always(function() {
                document.getElementById('nav_bar').scrollIntoView({block: 'start', behavior: 'smooth'});
                setTimeout(function(){
                    $('.print-error-msg').hide();
                    $('.message-success').hide();
                    $('.message-failed').hide();
                    clearPhotoRoomInput();
                },4000);

                loadRoomPhotoData();
                hideLoadingRoomPhotoUpload();
            })
            .fail(function() {
                alert('server error');
            });
        }

        function deleteRoomPhoto(el_){
            showLoadingRoomPhoto();
            let data_photo_id = el_.data('photo_id');

            if(data_photo_id){
                $.ajax({
                    url: route_detail_room_photos_delete +'/'+ data_photo_id,
                    type:'GET',
                    success: function(data) {
                        if($.isEmptyObject(data.error)){
                            if(data.status == 'success'){
                                $('.message-success').html(data.message);
                                $('.message-success').show();

                                el_.parent().fadeOut(300, function(){
                                    el_.remove();
                                });
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

                    loadRoomPhotoData();
                    hideLoadingRoomPhoto();
                })
                .fail(function() {
                    alert('server error');
                });
            }else{
                hideLoadingRoomPhoto();
            }
        }

        function updatePrimaryRoomPhoto(el_){
            showLoadingRoomPhoto();
            let data_photo_id = el_.data('photo_id');

            if(data_photo_id){
                $.ajax({
                    url: route_detail_room_photos_update_primary +'/'+ data_photo_id,
                    type:'GET',
                    success: function(data) {
                        if($.isEmptyObject(data.error)){
                            if(data.status == 'success'){
                                $('.message-success').html(data.message);
                                $('.message-success').show();

                                el_.parent().fadeOut(300, function(){
                                    el_.remove();
                                });
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

                    loadRoomPhotoData();
                    hideLoadingRoomPhoto();
                })
                .fail(function() {
                    alert('server error');
                });
            }else{
                hideLoadingRoomPhoto();
            }
        }

        function unloadImageRoom(){
            var image_preview = document.getElementById('image_preview_room_photos');
            image_preview.src = '';
            image_preview.onload = function() {
                URL.revokeObjectURL(image_preview.src) // free memory
            }
        }

        $(document).ready(function(){
            $('#back_to_rooms').on('click', function(){
                $('[href="#tab_2_content"]').tab('show');
                clearPhotoRoom();
                clearPhotoRoomInput();
            });

            $('#ul_room_photos').on('click','li span:first-child',
                function(){
                    updatePrimaryRoomPhoto($(this));

                    if($(this).parent().hasClass('selected')) {
                        $(this).parent().removeClass('selected');
                    }
                    else { $(this).parent().addClass('selected'); }
                }
            );

            $('#ul_room_photos').on('click','li span:nth-child(2)',
                function(){
                    deleteRoomPhoto($(this));
                }
            );

            $('#btn_room_photos_upload').on('click', function(){
                uploadRoomPhoto();
            });
        });
    </script>
@endsection

{{--
resource
https://jsfiddle.net/kidino/DWv3k/
 --}}
