@extends('layout')

@section('content')

<div class="container min-h-[57.5vh] flex flex-col gap-8">
    <h1 class="text-2xl font-semibold text-center">Your Cart</h1>

    <div class="flex flex-col justify-center w-full h-full">
        @if(count($cart) > 0)
        @php
            $items = count($cart);
            $totalPrice = 0;
            $shippingPrice = 0;
            $taxPrice = 0
        @endphp
        <div class="w-full h-auto grid grid-cols-1 sm:grid-cols-3 gap-10">
            <table class="col-span-2">
                <thead class="text-left text-lg font-medium border-b border-border_clr  ">
                  <tr>
                    <th class="">Product</th>
                    <th class="">Quantity</th>
                    <th class="">Total</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($cart as $id => $product)
                        @php
                            $image = asset('storage/'.$product['image']);
                            $name = $product['name'];
                            $price = number_format($product['price']);
                            $quantity = number_format($product['quantity']);
                            $description = $product['description'];
                            $subTotal = $price * $quantity;
                            $totalPrice += $subTotal;    
                        @endphp
                    <tr>
                        <td>
                            <div class="flex items-center gap-8 max-w-[300]">
                                <img src="{{$image}}" alt="img" class="h-auto w-[120px]">
                                <div>
                                    <h2 class="font-semibold ">{{$name}}</h2>
                                    <p>$<span>{{$price}}</span></p>
                                    <p class="text-sm text-secondary">{{$description}}</p>
                                </div>
                            </div>
                        </td>
                        <td class="">
                            <div class="flex items-center gap-5 px-1">
                                <form action="{{route('cart.edit')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="minus">
                                    <button type="submit" class="px-2 py-1 border border-border_clr hover:opacity-80">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </form>
                                <span>{{$quantity}}</span>
                                <form action="{{route('cart.edit')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="add">
                                    <button type="submit" class="px-2 py-1 border border-border_clr hover:opacity-80">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                        <td class="">
                           ${{$subTotal}}
                        </td>
                        <td class="text-lg text-secondary">
                            <form action="{{route('cart.remove')}}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$id}}">
                                <button type="submit" class="px-2 py-1 text-sm hover:opacity-80">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                  
                </tbody>
              </table>


              <div class="flex flex-col w-full h-full bg-seconday-bg border-l-2 border-l-border_clr items-center justify-center px-4 gap-5">
                    <h2 class="text-2xl font-semibold">Cart Summary ({{$items}}) Item{{$items > 1 ? 's' : ''}}</h2>
                    <hr>

                    <div class="w-full flex items-center justify-between">
                        <p>Shipping</p>
                        <p>{{$shippingPrice == 0 ? 'Free': '$'.$shippingPrice}}</p>
                    </div>
                    <div class="w-full flex items-center justify-between">
                        <p>Tax</p>
                        <p>${{$taxPrice}}</p>
                    </div>
                    <div class="w-full flex items-center justify-between">
                        <p>Subtotal</p>
                        <p>${{$totalPrice}}</p>
                    </div>

                    <hr class="border-none w-full h-[2px] bg-line_clr">

                    <div class="w-full flex items-center justify-between">
                        <p>TOTAL PRICE</p>
                        <p>${{$totalPrice + $taxPrice + $shippingPrice}}</p>
                    </div>

                    <a href="" class="w-full">
                        <x-button 
                            text="PROCEED TO CHECKOUT"
                            class="btn-secondarybtn w-full"
                        />
                    </a>
                    <a href="{{route('home.index')}}">
                        <i class="fas fa-caret-left"></i>    
                        <span> Continue Shopping </span>
                    </a>
                </div>  
            </div>

        @else
        <div class="w-full p-10 text-center bg-accent-light text-secondary text-lg">
            <p>Your cart is empty.</p>
        </div>
        @endif
    </div>
</div>
@endsection