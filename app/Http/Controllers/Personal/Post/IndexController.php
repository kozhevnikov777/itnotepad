<?php

namespace App\Http\Controllers\Personal\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostUserDislike;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $users = User::all(); 
        $posts = new Post;
        $posts = $posts->all();

        $dislikes = PostUserDislike::all();
        $dislikes = $dislikes->all();

        $posts = $posts->sortByDesc('created_at');
        $time = array();
        $user_rating = 0;
        foreach($posts as $post){
            // dd(Carbon::parse($post->end_time)->diff(Carbon::parse($post->start_time))->format('%h:%I'));
            array_push($time, Carbon::parse($post->end_time)->diff(Carbon::parse($post->start_time))->format('%h:%I'));
        }
        // dd($time);
        foreach($posts as $post){
            if($post->category_id == 6 && $post->liked_users_count > 0)    
              $user_rating = $user_rating - 1;
            else
            if($post->category_id != 6 && $post->liked_users_count > 0)
              $user_rating = $user_rating + 1;
        }
        return view('personal.post.main', compact('posts', 'users', 'time', 'user_rating', 'dislikes'));
    } 
}