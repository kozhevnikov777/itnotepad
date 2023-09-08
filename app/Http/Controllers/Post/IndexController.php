<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(3);
        $randomPosts = Post::get()->random(3);
        $likedPosts = Post::withCount('likedUsers')->orderBy('created_at', 'DESC')->get()->take(5);
        $dislikedPosts = Post::withCount('dislikedUsers')->orderBy('created_at', 'DESC')->get()->take(5);
        return view('post.main', compact('posts', 'randomPosts', 'likedPosts', 'dislikedPosts')); 
    }
}
