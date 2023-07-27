<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryPageRequest;
use App\Models\CategoryPage;
use Illuminate\Http\Request;

class CategoryPageController extends Controller
{
    public function store (StoreCategoryPageRequest $request) {
        if (CategoryPage::where('category_id', $request->category_id)->where('page_id', $request->page_id)->exists()) {
            return redirect()->back()->with('error', 'Already assigned previously!');
        }
        
        $category = CategoryPage::create([
            'category_id' => $request->category_id,
            'page_id' => $request->page_id,
        ]);

        if ($category) {
            return redirect()->back()->with('success', 'Page has been assigned to category.');
        }

        return redirect()->back()->with('error', 'There was an error while attempting the operation.');
    }
}
