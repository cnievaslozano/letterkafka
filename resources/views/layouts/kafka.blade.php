<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Letter Kafka</title>
    <link rel="shortcut icon" href="{{ asset('kafka-white.ico') }}" type="image/x-icon">

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
    <!-- Contenido de la página -->
    <div class="home-container">
        {{ $slot }}
    </div>
</body>