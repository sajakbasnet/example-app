@extends('dashboard.layout')

@section('title', 'Product Details')

@section('content')
    <div class="page-header">
        <h1 class="page-title">Product Details</h1>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h3>{{ $product->name }}</h3>
                    <p><strong>Description:</strong> {{ $product->description }}</p>
                    <p><strong>Price:</strong> ${{ $product->price }}</p>
                    <p><strong>Category:</strong> {{ $product->category }}</p>
                    <p><strong>Brand:</strong> {{ $product->brand }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Size:</strong> {{ $product->size }}</p>
                    <p><strong>Color:</strong> {{ $product->color }}</p>
                    <p><strong>Material:</strong> {{ $product->material }}</p>
                    <p><strong>Status:</strong> {{ $product->status }}</p>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit Product</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                </form>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
            </div>
        </div>
    </div>
@endsection
