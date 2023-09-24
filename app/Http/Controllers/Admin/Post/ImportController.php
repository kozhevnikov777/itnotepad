<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function __invoke(Request $request)
    {
        $file = $request->file('import_file');
        if($file == null){
            return redirect()->back();
        }

        if ($file->getClientOriginalExtension() === 'json') {
            $json = file_get_contents($file);
            $data = json_decode($json, true);

            foreach ($data as $element) {
                $post = new Post;
                $post->title = $element['title'];
                $post->content = $element['content'];
                $post->start_time = $element['start_time'];
                $post->end_time = $element['end_time'];
                $post->category_id = $element['category_id'];
                $post->created_at = $element['created_at'];
                $post->updated_at = $element['updated_at'];
                $post->deleted_at = $element['deleted_at'];
                $post->user_id = $element['user_id'];
                $post->save();

            }
            return back();
        }

        return redirect()->back();
    }
}
