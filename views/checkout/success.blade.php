@extends('layouts.app')

@section('content')
<h2>Thank you!</h2>
<p>Your order was placed successfully. We’ll ship it soon!</p>
<a href="{{ url('/products') }}">Continue Shopping</a>
<a href="{{ url('/orders/history') }}" class="btn btn-info">View Order History</a>

@endsection
