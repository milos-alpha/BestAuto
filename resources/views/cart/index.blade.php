@extends('layout')

@section('content')

<div class="container min-h-[57.5vh] flex flex-col gap-8">
    <h1 class="text-2xl font-semibold text-center">Your Cart</h1>

    <div class="flex flex-col justify-center w-full h-full">
        @if(count($cart) > 0)
            @php
                $items = count($cart);
                $totalPrice = 0;
                $shippingPrice = 0; // Assuming shipping is free or calculated elsewhere
                $taxPrice = 0; // Assuming tax is calculated elsewhere
            @endphp

            <div class="w-full h-auto grid grid-cols-1 sm:grid-cols-3 gap-10">
                <table class="col-span-2 w-full">
                    <thead class="text-left text-lg font-medium border-b border-border_clr">
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $id => $product)
                            @php
                                $image = asset('storage/' . $product['image']);
                                $name = $product['name'];
                                $price = $product['price']; 
                                $quantity = $product['quantity'];
                                $description = $product['description'];
                                $subTotal = $price * $quantity;
                                $totalPrice += $subTotal;
                            @endphp
                            <tr>
                                <td>
                                    <div class="flex items-center gap-8 max-w-[300px]">
                                        <img src="{{$image}}" alt="{{ $name }}" class="h-auto w-[120px]">
                                        <div>
                                            <h2 class="font-semibold">{{ $name }}</h2>
                                            <p>$<span>{{ number_format($price, 2) }}</span></p>
                                            <p class="text-sm text-secondary">{{ $description }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="flex items-center gap-5 px-1">
                                        <!-- Decrease Quantity -->
                                        <form action="{{ route('cart.edit') }}" method="POST" class="flex items-center">
                                            @csrf
                                            <input type="hidden" name="action" value="minus">
                                            <input type="hidden" name="product_id" value="{{ $id }}">
                                            <button type="submit" class="px-2 py-1 border border-border_clr hover:opacity-80">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </form>

                                        <span>{{ $quantity }}</span>

                                        <!-- Increase Quantity -->
                                        <form action="{{ route('cart.edit') }}" method="POST" class="flex items-center">
                                            @csrf
                                            <input type="hidden" name="action" value="add">
                                            <input type="hidden" name="product_id" value="{{ $id }}">
                                            <button type="submit" class="px-2 py-1 border border-border_clr hover:opacity-80">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                                <td>$ {{ number_format($subTotal, 2) }}</td>
                                <td class="text-lg text-secondary">
                                    <!-- Remove Product -->
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $id }}">
                                        <button type="submit" class="px-2 py-1 text-sm hover:opacity-80">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Cart Summary -->
                <div class="flex flex-col w-full h-full bg-secondary-bg border-l-2 border-l-border_clr items-center justify-center px-4 gap-5">
                    <h2 class="text-2xl font-semibold">Cart Summary ({{ $items }}) Item{{ $items > 1 ? 's' : '' }}</h2>
                    <hr>

                    <!-- Shipping Price -->
                    <div class="w-full flex items-center justify-between">
                        <p>Shipping</p>
                        <p>{{ $shippingPrice == 0 ? 'Free' : '$' . number_format($shippingPrice, 2) }}</p>
                    </div>

                    <!-- Tax Price -->
                    <div class="w-full flex items-center justify-between">
                        <p>Tax</p>
                        <p>${{ number_format($taxPrice, 2) }}</p>
                    </div>

                    <!-- Subtotal -->
                    <div class="w-full flex items-center justify-between">
                        <p>Subtotal</p>
                        <p>${{ number_format($totalPrice, 2) }}</p>
                    </div>

                    <!-- Total Price -->
                    <hr class="border-none w-full h-[2px] bg-line_clr">

                    <!-- Total Amount -->
                    <div class="w-full flex items-center justify-between">
                        <p>TOTAL PRICE</p>
                        <p>${{ number_format($totalPrice + $taxPrice + $shippingPrice, 2) }}</p>
                    </div>

                    <!-- Checkout Button -->
                    <a href="{{ route('checkout') }}" class="w-full">
                        <button class="bg-orange-500 w-full p-3 font-bold hover:text-white">PROCEED TO CHECKOUT</button>
                    </a>

                    <!-- Continue Shopping Link -->
                    <a href="{{ route('home.index') }}" class="flex items-center mt-4 text-gray-600 hover:text-gray-800">
                        <i class="fas fa-caret-left"></i>    
                        <span> Continue Shopping </span>
                    </a>
                </div>  
            </div>

        @else
            <!-- Empty Cart Message -->
            <div class="w-full p-10 text-center bg-accent-light text-secondary text-lg">
                <p>Your cart is empty.</p>
            </div>
        @endif
    </div>
</div>

@endsection
