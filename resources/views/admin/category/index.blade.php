@extends('layout.admin.layout')

@section('content')
    <!-- Page Header -->
    <div class="mb-4 animated fadeIn">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="display-4 font-weight-bold mb-2">Category List</h1>
                <p class="text-muted">Manage your product categories</p>
            </div>
            <button onclick="window.location.href='{{ route('admin.category.create') }}'"
                class="btn btn-primary btn-lg shadow">
                <i class="fas fa-plus mr-2"></i>
                Add New Category
            </button>
        </div>
    </div>

    <!-- Success/Error Messages -->
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
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if($categories->isEmpty())
        <div class="text-center py-5">
            <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-light mb-3"
                style="width: 64px; height: 64px;">
                <i class="fas fa-folder-open fa-2x text-muted"></i>
            </div>
            <h3 class="h5 font-weight-bold mb-2">No Categories Found</h3>
            <p class="text-muted">There are no categories available at the moment.</p>
            <button onclick="window.location.href='{{ route('admin.category.create') }}'" class="btn btn-primary mt-3">
                <i class="fas fa-plus mr-2"></i>
                Create Your First Category
            </button>
        </div>
    @else
        <!-- Category Table -->
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col" class="font-weight-bold text-uppercase small">ID</th>
                                <th scope="col" class="font-weight-bold text-uppercase small">Image</th>
                                <th scope="col" class="font-weight-bold text-uppercase small">Name</th>
                                <th scope="col" class="font-weight-bold text-uppercase small">Description</th>
                                <th scope="col" class="font-weight-bold text-uppercase small">Parent ID</th>
                                <th scope="col" class="font-weight-bold text-uppercase small text-center">Status</th>
                                <th scope="col" class="font-weight-bold text-uppercase small text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                @if(!$category->is_deleted)
                                    <tr>
                                        <td class="align-middle">
                                            <strong>#{{ $category->id }}</strong>
                                        </td>
                                        <td class="align-middle">
                                            @if($category->image)
                                                @php
                                                    // Extract filename from path (e.g., /category-images/filename.jpg -> filename.jpg)
                                                    $filename = basename($category->image);
                                                @endphp
                                                <img src="{{ route('admin.category.image', $filename) }}" alt="{{ $category->name }}"
                                                    loading="lazy" class="rounded shadow-sm"
                                                    style="width: 64px; height: 64px; object-fit: cover;">
                                            @else
                                                <div class="d-flex align-items-center justify-content-center rounded bg-light"
                                                    style="width: 64px; height: 64px;">
                                                    <i class="fas fa-image fa-2x text-muted"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="align-middle font-weight-bold">
                                            {{ $category->name }}
                                        </td>
                                        <td class="align-middle" style="max-width: 300px;">
                                            @if($category->description)
                                                <p class="mb-0 text-truncate">{{ $category->description }}</p>
                                            @else
                                                <span class="text-muted">No description</span>
                                            @endif
                                        </td>
                                        <td class="align-middle">
                                            @if($category->parent_id)
                                                <span class="badge badge-info">
                                                    Parent: {{ $category->parent_id }}
                                                </span>
                                            @else
                                                <span class="badge badge-secondary">Root</span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center">
                                            @if($category->is_active)
                                                <span class="badge badge-success">
                                                    <i class="fas fa-check-circle"></i> Active
                                                </span>
                                            @else
                                                <span class="badge badge-danger">
                                                    <i class="fas fa-times-circle"></i> Inactive
                                                </span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center">
                                            <div class="btn-group" role="group">
                                                <button
                                                    onclick="window.location.href='{{ route('admin.category.edit', $category->id) }}'"
                                                    class="btn btn-sm btn-warning" title="Edit Category">
                                                    <i class="fas fa-edit"></i>
                                                    Edit
                                                </button>
                                                <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST"
                                                    style="display: inline-block;"
                                                    onsubmit="return confirm('Are you sure you want to delete this category?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete Category">
                                                        <i class="fas fa-trash"></i>
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
@endsection