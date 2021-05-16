<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    public function index()
    {
        //$tags = Tag::with('posts:posts.id')->paginate(50);
             // queries => 3 statements were executed290ms ✖
             // models => App\Models\Post
                        // 150000 ✖
                        // App\Models\Tag
                        // 50 ✖
            // usage =>474MB ✖
            // reruestDuration =>2.13S ✖
        $tags = Tag::query()
            ->select('tags.*',DB::raw('COUNT(post_tag.post_id) as posts_count'))
            ->leftJoin('post_tag','post_tag.tag_id','=','tags.id')
            ->groupBy('tags.id')
            ->paginate(50);
            // queries => 2 statements were executed2.32ms ✔
             // models => App\Models\Tag
                         // 50 ✔
            // usage =>5MB ✔
            // reruestDuration =>31.33mS ✔

        return view('tags', [
            'name' => 'Tags',
            'tags' => $tags
        ]);
    }
}
