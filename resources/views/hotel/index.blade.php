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
    </style>
@endsection
@section('title_page', 'Hotel')

@section('content')
    {{ csrf_field() }}

    <div class="align-items-start">
        <div class="nav nav-tabs me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="tab_1" data-bs-toggle="pill" href="#tab_1_content" role="tab" aria-controls="tab_1_content" aria-selected="true">Hotel Information</a>
            <a class="nav-link" id="tab_2" data-bs-toggle="pill" href="#tab_2_content" role="tab" aria-controls="tab_2_content" aria-selected="false">Hotel Room Data</a>
            <a class="nav-link" id="tab_3" data-bs-toggle="pill" href="#tab_3_content" role="tab" aria-controls="tab_3_content" aria-selected="false">Hotel Photos</a>
            <a class="nav-link" id="tab_4" data-bs-toggle="pill" href="#tab_4_content" role="tab" aria-controls="tab_4_content" aria-selected="false">Room Form</a>
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

            <div class="tab-pane fade" id="tab_2_content" role="tabpanel" aria-labelledby="tab_2">
                <div class="alert alert-secondary p-1" role="alert">
                    <strong>
                        Room Data
                    </strong>
                </div>

                <div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">Hotel Room ID</th>
                                <th scope="col" class="text-center">Room Name</th>
                                <th scope="col" class="text-center">Number of Room</th>
                                <th scope="col" class="text-center">Room Type</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <th scope="row" class="text-center">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td class="text-center">
                                    <a href="#">Edit</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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

            <div class="tab-pane fade" id="tab_4_content" role="tabpanel" aria-labelledby="tab_4">
                @include('hotel.room_form_content')
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
                $.each(data.data, function(i, e){
                    addHotelImageToElement(e.gambar, e.id, e.flag_utama);
                });
            }else{
                clearPhoto();
            }
        }

        function loadHotelPhotoData(){
            clearPhoto();
            showLoadingHotelPhoto();
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
@endsection

{{--
resource
https://jsfiddle.net/kidino/DWv3k/
 --}}
