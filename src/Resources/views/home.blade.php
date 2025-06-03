<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ 'DB Copy' }}</title>
    <meta name="csrf_token" value="{{ csrf_token() }}"/>

    <link rel="stylesheet" href="{{ asset('vendor/erjon/css/app.css') }}">
    @livewireStyles
</head>
<body class="bg-gradient-to-r from-light-cyan-100/40 to-light-cyan-100/80">
    <!-- Back button start -->
    <a href="{{ config('db_copy.fallback_url') }}" class="button-borderless text-light-cyan-600 font-semibold hover:text-light-cyan-800 text-3xl transform ease-in-out inline-flex">
        <i>
            <svg width="28" height="24" viewBox="0 0 28 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <!-- Self-generated path. Numbers can be tweaked to get whatever you desire -->
                <!-- https://www.w3schools.com/graphics/svg_path.asp -->
                <path d="M23 12H5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/> <!-- Horizontal line -->
                <path d="M5 12L12 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/> <!-- Angle line down -->
                <path d="M5 12L12 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/> <!-- Angle line up -->
            </svg>
        </i>
        <span class="text-base">
            {{ config('app.name') }}
        </span>
    </a>
    <!-- Back button end -->

    <main>
        <div class="mx-4">
            <livewire:dbcopy::tables-list lazy="on-load"/>
        </div>
    </main>

{{--    <script src="{{ asset('vendor/erjon/js/clipboard.min.js') }}"></script>--}}
    <script defer="defer" src="{{ asset('vendor/erjon/js/app.js') }}"></script>
    @stack('scripts')
    @livewireScripts
</body>
</html>
