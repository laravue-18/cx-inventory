@extends('home.layouts.app')

@section('content')
    <div class="container py-5">
        <div>
            <h1>{{ $post->title }}</h1>
            <p class="mb-4">
                <span class="">{{ date('M d, Y', strtotime($post->updated_at))}} by {{ $post->author->name }}</span>
            </p>

        </div>
        <div class="row">
            <div class="col-md-9">
                <img src="{{ asset('images/' . $post->image ) }}" alt="" class="img-fluid mb-5">
                <p>{{ $post->description }}</p>
            </div>
            <div class="col-md-3">
                <div class="bg-light p-3">
                    <h3 class="font-italic">About</h3>
                    <p>
                        Customize this section to tell your visitors a little bit about your publication, writers, content, or something
                        else entirely. Totally up to you.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
