@extends('home.layouts.app')

@section('content')
    <!-- end space -->
    <div class="container py-5">
        <h1 class="text-uppercase mb-4">Podcast</h1>
        <div class="row mb-5">
            <div class="col-md-5">
                <img src="{{ $channel['PHOTOLINK'] }}" alt="" class="img-fluid">
            </div>
            <div class="col-md-7">
                <h2 class="featurette-heading font-weight-bold">{{ $channel['NAME'] }}</h2>
                <p class="text-primary">Channel ID: {{ $channel['CHANNEL_ID'] }}</p>
                <p>{{ $channel['DESCRIPTION'] }}</p>
            </div>
        </div>

        <h2 class="mb-3">Episodes</h2>
        <div class="row">
            @foreach($episodes as $episode)
                <div class="col-md-3 mb-5">
                    <div class="card shadow border" style="height: 500px;">
                        <img class="card-img-top img-fluid" src="{{ $channel['PHOTOLINK'] }}" alt="Card image cap">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <p class="text-primary">Episode ID: {{ $episode['EPISODE_ID'] }}</p>
                                <h4 class="card-title mt-0">{{ $episode['TITLE'] }}</h4>
                                <p class="card-text text-info"> {{ $episode['HOSTNAME'] }} </p>
                            </div>
                            <div>
                                <div>
                                    @foreach(explode(',', $episode['KEYWORDS']) as $keyword)
                                        <a href="#" class="badge badge-primary font-size-11 m-1">{{$keyword}}</a>
                                    @endforeach
                                </div>
    {{--                            <p class="card-text text-truncate">{{ $episode['DESCRIPTION'] }}</p>--}}
                            </div>
                            <div>
                                <a href="{{ route('podcast.show', $episode['EPISODE_ID']) }}" class="btn btn-secondary waves-effect waves-light">Listen Now!</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div> <!-- end container -->
@endsection
