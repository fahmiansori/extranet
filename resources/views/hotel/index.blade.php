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
                </div>
            </div>
            <div class="tab-pane fade" id="tab_2_content" role="tabpanel" aria-labelledby="tab_2">
                <div class="alert alert-secondary" role="alert">
                    Room Data
                </div>

                <div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
