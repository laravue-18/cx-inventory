@extends('layouts.master')

@section('title') Stocks @endsection

@section('content')
    <h6 class="element-header">
        Stock Out
    </h6>
    <div class="element-box row">
        <form action="{{ route('user.transactions.store') }}" method="post" enctype="multipart/form-data" class="col-lg-6">
            @csrf

            <div class="form-group">
                <label>Customer</label>
                <select name="user_id" id="" class="form-control" required>
                    <option value="">Select Customer</option>
                    @foreach($suppliers as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Location</label>
                <select name="location_id" id="" class="form-control" required>
                    <option value="">Select Location</option>
                    @foreach($locations as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div id="vue1">
                <div class="form-group">
                    <label for="">Scan Product</label>
                    <div class="row">
                        <div class="col-md-10 col-8">
                            <input name="search" id="search" type="text" @change.stop.prevent="" class="form-control" placeholder="IMEI / SN / P Code" required>
                        </div>
                        <div class="col-md-2 col-4">
                            <button class="btn btn btn-primary mr-1 waves-effect waves-light btn-block h-100" @click.stop.prevent="searchProduct">Scan</button>
                        </div>
                    </div>
                </div>

                <div v-if="products.length">
                    <div class="form-group table-responsive mb-4">
                        <table class="table table-lightborder">
                            <thead>
                                <tr>
                                    <th> Product Code </th>
                                    <th> Product Type </th>
                                    <th> Make </th>
                                    <th> Model </th>
                                    <th> Price </th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for = 'product in products'>
                                    <tr>
                                        <td> @{{ pcode(product.id) }} </td>
                                        <td> @{{ product.product_type ? product.product_type.name : ''}} </td>
                                        <td> @{{ product.make ? product.make.name : '' }} </td>
                                        <td> @{{ product.product_model ? product.product_model.name : '' }} </td>
                                        <td> $ @{{ product.price }}</td>
                                    </tr>
                                </template>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Condition</label>
                <select name="user_id" id="" class="form-control" required>
                    <option value="">Select ...</option>
                    @foreach($conditions as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Note</label>
                <input name="note" type="text" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save</button>
            <a href="{{ route('user.products.index') }}" class="btn btn-secondary waves-effect">Cancel</a>
        </form>
    </div>
@endsection

@section('script2')
    <script>
        $(function(){
            const vue1 = new Vue({
                el: "#vue1",
                data(){
                    return {
                        search: '',
                        products: []
                    }
                },

                methods: {
                    searchProduct(){
                        if($('#search').val()){
                            const data = { search: $('#search').val() };

                            fetch('{{ route('user.scan-products') }}', {
                                method: 'POST', // or 'PUT'
                                headers: {
                                    'content-type': 'application/json',
                                    "Accept": "application/json, text-plain, */*",
                                    "X-Requested-With": "XMLHttpRequest",
                                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: JSON.stringify(data),
                            })
                            .then(response => response.json())
                            .then(data => {
                                if(!data.length){
                                    alert('There is no data.')
                                }
                                this.products = data
                            })
                            .catch((error) => {
                                console.error('Error:', error);
                            });
                        }
                    }
                }
            });
        })

        function pcode(str){
            str += '';
            while (str.length < 6) {
                str = '0' + str;
            }
            str = 'P' + str;
            return str;
        }

    </script>
@endsection
