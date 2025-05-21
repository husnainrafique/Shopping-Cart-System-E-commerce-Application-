@extends('layouts.app')

@section('content')
<h2 class="mb-4">🧾 Order History</h2>

@if($orders->isEmpty())
    <p>No orders yet.</p>
@else
<table class="table table-striped">
    <thead>
        <tr>
            <th>Order #</th>
            <th>Total</th>
            <th>Shipping</th>
            <th>Status</th>
            <th>Placed On</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->order_id }}</td>
            <td>${{ number_format($order->total, 2) }}</td>
            <td>{{ $order->shipping_address }}</td>
            <td>{{ ucfirst($order->status) }}</td>
            <td>{{ date('Y-m-d', strtotime($order->created_at)) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif

<a href="{{ url('/products') }}" class="btn btn-primary mt-3">⬅️ Continue Shopping</a>
@endsection
