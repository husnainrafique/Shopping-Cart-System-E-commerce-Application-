<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;

class CartController extends Controller
{
    public function add(Request $request, $productId)
    {
        $sessionId = session()->getId();
        $quantity = $request->input('quantity', 1);

        $cartItem = CartItem::where('session_id', $sessionId)
                            ->where('product_id', $productId)
                            ->first();

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            CartItem::create([
                'session_id' => $sessionId,
                'product_id' => $productId,
                'quantity' => $quantity
            ]);
        }

        return redirect('/cart')->with('success', 'Item added to cart!');
    }

    public function index()
    {
        $sessionId = session()->getId();
        $items = CartItem::where('session_id', $sessionId)->with('product')->get();

        return view('cart.index', compact('items'));
    }

    public function update(Request $request, $id)
    {
        $item = CartItem::findOrFail($id);
        $item->quantity = $request->input('quantity', 1);
        $item->save();

        return redirect('/cart')->with('success', 'Cart updated!');
    }

    public function remove($id)
    {
        $item = CartItem::findOrFail($id);
        $item->delete();

        return redirect('/cart')->with('success', 'Item removed from cart!');
    }
}
