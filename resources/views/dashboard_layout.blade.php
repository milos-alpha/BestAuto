<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link rel="stylesheet" href="{{asset('assets/font/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/sidebar.css')}}">
    @vite('resources/css/app.css')
    @vite('resources/css/navbar-styles.css')
    @stack('styles')
    @stack('scripts')
    <script type="text/javascript" src="{{asset('assets/js/sidebar.js')}}" defer></script>
</head>
<body class="flex h-screen gap-3 bg-secondary-bg">
   
    <x-dashboard.sidebar />

    <main class="w-full h-auto flex flex-col items-center gap-5 p-2 pt-0 lg:p-0 mb-3">
        <header class="container flex w-full justify-end pt-4">
            <nav class="">
                @if(Auth::check())
                    <x-profile_info />
                @endif
            </nav>  
        </header>
        
        <section class="container flex flex-col gap-5">
            @yield('content')
        </section>

    </main>
</body>
</html>

