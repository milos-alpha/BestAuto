@extends('dashboard_layout')

@push('scripts')
    <script type="text/javascript" src="{{ asset('assets/js/product.js') }}" defer></script>
@endpush

@section('content')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log("DOM loaded");
            @if(session()->has('status'))
                console.log("{{ session('status') }}");
                showNotification('{{ session('message') }}', '{{ session('status') }}');
                {{ session()->forget('status') }}
                {{ session()->forget('message') }}
            @endif
        });
    </script>

    <!-- Notification Container -->
    <div id="notification-container" class="relative w-full">
        <!-- Notifications will appear here -->
    </div>

    <!-- Page Header and Add Product Button -->
    <div class="w-full flex justify-between items-center sm:items-start">
        <h2 class="text-3xl font-semibold text-primary">
            All Products
        </h2>
        <a href="{{ route('product.create') }}" class="">
            <x-button 
                class="btn-primarybtn bg-success-bg px-3 py-2 text-white" 
                text="Add Product" 
                icon="<i class='fas fa-plus'></i>"
                type="button"
            />
        </a>
    </div>

    <!-- Products Table -->
    <div class="w-full bg-white p-4 max-h-[75vh] overflow-auto">
        <table class="w-full table-auto">
            <thead class="text-left text-lg font-medium border-b border-border_clr">
                <tr>
                    <th class="text-secondary text-[16px]">Product Image</th>
                    <th class="text-secondary text-[16px]">Name</th>
                    <th class="text-secondary text-[16px]">Price</th>
                    <th class="text-secondary text-[16px]">Stock</th>
                    <th class="text-secondary text-[16px]">Category</th>
                    <th class="text-secondary text-[16px]">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($products) && $products->count() > 0)
                    @foreach ($products as $product)
                        <tr class="border-b-2 border-b-border_clr">
                            <!-- Product Image -->
                            <td class="py-2">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="h-[70px] w-[70px] object-cover object-center">
                                @else
                                    <div class="h-[70px] w-[70px] bg-gray-200 flex items-center justify-center">
                                        <i class="fas fa-image text-gray-400"></i>
                                    </div>
                                @endif
                            </td>

                            <!-- Product Name -->
                            <td>
                                <h2 class="font-semibold">{{ $product->name }}</h2>
                            </td>

                            <!-- Product Price -->
                            <td>
                                <p>$<span>{{ number_format($product->price, 2) }}</span></p>
                            </td>

                            <!-- Product Stock -->
                            <td>
                                <p>{{ $product->stock }}</p>
                            </td>

                            <!-- Product Category -->
                            <td>
                                <p>{{ ucfirst($product->category) }}</p>
                            </td>

                            <!-- Action Buttons -->
                            <td class="text-xl text-secondary">
                                <div class="flex items-center gap-2">
                                    <form action="{{ route('product.delete', $product->id) }} " method="POST" class="bg-red-500 text-[15px] font-bold p-3">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this product ?')">
                                            <i class="fa-solid fa-trash"></i> Delete Product
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8" class="text-center py-4 text-secondary">
                            No products found.
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>

        <!-- Pagination Links -->
    </div>
@endsection