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
    <!-- Navbar -->
    <x-navbar />

    <!-- Hero Section -->
    <section class="container mx-auto px-4 flex flex-col md:flex-row w-full gap-10 rounded-3xl h-auto md:h-[80vh] relative overflow-hidden my-8">
        <!-- Left Section: Featured Car -->
        <div class="flex h-full w-full md:w-[68%] rounded-3xl relative">
            <div 
                class="absolute inset-0 rounded-3xl bg-cover bg-center w-full"
                style="background-image: url('{{ asset('images/toyota_car_in_night_time.png') }}')"
                aria-hidden="true"
            ></div>
            <div class="relative p-8 w-full h-full flex flex-col justify-between bg-gradient-to-r from-black/80 to-black/40 rounded-3xl">
                <div class="space-y-6">
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white leading-tight">
                        Drive the Future<br>with Electric Cars
                    </h1>
                    <p class="text-gray-200 text-lg max-w-xl">
                        Discover the ultimate in efficiency and eco-friendliness. Our electric cars are designed to take you further.
                    </p>
                    <button class="inline-flex items-center bg-orange-500 hover:bg-orange-600 transition-colors px-8 py-3 rounded-full font-semibold text-white">
                        Learn More
                        <svg class="ml-2 w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </button>
                </div>

                <!-- Car Specifications -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-8">
                    <div class="bg-black/60 hover:bg-orange-500 transition-colors rounded-2xl p-6 text-center backdrop-blur-sm">
                        <dt class="text-gray-300 text-sm mb-2">Battery Capacity</dt>
                        <dd class="font-bold text-xl text-white">100 kWh</dd>
                    </div>
                    <div class="bg-black/60 hover:bg-orange-500 transition-colors rounded-2xl p-6 text-center backdrop-blur-sm">
                        <dt class="text-gray-300 text-sm mb-2">Top Speed</dt>
                        <dd class="font-bold text-xl text-white">200 mph</dd>
                    </div>
                    <div class="bg-black/60 hover:bg-orange-500 transition-colors rounded-2xl p-6 text-center backdrop-blur-sm">
                        <dt class="text-gray-300 text-sm mb-2">Energy Usage</dt>
                        <dd class="font-bold text-xl text-white">15 kWh/100km</dd>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Section: Contact -->
        <div class="w-full md:w-[32%] rounded-3xl relative">
            <div class="absolute inset-0 bg-gradient-to-b bg-cover bg-center from-orange-400 to-orange-600 rounded-3xl"
                style="background-image: url('{{ asset('images/orange_background.png') }}')"
            ></div>
            <div class="relative z-10 p-8 h-full flex flex-col justify-between bg-gradient-to-r from-orange-400/50 to-orange-600/40 rounded-3xl text-white">
                <div class="space-y-6">
                    <h2 class="text-2xl font-bold">Contact Us</h2>
                    <div class="space-y-4">
                        <p>Ready to embrace the future of driving? Get in touch with our team of experts today.</p>
                    </div>
                </div>

                <!-- Contact Form -->
                <form class="space-y-4 mt-6">
                    <div class="space-y-2">
                        <input 
                            type="text" 
                            placeholder="Your Name" 
                            class="w-full bg-white/20 rounded-lg py-3 px-4 text-white placeholder-white/75 focus:outline-none focus:ring-2 focus:ring-white/50"
                        >
                    </div>
                    <div class="space-y-2">
                        <input 
                            type="email" 
                            placeholder="Your Email" 
                            class="w-full bg-white/20 rounded-lg py-3 px-4 text-white placeholder-white/75 focus:outline-none focus:ring-2 focus:ring-white/50"
                        >
                    </div>
                    <div class="space-y-2">
                        <textarea 
                            placeholder="Your Message" 
                            rows="3"
                            class="w-full bg-white/20 rounded-lg py-3 px-4 text-white placeholder-white/75 focus:outline-none focus:ring-2 focus:ring-white/50"
                        ></textarea>
                    </div>
                    <button type="submit" class="w-full bg-white text-orange-500 hover:bg-orange-100 transition-colors rounded-lg py-3 font-semibold">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </section>
    <!-- Featured Products Section -->
    <section class="container mx-auto px-4 py-16">
        <div class="flex flex-col gap-8">
            <div class="flex justify-between items-center">
                <h2 class="text-3xl font-bold text-gray-900">Available Vehicles</h2>
                <a href="#" class="text-orange-500 hover:text-orange-600 font-semibold">View All Vehicles</a>
            </div>
            
            <!-- Product Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @if(isset($products) && $products->count() > 0)
                    @foreach ($products->take(4) as $product)
                        <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
                            <div class="relative">
                                <img 
                                    src="{{ asset('storage/' . $product->image) }}" 
                                    alt="{{ $product->name }}"
                                    class="w-full h-48 object-cover object-center"
                                >
                                <div class="absolute top-4 right-4">
                                    <span class="bg-orange-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                        New
                                    </span>
                                </div>
                            </div>
                            <div class="p-6 space-y-4">
                                <div class="space-y-2">
                                    <h3 class="text-xl font-semibold text-gray-900">{{ $product->name }}</h3>
                                    <p class="text-gray-500 line-clamp-2 text-sm">{{ Str::limit($product->description, 100) }}</p>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-2xl font-bold text-orange-500">${{ number_format($product->price, 2) }}</span>
                                    <button 
                                        onclick="openModal('{{ $product->name }}', '{{ $product->description }}')" 
                                        class="text-orange-500 hover:text-orange-600 text-sm font-semibold"
                                    >
                                        View Details
                                    </button>
                                </div>
                                <form action="{{ route('cart.add') }}" method="POST" class="pt-2">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white py-2 rounded-lg transition-colors duration-300 flex items-center justify-center gap-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                        </svg>
                                        Add to Cart
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="container mx-auto px-4 py-16 grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="flex flex-col items-center text-center">
            <div class="w-16 h-16 mb-6">
                <svg class="w-full h-full text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
            </div>
            <h3 class="text-xl font-semibold mb-4">Fast Charging</h3>
            <p class="text-gray-600">Charge your vehicle in minutes, not hours. Our advanced charging technology gets you back on the road quickly.</p>
        </div>
        
        <div class="flex flex-col items-center text-center">
            <div class="w-16 h-16 mb-6">
                <svg class="w-full h-full text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <h3 class="text-xl font-semibold mb-4">24/7 Support</h3>
            <p class="text-gray-600">Our customer service team is available around the clock to assist you with any questions or concerns.</p>
        </div>
        
        <div class="flex flex-col items-center text-center">
            <div class="w-16 h-16 mb-6">
                <svg class="w-full h-full text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            </div>
            <h3 class="text-xl font-semibold mb-4">Warranty Protected</h3>
            <p class="text-gray-600">Every vehicle comes with our comprehensive warranty coverage for your peace of mind.</p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <x-footer />
    </footer>
    <!-- Product Modal -->
    <div id="productModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" aria-hidden="true"></div>
        
        <div class="flex min-h-full items-center justify-center p-4">
            <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:w-full sm:max-w-lg">
                <div class="px-6 pt-6 pb-4">
                    <div class="flex items-start justify-between">
                        <h3 class="text-2xl font-semibold text-gray-900" id="modalTitle"></h3>
                        <button onclick="closeModal()" class="text-gray-400 hover:text-gray-500">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                    <div class="mt-4">
                        <p class="text-gray-600" id="modalDescription"></p>
                    </div>
                </div>
                <div class="bg-gray-50 px-6 py-4 flex justify-end">
                    <button onclick="closeModal()" class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition-colors duration-300">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

<script>
    function openModal(title, description) {
        const modal = document.getElementById('productModal');
        const modalTitle = document.getElementById('modalTitle');
        const modalDescription = document.getElementById('modalDescription');
        
        modalTitle.textContent = title;
        modalDescription.textContent = description;
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        const modal = document.getElementById('productModal');
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    // Close modal when clicking outside
    document.getElementById('productModal').addEventListener('click', function(event) {
        if (event.target === this) {
            closeModal();
        }
    });

    // Close modal on escape key press
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && !document.getElementById('productModal').classList.contains('hidden')) {
            closeModal();
        }
    });
</script>
</body>
</html>