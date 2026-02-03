@extends('layout.admin.layout')

@section('content')
    <!-- Page Header -->
    <div class="mb-4 animated fadeIn">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="display-4 font-weight-bold mb-2">Product List</h1>
                <p class="text-muted">Browse our amazing collection of products</p>
            </div>
            <button onclick="window.location.href='{{ route('admin.product.create') }}'"
                class="btn btn-primary btn-lg shadow">
                <i class="fas fa-plus mr-2"></i>
                Add New Product
            </button>
        </div>
    </div>

    @if($products->isEmpty())
        <div class="text-center py-5">
            <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-light mb-3"
                style="width: 64px; height: 64px;">
                <i class="fas fa-box fa-2x text-muted"></i>
            </div>
            <h3 class="h5 font-weight-bold mb-2">No Products Found</h3>
            <p class="text-muted">There are no products available at the moment.</p>
        </div>
    @else
        <!-- Product Table -->
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col" class="font-weight-bold text-uppercase small">ID</th>
                                <th scope="col" class="font-weight-bold text-uppercase small">Image</th>
                                <th scope="col" class="font-weight-bold text-uppercase small">Name</th>
                                <th scope="col" class="font-weight-bold text-uppercase small">Price</th>
                                <th scope="col" class="font-weight-bold text-uppercase small">Category</th>
                                <th scope="col" class="font-weight-bold text-uppercase small">Description</th>
                                <th scope="col" class="font-weight-bold text-uppercase small text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td class="align-middle">
                                        <strong>#{{ $product->id }}</strong>
                                    </td>
                                    <td class="align-middle">
                                        @if($product->image)
                                            <img src="{{ $product->image }}" alt="{{ $product->name }}" loading="lazy"
                                                class="rounded shadow-sm" style="width: 64px; height: 64px; object-fit: cover;">
                                        @else
                                            <div class="d-flex align-items-center justify-content-center rounded bg-light"
                                                style="width: 64px; height: 64px;">
                                                <i class="fas fa-image fa-2x text-muted"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="align-middle font-weight-bold">
                                        {{ $product->name }}
                                    </td>
                                    <td class="align-middle font-weight-bold text-primary">
                                        ${{ number_format($product->price, 2) }}
                                    </td>
                                    <td class="align-middle">
                                        @if($product->category_id)
                                            <span class="badge badge-primary">
                                                Category {{ $product->category_id }}
                                            </span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td class="align-middle" style="max-width: 300px;">
                                        @if($product->description)
                                            <p class="mb-0 text-truncate">{{ $product->description }}</p>
                                        @else
                                            <span class="text-muted">No description</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="btn-group" role="group">
                                            <button
                                                onclick="window.location.href='{{ route('admin.product.detail', $product->id) }}'"
                                                class="btn btn-sm btn-info" title="View Product">
                                                <i class="fas fa-eye"></i>
                                                View
                                            </button>
                                            <button onclick="window.location.href='{{ route('admin.product.edit', $product->id) }}'"
                                                class="btn btn-sm btn-warning" title="Edit Product">
                                                <i class="fas fa-edit"></i>
                                                Edit
                                            </button>
                                            <button class="btn btn-sm btn-secondary" title="Add to Cart">
                                                <i class="fas fa-shopping-cart"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

    <!-- Pagination -->
    <div class="mt-3">
        {{ $products->links('') }}
    </div>
@endsection