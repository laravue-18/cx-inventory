@extends('layouts.master')

@section('title') Edit Location @endsection

@section('content')
    <h6 class="element-header">
        Edit Location
    </h6>
    <div class="element-box row">
        <form action="{{ route('user.locations.update', $location->id) }}" method="post" enctype="multipart/form-data" class="col-lg-6">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Name</label>
                <input name="name" type="text" class="form-control" value="{{ $location->name }}">
            </div>

            <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save</button>
            <a href="{{ route('user.locations.index') }}" class="btn btn-secondary waves-effect">Cancel</a>
        </form>
    </div>
@endsection

