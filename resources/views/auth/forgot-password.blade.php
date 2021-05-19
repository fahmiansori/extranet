<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="">
	<title>Forgot Password | Travelsya</title>
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
							<h1 class="fs-4 card-title fw-bold mb-4">Forgot Password</h1>

                            @include('template.flash_message')

							<form method="POST" class="needs-validation" novalidate="" autocomplete="off">
                                {{ csrf_field() }}

								<div class="mb-3">
									<label class="mb-2 text-muted" for="username">Username</label>
									<input id="username" type="username" class="form-control" name="username" value="" required autofocus>
									<div class="invalid-feedback">
										Username is required
									</div>
								</div>

                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn button-red">
                                        SEND
                                    </button>
                                </div>
							</form>
						</div>

						<div class="card-footer py-3 border-0">
							<div class="text-center">
								Remember your password? <a href="{{ route('login') }}" class="text-red">Back to Login Page</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{ asset('assets/js/simple-validation.js') }}"></script>
</body>
</html>
