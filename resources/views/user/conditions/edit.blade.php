@extends('layouts.master')

@section('title') Edit Condition @endsection

@section('content')
    <h6 class="element-header">
        Edit Condition
    </h6>
    <div class="element-box row">
        <form action="{{ route('user.conditions.update', $condition->id) }}" method="post" enctype="multipart/form-data" class="col-lg-6">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Name</label>
                <input name="name" type="text" class="form-control" value="{{ $condition->name }}">
            </div>

            <button condition="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save</button>
            <a href="{{ route('user.conditions.index') }}" class="btn btn-secondary waves-effect">Cancel</a>
        </form>
    </div>
@endsection

