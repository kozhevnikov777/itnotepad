<?php

namespace App\Http\Controllers\Post\Like;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CheckboxController extends Controller
{
    public function checkbox(Request $request){
        // dd($request);
        if($request->like_dislike == 'like') {
            foreach ($request->options as $option) {
                auth()->user()->likedPosts()->toggle($option);
                $post = Post::where('id', $option)->get();
                // dd($post);
                if ($post[0]->category_id == 7) {
                    $user = User::find($post[0]->user_id);
                    $time = Carbon::createFromFormat('H:i', Carbon::parse($post[0]->end_time)->diff(Carbon::parse($post[0]->start_time))->format('%h:%I'));
        
                    // dd($time->day);
                    $rating_plus = $user->rating + $time->hour*60 + $time->minute;
                    $user->rating = $rating_plus;
                    $user->save();
                }
                elseif($post[0]->category_id == 6){
                    $user = User::find($post[0]->user_id);
                    $time = Carbon::createFromFormat('H:i', Carbon::parse($post[0]->end_time)->diff(Carbon::parse($post[0]->start_time))->format('%h:%I'));
        
                    // dd($time->day);
                    $rating_plus = $user->rating - $time->hour*60 - $time->minute;
                    $user->rating = $rating_plus;
                    $user->save();
                }
            }
        }
        else {
            foreach ($request->options as $option) {
                auth()->user()->dislikedPosts()->toggle($option);
            }
        }
        return redirect()->back();
    }
}
