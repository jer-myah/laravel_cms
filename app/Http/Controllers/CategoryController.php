<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryService;

    public function __construct(CategoryService $categoryService){
        $this->categoryService = $categoryService;
    }
    
    public function index () {
        $categories = $this->categoryService->getAllCategories();
        return view('admin.categories.index')->with('categories', $categories);
    }

    public function create () {
        return view('admin.categories.create');        
    }

    public function store (Request $request) {
        if ($this->categoryService->createCategory($request)) {
            return redirect('/admin/categories')->with('success', 'Category created');
        } else {
            return back()->with('error', 'Error creating category');
        }
    }

    public function edit ($id) {
        $category = $this->categoryService->getOneCategoryById($id);
        return view('admin.categories.edit')->with('category', $category);
    }

    public function update (Request $request, $id) {
        if ($this->categoryService->updateCategory($request, $id)) {
            return redirect('/admin/categories')->with('success', 'Category updated');
        } else {
            return back()->with('error', 'Error updating category');
        }
    }

    public function destroy ($id) {
        if ($this->categoryService->deleteCategory($id)) {
            return redirect('/admin/categories')->with('success', 'Category removed');
        } else {
            return back()->with('error', 'Error removing category');
        }
    }
}
