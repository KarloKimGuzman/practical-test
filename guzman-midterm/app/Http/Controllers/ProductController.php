<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Product::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|max:255',
            'price' => 'required',
            'quantity' => 'required|integer'
        ]);

        Product::create($validated);
        return $validated;
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        return Product::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|max:255',
            'price' => 'required',
            'quantity' => 'required|integer'
        ]);

        $product->update($validated);
        return $validated;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        Product::destroy($id);
        return response()->json(['message'=>'product successfully deleted!']);
    }
}
