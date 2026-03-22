@extends('layout.customer.layout')

@section('title', 'Welcome to MyShop')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-primary text-white py-5 mb-5">
        <div class="container text-center py-5">
            <h1 class="display-3 font-weight-bold mb-4">Welcome to MyShop</h1>
            <p class="lead mb-4">Discover amazing products at unbeatable prices</p>
            <a href="#products" class="btn btn-light btn-lg btn-rounded px-5 py-3 font-weight-bold">
                <i class="fas fa-shopping-bag mr-2"></i>Shop Now
            </a>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section id="products" class="container mb-5">
        <h2 class="h1 font-weight-bold text-center mb-5">Featured Products</h2>
        
        @if($featuredProducts && $featuredProducts->count() > 0)
        <div class="row">
            @foreach($featuredProducts as $product)
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card product-card shadow-sm border-0 h-100">
                    <a href="{{ route('customer.product.detail', $product->id) }}" class="text-decoration-none">
                        @if($product->image)
                            @php
                                $filename = basename($product->image);
                            @endphp
                            <img src="{{ route('admin.product.image', $filename) }}"
                                 class="card-img-top product-image"
                                 alt="{{ $product->name }}">
                        @else
                            <div class="d-flex align-items-center justify-content-center bg-light"
                                 style="height: 250px;">
                                <i class="fas fa-image fa-3x text-muted"></i>
                            </div>
                        @endif
                    </a>

                    <div class="card-body d-flex flex-column">
                        @if($product->category_id)
                            <span class="badge badge-light text-muted mb-2 align-self-start">
                                <i class="fas fa-tag mr-1"></i>Category {{ $product->category_id }}
                            </span>
                        @endif

                        <h5 class="card-title font-weight-bold mb-1">
                            <a href="{{ route('customer.product.detail', $product->id) }}"
                               class="text-dark text-decoration-none stretched-link-title">
                                {{ $product->name }}
                            </a>
                        </h5>

                        @if($product->description)
                            <p class="card-text text-muted small mb-3" style="height: 40px; overflow: hidden;">
                                {{ Str::limit($product->description, 60) }}
                            </p>
                        @endif

                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            <span class="h4 mb-0 text-gradient-primary font-weight-bold">${{ number_format($product->price, 2) }}</span>
                            <a href="{{ route('customer.product.detail', $product->id) }}"
                               class="btn btn-primary btn-sm rounded-pill">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-5">
            <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-light mb-3"
                 style="width: 80px; height: 80px;">
                <i class="fas fa-box-open fa-3x text-muted"></i>
            </div>
            <h3 class="h4 font-weight-bold mb-2">No Products Available</h3>
            <p class="text-muted">Check back soon for exciting new products!</p>
        </div>
        @endif
    </section>

    <!-- Features Section -->
    <section class="bg-white py-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-light mb-3"
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-shipping-fast fa-2x text-primary"></i>
                    </div>
                    <h5 class="font-weight-bold">Free Shipping</h5>
                    <p class="text-muted">On orders over $50</p>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-light mb-3"
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-lock fa-2x text-primary"></i>
                    </div>
                    <h5 class="font-weight-bold">Secure Payment</h5>
                    <p class="text-muted">100% secure transactions</p>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-light mb-3"
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-headset fa-2x text-primary"></i>
                    </div>
                    <h5 class="font-weight-bold">24/7 Support</h5>
                    <p class="text-muted">Dedicated customer service</p>
                </div>
            </div>
        </div>
    </section>
@endsection
