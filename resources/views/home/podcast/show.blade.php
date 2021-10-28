@extends('home.layouts.app')

@section('content')
    <!-- end space -->
    <div class="container py-5">
        <h1 class="text-uppercase mb-4">Episode</h1>
        <div class="row mb-5">
            <div class="col-md-7">
                <img src="https://cdn.pixabay.com/photo/2019/03/19/09/03/studio-4065108_960_720.jpg" alt="" class="img-fluid">
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-4">
                <h2 class="mt-5 mb-3">{{ $episode['TITLE'] }}</h2>

                <h5 class="mb-4">CONFERENCE_ID: {{$episode['CONFERENCE_ID']}}</h5>

                <audio class="mb-5" controls>
                    <source src="{{ 'https://www.blacktradelines.com/' . $episode['RECORDPATH'] }}" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            </div>
        </div>


    </div> <!-- end container -->
@endsection
