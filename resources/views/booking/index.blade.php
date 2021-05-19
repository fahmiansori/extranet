@extends('template.template_1')
@section('title_top', (isset($title_top))? $title_top:'')
@section('title_page', (isset($title_page))? $title_page:'')

@section('content')
    <div class="align-items-start">
        <div class="nav nav-tabs me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="tab_1" data-bs-toggle="pill" href="#tab_1_content" role="tab" aria-controls="tab_1_content" aria-selected="true">Booking</a>
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
