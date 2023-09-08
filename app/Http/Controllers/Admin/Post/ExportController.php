<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response; 


class ExportController extends BaseController
{
    public function __invoke(Request $request)
    {
        $posts = new Post;
        $posts = $posts->all();
        $jsonData = json_encode($posts, JSON_UNESCAPED_UNICODE);  
            $headers = [  
                'Content-Type' => 'application/json',  
                'Content-Disposition' => 'attachment; filename="posts.json"',  
            ];  
      
        return Response::make($jsonData, 200, $headers);
    }

}
