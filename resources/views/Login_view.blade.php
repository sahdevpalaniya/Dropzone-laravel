<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- jQuery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Bootstrap CSS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <style>
        body {
            background: linear-gradient(360deg, #b6eae1 10%, #D2FBAD 360%);

        }

        .card-registration .select-input.form-control[readonly]:not([disabled]) {
            font-size: 1rem;
            line-height: 2.15;
            padding-left: .75em;
            padding-right: .75em;
        }

        .card-registration .select-arrow {
            top: 13px;
        }

        span {
            color: red;
        }
    </style>
</head>

<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Login Form</h3>
                            <form id="registeration" action="{{ route('login.post') }}" enctype="multipart/form-data"
                                method="POST">
                                @csrf
                                <div class="col-md-10 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="username">Username</label>
                                        <input type="text" id="email" name='email'
                                            class="form-control form-control-lg" />
                                    </div>
                                    <span class="text text-danger">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="col-md-10 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" id="password" name='password'
                                            class="form-control form-control-lg" />
                                    </div>
                                    <span class="text text-danger">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                                    </div>
                                </div>
                                <a href="{{ route('regitser.form') }}">Create an Account ?</a><br>
                                <a href="#">Forgot Password</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</body>
<!-- / Content -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js"></script>
<script>
    // $(document).ready(function() {
    //     $('#registeration').validate({
    //         errorElement: "span",
    //         rules: {
    //             email: {
    //                 required: true,
    //             },
    //             password: {
    //                 required: true,
    //             },
    //         },
    //     });
    // });
</script>

</html>
