@extends('layouts.master')

@section('title') Users @endsection

@section('content')
    <h6 class="element-header">
        New User
    </h6>
    <div class="element-box">
        <form action="{{ route('user.users.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Name</label>
                <input name="name" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input name="address" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label>City</label>
                <input name="city" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label>Country</label>
                <input name="country" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input name="phone" type="phone" class="form-control">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input name="email" type="email" class="form-control">
            </div>
            <div class="form-group">
                <label>Web</label>
                <input name="web" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label>User Type</label>
                <select name="type" id="" class="form-control" value="Customer">
                    <option value="Customer">Customer</option>
                    <option value="Supplier">Supplier</option>
                    <option value="Wholesaler">Wholesaler</option>
                    <option value="Service Provider">Service Provider</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save</button>
            <a href="{{ route('user.users.index') }}" class="btn btn-secondary waves-effect">Cancel</a>
        </form>
    </div>
@endsection

@section('script')
    <script>
        $('#dtbl').DataTable({
            // buttons: ['copy', 'excel', 'pdf']
        });
    </script>
@endsection
