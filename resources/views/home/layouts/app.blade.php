<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="favicon.ico">

    <title>Today's Entrepreneur - Andrea James</title>

    @include('layouts.head')

</head>

<body style="background: #fff;">
    @include('home.layouts.topbar')

    @yield('content')


    @include('home.layouts.footer')

    @include('layouts.footer-script')

</body>
</html>
