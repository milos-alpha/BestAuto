<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BestAuto</title>
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
<nav class="container flex items-center justify-between mb-8">
    <div id="navbar" class="flex items-center space-x-6">
        <a href="#" class="logo-transition text-2xl font-extrabold hover:text-orange-400 hover:text-4xl">
            Best<span class="text-orange-400 hover:text-black">Auto</span>
        </a>
        <div class="space-x-6">
            <a id="{{Route::is('home.index') ? 'active-link': ''}}" href="{{route('home.index')}}" class="nav-link text-gray-600 hover:text-orange-400 hover:underline font-extrabold">Home</a>
            <a href="/about" class="nav-link text-gray-600 hover:text-orange-400 hover:underline font-extrabold">About Us</a>
            <a href="/services" class="nav-link text-gray-600 hover:text-orange-400 hover:underline font-extrabold">Services</a>
            <a href="/contact" class="nav-link text-gray-600 hover:text-orange-400 hover:underline font-extrabold">Electric Car</a>
        </div>
    </div>
    <a href="{{route('cart.index')}}" class="relative">
        <x-button
            type="button"
            title='cart'
            class="bg-transparent text-black min-w-[20px] min-h-[20px] w-[40px] h-[40px] hover:hover:bg-orange-400 rounded-full"
            icon="<i class='fas fa-shopping-cart'></i>"
        />
        <span class="absolute h-5 w-5 flex items-center justify-center p-[2px] rounded-full bg-black text-white text-xs font-light -right-1 -top-1">
            {{ session('cart') ? count(session('cart')) : 0 }}
        </span>
    </a>
            <div class="flex flex-col ml-1 md:flex-row md:gap-[2px] items-center">
                @if(Auth::check())
                    <x-profile_info />
                @else
                    <a href="{{route('user.login')}}">
                        <x-button
                            type="button"
                            text="Login"
                            class="bg-transparent text-black min-w-fit hover:bg-accent-light w-[90px]"
                        />
                    </a>
                    <hr class="w-0 md:w-[1px] md:h-8 border-none bg-slate-200">
                    <a href="{{route('user.register')}}">
                        <x-button
                            type="button"
                            text="Join Us"
                            class="bg-transparent text-black min-w-fit hover:bg-accent-light w-[90px]"
                        />
                    </a>
                @endif
            </div>
        </div>

        <a class="relative md:hidden" href="" class="relative">
            <x-button
                type="button"
                title='cart'
                class="bg-transparent text-black min-w-[20px] min-h-[20px] w-[40px] h-[40px] hover:bg-accent-light rounded-full"
                icon="<i class='fas fa-shopping-cart'></i>"
            />
            <span class="absolute h-5 w-5 flex items-center justify-center p-[2px] rounded-full bg-black text-white text-xs font-light -right-1 -top-1">
                0
            </span>
        </a>
    </nav>
</body>
</html>