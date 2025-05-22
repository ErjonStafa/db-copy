<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ ($docTitle?$docTitle.' - ':'').'DB Copy' }}</title>
    <meta name="csrf_token" value="{{ csrf_token() }}"/>

    <link rel="stylesheet" href="{{ asset('vendor/erjon/css/app.css') }}">
</head>

<body class="bg-gradient-to-r from-light-cyan-100/40 to-light-cyan-100/80">
    @isset($pageTitle)
        <div class="my-6 mx-4">
            <p class="text-2xl text-slate-700 font-semibold" id="page-title">
                {{ $pageTitle }}
            </p>
        </div>
    @endisset

    @yield('content')

    <script src="{{ asset('vendor/erjon/js/app.js') }}"></script>
    <script src="{{ asset('vendor/erjon/js/clipboard.min.js') }}"></script>
    @stack('scripts')
</body>
</html>
