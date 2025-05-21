@extends('layouts.app')

@section('content')

<h2 class="mb-4">All Products</h2>
<a href="{{ url('/admin/products') }}" class="btn btn-dark mb-3">Go to Admin Dashboard</a>


@if($products->isEmpty())
    <p>No products found!</p>
@endif


<div class="d-flex justify-content-end mb-4">
    <a href="{{ url('/cart') }}" class="btn btn-outline-primary">🛒 Go to Cart</a>
</div>


<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach($products as $product)
    <div class="col">
        <div class="card h-100">
            <img src="{{ asset('images/' . $product->image_url) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ $product->description }}</p>
                <strong>${{ number_format($product->price, 2) }}</strong>
            </div>
            <div class="card-footer">
                <a href="{{ url('/products/' . $product->product_id) }}" class="btn btn-primary">View</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

