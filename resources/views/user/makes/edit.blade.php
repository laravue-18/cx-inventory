@extends('layouts.master')

@section('title') Edit Make @endsection

@section('content')
    <h6 class="element-header">
        Edit Make
    </h6>
    <div class="element-box row">
        <form action="{{ route('user.makes.update', $make->id) }}" method="post" enctype="multipart/form-data" class="col-lg-6">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Name</label>
                <input name="name" type="text" class="form-control" value="{{ $make->name }}">
            </div>

            <button make="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save</button>
            <a href="{{ route('user.makes.index') }}" class="btn btn-secondary waves-effect">Cancel</a>
        </form>
    </div>
@endsection

