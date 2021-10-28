@extends('home.layouts.app')

@section('content')
    <div class="container py-5">
        <h1 class="text-uppercase mb-4">Store</h1>
        <div class="row mb-5">
            <div class="col-md-7 order-md-2 align-middle">
                <h2 class="featurette-heading font-weight-bold">Oh yeah, we are here to servce.</h2>
                <h3 class="text-muted mb-4">See for yourself.</h3>
                <p>
                    Today's Entreprenuer places a strong emphasis on serving our clients to make well-informed decisions in their business endevors.
                    Whether it be family, commercial or industrial, we believe in the smile of a satisfied customer.
                </p>
            </div>
            <div class="col-md-5 order-md-1">
                <img width="500" class="featurette-image img-fluid mx-auto" src="https://cdn.pixabay.com/photo/2015/10/12/15/18/store-984393_960_720.jpg" alt="Generic placeholder image">
            </div>
        </div>

        <h2 class="mb-3">Products</h2>
        <div class="row">
            @foreach($products as $product)
                <div class="col-xl-3 col-md-4 col-sm-2">
                    <div class="card border">
                        <div class="card-body">
                            <div class="product-img position-relative">
                                <div class="avatar-sm product-ribbon">
                                </div>
                                <img src="{{ asset('images/' . $product->image) }}" alt="" class="img-fluid mx-auto d-block">
                            </div>
                            <div class="mt-4 text-center">
                                <h5 class="mb-3 text-truncate"><a href="#" class="text-dark">{{ $product->name }} </a></h5>

                                <h5 class="my-0"> <b>${{ $product->price }}</b></h5>

                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-secondary mt-4">Buy Now</a>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
