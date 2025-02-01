@extends('layout')

@section('title', 'Register')
<script type="text/javascript" src="{{ asset('assets/js/register.js') }}" defer></script>

@section('content')

<section class="container">
    <form action="{{route("user.store")}}" method="post" class="mx-auto w-full md:min-w-[50%] md:max-w-[90%] lg:max-w-[90%] flex flex-col-reverse items-center sm:items-start sm:flex-row justify-center h-auto gap-4 p-2 md:px-9 md:py-4" enctype="multipart/form-data">
        @csrf
        <div class="flex w-full sm:w-auto flex-col gap-4 items-center">
            <h1 class="text-xl font-semibold">Join Us Now</h1>
            
            <input class="border-2 w-full border-border_clr outline-none p-2 focus:border-accent transition-all bg-none ease-in-out duration-600" type="text" name="name" label="Full Name" placeholder="User name" required/>
            <input class="border-2 w-full border-border_clr outline-none p-2 focus:border-accent transition-all bg-none ease-in-out duration-600" type="email" name="email" label="Email" placeholder="User email" required/>
    
            <div class="flex flex-col sm:flex-row gap-8 w-full items-center justify-between">
                <input class="border-2 w-full border-border_clr outline-none p-2 focus:border-accent transition-all bg-none ease-in-out duration-600" type="password" name="password" label="Password" placeholder="Enter your password" required/>
                <input class="border-2 w-full border-border_clr outline-none p-2 focus:border-accent transition-all bg-none ease-in-out duration-600" type="password" name="password_confirmation" label="Confirm password" placeholder="confirm your password" required/>
            </div>
    
            <div class="flex flex-col sm:flex-row gap-8 w-full items-center justify-between">
                <input class="border-2 w-full border-border_clr outline-none p-2 focus:border-accent transition-all bg-none ease-in-out duration-600" type="text" name="address" label="Address" placeholder="Enter your address" required/>
                <div class="w-full flex flex-col">
                    <label for="gender">Gender</label>
                    <select class="border-2 border-border_clr outline-none p-2 focus:border-accent transition-all ease-in-out duration-600" name="gender" id="gender">
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                    </select>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-8 w-full items-center justify-between">
                <input class="border-2 w-full border-border_clr outline-none p-2 focus:border-accent transition-all bg-none ease-in-out duration-600" type="text" name="phone" label="phone" placeholder="Enter phone number" required/>
                <input class="border-2 w-full border-border_clr outline-none p-2 focus:border-accent transition-all bg-none ease-in-out duration-600" type="date" name="dob" max="{{ date('Y-m-d') }}" label="Date of Birth" required/>
            </div>

            <button type="submit" name="submit" class="w-full my-2 btn-secondarybtn">Create User</button>
            <p class="text-center">Already have an account? <a href="{{route("user.login")}}" class="text-accent hover:underline">Login</a></p>
        </div>

        <div class="w-[300px] h-[200px] flex items-center justify-center p-3">
            <label for="input-file" id="drop-area" class="w-full h-full flex items-center justify-center flex-col">  
                <input type="file" accept="image/*" name="profile_image" id="input-file" hidden>
                <div class="border h-full flex flex-col gap-2 items-center justify-center w-full border-2-dashed border-border_clr bg-success rounded-sm bg-no-repeat bg-cover bg-center" id="img-view">
                    <i class="fas fa-cloud-upload text-success-bg text-3xl font-semibold"></i>
                    <p class="text-center text-sm text-secondary">Drag and drop or click here <br/> to upload image</p>
                </div>
                @error('profile_image')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </label>
        </div>
    </form>
</section>
@endsection