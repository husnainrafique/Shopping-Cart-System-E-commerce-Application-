<?php
namespace App\Http\Controllers;

use App\Models\Order;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('items.product')->get();
        return view('admin.orders.index', compact('orders'));
    }
    public function show($id)
{
    $order = \App\Models\Order::with('items.product')->findOrFail($id);
    return view('admin.orders.show', compact('order'));
}


}
