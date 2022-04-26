<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like($article_id)
    {
        $like = Like::where('article_id', $article_id)->where('user_id', Auth::user()->id)->first();

        if ($like) {
            Like::where('article_id', $article_id)->where('user_id', Auth::user()->id)->delete();
            // $like->delete();
            return back();
        } else {
            Like::create([
                'article_id' => $article_id,
                'user_id' => Auth::user()->id
            ]);
            return back();
        }

        return back();
        
    }
    
}