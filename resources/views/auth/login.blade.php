{{--@extends('layouts.master-without-nav')--}}

{{--@section('title')--}}
{{--Login--}}
{{--@endsection--}}

{{--@section('body')--}}

{{--<body>--}}
{{--    @endsection--}}

{{--    @section('content')--}}
{{--    <div class="home-btn d-none d-sm-block">--}}
{{--        <a href="{{url('/')}}" class="text-dark"><i class="fas fa-home h2"></i></a>--}}
{{--    </div>--}}
{{--    <div class="account-pages my-5 pt-5">--}}
{{--        <div class="container">--}}
{{--            <div class="row justify-content-center">--}}
{{--                <div class="col-md-8 col-lg-6 col-xl-5">--}}
{{--                    <div class="card overflow-hidden">--}}
{{--                        <div class="card-body pt-0">--}}
{{--                            <div class="p-2 pt-5">--}}
{{--                                <h1 class="mb-4">Sign In</h1>--}}
{{--                                <form class="form-horizontal" method="POST" action="{{ route('login') }}">--}}
{{--                                    @csrf--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="username">Username</label>--}}
{{--                                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" @if(old('email')) value="{{ old('email') }}" @else value="admin@test.com" @endif id="username" placeholder="Enter username" autocomplete="email" autofocus>--}}
{{--                                        @error('email')--}}
{{--                                        <span class="invalid-feedback" role="alert">--}}
{{--                                            <strong>{{ $message }}</strong>--}}
{{--                                        </span>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}

{{--                                    <div class="form-group">--}}
{{--                                        <label for="userpassword">Password</label>--}}
{{--                                        <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" id="userpassword" value="password" placeholder="Enter password">--}}
{{--                                        @error('password')--}}
{{--                                        <span class="invalid-feedback" role="alert">--}}
{{--                                            <strong>{{ $message }}</strong>--}}
{{--                                        </span>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}

{{--                                    <div class="custom-control custom-checkbox">--}}
{{--                                        <input type="checkbox" class="custom-control-input" id="customControlInline">--}}
{{--                                        <label class="custom-control-label" for="customControlInline">Remember me</label>--}}
{{--                                    </div>--}}

{{--                                    <div class="mt-3">--}}
{{--                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Sign In</button>--}}
{{--                                    </div>--}}

{{--                                    <div class="mt-4 text-center">--}}
{{--                                        <a href="password/reset" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Forgot your password?</a>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}

{{--                    <div class="mt-5 text-center">--}}
{{--                        <p>Don't have an account ? <a href="{{url('register')}}" class="font-weight-medium text-primary"> Signup now </a> </p>--}}
{{--                        <p>© <script>--}}
{{--                                document.write(new Date().getFullYear())--}}
{{--                            </script> Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    @endsection--}}

<!DOCTYPE html>
<html>
<head>
    <title>MobileTrade</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="Tamerlan Soziev" name="author">
    <meta content="Admin dashboard html template" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="img/logo.png" rel="shortcut icon">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet" type="text/css">
    <link href="bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="bower_components/dropzone/dist/dropzone.css" rel="stylesheet">
    <link href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
    <link href="bower_components/slick-carousel/slick/slick.css" rel="stylesheet">
    <link href="css/main.css?version=4.5.0" rel="stylesheet">
</head>
<body class="auth-wrapper">
<div class="all-wrapper menu-side with-pattern">
    <div class="auth-box-w">
        <div class="logo-w">
            <a href="/"><img alt="" src="img/logo-big.png" class="w-100"></a>
        </div>
        <h4 class="auth-header">
            Login Form
        </h4>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="">Email</label>
                <input class="form-control @error('email') is-invalid @enderror"
                       name="email" placeholder="Enter your email" type="email"
                       @if(old('email')) value="{{ old('email') }}" @else value="admin@test.com" @endif
                >
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="pre-icon os-icon os-icon-user-male-circle"></div>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password" type="password" name="password" value="password">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="pre-icon os-icon os-icon-fingerprint"></div>
            </div>
            <div class="buttons-w">
                <button class="btn btn-primary" type="submit">Log me in</button>
                <div class="form-check-inline">
                    <label class="form-check-label"><input class="form-check-input" type="checkbox">Remember Me</label>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
