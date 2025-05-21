@extends('layouts.app')

@section('content')
<h2>Your Cart</h2>

@if($items->count())
@php
    $total = 0;
    foreach($items as $item) {
        $total += $item->product->price * $item->quantity;
    }
@endphp
    <table>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Subtotal</th>
            <th>Actions</th>
        </tr>
        @foreach($items as $item)
        <tr>
            <td>{{ $item->product->name }}</td>
            <td>
                <form action="{{ url('/cart/update/' . $item->id) }}" method="POST">
                    @csrf
                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1">
                    <button type="submit">Update</button>
                </form>
            </td>
            <td>${{ $item->product->price }}</td>
            <td>${{ $item->product->price * $item->quantity }}</td>
            <td><a href="{{ url('/cart/remove/' . $item->id) }}">Remove</a></td>
        </tr>
        @endforeach
        <tr class="fw-bold">
            <td colspan="3" style="text-align: right;"><strong>Total:</strong></td>
            <td><strong>${{ number_format($total, 2) }}</strong></td>
            <td></td>
        </tr>
        
    </table>
    <br>
    <div class="mt-4">
        <a href="{{ url('/products') }}" class="btn btn-secondary">Continue Shopping</a>
    </div>
    
<form action="{{ url('/checkout') }}" method="GET">
    <button style="padding: 10px 20px; background: #007bff; color: white; border: none; border-radius: 5px;">
        Proceed to Checkout
    </button>
    
</form>

@else
    <p>Your cart is empty.</p>
@endif
@endsection
