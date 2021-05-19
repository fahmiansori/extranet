<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="">
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
                            <h3 class="fs-4 card-title fw-bold mb-4">@yield('title_page')</h3>

                            @include('template.flash_message')

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
    @yield('js')
</body>
</html>
