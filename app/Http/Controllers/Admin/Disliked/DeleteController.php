<?php

namespace App\Http\Controllers\Admin\Disliked;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Post $post)
    {
        auth()->user()->dislikedPosts()->detach($post->id);
        return redirect()->route('admin.disliked.main');
    }
}
