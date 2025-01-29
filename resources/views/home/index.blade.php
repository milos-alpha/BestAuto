<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BestAuto - Premium Electric Cars</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="description" content="Premium electric cars with cutting-edge technology and eco-friendly design">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
 <!-- Featured Car Section -->
 <section class="col-span-12 md:col-span-8 rounded-3xl h-auto md:h-[80vh] relative overflow-hidden">
                <div 
                    class="absolute inset-0 rounded-3xl bg-cover bg-center"
                    style="background-image: url('{{ asset('images/toyota_car_in_night_time.png') }}')"
                    aria-hidden="true"
                ></div>
                <div class="relative z-10 p-8 h-full flex flex-col justify-between bg-black bg-opacity-65">
                    <div class="space-y-6">
                        <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white leading-tight">
                            Drive the Future<br>with Electric Cars
                        </h1>
                        <p class="text-gray-200 font-bold text-lg max-w-xl">
                            Discover the ultimate in efficiency and eco-friendliness. Our electric cars are designed to take you further.
                        </p>
                        <button class="inline-flex items-center bg-orange-500 hover:bg-orange-600 transition-colors px-8 py-3 rounded-full font-bold text-white">
                            Learn More
                            <svg class="ml-2 w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </button>
                    </div>

                    <!-- Car Specifications -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-8">
                        <div class="bg-black hover:bg-orange-500 transition-colors rounded  -2xl p-6 text-center">
                            <dt class="text-gray-300 text-sm mb-2">Battery Capacity</dt>
                            <dd class="font-bold text-xl text-white">100,000 mAh</dd>
                        </div>
                        <div class="bg-black hover:bg-orange-500 transition-colors rounded-2xl p-6 text-center">
                            <dt class="text-gray-300 text-sm mb-2">Top Speed</dt>
                            <dd class="font-bold text-xl text-white">375+ mph</dd>
                        </div>
                        <div class="bg-black hover:bg-orange-500 transition-colors rounded-2xl p-6 text-center">
                            <dt class="text-gray-300 text-sm mb-2">Per km Energy</dt>
                            <dd class="font-bold text-xl text-white">&lt; 2kWh</dd>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Contact/Info Section -->
            <section class="col-span-12 md:col-span-4 rounded-3xl relative">
                <div class="absolute inset-0 bg-gradient-to-b from-orange-400 to-orange-500 rounded-3xl"></div>
                <div 
                    class="absolute inset-0 rounded-3xl bg-cover bg-center opacity-70 mix-blend-multiply"
                    style="background-image: url('{{ asset('images/orange_background.png') }}')"
                    aria-hidden="true"
                ></div>

                <div class="relative z-10 p-8 h-full flex flex-col justify-between text-white">
                    <div class="space-y-6">
                        <h2 class="text-2xl font-bold">Seamless Website Experience</h2>
                        <div class="space-y-4">
                            <p>Browse our vehicle collection effortlessly. Find your perfect electric car with intuitive navigation.</p>
                            <p>Premium selection meets cutting-edge technology. Your ideal electric vehicle awaits.</p>
                            <p>Customer support available. Your satisfaction drives us.</p>
                        </div>
                    </div>

                    <form class="relative mt-6" aria-label="Contact Message">
                        <input 
                            type="text" 
                            placeholder="Send us a message" 
                            class="w-full bg-white bg-opacity-20 rounded-full py-3 px-6 text-white placeholder-white/75 focus:outline-none focus:ring-2 focus:ring-white/50"
                            aria-describedby="message-instructions"
                        >
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 flex space-x-4">
                            <button type="button" class="text-white hover:text-gray-200 transition-colors" aria-label="Like">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                            </button>
                            <button type="submit" class="text-white hover:text-gray-200 transition-colors" aria-label="Send Message">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-lienjoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </section>

    {{-- Our Products section --}}
    
    <section class="container flex flex-col gap-3">
        <h1 class="w-full text-center text-3xl text-primary font-custom font-bold">Our Products</h1>
        <p class="text-center text-secondary text-sm">Get the Hair and Wig of Your Latest Dreams</p>

        <div class="flex w-full items-center justify-between">
            <h2 class="text-primary text-2xl font-custom ">Featured</h2>
            <a href="" class="font-bold text-sm">SEE ALL</a>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-col-3 lg:grid-cols-3 xxl:grid-cols-4 gap-12">
            @if(isset($products))
                @foreach ($products as $product)
                    @php
                        $img = $product['image'];
                        $img_path = asset("storage/$img");
                    @endphp
                    <div class="flex flex-col h-auto gap-6 max-w-[350px] overflow-hidden">
                        <div style="background-image:url('{{$img_path}}')" class="transition-all duration-500 ease-in-out product_container bg-no-repeat bg-center bg-cover relative min-w-[100px] w-full h-[300px] overflow-hidden">
                            <form action="{{route('cart.add')}}" method="POST" class="w-full transition-all duration-900 ease-in-out absolute left-0 bottom-[-100%] bg-primary text-white flex items-center justify-center">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id}}">
                                <input type="hidden" name="quantity" value="1" min="1">
                                <x-button 
                                    class="btn-secondarybtn border-none w-full"
                                    text="ADD TO CART"
                                    type="submit"
                                />
                            </form>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold">{{ $product['name'] }}</h2>
                            <p>{{ $product['description'] }}</p>
                            <p>Price: {{ $product['price'] }}</p>
                            <p>Discount: {{ $product['discount']}}</p>
                            <p>Available Stock: {{$product['stock']}}</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>
    {{-- Guarantee --}}
    <section class="container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-16 mb-16">
        <div class="flex flex-col items-center justify-center gap-6 ">
            <div>
                <img src="https://ik.imagekit.io/vn49p9jmnnv7g/sober/ship_5G2tRm-g2DW.svg" alt="logo">
            </div>
            <span class="text-lg font-semibold">Skin care for everyone</span>
            <span class="text-center text-secondary">Suitable for every skin type, ensuring beautiful results for everyone</span>
        
        </div>
        <div class="flex flex-col items-center justify-center gap-6">
            <div>
                <img src="https://ik.imagekit.io/vn49p9jmnnv7g/sober/money_MsAc-03ScT.svg" alt="logo">
            </div>
            <span class="text-lg font-semibold">Money Back Guarantee</span>
            <span class="text-center text-secondary">Not satisfied? Return your purchase easily for a full refund, no questions asked.</span>
        </div>
        <div class="flex flex-col items-center justify-center gap-6">
            <div> <img src="https://ik.imagekit.io/vn49p9jmnnv7g/sober/technology_I_uE6rzlf.svg" alt="logo"> </div>
            <span class="text-lg font-semibold">24/7 Customer Service</span>
            <span class="text-center text-secondary">Our customer service team is here to help you anytime, day or night.</span>
        </div>
    </section>
    <div class="bg-black w-full">
        <x-footer />
    </div>
</body>
</html>
