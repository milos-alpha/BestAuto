<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Opulence')</title>
    <link rel="stylesheet" href="{{asset('assets/font/css/all.css')}}">
    @vite('resources/css/app.css')
    @vite('resources/css/navbar-styles.css')
    @stack('styles')
    @stack('scripts')
</head>
<body class="flex h-screen flex-col items-center">
    <x-navbar/>
    <main class="w-full h-auto flex flex-col items-center gap-20 p-2 pt-0 lg:p-0 mb-3">
        @yield('content')
    </main>
</body>
</html>

