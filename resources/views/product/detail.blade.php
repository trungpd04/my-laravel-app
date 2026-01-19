<x-layout>
    <style>
        .product-detail-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            color: #4f46e5;
            text-decoration: none;
            font-weight: 500;
            margin-bottom: 30px;
            transition: all 0.3s ease;
            gap: 8px;
        }

        .back-link:hover {
            color: #4338ca;
            transform: translateX(-5px);
        }

        .back-link::before {
            content: "←";
            font-size: 20px;
        }

        .product-detail-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            padding: 0;
        }

        .product-image-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 500px;
        }

        .product-image-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            backdrop-filter: blur(10px);
            color: white;
            font-size: 18px;
            padding: 40px;
            text-align: center;
            word-break: break-all;
        }

        .product-info-section {
            padding: 60px 60px 60px 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .product-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .product-price {
            font-size: 2rem;
            font-weight: 700;
            color: #10b981;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .product-price::before {
            content: "$";
        }

        .info-section {
            margin-bottom: 30px;
        }

        .info-label {
            font-size: 0.875rem;
            font-weight: 600;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        .info-content {
            font-size: 1.125rem;
            color: #374151;
            line-height: 1.6;
            padding: 15px;
            background: #f9fafb;
            border-radius: 10px;
            border-left: 4px solid #4f46e5;
        }

        .category-badge {
            display: inline-block;
            padding: 8px 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 20px;
            font-size: 0.95rem;
            font-weight: 600;
        }

        @media (max-width: 968px) {
            .product-detail-card {
                grid-template-columns: 1fr;
            }

            .product-image-section {
                min-height: 300px;
                padding: 40px;
            }

            .product-info-section {
                padding: 40px;
            }

            .product-title {
                font-size: 2rem;
            }

            .product-price {
                font-size: 1.75rem;
            }
        }

        @media (max-width: 640px) {
            .product-detail-container {
                padding: 20px 15px;
            }

            .product-title {
                font-size: 1.75rem;
            }

            .product-price {
                font-size: 1.5rem;
            }

            .product-info-section {
                padding: 30px 20px;
            }

            .product-image-section {
                padding: 30px 20px;
            }
        }
    </style>

    @if($product)
        <div class="product-detail-container">
            <a href="/product" class="back-link">Back to Product List</a>

            <div class="product-detail-card">
                <div class="product-image-section">
                    <div class="product-image-placeholder">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                    </div>
                </div>

                <div class="product-info-section">
                    <h1 class="product-title">{{ $product->name }}</h1>

                    <div class="product-price">{{ $product->price }}</div>

                    <div class="info-section">
                        <div class="info-label">Description</div>
                        <div class="info-content">{{ $product->description }}</div>
                    </div>
                    <div class="info-section">
                        <div class="info-label">Category</div>
                        <div class="category-badge">Category ID: {{ $product->category_id }}</div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="product-detail-container">
            <h1 class="text-2xl font-bold text-slate-800 text-center">Product not found</h1>
            <p class="text-slate-600 text-center">The product you are looking for does not exist.</p>
            <a href="{{ route('product.list') }}" class="text-blue-500 text-center">Back to Product List</a>
        </div>
    @endif
</x-layout>