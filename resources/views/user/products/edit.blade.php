@extends('layouts.master')

@section('title') Edit Stock @endsection

@section('content')

    <h6 class="element-header">
        Edit Stock
    </h6>
    <div class="element-box row">
        <form action="{{ route('user.products.update', $product->id) }}" method="post" enctype="multipart/form-data" class="col-lg-6">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Supplier</label>
                <select name="user_id" id="" class="form-control" required>
                    <option value="">Select Supplier</option>
                    @foreach($suppliers as $item)
                        <option value="{{ $item->id }}" {{ $product->user_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Product Type</label>
                <select name="type_id" id="" class="form-control" required>
                    <option value="">Select ...</option>
                    @foreach($types as $item)
                        <option value="{{ $item->id }}" {{ $product->type_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Location</label>
                <select name="location_id" id="" class="form-control" required>
                    <option value="">Select Location</option>
                    @foreach($locations as $item)
                        <option value="{{ $item->id }}" {{ $product->location_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div id="vue1">
                <div class="form-group">
                    <label>Make</label>
                    <select name="make_id" id="" class="form-control" @change="handleChangeMake()" v-model="make" required>
                        <option value="">Select Make</option>
                        @foreach($makes as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Model</label>
                    <select name="product_model_id" id="" class="form-control" :value="model" required>
                        <option value="">Select Model</option>
                        <template v-for="item in models">
                            <option :value="item.id">@{{ item.name }}</option>
                        </template>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Part Number</label>
                <input name="part_number" type="text" class="form-control" value="{{ $product->part_number }}" required>
            </div>

            <div class="form-group">
                <label>Colour</label>
                <select name="colour_id" id="" class="form-control" required>
                    <option value="">Select Colour</option>
                    @foreach($colors as $item)
                        <option value="{{ $item->id }}" {{ $product->colour_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Storage</label>
                <select name="storage_id" id="" class="form-control" required>
                    <option value="">Select Storage</option>
                    @foreach($storages as $item)
                        <option value="{{ $item->id }}" {{ $product->storage_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Conditions</label>
                <select name="conditions[]" class="form-control select2" multiple="true" required>
                    @foreach($conditions as $item)
                        <option value="{{ $item->id }}" {{ in_array($item->id, $product->conditions->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div id="vue2">
                <div class="form-group">
                    <label>Qty</label>
                    <input name="qty" type="number" class="form-control" v-model="qty" required>
                </div>
                <div class="form-group">
                    <template v-if="qty">
                        <label for="">SN / IMEI</label>
                    </template>
                    <template v-for="i in Number(qty)">
                        <input name="serials[]" type="text" class="form-control mb-2" :value="items[i-1] ? items[i-1]['serial_number'] : null" required>
                    </template>
                </div>
            </div>
            <div class="form-group">
                <label>Price</label>
                <input name="price" type="number" class="form-control" value="{{ $product->price }}" required>
            </div>
            <div class="form-group">
                <label>Note</label>
                <input name="note" type="text" class="form-control" value="{{ $product->note }}" required>
            </div>

            <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save</button>
            <a href="{{ route('user.products.index') }}" class="btn btn-secondary waves-effect">Cancel</a>
        </form>
    </div>
@endsection

@section('script2')
    <script>
        // $(function(){
            const vue1 = new Vue({
                el: "#vue1",
                data(){
                    return {
                        make: {{ $product->make_id }},
                        model: {{ $product->product_model_id }},
                        models: @json(\App\Models\Make::find($product->make_id)->models),
                        makes: @json($makes)
                    }
                },

                methods: {
                    handleChangeMake(){
                        this.models = this.makes.find(i => i.id == this.make).models
                    }
                }
            });

            const vue2 = new Vue({
                el: "#vue2",
                data(){
                    return {
                        qty: {{$product->qty}},
                        items: @json($product->items)
                    }
                },
            });

        // })

    </script>
@endsection
