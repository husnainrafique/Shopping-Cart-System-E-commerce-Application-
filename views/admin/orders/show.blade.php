@extends('layouts.app')

@section('content')
<h2>Order #{{ $order->order_id }}</h2>

<p><strong>Status:</strong> {{ $order->status }}</p>
<p><strong>Shipping Address:</strong> {{ $order->shipping_address }}</p>
<p><strong>Total:</strong> ${{ number_format($order->total, 2) }}</p>
<p><strong>Placed on:</strong> {{ $order->created_at->format('Y-m-d H:i') }}</p>

<hr>

<h4>Order Items:</h4>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Product</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order->items as $item)
        <tr>
            <td>{{ $item->product->name }}</td>
            <td>{{ $item->quantity }}</td>
            <td>${{ number_format($item->price, 2) }}</td>
            <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ url('/admin/orders') }}" class="btn btn-secondary mt-4">⬅ Back to All Orders</a>
@endsection
