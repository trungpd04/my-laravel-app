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
            <form action="/product/create" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Success Message -->
                @if(session('success'))
                    <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            <p class="text-sm text-green-800">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                <!-- Error Messages -->
                @if($errors->any())
                    <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-red-600 mr-2 mt-0.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            <div>
                                <p class="text-sm font-semibold text-red-800 mb-1">Please fix the following errors:</p>
                                <ul class="text-sm text-red-700 list-disc list-inside">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Product Name -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-slate-700 mb-2">
                        Product Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="name" name="name" required value="{{ old('name') }}"
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
                            value="{{ old('price') }}"
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
                        placeholder="Enter product description">{{ old('description') }}</textarea>
                </div>

                <!-- Product Image Upload -->
                <div>
                    <label for="image" class="block text-sm font-semibold text-slate-700 mb-2">
                        Product Image
                    </label>
                    <div class="space-y-3">
                        <input type="file" id="image" name="image" accept="image/*"
                            class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-150 outline-none file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                            onchange="previewImage(event)">
                        <p class="text-sm text-slate-500">
                            <svg class="w-4 h-4 inline-block -mt-1" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Supported formats: JPEG, PNG, JPG, GIF, SVG (Max size: 2MB)
                        </p>
                        <!-- Image Preview -->
                        <div id="imagePreview" class="hidden mt-3">
                            <p class="text-sm font-semibold text-slate-700 mb-2">Preview:</p>
                            <img id="preview" src="" alt="Image preview"
                                class="max-w-xs rounded-lg border border-slate-300 shadow-sm">
                        </div>
                    </div>
                </div>

                <!-- Category -->
                <div>
                    <label for="category_id" class="block text-sm font-semibold text-slate-700 mb-2">
                        Category ID
                    </label>
                    <select id="category_id" name="category_id"
                        class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-150 outline-none">
                        <option value="">Select a category</option>
                        <option value="1" {{ old('category_id') == '1' ? 'selected' : '' }}>Category 1 - Laptops</option>
                        <option value="2" {{ old('category_id') == '2' ? 'selected' : '' }}>Category 2 - Smartphones
                        </option>
                        <option value="3" {{ old('category_id') == '3' ? 'selected' : '' }}>Category 3 - TVs</option>
                        <option value="4" {{ old('category_id') == '4' ? 'selected' : '' }}>Category 4 - Audio</option>
                        <option value="5" {{ old('category_id') == '5' ? 'selected' : '' }}>Category 5 - Tablets</option>
                        <option value="6" {{ old('category_id') == '6' ? 'selected' : '' }}>Category 6 - Accessories
                        </option>
                        <option value="7" {{ old('category_id') == '7' ? 'selected' : '' }}>Category 7 - Cameras</option>
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
                        <li>• Upload high-quality images (recommended size: 500x500px or larger)</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('preview');
            const previewContainer = document.getElementById('imagePreview');

            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                }

                reader.readAsDataURL(file);
            } else {
                previewContainer.classList.add('hidden');
            }
        }
    </script>
</x-layout>