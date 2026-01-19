<x-layout>
    <!-- Page Header -->
    <div class="mb-8 animate-fadeIn">
        <h1 class="text-4xl font-bold gradient-text mb-2">Product List</h1>
        <p class="text-slate-600">Browse our amazing collection of products</p>
    </div>

    <!-- Product Grid -->
    <div class="product-grid">
        @foreach ($products as $product)
            <div class="card product-card group">
                <!-- Product Image -->
                <div class="product-image-wrapper mb-4 overflow-hidden rounded-lg bg-slate-100">
                    @if($product->image)
                        <img src="{{ $product->image }}" 
                             alt="{{ $product->name }}" 
                             loading="lazy"
                             class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 flex items-center justify-center text-slate-400">
                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif
                </div>

                <!-- Product Info -->
                <div class="product-info">
                    <div class="flex items-start justify-between mb-2">
                        <h2 class="text-xl font-bold text-slate-800 transition-colors duration-150 group-hover:text-blue-600">
                            {{ $product->name }}
                        </h2>
                        @if($product->category_id)
                            <span class="badge text-xs">Cat {{ $product->category_id }}</span>
                        @endif
                    </div>
                    
                    <p class="text-2xl font-bold text-blue-600 mb-3">
                        ${{ number_format($product->price, 2) }}
                    </p>
                    
                    @if($product->description)
                        <p class="text-slate-600 text-sm mb-4 line-clamp-2">
                            {{ $product->description }}
                        </p>
                    @endif
                    
                    <!-- Action Buttons -->
                    <div class="flex gap-2 mt-4">
                        <button onclick="window.location.href='/product/{{ $product->id }}'" class="flex-1 px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white text-sm font-semibold rounded-lg shadow-md hover:from-blue-700 hover:to-purple-700 hover:shadow-lg transition-shadow duration-150">
                            View Details
                        </button>
                        <button class="px-4 py-2 bg-slate-100 text-slate-700 text-sm font-semibold rounded-lg hover:bg-slate-200 transition-colors duration-150">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if($products->isEmpty())
        <div class="text-center py-12">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-100 mb-4">
                <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-slate-800 mb-2">No Products Found</h3>
            <p class="text-slate-600">There are no products available at the moment.</p>
        </div>
    @endif
</x-layout>