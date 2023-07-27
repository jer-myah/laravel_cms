<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Category;
use App\Models\Page;

class WelcomeController extends Controller
{
    public function welcome ($category_id = null) {

        $categories = Category::get();
        if ($category_id) {
            $category_pages = Category::where('id', $category_id)->with('pages')->first();
            $pages = $category_pages->pages;
        } else {
            $pages = Page::get();
        }

        return view('welcome')->with(['categories' => $categories, 'pages' => $pages]);
    }

    public function page ($id) {
        $page = Page::where('id', $id)->first();
        return view('page')->with('page', $page);
    }
}
