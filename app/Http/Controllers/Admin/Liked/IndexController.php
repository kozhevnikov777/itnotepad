<?php

namespace App\Http\Controllers\Admin\Liked;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = auth()->user()->LikedPosts;
        return view('admin.liked.main', compact('posts'));
    }
}
