@extends('home.layouts.app')

@section('content')
    <div class="container">
        <h2 class="my-5">Product Detail</h2>
        <div class="card shadow border">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-detai-imgs">
                            <div>
                                <img src="{{ asset('images/' . $product->image) }}" alt="" class="img-fluid mx-auto d-block">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mt-4 mt-xl-3">
                            <a href="#" class="text-primary">{{ $product->category->name }}</a>
                            <h4 class="mt-1 mb-3">{{ $product->name }}</h4>

                            <h5 class="mb-4">Price : <b>${{ $product->price }} USD</b></h5>
                            <p class="text-muted mb-4">{{ $product->description }}</p>

                            @auth
                                <div style="width:200px" id="paypal-button-container"></div>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-secondary">Login to Buy Now</a>
                            @endauth

                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
@endsection

@section('script-bottom')
    <script
        src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.key') }}">
    </script>

    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
                // This function sets up the details of the transaction, including the amount and line item details.
                return actions.order.create({
                    application_context: {
                        brand_name : '{{ $product->name }}',
                        user_action : 'PAY_NOW',
                    },
                    purchase_units: [{
                        amount: {
                            value: '{{ $product->price }}'
                        }
                    }],
                });
            },

            onApprove: function(data, actions) {
                let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                return actions.order.capture().then(function(details) {
                    if(details.status == 'COMPLETED'){
                        return fetch('/orders', {
                            method: 'post',
                            headers: {
                                'content-type': 'application/json',
                                "Accept": "application/json, text-plain, */*",
                                "X-Requested-With": "XMLHttpRequest",
                                "X-CSRF-TOKEN": token
                            },
                            body: JSON.stringify({
                                detail: details,
                                product_id: {{ $product->id }},
                                // orderId     : data.orderID,
                                // id : details.id,
                                // status: details.status,
                                // payerEmail: details.payer.email_address,
                            })
                        })
                            .then(status)
                            .then(function(response){
                                alert('Paid Successfully!!')
                                // redirect to the completed page if paid
                                // window.location.href = '/pay-success';
                            })
                            .catch(function(error) {
                                alert(error)
                                // redirect to failed page if internal error occurs
                                // window.location.href = '/pay-failed?reason=internalFailure';
                            });
                    }else{
                        window.location.href = '/pay-failed?reason=failedToCapture';
                    }
                });
            },

            onCancel: function (data) {
                // window.location.href = '/pay-failed?reason=userCancelled';
            }

        }).render('#paypal-button-container');
        // This function displays Smart Payment Buttons on your web page.

        function status(res) {
            if (!res.ok) {
                throw new Error(res.statusText);
            }
            return res;
        }
    </script>
@endsection
