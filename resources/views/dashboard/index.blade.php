@extends('dashboard_layout')

@push('scripts')
    <script type="text/javascript" src="{{asset('assets/js/product.js')}}" defer></script>
@endpush

@section('content')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log("DOM loaded");
            @if(session()->has('status'))
                console.log("{{ session('status') }}");
                showNotification('{{ session('message') }}', '{{session('status')}}');
                {{ session()->forget('status') }}
                {{ session()->forget('message') }}
            @endif
        });
    </script>

<div id="notification-container" class="relative w-full">
    <!-- Notifications will appear here -->
</div>
        
<div class="w-full flex justify-between items-center sm:items-start">
    <h2 class="text-3xl font-semibold text-primary">
        All Products
    </h2>
    <a href="{{route('product.create')}}" class="" >
        <x-button 
        class="btn-primarybtn bg-success-bg px-3 py-2 text-white" 
        text="Add Product" 
        icon="<i class='fas fa-plus'></i>"
        type="button"
        />
    </a>
</div>

<div class="w-full bg-white p-4 max-h-[75vh] overflow-auto">
    <table class="w-full table-auto">
        <thead class="text-left text-lg font-medium border-b border-border_clr  ">
        <tr>
            <th class="text-secondary text-[16px]">Product Image</th>
            <th class="text-secondary text-[16px]">Name</th>
            <th class="text-secondary text-[16px]">Prod ID</th>
            <th class="text-secondary text-[16px]">Description</th>
            <th class="text-secondary text-[16px]">Price</th>
            <th class="text-secondary text-[16px]">Stock</th>
            <th class="text-secondary text-[16px]">Discount</th>
            <th class="text-secondary text-[16px]">Type</th>
            <th class="text-secondary text-[16px]">Action</th>
        </tr>
        </thead>
        <tbody>
            @if(isset($products))
            @foreach ($products as $product)
                @php
                    $img = $product['image'];
                    $img_path = asset("assets/images/wigs/$img");
                @endphp
                <tr class="border-b-2 border-b-border_clr">
                    <td class="py-2">
                        <img src="{{asset('storage/'.$product->image)}}" alt="img" class="h-[70px] w-[70px] object-cover object-center">
                    </td>
                    <td>
                        <h2 class="font-semibold">{{$product->name}}</h2>
                    </td>
                    <td class="">
                        <span>{{$product->id}}</span>
                    </td>
                    <td class="">
                        <p class="text-sm text-secondary truncate">{{$product->description}}</p>
                    </td>
                    <td class="">
                        <p>$<span>{{$product->price}}</span></p>
                    </td>
                    <td class="">
                        <p>{{$product->stock}}</p>
                    </td>
                    <td class="">
                        <p><span>{{$product->discount}}</span>%</p>
                    </td>
                    <td class="">
                        <p>{{$product->sales_category_id}}</p>
                    </td>
                    <td class="text-xl text-secondary">
                        <i class="fas fa-ellipsis-h"></i>
                    </td>
                </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
@endsection
