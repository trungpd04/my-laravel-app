@extends('layout.admin.layout')
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="mb-4 animated fadeIn">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="display-4 font-weight-bold mb-2">Create New Product</h1>
                    <p class="text-muted">Add a new product to your catalog</p>
                </div>
                <button onclick="window.location.href='{{ route('admin.product.list') }}'"
                    class="btn btn-secondary">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to List
                </button>
            </div>
        </div>

        <!-- Create Product Form -->
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.product.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle mr-2"></i>
                                <span>{{ session('success') }}</span>
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <!-- Error Messages -->
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <div class="d-flex align-items-start">
                                <i class="fas fa-exclamation-circle mr-2 mt-1"></i>
                                <div>
                                    <strong>Please fix the following errors:</strong>
                                    <ul class="mb-0 mt-2">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <!-- Product Name -->
                    <div class="form-group">
                        <label for="name" class="font-weight-semibold">
                            Product Name <span class="text-danger">*</span>
                        </label>
                        <input type="text" id="name" name="name" required value="{{ old('name') }}"
                            class="form-control" placeholder="Enter product name">
                    </div>

                    <!-- Price -->
                    <div class="form-group">
                        <label for="price" class="font-weight-semibold">
                            Price <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                            </div>
                            <input type="number" id="price" name="price" step="0.01" min="0" required value="{{ old('price') }}"
                                class="form-control" placeholder="0.00">
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <label for="description" class="font-weight-semibold">
                            Description
                        </label>
                        <textarea id="description" name="description" rows="4"
                            class="form-control" placeholder="Enter product description">{{ old('description') }}</textarea>
                    </div>

                    <!-- Product Image Upload -->
                    <div class="form-group">
                        <label for="image" class="font-weight-semibold">
                            Product Image
                        </label>
                        <div class="custom-file">
                            <input type="file" id="image" name="image" accept="image/*"
                                class="custom-file-input" onchange="previewImage(event)">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                        <small class="form-text text-muted">
                            <i class="fas fa-info-circle"></i>
                            Supported formats: JPEG, PNG, JPG, GIF, SVG (Max size: 2MB)
                        </small>
                        <!-- Image Preview -->
                        <div id="imagePreview" class="mt-3" style="display: none;">
                            <strong class="d-block mb-2">Preview:</strong>
                            <img id="preview" src="" alt="Image preview"
                                class="img-thumbnail" style="max-width: 300px;">
                        </div>
                    </div>

                    <!-- Category -->
                    <div class="form-group">
                        <label for="category_id" class="font-weight-semibold">
                            Category ID
                        </label>
                        <select id="category_id" name="category_id" class="form-control">
                            <option value="">Select a category</option>
                            <option value="1" {{ old('category_id') == '1' ? 'selected' : '' }}>Category 1 - Laptops</option>
                            <option value="2" {{ old('category_id') == '2' ? 'selected' : '' }}>Category 2 - Smartphones</option>
                            <option value="3" {{ old('category_id') == '3' ? 'selected' : '' }}>Category 3 - TVs</option>
                            <option value="4" {{ old('category_id') == '4' ? 'selected' : '' }}>Category 4 - Audio</option>
                            <option value="5" {{ old('category_id') == '5' ? 'selected' : '' }}>Category 5 - Tablets</option>
                            <option value="6" {{ old('category_id') == '6' ? 'selected' : '' }}>Category 6 - Accessories</option>
                            <option value="7" {{ old('category_id') == '7' ? 'selected' : '' }}>Category 7 - Cameras</option>
                        </select>
                    </div>

                    <!-- Divider -->
                    <hr class="my-4">

                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-end">
                        <button type="button" onclick="window.location.href='{{ route('admin.product.list') }}'"
                            class="btn btn-secondary mr-2">
                            <i class="fas fa-times mr-1"></i>
                            Cancel
                        </button>
                        <button type="reset" class="btn btn-outline-secondary mr-2">
                            <i class="fas fa-undo mr-1"></i>
                            Reset
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-plus mr-1"></i>
                            Create Product
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tips Card -->
        <div class="alert alert-info mt-4" role="alert">
            <div class="d-flex">
                <div class="mr-3">
                    <i class="fas fa-info-circle fa-2x"></i>
                </div>
                <div>
                    <h5 class="alert-heading">Tips for creating products</h5>
                    <ul class="mb-0 pl-3">
                        <li>Use clear and descriptive product names</li>
                        <li>Provide accurate pricing information</li>
                        <li>Add detailed descriptions to help customers</li>
                        <li>Upload high-quality images (recommended size: 500x500px or larger)</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Update file input label when file is selected
        document.querySelector('.custom-file-input').addEventListener('change', function(e) {
            var fileName = e.target.files[0]?.name || 'Choose file';
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });

        function previewImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('preview');
            const previewContainer = document.getElementById('imagePreview');

            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                    previewContainer.style.display = 'block';
                }

                reader.readAsDataURL(file);
            } else {
                previewContainer.style.display = 'none';
            }
        }
    </script>
@endsection
