<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function index () {
        $pages = Page::all();
        return view('admin.pages.index')->with('pages', $pages);
    }

    public function create () {
        return view('admin.pages.create');
    }
}
