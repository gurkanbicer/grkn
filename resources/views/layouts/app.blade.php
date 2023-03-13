<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('pageTitle', env('APP_NAME'))</title>
    <meta name="description" content="@yield('pageDescription')">
    <meta name="robots" content="@yield('pageRobots', 'index,follow')"/>
    <meta name="keywords" content="@yield('pageKeywords')"/>
    <meta property="og:title" content="@yield('pageTitle')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="@yield('pageUrl', url()->current())">
    <meta property="og:description" content="@yield('pageDescription')">
    <meta property="og:image" content="{{ asset('who.jpg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    @vite(['resources/css/app.scss'])
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
</head>
<body class="d-flex flex-column align-items-center justify-content-center position-relative
@if(request()->routeIs('home')) vh-100 @endif bg-light">
    <main class="flex-shrink-0">
        @yield('content')
    </main>
    @vite(['resources/js/app.js'])
</body>
</html>
