@extends('home.layouts.app')

@section('content')
    <div class="container py-5">
        <h1 class="text-uppercase mb-4">Franchising</h1>
        <div class="row">
            <div class="col-md-6 order-md-2 align-middle">
                <h2 class="featurette-heading font-weight-bold">Franchise with us!</h2>
                <h3 class="text-muted mb-4"></h3>
                <p>
                    With over 40 years of professional experience, we are the leaders in business and franchise development. We have comprehensive, easy to use documents with a modern digital platform.
                    Partnerships
                </p>
                <p>
                    We will help you with expanding your brand Regionally, Nationally, and Internationally. We have partnerships in over 30 countries around the globe.
                </p>
            </div>
            <div class="col-md-6 order-md-1">
                <img width="500" class="featurette-image img-fluid mx-auto"
                     src="{{ asset('assets/images/franchise.jpg') }}"
                     alt="Generic placeholder image"
                >
            </div>
        </div>
    </div>
@endsection
