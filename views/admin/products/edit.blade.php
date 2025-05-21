@extends('layouts.app')

@section('content')
<h2>Edit Product</h2>

<form action="{{ url('/admin/products/' . $product->product_id . '/update') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>SKU</label>
        <input type="text" name="sku" value="{{ $product->sku }}" class="form-control">
    </div>
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" value="{{ $product->name }}" class="form-control">
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control">{{ $product->description }}</textarea>
    </div>
    <div class="mb-3">
        <label>Price</label>
        <input type="number" name="price" step="0.01" value="{{ $product->price }}" class="form-control">
    </div>
    <div class="mb-3">
        <label>Image Filename</label>
        <input type="text" name="image_url" value="{{ $product->image_url }}" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
