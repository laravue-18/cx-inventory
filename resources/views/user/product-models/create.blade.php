@extends('layouts.master')

@section('title') Add Product Model @endsection

@section('content')
    <h6 class="element-header">
        New Product Model
    </h6>
    <div class="element-box row">
        <form action="{{ route('user.models.store') }}" method="post" enctype="multipart/form-data" class="col-lg-6">
            @csrf

            <div class="form-group">
                <label for="">Make</label>
                <select name="make_id" id="" class="form-control">
                    <option>Select Make</option>
                    @foreach($makes as $make)
                        <option value="{{ $make->id }}">{{ $make->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input name="name" type="text" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save</button>
            <a href="{{ route('user.models.index') }}" class="btn btn-secondary waves-effect">Cancel</a>
        </form>
    </div>
@endsection

