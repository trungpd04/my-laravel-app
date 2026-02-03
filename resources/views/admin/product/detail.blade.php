@extends('layout.admin.layout')
@section('content')
    <div class="container-fluid">
        <!-- Back Button -->
        <div class="mb-4">
            <a href="{{ route('admin.product.list') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to Product List
            </a>
        </div>

        @if($product)
            <!-- Product Detail Card -->
            <div class="card shadow-sm">
                <div class="card-body p-0">
                    <div class="row no-gutters">
                        <!-- Product Image Section -->
                        <div class="col-md-6 bg-gradient-primary d-flex align-items-center justify-content-center"
                            style="min-height: 400px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                            <div class="p-5 w-100 text-center">
                                @if($product->image)
                                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid rounded shadow"
                                        style="max-height: 400px; object-fit: contain;">
                                @else
                                    <div class="text-white">
                                        <i class="fas fa-image fa-5x mb-3" style="opacity: 0.5;"></i>
                                        <p class="h5">No image available</p>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Product Info Section -->
                        <div class="col-md-6">
                            <div class="p-5">
                                <!-- Product Title -->
                                <h1 class="display-4 font-weight-bold text-dark mb-3">
                                    {{ $product->name }}
                                </h1>

                                <!-- Product Price -->
                                <div class="mb-4">
                                    <h2 class="text-success font-weight-bold">
                                        <i class="fas fa-dollar-sign"></i>{{ number_format($product->price, 2) }}
                                    </h2>
                                </div>

                                <!-- Description Section -->
                                <div class="mb-4">
                                    <h5 class="text-uppercase text-muted font-weight-bold small mb-2">
                                        <i class="fas fa-align-left mr-2"></i>Description
                                    </h5>
                                    <div class="p-3 bg-light rounded border-left border-primary"
                                        style="border-left-width: 4px !important;">
                                        <p class="mb-0 text-dark">
                                            {{ $product->description ?: 'No description available.' }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Category Section -->
                                <div class="mb-4">
                                    <h5 class="text-uppercase text-muted font-weight-bold small mb-2">
                                        <i class="fas fa-tag mr-2"></i>Category
                                    </h5>
                                    @if($product->category_id)
                                        <span class="badge badge-primary badge-lg px-4 py-2" style="font-size: 1rem;">
                                            Category ID: {{ $product->category_id }}
                                        </span>
                                    @else
                                        <span class="text-muted">No category assigned</span>
                                    @endif
                                </div>

                                <!-- Product ID -->
                                <div class="mb-4">
                                    <h5 class="text-uppercase text-muted font-weight-bold small mb-2">
                                        <i class="fas fa-barcode mr-2"></i>Product ID
                                    </h5>
                                    <span class="badge badge-secondary px-3 py-2">#{{ $product->id }}</span>
                                </div>

                                <!-- Action Buttons -->
                                <div class="mt-4 pt-3 border-top">
                                    <div class="d-flex gap-2">
                                        <button onclick="window.location.href='{{ route('admin.product.edit', $product->id) }}'"
                                            class="btn btn-warning mr-2">
                                            <i class="fas fa-edit mr-2"></i>Edit Product
                                        </button>
                                        <button class="btn btn-success">
                                            <i class="fas fa-shopping-cart mr-2"></i>Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Information -->
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="info-box bg-info">
                        <span class="info-box-icon"><i class="fas fa-check-circle"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Status</span>
                            <span class="info-box-number">Available</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-box bg-success">
                        <span class="info-box-icon"><i class="fas fa-dollar-sign"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Price</span>
                            <span class="info-box-number">${{ number_format($product->price, 2) }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-box bg-warning">
                        <span class="info-box-icon"><i class="fas fa-tag"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Category</span>
                            <span class="info-box-number">{{ $product->category_id ?: 'N/A' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Product Not Found -->
            <div class="card">
                <div class="card-body text-center py-5">
                    <i class="fas fa-exclamation-triangle fa-4x text-warning mb-3"></i>
                    <h2 class="font-weight-bold text-dark">Product Not Found</h2>
                    <p class="text-muted mb-4">The product you are looking for does not exist.</p>
                    <a href="{{ route('admin.product.list') }}" class="btn btn-primary">
                        <i class="fas fa-arrow-left mr-2"></i>Back to Product List
                    </a>
                </div>
            </div>
        @endif
    </div>
@endsection