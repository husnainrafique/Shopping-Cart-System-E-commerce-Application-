@extends('layouts.app')

@section('content')
<h2>Add Product</h2>
<form method="POST" action="{{ url('/admin/products') }}">
    @csrf
    @include('admin.products.form')
</form>
@endsection
