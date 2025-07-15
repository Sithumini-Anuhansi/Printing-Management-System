<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the materials.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $materials = Material::all();
        return view('crud.materials', compact('material'));
    }

    /**
     * Store a newly created material in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'MaterialName' => 'required|string|max:100',
            'Price' => 'required|numeric|between:0,9999999999.99',
            'Description' => 'nullable|string|max:255',
            'AvailableQuantity' => 'required|integer|min:0',
        ]);

        Material::create($request->only([
            'MaterialName', 'Price', 'Description', 'AvailableQuantity'
        ]));

        return redirect()->back()->with('success', 'Material created successfully.');
    }

    /**
     * Show the specified material as JSON (for AJAX editing).
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $material = Material::findOrFail($id);
        return response()->json($materials);
    }

    /**
     * Update the specified material in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'MaterialName' => 'required|string|max:100',
            'Price' => 'required|numeric|between:0,9999999999.99',
            'Description' => 'nullable|string|max:255',
            'AvailableQuantity' => 'required|integer|min:0',
        ]);

        $material = Material::findOrFail($id);
        $material->update($request->only([
            'MaterialName', 'Price', 'Description', 'AvailableQuantity'
        ]));

        return redirect()->back()->with('success', 'Material updated successfully.');
    }

    /**
     * Remove the specified material from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $material = Material::findOrFail($id);
        $material->delete();

        return redirect()->back()->with('success', 'Material deleted successfully.');
    }
}
