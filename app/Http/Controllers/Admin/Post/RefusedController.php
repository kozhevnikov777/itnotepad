<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class RefusedController extends BaseController
{
    public function __invoke(Post $post)
    {
        $categories = Category::orderBy('created_at', 'DESC')->get()->take(1);
        $tags = Tag::all();
        return view('admin.post.refused', compact('post', 'categories', 'tags'));
    }
}
