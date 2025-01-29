@extends('dashboard_layout')
@section('title', 'Create Product')

<script type="text/javascript" src="{{ asset('assets/js/register.js') }}" defer></script>

@section('content')
    <form action="{{route("product.store")}}" method="post" class="mx-auto w-full md:min-w-[50%] md:max-w-[90%] lg:max-w-[90%] flex flex-col sm:flex-row items-start justify-center h-auto gap-4 p-2 md:py-4 border" enctype="multipart/form-data">
        <div class="flex w-full sm:min-w-[400px] sm:w-auto flex-col gap-4 items-center">
            <h1 class="text-xl font-semibold">Create Product</h1>
            @csrf
            <x-input type="text" name="name" label="Name" placeholder="Product name" required/>
    
            <x-text-area name="description" label="Description" placeholder="Product description" rows="4" cols="30"/>
            
            <x-input type="number" name="price" label="Price" placeholder="Product price: 0.00" step="0.01" required/>
            
            <x-input type="number" name="stock" label="Stock" placeholder="Product stock"/>

            <div class="w-full flex flex-col">
                <label for="category">Category</label>
                <select class="border-2 border-border_clr outline-none p-2 focus:border-accent transition-all bg-none ease-in-out duration-600" name="category" id="category">
                    <option value="1">Human Hair</option>
                    <option value="2">Virgin Hair</option>
                    <option value="3">Cap wig</option>
                </select>
            </div>
            
            <x-button type="submit" name="submit" text="Create Product" class="w-full my-2 btn-secondarybtn" />
        </div>

        <div class="w-[300px] h-[200px] sm:mt-12 flex items-center justify-center p-3">
            <label for="input-file" id="drop-area" class="w-full h-full flex items-center justify-center flex-col">  
                <input type="file" accept="image/*" name="image" id="input-file" hidden>
                <div class="border h-full flex flex-col gap-2 items-center justify-center w-full border-2-dashed border-border_clr bg-success rounded-sm bg-no-repeat bg-cover bg-center" id="img-view">
                    <i class="fas fa-cloud-upload text-success-bg text-3xl font-semibold"></i>
                    <p class="text-center text-sm text-secondary">Drag and drop or click here <br/> to upload a Product image</p>
                </div>
                @error('image')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </label>
        </div>
    </form>
@endsection