<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="Constraal is building the intelligence layer for the future home — reliable, safe, and scalable systems for home environments and industrial automation.">
    <title>@yield('title', 'Constraal') — Intelligent Systems</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/constraal_favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/constraal_favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="text-slate-900 font-sans antialiased">
    @include('partials.header')

    <main>
        <!-- Page Hero (optional) -->
        @hasSection('page_header')
        @yield('page_header')
        @endif

        <!-- Main Content -->
        @yield('content')
    </main>

    @include('partials.footer')
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>