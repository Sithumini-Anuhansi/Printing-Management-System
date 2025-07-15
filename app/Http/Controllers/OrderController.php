<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Eager load customers to show customer names if needed
        $orders = Order::with('customer')->get();
        $customers = Customer::all();

        return view('order', compact('orders', 'customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'OrderType' => 'required|string|max:20',
            'OrderDate' => 'required|date',
            'Products' => 'required|string|max:255',
            'ProductQuantity' => 'required|integer|min:1',
            'Description' => 'nullable|string|max:255',
            'OrderDueDate' => 'required|date|after_or_equal:OrderDate',
            'CustomerID' => 'required|integer|exists:Customer,CustomerID',
        ]);

        Order::create($request->all());

        return redirect()->back()->with('success', 'Order created successfully.');
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return response()->json($order);
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'OrderType' => 'required|string|max:20',
            'OrderDate' => 'required|date',
            'Products' => 'required|string|max:255',
            'ProductQuantity' => 'required|integer|min:1',
            'Description' => 'nullable|string|max:255',
            'OrderDueDate' => 'required|date|after_or_equal:OrderDate',
            'CustomerID' => 'required|integer|exists:Customer,CustomerID',
        ]);

        $order->update($request->all());

        return redirect()->back()->with('success', 'Order updated successfully.');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->back()->with('success', 'Order deleted successfully.');
    }
}
