<?php

namespace App\Http\Controllers\Post\Like;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(Post $post)
    {
        auth()->user()->likedPosts()->toggle($post->id);
        if ($post->category_id == 7) {
            $user = User::find($post->user_id);
            $time = Carbon::createFromFormat('H:i', Carbon::parse($post->end_time)->diff(Carbon::parse($post->start_time))->format('%h:%I'));

            // dd($time->day);
            $rating_plus = $user->rating + $time->hour*60 + $time->minute;
            $user->rating = $rating_plus;
            $user->save();
        }
        elseif($post->category_id == 6){
            $user = User::find($post->user_id);
            $time = Carbon::createFromFormat('H:i', Carbon::parse($post->end_time)->diff(Carbon::parse($post->start_time))->format('%h:%I'));

            // dd($time->day);
            $rating_plus = $user->rating - $time->hour*60 - $time->minute;
            $user->rating = $rating_plus;
            $user->save();
        }

        return redirect()->back();
    }
}
