@extends('layouts.master')

@section('title') Add Part Number @endsection

@section('content')
    <h6 class="element-header">
        New Part Number
    </h6>
    <div class="element-box row">
        <form action="{{ route('user.part-numbers.store') }}" method="post" enctype="multipart/form-data" class="col-lg-6">
            @csrf

            <div class="form-group">
                <label>Name</label>
                <input name="name" type="text" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save</button>
            <a href="{{ route('user.part-numbers.index') }}" class="btn btn-secondary waves-effect">Cancel</a>
        </form>
    </div>
@endsection

