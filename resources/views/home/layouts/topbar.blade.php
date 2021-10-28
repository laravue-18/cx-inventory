<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('assets/images/logo-lg.png') }}" style="height: 4rem;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pages.show', 'about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('podcast') }}">Podcast</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown07">
                        <a class="dropdown-item" href="{{ route('pages.show', 'speaking') }}">Speaking</a>
                        <a class="dropdown-item" href="{{ route('pages.show', 'franchising') }}">Franchising</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('store') }}">Success Store </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('posts') }}">Blog </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pages.show', 'advertising') }}">Advertising </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pages.show', 'contact') }}">Contact </a>
                </li>
            </ul>

            <div>
                @auth
                    <a href="{{ route('user.dashboard') }}" class="btn btn-dark btn-sm">My Account</a>
                    <a class="btn btn-dark btn-sm" href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Sign Out </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endauth
                @guest
                    <a href="{{ route('login') }}" class="btn btn-dark btn-sm">Sign In</a>
                @endguest
            </div>

        </div>
    </div>
</nav>
