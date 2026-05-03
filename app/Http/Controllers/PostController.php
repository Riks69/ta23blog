<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::withCount('comments', 'likes')->orderBy('created_at', 'desc')->get();
        return view('blog.index', compact('posts'));
    }
    
    public function show($id)
    {
        $post = Post::with('comments')->withCount('likes')->findOrFail($id);
        return view('blog.show', compact('post'));
    }
}