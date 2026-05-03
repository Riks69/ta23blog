@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 rounded-2xl shadow-md p-8">
    <h1 class="text-3xl font-bold mb-6">Lisa uus postitus</h1>
    <form method="POST" action="/admin/posts">
        @csrf
        <div class="mb-4">
            <label class="block mb-2">Pealkiri</label>
            <input type="text" name="title" class="w-full p-3 border rounded-lg" required>
        </div>
        <div class="mb-4">
            <label class="block mb-2">Autor</label>
            <input type="text" name="author" class="w-full p-3 border rounded-lg" required>
        </div>
        <div class="mb-4">
            <label class="block mb-2">Pildi URL</label>
            <input type="url" name="image" class="w-full p-3 border rounded-lg" placeholder="https://...">
        </div>
        <div class="mb-4">
            <label class="block mb-2">Sisu</label>
            <textarea name="content" rows="10" class="w-full p-3 border rounded-lg" required></textarea>
        </div>
        <button type="submit" class="bg-purple-600 text-white px-6 py-3 rounded-lg w-full">Avalda postitus</button>
    </form>
</div>
@endsection