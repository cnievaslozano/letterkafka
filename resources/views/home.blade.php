<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Letter Kafka</title>

    <!-- Bladewindui -->
    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>



    <!-- Tailwind -->
    @vite('resources/css/app.css')


</head>

<body>
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold underline">
            Hello world!
        </h1>
        <x-bladewind::button>Save User</x-bladewind::button>
        <x-bladewind.empty-state message="You have not saved any gists to your GitHub account"
            heading="Create Gists Already" image="/assets/images/no-code.svg" button_label="Create Gist"
            onclick="alert('you clicked me')">
        </x-bladewind.empty-state>
    </div>

</body>
