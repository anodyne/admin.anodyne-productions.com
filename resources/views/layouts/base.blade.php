<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#f99c26">
        <meta name="msapplication-TileColor" content="#130f32">
        <meta name="theme-color" content="#ffffff">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @livewireStyles

        <!-- Scripts -->
        <script defer src="https://unpkg.com/@alpinejs/ui@3.10.5-beta.8/dist/cdn.min.js"></script>
        <script defer src="{{ asset('js/app.js') }}"></script>

        @if ($hasAppearanceModes)
            <script>
                if (localStorage.mode === 'dark' || (!('mode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                    document.documentElement.classList.add('dark')
                } else {
                    document.documentElement.classList.remove('dark')
                }
            </script>
        @endif
    </head>
    <body class="font-sans {{ $textColor }} antialiased {{ $bgColor }}">
        {{ $slot }}

        @livewireScripts
        <script>
            window.addEventListener('refresh-page', event => {
                window.location.reload(false);
            });
        </script>
    </body>
</html>
