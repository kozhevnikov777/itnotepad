<?php

namespace App\Http\Controllers\Admin\Refused;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends BaseController 
{
    public function __invoke()
    {
        $posts = Post::all();
        return view('admin.refused.main', compact('posts'));
    }
}
