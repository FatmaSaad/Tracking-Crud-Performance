<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
       
        // $categories = Category::with('posts:id,title')->paginate(50);
            // queries => 3 statements were executed26.59ms ✖
            // usage =>5MB ✖
            // reruestDuration =>49.9MS ✖
         $categories = Category::withCount('posts')->paginate(50); //i'll use posts_count
            // queries => 2 statements were executed1.06ms ✔
            // usage =>5MB ✔
            // reruestDuration =>18.16MS ✔

        return view('categories',[
            'name' => 'Categories',
            'categories' => $categories,
        ]);
    }
}
