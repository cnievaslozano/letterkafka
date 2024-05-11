<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Letter Kafka</title>
    <link rel="shortcut icon" href="{{ asset('kafka-white.ico') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital@0;1&family=Playfair+Display+SC:wght@900&family=Playfair+Display:ital,wght@0,800;1,800&family=Manrope:wght@800&display=swap"
        rel="stylesheet">


    <!-- Bladewindui -->
    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>

    <!-- Tailwind -->
    @vite('resources/css/app.css')

    <!-- CSS -->
    @vite('resources/css/main.css')
    @vite('resources/css/colors.css')


</head>

<body>
    <div class="main__wrapper">
            {{ $slot }}
        <x-kafka.footer />
    </div>
</body>
