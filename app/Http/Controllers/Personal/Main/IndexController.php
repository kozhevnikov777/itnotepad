<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\PostUserDislike;
use App\Models\PostUserLike;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data = [];
        $data['commentsCount'] = Comment::all()->count();
        $data['postsCount'] = Post::all()->count();
        $data['likesCount'] = PostUserLike::all()->count();
        $data['dislikesCount'] = PostUserDislike::all()->count();
        return view('personal.main.main', compact('data'));
    }
}
