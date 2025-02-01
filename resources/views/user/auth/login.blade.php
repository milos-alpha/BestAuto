@extends('layout')
@section('title', 'Login')

@section('content')

<section class="container h-[57.5vh]">
    <form action="{{route('user.signup')}}" method="post" class="w-full mx-auto md:min-w-[50%] md:max-w-[70%] lg:max-w-[50%] flex flex-col items-center h-auto gap-4 p-2 md:px-9 md:py-4">
        <h1 class="text-xl font-semibold">Login</h1>

        @if(session()->has('registration_success'))
            <p>{{session('registraton_success')}}</p>
        @endif
        @csrf
        <input type="email" name="email" label="Email" placeholder="User email" required class="border-2 w-full border-border_clr outline-none p-2 focus:border-accent transition-all bg-none ease-in-out duration-600"/>

        <input type="password" name="password" label="Password" placeholder="Enter your password" required class="border-2 w-full border-border_clr outline-none p-2 focus:border-accent transition-all bg-none ease-in-out duration-600"/>
        <button type="submit" name="submit" class="w-full my-2 bg-orange-500 p-3 font-bold hover:text-white">Login</button>
        
        <p class="text-center">Don't have an account? <a href="{{route('user.register')}}" class="text-accent hover:underline">Create One</a></p>
    </form>
</section>
    <!-- Footer -->
    <x-footer />
@endsection