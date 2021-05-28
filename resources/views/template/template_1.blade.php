<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="">
    <link rel="icon" href="{{ asset('assets/logoImage.png') }}" type="image/png" sizes="16x16">
    <title>@yield('title_top') | Travelsya</title>
    <link href="{{ asset('libs/bootstrap-5/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/auth/style.css') }}" rel="stylesheet">
    @yield('head')
</head>

<body class="background-red">
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="text-center my-5">
                        <img src="{{ asset('assets/logo.png') }}" alt="logo" height="80">
                    </div>

                    <div class="card shadow-lg" style="border-radius: 20px;">
                        <div class="card-body p-3">
                            <div>
                                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                    <div class="container-fluid">
                                        <a class="navbar-brand" href="#">
                                            <img src="{{ asset('assets/logoImage.png') }}" alt="logo" height="30">
                                        </a>

                                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"></span>
                                        </button>

                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                                @php
                                                    $page_current_dashboard = '';
                                                    if(!isset($page_active) || $page_active == 'dashboard'){
                                                        $page_current_dashboard = 'active';
                                                    }

                                                    $page_current_hotel = '';
                                                    if(isset($page_active) && $page_active == 'hotel'){
                                                        $page_current_hotel = 'active';
                                                    }

                                                    $page_current_booking = '';
                                                    if(isset($page_active) && $page_active == 'booking'){
                                                        $page_current_booking = 'active';
                                                    }
                                                @endphp

                                                <li class="nav-item">
                                                    <a class="nav-link {{ $page_current_dashboard }}" {{ (!empty($page_current_dashboard))? 'aria-current="page"':'' }} href="{{ route('dashboard') }}">Dashboard</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link {{ $page_current_hotel }}" {{ (!empty($page_current_hotel))? 'aria-current="page"':'' }} href="{{ route('hotel') }}">Hotel</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link {{ $page_current_booking }}" {{ (!empty($page_current_booking))? 'aria-current="page"':'' }} href="{{ route('booking') }}">Booking</a>
                                                </li>
                                                {{--
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">Link</a>
                                                </li>
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Dropdown
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                                                </li>
                                                 --}}
                                            </ul>

                                            <div class="d-flex">
                                                <a class="btn btn-danger btn-sm" href="{{ route('logout') }}">Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </nav>
                            </div>


                            <div>
                                <h3 class="fs-4 card-title fw-bold mb-4">@yield('title_page')</h3>
                            </div>

                            <div>
                                @include('template.flash_message')
                            </div>

                            <div class="">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div style="display:none;" id="loading_asset">
        <img src="{{ asset('assets/loading.gif') }}" height="30">
    </div>

    <script src="{{ asset('libs/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('libs/bootstrap-5/js/bootstrap.min.js') }}"></script>
    <script>
        function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }
    </script>
    @yield('js')
</body>
</html>
