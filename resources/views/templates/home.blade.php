<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="data:,">

    <title></title>
    @livewireStyles
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <livewire:nav-bar/>
    <livewire:home-blogs/>
    <livewire:footer/>

@livewireScripts
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
</body>
</html>
