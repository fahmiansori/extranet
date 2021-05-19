<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="">
    <title>Login | Travelsya</title>
    <link href="{{ asset('libs/bootstrap-5/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/auth/style.css') }}" rel="stylesheet">
</head>

<body class="background-red">
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="text-center my-5">
                        <img src="{{ asset('assets/logo.png') }}" alt="logo" height="80">
                    </div>

                    <div class="card shadow-lg" style="border-radius: 20px;">
                        <div class="card-body p-5">
                            <h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
                            <div class="alert alert-danger print-error-msg" style="display:none">
                                <ul></ul>
                            </div>
                            <div class="alert alert-success message-success" style="display:none">
                            </div>
                            <div class="alert alert-danger message-failed" style="display:none">
                            </div>

                            <form method="POST" class="needs-validation" novalidate="" autocomplete="off">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-success d-none" id="msg_div">
                                            <span id="res_message"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="username">Username</label>
                                    <input id="username" type="username" class="form-control" name="username" value="" required autofocus>
                                    <div class="invalid-feedback">
                                        Username is required
                                    </div>
                                    <div class="text-danger p-1">{{ $errors->first('username') }}</div>
                                </div>

                                <div class="mb-3">
                                    <div class="mb-2 w-100">
                                        <label class="text-muted" for="password">Password</label>
                                        <a href="{{ route('forgot-password') }}" class="float-end text-red">
                                            Forgot Password?
                                        </a>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password" required>
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                    <div class="text-danger">{{ $errors->first('password') }}</div>
                                </div>

                                <div class="d-grid gap-2">
                                    <div class="form-check">
                                        <input type="checkbox" name="remember" id="remember" class="form-check-input" value="true">
                                        <label for="remember" class="form-check-label">Remember Me</label>
                                    </div>
                                    <button type="submit" class="btn button-red" id="login">LOGIN</button>
                                </div>
                            </form>
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
    <script>
        let login_url = '{{ route('login-submit') }}';
        let logged_in_url = '{{ route('hotel') }}';
    </script>
    <script src="{{ asset('assets/js/auth/login.js') }}"></script>
</body>
</html>

<!--
    resource link :
    https://github.com/nauvalazhar/bootstrap-5-login-page
-->
