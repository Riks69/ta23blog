<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('posts')->get();
        return view('categories', compact('categories'));
    }
    
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->withCount('comments', 'likes')->orderBy('created_at', 'desc')->get();
        return view('category.show', compact('category', 'posts'));
    }
}