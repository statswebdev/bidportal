<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>

        <link rel="stylesheet" href="{{asset('css/feather.css')}}">
        <link rel="stylesheet" href="{{asset('css/theme.min.css')}}">

    </head>
    <body>
        @if (Auth::user())
            <livewire:inc.navbar />
        @endif

        {{ $slot }}

        <livewire:inc.footer />

        <script src="{{asset('js/popper.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/theme.min.js')}}"></script>

    </body>
</html>
