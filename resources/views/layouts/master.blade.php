<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title> @yield('title') | MobileTrade</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <link href="/img/logo.png" rel="shortcut icon">
        <link href="apple-touch-icon.png" rel="apple-touch-icon">

        @include('layouts.head')

    </head>

    @section('body')
    @show
    <body class="menu-position-side menu-side-left full-screen with-content-panel">
        <div class="all-wrapper with-side-panel solid-bg-all">
            <div class="layout-w">

                @include('layouts.sidebar')

                <div class="content-w">

                    @include('layouts.topbar')

                    <div class="content-panel-toggler">
                        <i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span>
                    </div>
                    <div class="content-i">
                        <div class="content-box">
                            <div class="element-wrapper">
                                @include('layouts.messages')
                                @include('layouts.errors')
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- JAVASCRIPT -->
    @include('layouts.footer-script')
    </body>
</html>
