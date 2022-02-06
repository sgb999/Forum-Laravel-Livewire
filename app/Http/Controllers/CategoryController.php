<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $page_title = "Assassin's creed Forum - Categories";
        return view('general.pages.categories', compact(['page_title', 'categories']));
    }
}
