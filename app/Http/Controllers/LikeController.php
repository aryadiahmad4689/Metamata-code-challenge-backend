<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like($article_id,$user_id)
    {
        // dd($user_id,$article_id);
        $like = new Like;
        $like->user_id = $user_id;
        $like->article_id = $article_id;
        $like->save();

        return redirect()->back();
    }

    public function dislike($article_id,$user_id)
    {
        $like = Like::where('user_id',$user_id)->where('article_id',$article_id)->first();
        $like->delete();
        return redirect()->back();


    }
}
