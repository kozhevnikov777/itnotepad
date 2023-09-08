<?php

namespace App\Http\Controllers\Post\Dislike;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::paginate(3);
        $randomPosts = Post::get()->random(4);
        $dislikedPosts = Post::withCount('dislikedUsers')->orderBy('disliked_users_count', 'DESC')->get()->take(4);
        return view('post.main', compact('posts', 'randomPosts', 'dislikedPosts'));
    }
}
