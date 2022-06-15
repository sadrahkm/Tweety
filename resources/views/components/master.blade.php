<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta
        name="csrf-token"
        content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script
        src="{{ asset('js/app.js') }}"
        defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Fonts -->
    <link
        rel="dns-prefetch"
        href="//fonts.gstatic.com">

    <!-- Styles -->
    <link
        href="{{ asset('css/main.css') }}"
        rel="stylesheet">
</head>
<body>
<div id="app">
    <section class="px-8 py-4 mb-6">
        <header class="container mx-auto">
            <h1>
                <img
                    src="/images/logo.svg"
                    alt="Tweety"
                >
            </h1>
        </header>
    </section>

    {{ $slot }}

</div>
</body>
</html>
