<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $categories = Category::all(); 
        $tags = Tag::all();
        $current = Carbon::now()->format('Y-m-d H:i'); 
        return view('admin.post.create', compact('categories', 'tags', 'current'));
    }
}
