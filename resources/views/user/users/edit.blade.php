@extends('layouts.master')

@section('title') Users @endsection

@section('content')
    <h6 class="element-header">
        New User
    </h6>
    <div class="element-box">
        <form action="{{ route('user.users.update', $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="form-group">
                <label>Name</label>
                <input name="name" type="text" class="form-control" value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input name="address" type="text" class="form-control" value="{{ $user->address }}">
            </div>
            <div class="form-group">
                <label>City</label>
                <input name="city" type="text" class="form-control" value="{{ $user->city }}">
            </div>
            <div class="form-group">
                <label>Country</label>
                <input name="country" type="text" class="form-control" value="{{ $user->country }}">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input name="phone" type="phone" class="form-control" value="{{ $user->phone }}">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input name="email" type="email" class="form-control" value="{{ $user->email }}">
            </div>
            <div class="form-group">
                <label>Web</label>
                <input name="web" type="text" class="form-control" value="{{ $user->web }}">
            </div>
            <div class="form-group">
                <label>User Type</label>
                <select name="type" id="" class="form-control" value="Customer">
                    <option value="Customer" {{ $user->type == 'Customer' ? 'selected' : '' }}>Customer</option>
                    <option value="Supplier" {{ $user->type == 'Supplier' ? 'selected' : '' }}>Supplier</option>
                    <option value="Wholesaler" {{ $user->type == 'Wholesaler' ? 'selected' : '' }}>Wholesaler</option>
                    <option value="Service Provider" {{ $user->type == 'Service Provider' ? 'selected' : '' }}>Service Provider</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Update</button>
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
