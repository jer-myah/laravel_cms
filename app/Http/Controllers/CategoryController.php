<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index () {
        $categories = Category::all();
        return view('admin.categories.index')->with('categories', $categories);
    }

    public function create () {
        return view('admin.categories.create');        
    }

    public function store (Request $request) {
        if (Category::create(['name' => $request->name])) {
            return redirect('/admin/categories')->with('success', 'Category created');
        } else {
            return back()->with('error', 'Error creating category');
        }
    }

    public function edit (Request $request, $id) {
        $category = Category::where('id', $id)->first();
        return view('admin.categories.edit')->with('category', $category);
    }

    public function update (Request $request, $id) {
        if (Category::where('id', $id)->update(['name' => $request->name])) {
            return redirect('/admin/categories')->with('success', 'Category updated');
        } else {
            return back()->with('error', 'Error updating category');
        }
    }

    public function destroy (Request $request, $id) {
        if (Category::where('id', $id)->delete()) {
            return redirect('/admin/categories')->with('success', 'Category removed');
        } else {
            return back()->with('error', 'Error removing category');
        }
    }
}
