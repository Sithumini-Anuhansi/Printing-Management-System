<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Show all products
    public function index()
    {
        $products = Product::all();
        return view('product', compact('products'));
    }

    // Store new product
    public function store(Request $request)
    {
        $request->validate([
            'ProductType' => 'required|string|max:20',
            'Price' => 'required|numeric|between:0,9999999999.99',
            'Size' => 'required|numeric|between:0,9999999999.99',
            'Description' => 'nullable|string|max:255',
        ]);

        Product::create($request->all());

        return redirect()->back()->with('success', 'Product created successfully.');
    }

    // Show product for edit (optional for AJAX or modal)
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    // Update product
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'ProductType' => 'required|string|max:20',
            'Price' => 'required|numeric|between:0,9999999999.99',
            'Size' => 'required|numeric|between:0,9999999999.99',
            'Description' => 'nullable|string|max:255',
        ]);

        $product->update($request->all());

        return redirect()->back()->with('success', 'Product updated successfully.');
    }

    // Delete product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }
}
