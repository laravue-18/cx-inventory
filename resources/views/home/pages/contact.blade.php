@extends('home.layouts.app')

@section('content')
    <div class="container py-5">
        <h1 class="text-uppercase mb-4">Contact Me</h1>
        <div class="row">
            <div class="col-md-7 align-middle">
                <form action="">
                    <div class="form-group">
                        <label>Full Name:</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Phone Number:</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email Address:</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Send Message</button>
                    </div>
                </form>
            </div>

            <div class="col-md-5">
{{--                <img width="500" class="featurette-image img-fluid mx-auto"--}}
{{--                     src="https://cdn.pixabay.com/photo/2015/11/03/08/58/meeting-1019875_960_720.jpg"--}}
{{--                >--}}
                <h3 class="mt-4">Contact Details</h3>
                <p><strong>Today's Entrepreneur </strong></p>
                <p>Los Angeles, CA 90001</p>
                <p><strong> (323) 703-5060</strong></p>
                <p>
                    <abbr title="Phone">Dial Show:</abbr>: (712) 432-3413 PIN 4947
                    <br>Tuesdays: 8AM - 10AM (Pacific Standard Time)
                </p>
            </div>
        </div>
    </div>
@endsection
