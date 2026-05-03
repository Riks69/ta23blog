<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

// Avalik blogi
Route::get('/', [PostController::class, 'index']);
Route::get('/post/{id}', [PostController::class, 'show']);

// Meeldimised ja kommentaarid
Route::post('/like/{postId}', [LikeController::class, 'toggle']);
Route::post('/comment/{postId}', [CommentController::class, 'store']);

// ADMINISSE
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    });
    Route::get('/posts/create', function () {
        return view('admin.create');
    });
    Route::post('/posts', function (\Illuminate\Http\Request $request) {
        \App\Models\Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author,
            'image' => $request->image,
            'likes' => 0
        ]);
        return redirect('/')->with('success', 'Postitus lisatud!');
    });
});