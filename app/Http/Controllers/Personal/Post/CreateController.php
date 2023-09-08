<?php

namespace App\Http\Controllers\Personal\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $posts = Post::all();
        $categories = Category::get()->take(2); 
        $tags = Tag::all();
        $current = Carbon::now()->format('Y-m-d H:i');
        return view('personal.post.create', compact('categories', 'tags', 'posts', 'current'));   
    }
}
