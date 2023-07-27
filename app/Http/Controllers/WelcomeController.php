<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Category;
use App\Models\Page;

class WelcomeController extends Controller
{
    public function welcome ($category_id = null) {

        if ($category_id) {
            $categories = Category::get();

            $pages = Page::with('category')->where('id', $category_id)->get();
            
            return view('welcome')->with(['categories' => $categories, 'pages' => $pages]);
        } else {
            $categories = Category::get();
            $pages = Page::get();
            return view('welcome')->with(['categories' => $categories, 'pages' => $pages]);
        }
    }

    public function page ($id) {
        $page = Page::where('id', $id)->first();
        return view('page')->with('page', $page);
    }
}
