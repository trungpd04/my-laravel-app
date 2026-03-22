@extends('layout.customer.layout')

@section('title', $product->name . ' — MyShop')

@section('styles')
<style>
    /* ── Product Detail Page ── */
    .product-hero {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 24px rgba(0,0,0,0.08);
        overflow: hidden;
    }

    /* Image panel */
    .product-img-wrapper {
        background: linear-gradient(135deg, #f5f7ff 0%, #ede9f6 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 420px;
        padding: 40px;
    }

    .product-img-wrapper img {
        max-height: 380px;
        max-width: 100%;
        object-fit: contain;
        border-radius: 8px;
        box-shadow: 0 8px 32px rgba(102,126,234,0.18);
        transition: transform 0.3s ease;
    }

    .product-img-wrapper img:hover {
        transform: scale(1.03);
    }

    .product-img-placeholder {
        display: flex;
        flex-direction: column;
        align-items: center;
        color: #b0b0c0;
        gap: 16px;
    }

    /* Info panel */
    .product-info {
        padding: 40px;
    }

    .product-badge-category {
        display: inline-block;
        background: #ede9f6;
        color: #764ba2;
        font-size: 0.82rem;
        font-weight: 600;
        padding: 4px 14px;
        border-radius: 20px;
        margin-bottom: 16px;
        letter-spacing: 0.03em;
    }

    .product-name {
        font-size: 2rem;
        font-weight: 700;
        color: #1a1a2e;
        line-height: 1.3;
        margin-bottom: 12px;
    }

    .product-price {
        font-size: 2.2rem;
        font-weight: 800;
        color: #667eea;
        margin-bottom: 20px;
    }

    .product-price .currency {
        font-size: 1.1rem;
        vertical-align: super;
        margin-right: 2px;
    }

    /* Star rating (static display) */
    .rating-stars {
        color: #f5a623;
        font-size: 0.95rem;
        letter-spacing: 2px;
    }

    .rating-label {
        font-size: 0.85rem;
        color: #aaa;
        margin-left: 8px;
    }

    /* Section labels */
    .info-label {
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: #aaa;
        margin-bottom: 8px;
    }

    .product-description {
        color: #555;
        line-height: 1.8;
        font-size: 0.97rem;
    }

    /* Divider */
    .product-divider {
        border: none;
        border-top: 1px solid #f0f0f0;
        margin: 24px 0;
    }

    /* Quantity selector */
    .qty-selector {
        display: flex;
        align-items: center;
        gap: 0;
        border: 2px solid #e0e0f0;
        border-radius: 8px;
        overflow: hidden;
        width: fit-content;
    }

    .qty-btn {
        background: #f5f5ff;
        border: none;
        width: 40px;
        height: 40px;
        font-size: 1.1rem;
        color: #667eea;
        cursor: pointer;
        transition: background 0.15s;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .qty-btn:hover { background: #ede9f6; }

    .qty-input {
        border: none;
        border-left: 2px solid #e0e0f0;
        border-right: 2px solid #e0e0f0;
        width: 52px;
        height: 40px;
        text-align: center;
        font-weight: 700;
        font-size: 1rem;
        color: #333;
        outline: none;
    }

    /* Action buttons */
    .btn-cart {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        color: #fff;
        padding: 12px 36px;
        border-radius: 30px;
        font-weight: 700;
        font-size: 1rem;
        transition: all 0.25s ease;
        box-shadow: 0 4px 14px rgba(102,126,234,0.35);
    }

    .btn-cart:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102,126,234,0.45);
        color: #fff;
    }

    .btn-wishlist {
        border: 2px solid #667eea;
        color: #667eea;
        background: transparent;
        padding: 10px 20px;
        border-radius: 30px;
        font-weight: 600;
        transition: all 0.25s ease;
    }

    .btn-wishlist:hover {
        background: #667eea;
        color: #fff;
    }

    /* Meta row */
    .product-meta span {
        font-size: 0.88rem;
        color: #777;
    }

    .product-meta strong {
        color: #444;
    }

    /* Related products */
    .related-card {
        border: none;
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.25s, box-shadow 0.25s;
        background: #fff;
        box-shadow: 0 2px 12px rgba(0,0,0,0.07);
        display: block;
        text-decoration: none !important;
        color: inherit;
    }

    .related-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(0,0,0,0.13);
        color: inherit;
    }

    .related-card img {
        width: 100%;
        height: 180px;
        object-fit: cover;
    }

    .related-card-placeholder {
        width: 100%;
        height: 180px;
        background: #f5f5ff;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #c0c0d0;
    }

    .related-card-body {
        padding: 14px 16px;
    }

    .related-card-name {
        font-weight: 600;
        font-size: 0.92rem;
        color: #222;
        margin-bottom: 4px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .related-card-price {
        font-weight: 800;
        color: #667eea;
        font-size: 1rem;
    }

    /* Breadcrumb */
    .breadcrumb {
        background: transparent;
        padding: 0;
        margin-bottom: 20px;
        font-size: 0.88rem;
    }

    .breadcrumb-item + .breadcrumb-item::before {
        content: "›";
        color: #aaa;
    }

    .breadcrumb-item a {
        color: #667eea;
        text-decoration: none;
    }

    .breadcrumb-item.active {
        color: #888;
    }
</style>
@endsection

@section('content')
<div class="container py-5">

    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            @if($product->category)
                <li class="breadcrumb-item"><a href="#">{{ $product->category->name }}</a></li>
            @endif
            <li class="breadcrumb-item active">{{ $product->name }}</li>
        </ol>
    </nav>

    {{-- ── Main Product Card ── --}}
    <div class="product-hero mb-5">
        <div class="row no-gutters">

            {{-- Left: Image --}}
            <div class="col-md-5">
                <div class="product-img-wrapper">
                    @if($product->image)
                        @php $filename = basename($product->image); @endphp
                        <img src="{{ route('admin.product.image', $filename) }}"
                             alt="{{ $product->name }}">
                    @else
                        <div class="product-img-placeholder">
                            <i class="fas fa-image fa-5x"></i>
                            <span>No image available</span>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Right: Info --}}
            <div class="col-md-7">
                <div class="product-info">

                    {{-- Category badge --}}
                    @if($product->category)
                        <span class="product-badge-category">
                            <i class="fas fa-folder mr-1"></i>{{ $product->category->name }}
                        </span>
                    @endif

                    {{-- Name --}}
                    <h1 class="product-name">{{ $product->name }}</h1>

                    {{-- Static rating --}}
                    <div class="d-flex align-items-center mb-3">
                        <span class="rating-stars">★★★★☆</span>
                        <span class="rating-label">(24 reviews)</span>
                    </div>

                    {{-- Price --}}
                    <div class="product-price">
                        <span class="currency">$</span>{{ number_format($product->price, 2) }}
                    </div>

                    <hr class="product-divider">

                    {{-- Description --}}
                    <p class="info-label">Description</p>
                    <p class="product-description">
                        {{ $product->description ?: 'No description available for this product.' }}
                    </p>

                    <hr class="product-divider">

                    {{-- Quantity + Actions --}}
                    <div class="d-flex align-items-center flex-wrap mb-4" style="gap: 16px;">
                        {{-- Quantity --}}
                        <div>
                            <p class="info-label mb-2">Quantity</p>
                            <div class="qty-selector">
                                <button class="qty-btn" onclick="changeQty(-1)">−</button>
                                <input class="qty-input" id="qty" type="number" value="1" min="1" max="99">
                                <button class="qty-btn" onclick="changeQty(1)">+</button>
                            </div>
                        </div>

                        {{-- Buttons --}}
                        <div class="align-self-end">
                            <button class="btn-cart mr-2">
                                <i class="fas fa-cart-plus mr-2"></i>Add to Cart
                            </button>
                            <button class="btn-wishlist">
                                <i class="fas fa-heart mr-1"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Meta --}}
                    <div class="product-meta">
                        <span class="mr-4">
                            <i class="fas fa-tag mr-1"></i>
                            <strong>SKU:</strong> PRD-{{ str_pad($product->id, 4, '0', STR_PAD_LEFT) }}
                        </span>
                        <span class="mr-4">
                            <i class="fas fa-check-circle mr-1 text-success"></i>
                            <strong>Status:</strong> In Stock
                        </span>
                        <span>
                            <i class="fas fa-shipping-fast mr-1"></i>
                            <strong>Shipping:</strong> Free over $50
                        </span>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- ── Related Products ── --}}
    @if($related->isNotEmpty())
    <div class="mb-5">
        <h4 class="font-weight-bold mb-4">
            <i class="fas fa-cubes mr-2 text-gradient-primary"></i>Related Products
        </h4>
        <div class="row">
            @foreach($related as $item)
            <div class="col-6 col-md-3 mb-4">
                <a class="related-card" href="{{ route('customer.product.detail', $item->id) }}">
                    @if($item->image)
                        @php $rf = basename($item->image); @endphp
                        <img src="{{ route('admin.product.image', $rf) }}" alt="{{ $item->name }}">
                    @else
                        <div class="related-card-placeholder">
                            <i class="fas fa-image fa-2x"></i>
                        </div>
                    @endif
                    <div class="related-card-body">
                        <div class="related-card-name">{{ $item->name }}</div>
                        <div class="related-card-price">${{ number_format($item->price, 2) }}</div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    @endif

</div>
@endsection

@section('scripts')
<script>
    function changeQty(delta) {
        const input = document.getElementById('qty');
        const next = Math.max(1, Math.min(99, parseInt(input.value || 1) + delta));
        input.value = next;
    }

    // Prevent typing values out of range
    document.getElementById('qty').addEventListener('input', function () {
        if (this.value < 1) this.value = 1;
        if (this.value > 99) this.value = 99;
    });
</script>
@endsection
