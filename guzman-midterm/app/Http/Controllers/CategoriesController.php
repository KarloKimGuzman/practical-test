<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Categories::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255'
        ]);

        return Categories::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        return Categories::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $categories = Categories::find($id);

        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255'
        ]);

        $categories->update($validated);
        return $validated;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id): void
    {
        Categories::destroy($id);
    }
}
