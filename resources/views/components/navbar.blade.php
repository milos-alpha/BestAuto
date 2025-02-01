<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BestAuto</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .logo-transition {
            transition: all 0.3s ease-in-out;
        }
        
        .nav-link {
            transition: all 0.2s ease-in-out;
        }
        
        .button-transition {
            transition: all 0.2s ease-in-out;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="container flex items-center justify-between py-4">
        <!-- Logo -->
        <a href="#" class="logo-transition text-2xl font-extrabold hover:text-orange-400">
            Best<span class="text-orange-400 hover:text-black">Auto</span>
        </a>

        <!-- Desktop Navigation Links -->
        <div class="hidden md:flex items-center space-x-6">
            <a id="{{ Route::is('home.index') ? 'active-link' : '' }}" href="{{ route('home.index') }}" class="nav-link text-gray-600 hover:text-orange-400 hover:underline font-extrabold">Home</a>
            <a href="/about" class="nav-link text-gray-600 hover:text-orange-400 hover:underline font-extrabold">About Us</a>
            <a href="/services" class="nav-link text-gray-600 hover:text-orange-400 hover:underline font-extrabold">Services</a>
            <a href="/contact" class="nav-link text-gray-600 hover:text-orange-400 hover:underline font-extrabold">Electric Car</a>
        </div>

        <!-- Cart and User Actions -->
        <div class="flex items-center space-x-4">
            <!-- Cart Button -->
            <a href="{{ route('cart.index') }}" class="relative">
                <x-button
                    type="button"
                    title="Cart"
                    class="bg-transparent text-black min-w-[20px] min-h-[20px] w-[40px] h-[40px] hover:bg-orange-400 rounded-full"
                    icon="<i class='fas fa-shopping-cart'></i>"
                />
                <span class="absolute h-5 w-5 flex items-center justify-center p-[2px] rounded-full bg-black text-white text-xs font-light -right-1 -top-1">
                    {{ session('cart') ? count(session('cart')) : 0 }}
                </span>
            </a>

            <!-- User Actions -->
            <div class="flex items-center space-x-2">
                @if(Auth::check())
                    <x-profile_info />
                @else
                    <a href="{{ route('user.login') }}">
                    <button class="bg-transparent font-bold p-3 hover:text-white text-black min-w-fit hover:bg-orange-400 w-[90px]">Login</button>
                    </a>
                    <span class="hidden md:block w-[1px] h-6 bg-slate-200"></span>
                    <a href="{{ route('user.register') }}">
                        <button class="bg-transparent font-bold p-3 hover:text-white text-black min-w-fit hover:bg-orange-400 w-[90px]">Join Us</button>
                    </a>
                @endif
            </div>
        </div>

        <!-- Mobile Menu Button (Optional) -->
        <button class="md:hidden p-2 focus:outline-none" aria-label="Toggle Menu">
            <i class="fas fa-bars text-2xl"></i>
        </button>
    </nav>

    <!-- Mobile Navigation Links (Hidden by Default) -->
    <div id="mobile-menu" class="hidden md:hidden bg-gray-100 p-4">
        <a href="{{ route('home.index') }}" class="block nav-link text-gray-600 hover:text-orange-400 hover:underline font-extrabold py-2">Home</a>
        <a href="/about" class="block nav-link text-gray-600 hover:text-orange-400 hover:underline font-extrabold py-2">About Us</a>
        <a href="/services" class="block nav-link text-gray-600 hover:text-orange-400 hover:underline font-extrabold py-2">Services</a>
        <a href="/contact" class="block nav-link text-gray-600 hover:text-orange-400 hover:underline font-extrabold py-2">Electric Car</a>
    </div>

    <!-- Script for Mobile Menu Toggle -->
    <script>
        document.querySelector('button[aria-label="Toggle Menu"]').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>