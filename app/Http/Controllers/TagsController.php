<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::withCount('posts')->get();
        return view('admin.tags.index', compact('tags'));
    }
    
    public function create()
    {
        return view('admin.tags.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:tags',
        ]);
        
        Tag::create([
            'name' => $request->name,
            'slug' => \Str::slug($request->name),
        ]);
        
        return redirect('/admin/tags')->with('success', 'Tag lisatud!');
    }
    
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('admin.tags.edit', compact('tag'));
    }
    
    public function update(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255|unique:tags,name,' . $id,
        ]);
        
        $tag->update([
            'name' => $request->name,
            'slug' => \Str::slug($request->name),
        ]);
        
        return redirect('/admin/tags')->with('success', 'Tag uuendatud!');
    }
    
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        
        return redirect('/admin/tags')->with('success', 'Tag kustutatud!');
    }
    
    // Avalik tag'ide leht
    public function show($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $posts = $tag->posts()->withCount('comments', 'likes')->orderBy('created_at', 'desc')->get();
        return view('tags.show', compact('tag', 'posts'));
    }
}