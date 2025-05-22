<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ 'DB Copy' }}</title>
    <meta name="csrf_token" value="{{ csrf_token() }}"/>

    <link rel="stylesheet" href="{{ asset('vendor/erjon/css/app.css') }}">
</head>
<body class="bg-gradient-to-r from-light-cyan-100/40 to-light-cyan-100/80">
    <a href="{{ config('db_copy.fallback_url') }}" class="button-borderless text-light-cyan-600 hover:text-light-cyan-800 text-3xl"> <!-- Back button start -->
        &larr;
        <span class="text-base">
            {{ config('app.name') }}
        </span>
    </a><!-- Back button end -->

    <main>
        <div class="mx-4">
            <livewire:dbcopy::tables-list lazy="on-load"/>
        </div>
    </main>

    <script src="{{ asset('vendor/erjon/js/app.js') }}"></script>
    <script src="{{ asset('vendor/erjon/js/clipboard.min.js') }}"></script>
    @stack('scripts')
</body>
</html>
