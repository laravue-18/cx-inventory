@extends('layouts.master')

@section('title') Edit Storage @endsection

@section('content')
    <h6 class="element-header">
        Edit Storage
    </h6>
    <div class="element-box row">
        <form action="{{ route('user.storages.update', $storage->id) }}" method="post" enctype="multipart/form-data" class="col-lg-6">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Name</label>
                <input name="name" type="text" class="form-control" value="{{ $storage->name }}">
            </div>

            <button storage="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save</button>
            <a href="{{ route('user.storages.index') }}" class="btn btn-secondary waves-effect">Cancel</a>
        </form>
    </div>
@endsection

