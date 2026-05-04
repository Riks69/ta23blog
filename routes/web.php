<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;

// Avalik blogi
Route::get('/', [PostController::class, 'index']);
Route::get('/post/{id}', [PostController::class, 'show']);

// Meeldimised ja kommentaarid
Route::post('/like/{postId}', [LikeController::class, 'toggle']);
Route::post('/comment/{postId}', [CommentController::class, 'store']);

// Otsing
Route::get('/search', [SearchController::class, 'search']);

// Kontakt
Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'send']);

// Kategooriad
Route::get('/kategooriad', [CategoryController::class, 'index']);
Route::get('/kategooria/{slug}', [CategoryController::class, 'show']);

// Tag'id (sildid)
Route::get('/tag/{slug}', [TagController::class, 'show']);

// ADMIN PANEEL
Route::prefix('admin')->group(function () {
    // Admin avaleht
    Route::get('/', function () {
        return view('admin.dashboard');
    });
    
    // Postituste haldus
    Route::get('/posts/create', function () {
        return view('admin.create');
    });
    
    Route::post('/posts', function (\Illuminate\Http\Request $request) {
        $post = \App\Models\Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author,
            'image' => $request->image,
            'likes' => 0
        ]);
        
        // Lisa tag'id kui on valitud
        if ($request->has('tags')) {
            $post->tags()->attach($request->tags);
        }
        
        return redirect('/')->with('success', 'Postitus lisatud!');
    });
    
    // Tag'ide haldus (CRUD)
    Route::get('/tags', [TagController::class, 'index']);
    Route::get('/tags/create', [TagController::class, 'create']);
    Route::post('/tags', [TagController::class, 'store']);
    Route::get('/tags/{id}/edit', [TagController::class, 'edit']);
    Route::put('/tags/{id}', [TagController::class, 'update']);
    Route::delete('/tags/{id}', [TagController::class, 'destroy']);
});