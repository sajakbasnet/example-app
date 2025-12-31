@extends('dashboard.layout')

@section('title', 'Create Product')

@section('content')
    <div class="page-header">
        <h1 class="page-title">Create Product</h1>
        <p class="page-subtitle">Add a new product to your inventory</p>
    </div>

    <div class="card">
        <form action="{{ route('products.store') }}" method="post" class="product-form">
            @csrf
            @if ($errors->any())
                <div class="error-summary">
                    <h4>Please fix the following errors:</h4>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-row">
                <div class="form-group">
                    <label for="name">Product Name *</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter product name" required>
                    @error('name')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price">Price *</label>
                    <div class="input-with-prefix">
                        <span class="input-prefix">$</span>
                        <input type="number" name="money" class="form-control" placeholder="0.00" step="0.01"
                            min="0" required>
                    </div>
                    @error('price')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" placeholder="Enter product description" rows="4"></textarea>
                @error('description')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="category">Category *</label>
                    <select name="category" class="form-control" required>
                        <option value="">Select a category</option>
                        <option value="1">Electronics</option>
                        <option value="2">Clothing</option>
                        <option value="3">Furniture</option>
                        <option value="4">Books</option>
                        <option value="5">Other</option>
                    </select>
                    @error('category')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="brand">Brand</label>
                    <input type="text" name="brand" class="form-control" placeholder="Enter product brand">
                    @error('brand')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="size">Size</label>
                    <input type="text" name="size" class="form-control" placeholder="Enter product size">
                    @error('size')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="color">Color</label>
                    <input type="text" name="color" class="form-control" placeholder="Enter product color">
                    @error('color')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="material">Material</label>
                <input type="text" name="material" class="form-control" placeholder="Enter product material">
                @error('material')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group checkbox-group">
                <label class="checkbox-label">
                    <input type="checkbox" name="status" value="1">
                    <span class="checkmark"></span>
                    Active Status
                </label>
                <small class="form-help">Check this box to make the product active and visible</small>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="save-icon">💾</i> Create Product
                </button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                    <i class="back-icon">←</i> Back to Products
                </a>
            </div>
        </form>
    </div>
@endsection
