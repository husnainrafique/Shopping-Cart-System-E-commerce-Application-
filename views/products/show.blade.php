@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-5">
        <img src="{{ asset('images/' . $product->image_url) }}" class="img-fluid rounded" alt="{{ $product->name }}">
    </div>
    <div class="col-md-7">
        <h2>{{ $product->name }}</h2>
        <p>{{ $product->description }}</p>
        <h4>${{ number_format($product->price, 2) }}</h4>

        <form method="POST" action="{{ url('/cart/add/' . $product->product_id) }}">
            @csrf
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity:</label>
                <input type="number" name="quantity" value="1" min="1" class="form-control" style="width:100px;">
            </div>
            <button type="submit" class="btn btn-success">Add to Cart</button>
        </form>
    </div>
</div>
@endsection

