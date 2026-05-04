@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <h1 class="text-3xl font-bold mb-2">✏️ Muuda silti</h1>
            <p class="text-base-content/60 mb-6">Muuda olemasoleva sildi nime</p>
            
            <form method="POST" action="/admin/tags/{{ $tag->id }}">
                @csrf
                @method('PUT')
                
                <div class="form-control mb-4">
                    <label class="label">
                        <span class="label-text font-semibold">Sildi nimi</span>
                    </label>
                    <input type="text" name="name" class="input input-bordered" value="{{ $tag->name }}" required>
                </div>
                
                <div class="flex gap-4">
                    <button type="submit" class="btn btn-primary">💾 Uuenda</button>
                    <a href="/admin/tags" class="btn btn-ghost">Tagasi</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection