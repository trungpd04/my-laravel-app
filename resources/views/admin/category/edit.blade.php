@extends('layout.admin.layout')
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="mb-4 animated fadeIn">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="display-4 font-weight-bold mb-2">Edit Category</h1>
                    <p class="text-muted">Update category information</p>
                </div>
                <button onclick="window.location.href='{{ route('admin.category.index') }}'" class="btn btn-secondary">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to List
                </button>
            </div>
        </div>

        <!-- Edit Category Form -->
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.category.update', $category->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $category->id }}">
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

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                <span>{{ session('error') }}</span>
                            </div>
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
                                </button>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                    @endif

                        <!-- Category Name -->
                        <div class="form-group">
                            <label for="name" class="font-weight-semibold">
                                Category Name <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="name" name="name" required value="{{ old('name', $category->name) }}"
                                class="form-control" placeholder="Enter category name">
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <label for="description" class="font-weight-semibold">
                                Description
                            </label>
                            <textarea id="description" name="description" rows="4" class="form-control"
                                placeholder="Enter category description">{{ old('description', $category->description) }}</textarea>
                        </div>

                        <!-- Current Image Display -->
                        @if($category->image)
                            <div class="form-group">
                                <label class="font-weight-semibold">Current Image</label>
                                <div class="d-flex align-items-center">
                                    @php
                                        // Extract filename from path (e.g., /category-images/filename.jpg -> filename.jpg)
                                        $filename = basename($category->image);
                                    @endphp
                                    <img src="{{ route('admin.category.image', $filename) }}" alt="{{ $category->name }}"
                                        class="img-thumbnail mr-3" style="width: 128px; height: 128px; object-fit: cover;">
                                    <div>
                                        <p class="mb-1 font-weight-bold">Current category image</p>
                                        <p class="text-muted small mb-0">Upload a new image below to replace it</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Category Image Upload -->
                        <div class="form-group">
                            <label for="image" class="font-weight-semibold">
                                {{ $category->image ? 'Replace Image' : 'Category Image' }}
                            </label>
                            <div class="custom-file">
                                <input type="file" id="image" name="image" accept="image/*" class="custom-file-input"
                                    onchange="previewImage(event)">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle"></i>
                                Supported formats: JPEG, PNG, JPG, GIF, SVG (Max size: 2MB)
                            </small>
                            <!-- Image Preview -->
                            <div id="imagePreview" class="mt-3" style="display: none;">
                                <strong class="d-block mb-2">New Image Preview:</strong>
                                <img id="preview" src="" alt="Image preview" class="img-thumbnail"
                                    style="max-width: 300px;">
                            </div>
                        </div>

                        <!-- Parent Category -->
                        <div class="form-group">
                            <label for="parent_id" class="font-weight-semibold">
                                Parent Category
                            </label>
                            <select id="parent_id" name="parent_id" class="form-control">
                                <option value="">Select a parent category</option>
                                @foreach($categories as $item)
                                    <option value="{{ $item->id }}" {{ old('parent_id', $category->parent_id) == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle"></i>
                                Enter a parent category ID to create a sub-category, or leave empty for a root category
                            </small>
                        </div>

                        <!-- Status Options -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="is_active" class="font-weight-semibold">
                                        Status
                                    </label>
                                    <select id="is_active" name="is_active" class="form-control">
                                        <option value="1" {{ old('is_active', $category->is_active) == '1' ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('is_active', $category->is_active) == '0' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="is_deleted" class="font-weight-semibold">
                                        Deleted Status
                                    </label>
                                    <select id="is_deleted" name="is_deleted" class="form-control">
                                        <option value="0" {{ old('is_deleted', $category->is_deleted) == '0' ? 'selected' : '' }}>Not Deleted</option>
                                        <option value="1" {{ old('is_deleted', $category->is_deleted) == '1' ? 'selected' : '' }}>Deleted</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Divider -->
                        <hr class="my-4">

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-end">
                            <button type="button" onclick="window.location.href='{{ route('admin.category.index') }}'"
                                class="btn btn-secondary mr-2">
                                <i class="fas fa-times mr-1"></i>
                                Cancel
                            </button>
                            <button type="reset" class="btn btn-outline-secondary mr-2">
                                <i class="fas fa-undo mr-1"></i>
                                Reset
                            </button>
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-save mr-1"></i>
                                Update Category
                            </button>
                        </div>
                </form>
            </div>
        </div>

        <!-- Tips Card -->
        <div class="alert alert-warning mt-4" role="alert">
            <div class="d-flex">
                <div class="mr-3">
                    <i class="fas fa-info-circle fa-2x"></i>
                </div>
                <div>
                    <h5 class="alert-heading">Tips for editing categories</h5>
                    <ul class="mb-0 pl-3">
                        <li>Review all fields before updating</li>
                        <li>Only upload a new image if you want to replace the current one</li>
                        <li>Be careful when changing parent categories as it may affect product organization</li>
                        <li>Set status to inactive to temporarily hide the category without deleting it</li>
                        <li>Keep descriptions up to date with category purpose</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Warning for Categories with Children -->
        <div class="alert alert-danger mt-4" role="alert">
            <div class="d-flex">
                <div class="mr-3">
                    <i class="fas fa-exclamation-triangle fa-2x"></i>
                </div>
                <div>
                    <h5 class="alert-heading">Warning</h5>
                    <p class="mb-0">
                        Be cautious when editing or deleting categories that have sub-categories or products assigned to
                        them.
                        This may affect your product organization structure.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Update file input label when file is selected
        document.querySelector('.custom-file-input').addEventListener('change', function (e) {
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