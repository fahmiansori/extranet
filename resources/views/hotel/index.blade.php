@extends('template.template_1')
@section('title_top', 'Hotel')
@section('title_page', 'Hotel')

@section('content')
    <div class="align-items-start">
        <div class="nav nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="tab_1" data-bs-toggle="pill" href="#tab_1_content" role="tab" aria-controls="tab_1_content" aria-selected="true">Hotel Information</a>
            <a class="nav-link" id="tab_2" data-bs-toggle="pill" href="#tab_2_content" role="tab" aria-controls="tab_2_content" aria-selected="false">Hotel Room Data</a>
        </div>

        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active " id="tab_1_content" role="tabpanel" aria-labelledby="tab_1">
                <div class="alert alert-secondary" role="alert">
                    Hotel Information
                </div>

                <div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="text-end">
                                Hotel Name :
                            </div>
                        </div>

                        <div class="col-lg-6">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="text-end">
                                Star Rating :
                            </div>
                        </div>

                        <div class="col-lg-6">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="text-end">
                                Hotel Address :
                            </div>
                        </div>

                        <div class="col-lg-6">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="text-end">
                                Hotel Contact :
                            </div>
                        </div>

                        <div class="col-lg-6">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="text-end">
                                Hotel Facility :
                            </div>
                        </div>

                        <div class="col-lg-6">
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tab_2_content" role="tabpanel" aria-labelledby="tab_2">
                <div class="alert alert-secondary" role="alert">
                    Room Data
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
        </div>
    </div>
@endsection

@section('js')
@endsection
