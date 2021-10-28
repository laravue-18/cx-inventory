@extends('layouts.master')

@section('title') Staffs @endsection

@section('content')
    <h6 class="element-header">
        New Staff
    </h6>
    <div class="element-box">
        <form action="{{ route('user.staffs.update', $staff->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Name</label>
                <input name="name" type="text" class="form-control" value="{{ $staff->name }}">
            </div>
            <div class="form-group">
                <label>City</label>
                <input name="city" type="text" class="form-control" value="{{ $staff->city }}">
            </div>
            <div class="form-group">
                <label>Country</label>
                <input name="country" type="text" class="form-control" value="{{ $staff->country }}">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input name="phone" type="phone" class="form-control" value="{{ $staff->phone }}">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input name="email" type="email" class="form-control" value="{{ $staff->email }}">
            </div>
            <div class="form-group">
                <label>Location</label>
                <select name="location" id="" class="form-control">
                    <option value="all" {{ $staff->location == 'all' ? 'selected' : '' }}>All</option>
                    <option value="london" {{ $staff->location == 'london' ? 'selected' : '' }}>London</option>
                    <option value="manchester" {{ $staff->location == 'manchester' ? 'selected' : '' }}>Manchester</option>
                    <option value="dubai" {{ $staff->location == 'dubai' ? 'selected' : '' }}>Dubai</option>
                    <option value="pakistan" {{ $staff->location == 'pakistan' ? 'selected' : '' }}>Pakistan</option>
                </select>
            </div>
            <div class="form-check mb-4">
                <label class="form-check-label">
                    <input name="status" class="form-check-input" type="checkbox" {{ $staff->status ? 'checked' : '' }}>
                    Enable
                </label>
            </div>

            <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Update</button>
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
