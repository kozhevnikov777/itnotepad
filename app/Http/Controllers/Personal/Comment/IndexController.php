<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $comments = auth()->user()->comments;
        $posts = Post::orderBy('created_at', 'DESC')->get();
        return view('personal.comment.main', compact('comments', 'posts')); 
    }
}
