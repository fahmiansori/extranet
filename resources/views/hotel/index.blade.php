@extends('template.template_1')
@section('title_top', 'Hotel')
@section('title_page', 'Hotel')

@section('content')
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

                        <div class="col_right col-lg-3">
                            <div class="row g-2 align-items-center">
                                <div class="col-lg-6">
                                    <select name="hotel_select" id="hotel_select" class="form-select" aria-label="Choose">
                                        <option value="1">One</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
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
                                    <input type="text" name="star_rating" id="star_rating" class="form-control">
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
                                    <input type="text" name="hotel_address" id="hotel_address" class="form-control">
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
                                    <input type="text" name="hotel_contact" id="hotel_contact" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row m-1">
                        <div class="col_left col-lg-5">
                            <div class="text-end">
                                <label for="hotel_facility" class="col-form-label">Hotel Facility :</label>
                            </div>
                        </div>

                        <div class="col_right col-lg-7">
                            <div class="row g-2 align-items-center">
                                <div class="col-lg-6">
                                    <input type="text" name="hotel_facility" id="hotel_facility" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row m-1 mt-4">
                        <div class="col_left col-lg-5">
                        </div>

                        <div class="col_right col-lg-7">
                            <div class="d-grid gap-2 d-md-flex mr-5">
                                <button class="btn btn-secondary me-md-2" type="button" id="cancel">Cancel</button>
                                <button class="btn button-red" type="button" id="save">Save</button>
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
                        Upload Photos
                    </strong>
                </div>

                <div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <input type="file" accept="image/*" onchange="loadFile(event)" name="file" id="file">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-5">
                            <div class="alert alert-secondary p-1" role="alert">
                                Image Preview
                            </div>

                            <div class="text-center">
                                <img id="image_preview">
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

                                <div class="row m-1">
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

                                <div class="row m-1">
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
@endsection
