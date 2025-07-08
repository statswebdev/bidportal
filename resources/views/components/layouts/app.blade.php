<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'MBS Bid Portal' }}</title>

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://bids.stats.gov.mv/" />
    <meta property="og:title" content="MBS Bid Portal" />
    <meta property="og:description" content="Bid portal of Maldives Bureau of Statistics" />
    <meta property="og:image" content="{{ asset('images/bpmetaimage.jpg') }}" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="https://bids.stats.gov.mv/" />
    <meta property="twitter:title" content="MBS Bid Portal" />
    <meta property="twitter:description" content="Bid portal of Maldives Bureau of Statistics" />
    <meta property="twitter:image" content="{{ asset('images/bpmetaimage.jpg') }}" />


    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Add these CSS/JS libraries in your head section -->
    <link rel="stylesheet" href="{{ asset('css/buttons.bootstrap5.min.css') }}">
    <script src="{{ asset('js/jspdf.umd.min.js') }}"></script>
    <script src="{{ asset('js/jspdf.plugin.autotable.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/buttons.bootstrap5.min.js') }}"></script>

</head>

<body>
    @if (Auth::user())
        <livewire:inc.navbar />
    @endif

    {{ $slot }}

    <livewire:inc.footer />

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/jquery.thaana.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/theme.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>


</body>

</html>
