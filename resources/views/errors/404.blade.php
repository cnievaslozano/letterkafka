<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Letter Kafka</title>
    <link rel="shortcut icon" href="{{ asset('kafka-white.ico') }}" type="image/x-icon">

    <!-- Tailwind -->
    @vite('resources/css/app.css')
</head>

<body class="w-full h-full" style="background-color:#fcf5d5 ">
    <div class="flex justify-center items-center h-screen">
        <img style="width: 1000px" src="{{ asset('images/errors/404.webp') }}" alt="404 error" />
    </div>

</body>
