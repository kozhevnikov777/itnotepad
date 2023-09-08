<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $posts = new Post;
        $posts = $posts->all();
        $posts = $posts->sortByDesc('created_at');
        $time = array();
        $option = array();
        foreach($posts as $post){
            // dd();
            array_push($time, Carbon::parse($post->end_time)->diff(Carbon::parse($post->start_time))->format('%h:%I'));
            array_push($option, 0);
        }
        // dd($time);
        return view('admin.post.main', compact('posts','time', 'option'));
    }
}
