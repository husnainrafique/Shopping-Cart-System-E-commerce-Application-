@extends('layouts.app')

@section('content')
<h2>All Orders</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Total</th>
        <th>Shipping</th>
        <th>Status</th>
        <th>Date</th>
        <th>Actions</th>
    </tr>
    @foreach($orders as $order)
    <tr>
        <td>{{ $order->order_id }}</td>
        <td>${{ $order->total }}</td>
        <td>{{ $order->shipping_address }}</td>
        <td>{{ $order->status }}</td>
        <td>{{ $order->created_at }}</td>
        <td><a href="{{ url('/admin/orders/' . $order->order_id) }}" class="btn btn-sm btn-primary">View</a></td>
    </tr>
    @endforeach
</table>
@endsection
