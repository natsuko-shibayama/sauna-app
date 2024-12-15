<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" href="{{ asset('storage/images/icons8-サウナ-100.png') }}" type="image/png">
        {{-- <link src="https://www.google.com/maps/embed/v1/place?key={{ config('services.google_maps.api_key') }}&q={{ urlencode($saunaFacility->address) }}"> --}}


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol:wght@400;500;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/user.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-white">

            {{-- ヘッダーをここに直書きしてもいいけど、見にくいのでコンポーネント化してincludeで読み込んでます --}}
            @include('components.user.header')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
