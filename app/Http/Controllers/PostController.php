<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        // $posts = Post::paginate(50);
            // queries => 152 statements were executed, 4 of which were duplicated, 148 unique27.13ms ✖
            // usage =>8MB ✖
            // reruestDuration =>113MS ✖
        $posts = Post::with('user:id,name','category:id,name','tags:tags.id,name')->paginate(50);
            // queries =>5 statements were executed3.13ms ✔
            // usage =>7MB ✔
            // reruestDuration =>34.5ms ✔
        return view('posts',[
            'name' => 'Posts',
            'posts' => $posts
        ]);
    }
}
