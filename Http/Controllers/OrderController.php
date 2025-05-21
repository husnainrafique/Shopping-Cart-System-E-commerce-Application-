<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('order_id', 'desc')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function show($order_id)
    {
        $order = Order::with('items.product')->findOrFail($order_id);
        return view('admin.orders.show', compact('order'));
    }

    public function history()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('admin.orders.history', compact('orders'));
    }
}
