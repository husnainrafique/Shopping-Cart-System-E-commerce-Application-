@extends('layouts.app')

@section('content')
<h2>Admin - Manage Products</h2>
<a href="{{ url('/') }}" class="btn btn-secondary mb-3">🏠 Back to Home</a>

<a href="{{ url('/admin/products/create') }}" class="btn btn-success mb-3">+ Add Product</a>

<table class="table">
    <tr>
        <th>SKU</th>
        <th>Name</th>
        <th>Price</th>
        <th>Actions</th>
    </tr>
    @foreach($products as $product)
    <tr>
        <td>{{ $product->sku }}</td>
        <td>{{ $product->name }}</td>
        <td>${{ $product->price }}</td>
        <td>
            <a href="{{ url('/admin/products/' . $product->product_id . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
        
            <form action="{{ url('/admin/products/' . $product->product_id . '/delete') }}"  method="POST" style="display:inline;">
                @csrf
                <button class="btn btn-danger btn-sm">Delete</button>
            </form>
        </td>
        
    </tr>
    @endforeach
</table>
@endsection
