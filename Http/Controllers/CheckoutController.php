<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    public function form()
    {
        return view('checkout.form');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'zip' => 'required|string|max:20',
            'country' => 'required|string|max:100'
        ]);
    
        $fullAddress = $request->address . ', ' . $request->city . ', ' . $request->zip . ', ' . $request->country;
        $sessionId = session()->getId();
        $cartItems = CartItem::where('session_id', $sessionId)->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect('/cart')->with('error', 'Cart is empty');
        }

        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $order = Order::create([
            'user_id' => null, // assuming no login system
            'total' => $total,
            'shipping_address' => $fullAddress,
            'status' => 'pending',
            'created_at' => now()
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->order_id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price
            ]);
        }

        // Clear cart
        CartItem::where('session_id', $sessionId)->delete();

        return redirect('/order/success');

    }
}
