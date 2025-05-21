@extends('layouts.app')

@section('content')
<h2>Checkout</h2>

<form action="{{ url('/checkout') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="address">Street Address</label>
        <input type="text" name="address" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="city">City</label>
        <input type="text" name="city" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="zip">ZIP / Postal Code</label>
        <input type="text" name="zip" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="country">Country</label>
        <input type="text" name="country" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Place Order</button>
</form>
@endsection
