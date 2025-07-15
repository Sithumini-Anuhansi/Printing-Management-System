<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    // Show all suppliers
    public function index()
    {
        $suppliers = Supplier::all();
        return view('crud.suppliers', compact('suppliers'));
    }

    // Store new supplier
    public function store(Request $request)
    {
        $request->validate([
            'SupplierName' => 'required|string|max:50',
            'SupplierType' => 'required|in:foreign,local',
            'PhoneNumber' => 'required|string|max:11',
            'Email' => 'required|email|max:100|unique:Supplier,Email',
            'Address' => 'required|string|max:100',
            'WarehouseLocation' => 'required|string|max:100',
            'AvailableMaterial' => 'nullable|string|max:255',
        ]);

        Supplier::create($request->all());

        return redirect()->route('suppliers.index')->with('success', 'Supplier created successfully.');
    }

    // Show edit form (optional for ajax/SPA; or use modal)
    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return response()->json($supplier);
    }

    // Update supplier
    public function update(Request $request, $id)
    {
        $supplier = Supplier::findOrFail($id);

        $request->validate([
            'SupplierName' => 'required|string|max:50',
            'SupplierType' => 'required|in:foreign,local',
            'PhoneNumber' => 'required|string|max:11',
            'Email' => 'required|email|max:100|unique:Supplier,Email,' . $supplier->SupplierID . ',SupplierID',
            'Address' => 'required|string|max:100',
            'WarehouseLocation' => 'required|string|max:100',
            'AvailableMaterial' => 'nullable|string|max:255',
        ]);

        $supplier->update($request->all());

        return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully.');
    }

    // Delete supplier
    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return redirect()->route('suppliers.index')->with('success', 'Supplier deleted successfully.');
    }
}
