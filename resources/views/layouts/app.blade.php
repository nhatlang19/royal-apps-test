<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@hasSection('template_title')@yield('template_title') | @endif {{ config('app.name', Lang::get('titles.app')) }}</title>
    <meta name="description" content="">
    <meta name="author" content="Luan Nguyen">
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    {{-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --}}
        <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('template_linked_fonts')
    @vite(['resources/assets/sass/app.scss', 'resources/assets/js/app.js'])
    @yield('template_linked_css')
    <style type="text/css">
        @yield('template_fastload_css')
            @if (Auth::User() && (Auth::User()->profile) && (Auth::User()->profile->avatar_status == 0))
                .user-avatar-nav {
            background: url({{ Gravatar::get(Auth::user()->email) }}) 50% 50% no-repeat;
            background-size: auto 100%;
        }
        @endif
    </style>        {{-- Scripts --}}
    <script>
        window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
    </script>
    @yield('head')
</head>
<body>
<div id="app">
    <main class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-12 text-end">
                    @if (session()->has('token_key'))
                   Hello {{ (Session::get('user'))['first_name'] }} {{ (Session::get('user'))['last_name'] }},
                    <a href="{{route('logout')}}">Logout</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @include('partials.form-status')
                </div>
            </div>
        </div>
        @yield('content')
    </main>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@yield('footer_scripts')
</body>
</html>
