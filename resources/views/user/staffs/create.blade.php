@extends('layouts.master')

@section('title') Staffs @endsection

@section('content')
    <h6 class="element-header">
        New Staff
    </h6>
    <div class="element-box row">
        <form action="{{ route('user.staffs.store') }}" method="post" enctype="multipart/form-data" class="col-lg-6">
            @csrf

            <div class="form-group">
                <label>Name</label>
                <input name="name" type="text" class="form-control">
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
                <input name="email" type="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input name="password" type="password" class="form-control" minlength="6" required>
            </div>
            <div class="form-group">
                <label>Location</label>
                <select name="location" id="" class="form-control">
                    <option value="all">All</option>
                    <option value="london">London</option>
                    <option value="manchester">Manchester</option>
                    <option value="dubai">Dubai</option>
                    <option value="pakistan">Pakistan</option>
                </select>
            </div>
            <div class="form-check mb-4">
                <label class="form-check-label">
                    <input name="status" class="form-check-input" type="checkbox" checked>
                    Enable
                </label>
            </div>

            <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save</button>
            <a href="{{ route('user.staffs.index') }}" class="btn btn-secondary waves-effect">Cancel</a>
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
