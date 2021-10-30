@extends('layouts.master')

@section('title') Edit Product Type @endsection

@section('content')
    <h6 class="element-header">
        Edit Product Type
    </h6>
    <div class="element-box row">
        <form action="{{ route('user.types.update', $type->id) }}" method="post" enctype="multipart/form-data" class="col-lg-6">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Name</label>
                <input name="name" type="text" class="form-control" value="{{ $type->name }}">
            </div>

            <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save</button>
            <a href="{{ route('user.types.index') }}" class="btn btn-secondary waves-effect">Cancel</a>
        </form>
    </div>
@endsection

