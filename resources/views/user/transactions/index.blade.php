@extends('layouts.master')

@section('title') Tracking @endsection

@section('content')
    <h6 class="element-header">
        Tracking
    </h6>
    <div class="element-box">
        <div class="row" id="vue1">
            <div class="col-md-4">
                <div class="form-group row">
                    <div class="col-md-10 col-8">
                        <input v-model="search" type="text" class="form-control" placeholder="IMEI / SN / T Code / P Code">
                    </div>
                    <div class="col-md-2 col-4">
                        <button class="btn btn btn-primary mr-1 waves-effect waves-light btn-block h-100" @click="searchTrack">Track</button>
                    </div>
                </div>
                <table class="table">
                    <tbody v-if="product && (!!product.transactions) && product.transactions.length">
                        <tr> <td>Transaction Code:</td> <td>@{{ pcode(product.transactions[0].id, "T") }}</td> </tr>
                        <tr> <td>Product Code:</td> <td>@{{ pcode(product.id, "P") }}</td> </tr>
                        <tr> <td>Date of Purchase:</td> <td>@{{ product.transactions[0].created_at }}</td> </tr>
                        <tr> <td>Client:</td> <td>@{{ product.supplier ? product.supplier.name : '' }}</td> </tr>
                        <tr> <td>Location:</td> <td>@{{ product.location ? product.location.name : '' }}</td> </tr>
                        <tr> <td>Product Type:</td> <td>@{{ product.productType ? product.productType.name : '' }}</td> </tr>
                        <tr> <td>Make:</td> <td>@{{ product.make ? product.make.name : '' }}</td> </tr>
                        <tr> <td>Model:</td> <td>@{{ product.productModel ? product.productModel.name : '' }}</td> </tr>
                        <tr> <td>SN:</td> <td>@{{ product.items ? product.items[0].serial_number : '' }}</td> </tr>
                        <tr> <td>Part No:</td> <td>@{{ product.part_number }}</td> </tr>
                        <tr> <td>Colour:</td> <td>@{{ product.colour ? product.colour.name : '' }}</td> </tr>
                        <tr> <td>Storage:</td> <td>@{{ product.storage ? product.storage.name : '' }}</td> </tr>
                        <tr> <td>Condition:</td> <td>@{{ product.conditions ? product.conditions.map(i => i.name).join(',') : '' }}</td> </tr>
                        <tr> <td>Qty:</td> <td>@{{ product.qty }}</td> </tr>
                        <tr> <td>Price Paid:</td> <td>@{{ product.transactions ? product.transactions[0].selling_price : '' }}</td> </tr>
                        <tr> <td>Notes:</td> <td>@{{ product.transactions ? product.transactions[0].note : '' }}</td> </tr>
                        <tr> <td>Sold to:</td> <td>@{{ product.transactions ? product.transactions[0].customer_id : '' }}</td> </tr>
                        <tr> <td>Location:</td> <td>@{{ product.transactions ? product.transactions[0].selling_price : '' }}</td> </tr>
                        <tr> <td>Price:</td> <td>@{{ product.price }}</td> </tr>
                        <tr> <td>TCode:</td> <td>T00011UAE</td> </tr>
                        <tr> <td>Status:</td> <td>Sold</td> </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script1')
    <script src="/js/dataTables.bootstrap4.min.js"></script>
    <script>
        const vue1 = new Vue({
            el: "#vue1",
            data(){
                return {
                    product: null,
                    search: '',
                }
            },

            methods: {
                searchTrack(){
                    if(this.search){
                        fetch('{{ route('user.scan-transaction') }}', {
                            method: 'POST', // or 'PUT'
                            headers: {
                                'content-type': 'application/json',
                                "Accept": "application/json, text-plain, */*",
                                "X-Requested-With": "XMLHttpRequest",
                                "X-CSRF-TOKEN": '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({'search': this.search}),
                        })
                            .then(response => response.json())
                            .then(data => {
                                if(data.transactions && data.transactions.length){
                                    this.product = data
                                    this.renderKey++
                                }else{
                                    alert(`There is no data for "${this.search}".`)
                                }
                                this.search = ''
                            })
                            .catch((error) => {
                                console.error('Error:', error);
                            });
                    }
                }
            }
        });

        function pcode(str, c){
            str += '';
            while (str.length < 6) {
                str = '0' + str;
            }
            str = c + str;
            return str;
        }
    </script>
@endsection
