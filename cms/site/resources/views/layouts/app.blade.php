<?php if (config('app.install')==true) {header("Location: /install"); exit;} ?>
<!DOCTYPE html>
<html lang="@lang('main.lang')">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF @lang('main.token') -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<?php if (!isset($isname)) {print_r('<title>' . trans('main.name') . '</title>'); } ?>

    <!-- @lang('main.styles') -->
    <link href="/site/public/css/app.css" rel="stylesheet">

    <!-- @lang('main.scripts') -->
    <script>
        window.@lang('main.cmsname') = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- @lang('main.collaps') -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">@lang('main.tognav')</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- @lang('main.brandimage') -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        @lang('main.name')
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- @lang('main.leftnav') -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- @lang('main.rightnav') -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- @lang('main.linkauth') -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login?url='.$_SERVER['REQUEST_URI']) }}">@lang('auth.login')</a></li>
                            <li><a href="{{ url('/register?url='.$_SERVER['REQUEST_URI']) }}">@lang('auth.reg')</a></li>
                        @else
                        <li><a href="{{ url('/user') }}">@lang('auth.dash')</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    @lang('auth.username') <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            @lang('auth.logout')
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- @lang('main.scripts') -->
    <script src="/site/public/js/app.js"></script>
</body>
</html>
