@extends('dashboard.layout')

@section('title', 'Create Product')

@section('content')
    <div class="page-header">
        <h1 class="page-title">Edit Product</h1>
        <p class="page-subtitle">Edit the product details</p>
    </div>

    <div class="card">
        <form action="{{ route('products.update', $product->id) }}" method="post" class="product-form">
            @csrf
            @method('PUT')
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
                    <input type="text" name="name" class="form-control" placeholder="Enter product name" required
                        value="{{ $product->name }}">
                    @error('name')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price">Price *</label>
                    <div class="input-with-prefix">
                        <span class="input-prefix">$</span>
                        <input type="number" name="money" class="form-control" placeholder="0.00" step="0.01"
                            min="0" required value="{{ $product->price }}">
                    </div>
                    @error('price')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" placeholder="Enter product description" rows="4">{{ $product->description }}</textarea>
                @error('description')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="category">Category *</label>
                    <select name="category" class="form-control" required value="{{ $product->category }}">
                        <option value="">Select a category</option>
                        <option value="1" {{ $product->category == '1' ? 'selected' : '' }}>Electronics
                        </option>
                        <option value="2" {{ $product->category == '2' ? 'selected' : '' }}>Clothing</option>
                        <option value="3" {{ $product->category == '3' ? 'selected' : '' }}>Furniture</option>
                        <option value="4" {{ $product->category == '4' ? 'selected' : '' }}>Books</option>
                        <option value="5" {{ $product->category == '5' ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('category')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="brand">Brand</label>
                    <input type="text" name="brand" class="form-control" placeholder="Enter product brand"
                        value="{{ $product->brand }}">
                    @error('brand')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="size">Size</label>
                    <input type="text" name="size" class="form-control" placeholder="Enter product size"
                        value="{{ $product->size }}">
                    @error('size')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="color">Color</label>
                    <input type="text" name="color" class="form-control" placeholder="Enter product color"
                        value="{{ $product->color }}">
                    @error('color')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="material">Material</label>
                <input type="text" name="material" class="form-control" placeholder="Enter product material"
                    value="{{ $product->material }}">
                @error('material')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group checkbox-group">
                <label class="checkbox-label">
                    <input type="checkbox" name="status" value="1" {{ $product->status ? 'checked' : '' }}>
                    <span class="checkmark"></span>
                    Active Status
                </label>
                <small class="form-help">Check this box to make the product active and visible</small>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="save-icon">💾</i> Update Product
                </button>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                </form>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                    <i class="back-icon">←</i> Back to Products
                </a>
            </div>
        </form>
    </div>
@endsection
