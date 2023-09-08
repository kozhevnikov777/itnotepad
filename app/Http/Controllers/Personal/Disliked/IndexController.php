<?php

namespace App\Http\Controllers\Personal\Disliked;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = auth()->user()->DislikedPosts;
        return view('personal.disliked.main', compact('posts'));
    }
}
