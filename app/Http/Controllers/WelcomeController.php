<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Category;

class WelcomeController extends Controller
{
    public function welcome () {

        $categories = Category::get();
        return view('welcome')->with('categories', $categories);
    }
}
