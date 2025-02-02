<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BestAuto - Premium Electric Cars</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="description" content="Premium electric cars with cutting-edge technology and eco-friendly design">
    <meta name="theme-color" content="#f97316">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <!-- Navbar -->
    <x-navbar />

    <!-- Hero Section -->
    <section class="relative">
        <div class="h-[70vh] relative">
            <div 
                class="absolute inset-0 bg-cover bg-center"
                style="background-image: url('{{ asset('images/toyota_car_in_night_time.png') }}')"
                aria-hidden="true"
            ></div>
            <div class="relative h-full flex items-center justify-center bg-gradient-to-r from-black/80 to-black/40">
                <div class="container mx-auto px-4 space-y-12">
                    <div class="text-center max-w-3xl mx-auto">
                        <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6">
                            Drive the Future<br>with Electric Cars
                        </h1>
                        <p class="text-gray-200 text-lg md:text-xl max-w-2xl mx-auto">
                            Discover the ultimate in efficiency and eco-friendliness. Our electric cars are designed to take you further.
                        </p>
                    </div>
                    
                    <div class="max-w-2xl mx-auto relative">
                        <form action="{{ route('home.search')}}" class="relative">
                            <input 
                                type="text" 
                                name="query" 
                                placeholder="Search vehicles by name, model, or type..." 
                                class="w-full p-4 pl-6 pr-16 bg-transparent rounded-full text-gray-700  backdrop-blur-sm border-2 border-orange-500 focus:border-orange-600 focus:ring-2 focus:ring-orange-500 focus:ring-opacity-50 outline-none transition-all"
                                aria-label="Search vehicles"
                            >
                            <button 
                                type="submit" 
                                class="absolute right-2 top-1/2 -translate-y-1/2 bg-orange-500 hover:bg-orange-600 p-3 rounded-full text-white transition-colors duration-200 focus:ring-2 focus:ring-offset-2 focus:ring-orange-500"
                                aria-label="Submit search"
                            >
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section class="container mx-auto px-4 py-16">
        <div class="space-y-8">
            <div class="flex justify-between items-center">
                <h2 class="text-3xl font-bold text-gray-900">
                    @if(isset($query))
                        Search Results for "{{ $query }}"
                    @else
                        Available Vehicles
                    @endif
                </h2>
            </div>
            
            <!-- Product Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6"> 
                @if($products->isEmpty())
                    <div class="col-span-full text-center py-12">
                        <div class="text-gray-500 space-y-4">
                            <i class="fa-solid fa-car-rear text-5xl"></i>
                            <p class="text-xl">No vehicles found.</p>
                            @if(isset($query))
                                <a href="{{ route('home') }}" class="text-orange-500 hover:text-orange-600 inline-block">
                                    View all vehicles
                                </a>
                            @endif
                        </div>
                    </div>
                @else
                    @foreach ($products as $product)
                        <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300">
                            <div class="relative group">
                                <img 
                                    src="{{ asset('storage/' . $product->image) }}" 
                                    alt="{{ $product->name }}"
                                    class="w-full h-48 object-cover object-center transition-transform duration-300 group-hover:scale-105"
                                    loading="lazy"
                                >
                                <div class="absolute top-4 right-4">
                                    <span class="bg-orange-500 text-white px-3 py-1 rounded-full text-sm font-semibold shadow-lg">
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
                                        class="text-orange-500 hover:text-orange-600 text-sm font-semibold transition-colors"
                                        aria-label="View details for {{ $product->name }}"
                                    >
                                        View Details
                                    </button>
                                </div>
                                <form action="{{ route('cart.add') }}" method="POST" class="pt-2">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button 
                                        type="submit" 
                                        class="w-full bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-lg transition-all duration-300 flex items-center justify-center gap-2 focus:ring-2 focus:ring-offset-2 focus:ring-orange-500"
                                    >
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

    <!-- Footer -->
    <footer class="bg-gray-900 text-white mt-auto">
        <x-footer />
    </footer>

    <!-- Product Modal -->
    <div id="productModal" class="fixed inset-0 z-50 hidden overflow-y-auto" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" aria-hidden="true"></div>
        
        <div class="flex min-h-full items-center justify-center p-4">
            <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:w-full sm:max-w-lg">
                <div class="px-6 pt-6 pb-4">
                    <div class="flex items-start justify-between">
                        <h3 class="text-2xl font-semibold text-gray-900" id="modalTitle"></h3>
                        <button 
                            onclick="closeModal()" 
                            class="text-gray-400 hover:text-gray-500 transition-colors"
                            aria-label="Close modal"
                        >
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
                    <button 
                        onclick="closeModal()" 
                        class="bg-orange-500 text-white px-6 py-2 rounded-lg hover:bg-orange-600 transition-all duration-300 focus:ring-2 focus:ring-offset-2 focus:ring-orange-500"
                    >
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