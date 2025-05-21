<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create() {
        return view('admin.products.create');
    }

    public function store(Request $request) {
        $request->validate([
            'sku' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image_url' => 'required',
        ]);

        Product::create($request->all());
        return redirect('/admin/products')->with('success', 'Product added!');
    }

    public function edit($id) {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect('/admin/products')->with('success', 'Product updated!');
    }

    public function destroy($id) {
        Product::destroy($id);
        return redirect('/admin/products')->with('success', 'Product deleted!');
    }
}
