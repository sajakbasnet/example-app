@extends('dashboard.layout')

@section('title', 'Products')

@section('content')
    <div class="page-header">
        <h1 class="page-title">Products</h1>
    </div>

    <!-- Search and Actions Section -->
    <div class="actions-section">
        <form action="{{ route('products.index') }}" method="get" class="search-form">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search products..."
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">
                    <i class="search-icon">🔍</i> Search
                </button>
            </div>
        </form>
        <a href="{{ route('products.create') }}" class="btn btn-success">
            <i class="add-icon">➕</i> Create Product
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
