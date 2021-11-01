@extends('layouts.master')

@section('title') Stocks @endsection

@section('content')
    <h6 class="element-header">
        Stock Out
    </h6>
    <div class="element-box row">
        <form action="{{ route('user.products.storeOut') }}" method="post" enctype="multipart/form-data" class="col-lg-6">
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
                    <input name="search" type="text" @change.stop.prevent="searchProduct" class="form-control" placeholder="IMEI/SN/P Code" required>
                </div>
                <div class="form-group">
                    <button class="btn btn btn-primary mr-1 waves-effect waves-light" @click.stop.prevent="searchProduct">Scan</button>
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
                                        <td> @{{ product.code }} </td>
                                        <td> @{{ product.type }} </td>
                                        <td> @{{ product.make }} </td>
                                        <td> @{{ product.model }} </td>
                                        <td> $ @{{ product.price }}</td>
                                    </tr>
                                </template>

                            </tbody>
                        </table>
                    </div>
                </div>
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
                        this.products = [{
                                'id' : 4,
                                'code' : 'P000012',
                                'type' : 'type1',
                                'make' : 'Apple',
                                'model': 'iPhone 3G',
                                'price' : 23
                            },
                            {
                                'id' : 4,
                                'code' : 'P000012',
                                'type' : 'type1',
                                'make' : 'Apple',
                                'model': 'iPhone 3G',
                                'price': 35
                            }
                        ]
                    }
                }
            });
        })

    </script>
@endsection
