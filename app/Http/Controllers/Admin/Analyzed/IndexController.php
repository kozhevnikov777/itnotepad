<?php

namespace App\Http\Controllers\Admin\Analyzed;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends BaseController 
{
    public function __invoke()
    {
        $posts = Post::all()->sortByDesc('created_at');
        return view('admin.analyzed.main', compact('posts'));
    }
}
