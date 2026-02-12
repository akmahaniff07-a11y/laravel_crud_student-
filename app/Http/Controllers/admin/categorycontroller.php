<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\category;

class categorycontroller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = category::latest()->paginate(10); 
         //dd($category);
         return view('admin.category.index', compact('category'));
          }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           category::create($request->all());
        return redirect()->back()
            ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        category::find($id)->update($request->all());
        return redirect()->route('categories')
            ->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        $category->delete();
        return redirect()->back()
            ->with('success', 'Category deleted successfully');
    }
}
