<x-layout>
    <div class="max-w-3xl mx-auto">
        <!-- Page Header -->
        <div class="mb-8 animate-fadeIn">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-4xl font-bold gradient-text mb-2">Create New Product</h1>
                    <p class="text-slate-600">Add a new product to your catalog</p>
                </div>
                <button onclick="window.location.href='{{ route('product.list') }}'"
                    class="px-4 py-2 bg-slate-100 text-slate-700 font-semibold rounded-lg hover:bg-slate-200 transition-colors duration-150">
                    <svg class="w-5 h-5 inline-block mr-2 -mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to List
                </button>
            </div>
        </div>

        <!-- Create Product Form -->
        <div class="card">
            <form action="/product/create" method="POST" class="space-y-6">
                @csrf

                <!-- Product Name -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-slate-700 mb-2">
                        Product Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="name" name="name" required
                        class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-150 outline-none"
                        placeholder="Enter product name">
                </div>

                <!-- Price -->
                <div>
                    <label for="price" class="block text-sm font-semibold text-slate-700 mb-2">
                        Price <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500 font-semibold">$</span>
                        <input type="number" id="price" name="price" step="0.01" min="0" required
                            class="w-full pl-8 pr-4 py-3 rounded-lg border border-slate-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-150 outline-none"
                            placeholder="0.00">
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-semibold text-slate-700 mb-2">
                        Description
                    </label>
                    <textarea id="description" name="description" rows="4"
                        class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-150 outline-none resize-none"
                        placeholder="Enter product description"></textarea>
                </div>

                <!-- Image URL -->
                <div>
                    <label for="image" class="block text-sm font-semibold text-slate-700 mb-2">
                        Image URL
                    </label>
                    <input type="text" id="image" name="image"
                        class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-150 outline-none"
                        placeholder="https://example.com/image.jpg">
                    <p class="mt-2 text-sm text-slate-500">
                        <svg class="w-4 h-4 inline-block -mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Enter the full URL of the product image
                    </p>
                </div>

                <!-- Category -->
                <div>
                    <label for="category_id" class="block text-sm font-semibold text-slate-700 mb-2">
                        Category ID
                    </label>
                    <select id="category_id" name="category_id"
                        class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-150 outline-none">
                        <option value="">Select a category</option>
                        <option value="1">Category 1 - Laptops</option>
                        <option value="2">Category 2 - Smartphones</option>
                        <option value="3">Category 3 - TVs</option>
                        <option value="4">Category 4 - Audio</option>
                        <option value="5">Category 5 - Tablets</option>
                        <option value="6">Category 6 - Accessories</option>
                        <option value="7">Category 7 - Cameras</option>
                    </select>
                </div>

                <!-- Divider -->
                <div class="border-t border-slate-200 pt-6">
                    <!-- Action Buttons -->
                    <div class="flex items-center justify-end gap-3">
                        <button type="button" onclick="window.location.href='{{ route('product.list') }}'"
                            class="px-6 py-3 bg-slate-100 text-slate-700 font-semibold rounded-lg hover:bg-slate-200 transition-colors duration-150">
                            Cancel
                        </button>
                        <button type="reset"
                            class="px-6 py-3 bg-white border-2 border-slate-300 text-slate-700 font-semibold rounded-lg hover:bg-slate-50 transition-colors duration-150">
                            Reset
                        </button>
                        <button type="submit"
                            class="px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-lg shadow-md hover:from-blue-700 hover:to-purple-700 hover:shadow-lg transition-all duration-150">
                            <svg class="w-5 h-5 inline-block mr-2 -mt-1" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4"></path>
                            </svg>
                            Create Product
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Tips Card -->
        <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-semibold text-blue-900 mb-1">Tips for creating products</h3>
                    <ul class="text-sm text-blue-800 space-y-1">
                        <li>• Use clear and descriptive product names</li>
                        <li>• Provide accurate pricing information</li>
                        <li>• Add detailed descriptions to help customers</li>
                        <li>• Use high-quality image URLs (recommended size: 500x500px)</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-layout>