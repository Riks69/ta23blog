<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $request->validate([
            'author' => 'required|string|max:255',
            'content' => 'required|string'
        ]);
        
        Comment::create([
            'post_id' => $postId,
            'author' => $request->author,
            'content' => $request->content
        ]);
        
        return back()->with('success', 'Kommentaar lisatud!');
    }
}