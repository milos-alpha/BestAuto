@extends('layout')
@section('title', 'Login')

@section('content')

<section class="container h-[57.5vh]">
    <form action="{{route("user.signup")}}" method="post" class="w-full mx-auto md:min-w-[50%] md:max-w-[70%] lg:max-w-[50%] flex flex-col items-center h-auto gap-4 p-2 md:px-9 md:py-4">
        <h1 class="text-xl font-semibold">Login</h1>

        @if(session()->has('registration_success'))
            <p>{{session('registraton_success')}}</p>
        @endif
        @csrf
        <x-input type="email" name="email" label="Email" placeholder="User email" required/>

        <x-input type="password" name="password" label="Password" placeholder="Enter your password" required/>
        <x-button type="submit" name="submit" text="Login" class="w-full my-2 btn-secondarybtn"/>
        
        <p class="text-center">Don't have an account? <a href="{{route("user.register")}}" class="text-accent hover:underline">Create One</a></p>
    </form>
</section>
@endsection