<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggle($postId)
    {
        $post = Post::findOrFail($postId);
        $ip = request()->ip();
        
        $existingLike = Like::where('post_id', $postId)->where('ip_address', $ip)->first();
        
        if ($existingLike) {
            $existingLike->delete();
            $post->decrement('likes');
        } else {
            Like::create([
                'post_id' => $postId,
                'ip_address' => $ip
            ]);
            $post->increment('likes');
        }
        
        return back();
    }
}